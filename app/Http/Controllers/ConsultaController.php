<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\PesquisarConsultaRequest;
use App\Paciente;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index(Request $request)
    {
        $paciente = Paciente::find($request->id_paciente);
        $consultas = $paciente->consultas;
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');
        return view('consulta.index', compact('paciente', 'consultas', 'mensagem'));
    }

    public function create()
    {
        return view('consulta.create');
    }

    public function store(ConsultaRequest $request)
    {
        $idPaciente = $request->id_paciente;
        $consulta = Consulta::create([
            'nome_consulta' => $request->nome_consulta,
            'data_consulta' => $request->data_consulta,
            'preco_consulta' => $request->preco_consulta,
            'dados_consulta' => $request->dados_consulta,
            'paciente_id' => $idPaciente
        ]);
        $request->session()->flash('mensagem', "Consulta '$consulta->nome_consulta' inserida com sucesso.");
        return redirect("/pacientes/consultas/$idPaciente");
    }

    public function destroy(Request $request)
    {
        $idPaciente = $request->id_paciente;
        $consulta = Consulta::find($request->id_consulta);
        $nomeConsulta = $consulta->nome_consulta;
        $consulta->delete();
        $request->session()->flash('mensagem', "Consulta '$nomeConsulta' excluída com sucesso.");
        return redirect("/pacientes/consultas/$idPaciente");
    }

    public function editarConsulta(Request $request)
    {
        $paciente = Paciente::find($request->id_paciente);
        $consulta = Consulta::find($request->id_consulta);
        return view('consulta.create', compact('paciente', 'consulta'));
    }

    public function editarConsultaEfetuar(Request $request)
    {
        $consulta = Consulta::find($request->id_consulta);
        $consulta->nome_consulta = $request->nome_consulta;
        $consulta->preco_consulta = $request->preco_consulta;
        $consulta->data_consulta = $request->data_consulta;
        $consulta->dados_consulta = $request->dados_consulta;
        $idPaciente = $consulta->paciente_id;

        if (empty($request->dados_consulta)) {
            return redirect("/consultas/$consulta->id/editarConsulta/$idPaciente")->withErrors('Digite os dados da consulta');
        }

        $consulta->save();
        $request->session()->flash('mensagem', "Dados da consulta alterados com sucesso");
        return redirect("/pacientes/consultas/$idPaciente");
    }

    public function indexPesquisar()
    {
        return view('consulta.pesquisar');
    }

    public function pesquisar(PesquisarConsultaRequest $request)
    {
        $consultas = Consulta::query()->where('nome_consulta', 'LIKE', '%' . $request->nome_consulta . '%')->get();
        $existeConsulta = Consulta::query()->where('nome_consulta', 'LIKE', '%' . $request->nome_consulta . '%')->count();

        if ($existeConsulta == false) {
            return redirect()->back()->withErrors('Não existe nenhuma consulta com esse nome');
        }
        return view('consulta.pesquisar', compact('consultas'));
    }
}
