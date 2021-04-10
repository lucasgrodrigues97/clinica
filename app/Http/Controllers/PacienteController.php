<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\PesquisarConsultaRequest;
use App\Http\Requests\PesquisarPacienteRequest;
use App\Http\Requests\RegistroRequest;
use App\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index(Request $request)
    {
        $pacientes = Paciente::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');
        return view('paciente.index', compact('pacientes', 'mensagem'));
    }

    public function create()
    {
        return view('paciente.create');
    }

    public function store(Request $request)
    {
        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('paciente');
        }

        $paciente = Paciente::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'data_nascimento' => $request->data_nascimento,
            'foto' => $foto,
            'endereco' => $request->endereco,
            ]);
        $request->session()->flash('mensagem', "Paciente '$paciente->nome' inserido com sucesso. ID: $paciente->id");
        return redirect('/pacientes');
    }

    public function destroy(Request $request)
    {
        $paciente = Paciente::find($request->id_paciente);
        $nomePaciente = $paciente->nome;
        $paciente->delete();
        $request->session()->flash('mensagem', "Paciente '$nomePaciente' excluído com sucesso.");
        return redirect('/pacientes');
    }

    public function editarPaciente(Request $request)
    {
        $paciente = Paciente::find($request->id_paciente);
        return view('paciente.create', compact('paciente'));
    }

    public function editarPacienteEfetuar(Request $request)
    {
        $paciente = Paciente::find($request->id_paciente);
        $paciente->nome = $request->nome;
        $paciente->telefone = $request->telefone;
        $paciente->endereco = $request->endereco;
        $paciente->data_nascimento = $request->data_nascimento;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('paciente');
            $paciente->foto = $foto;
        }

        $paciente->save();
        $request->session()->flash('mensagem', "Dados do paciente '$paciente->nome' alterados com sucesso");
        return redirect('/pacientes');
    }

    public function indexPesquisar()
    {
        return view('paciente.pesquisar');
    }

    public function pesquisar(PesquisarPacienteRequest $request)
    {
        $pacientes = Paciente::query()->where('nome', 'LIKE', '%' . $request->nome . '%')->get();
        $existePaciente = Paciente::query()->where('nome', 'LIKE', '%' . $request->nome . '%')->count();

        if ($existePaciente == false) {
            return redirect()->back()->withErrors('Não existe nenhum paciente com esse nome');
        }
        return view('paciente.pesquisar', compact('pacientes'));
    }
}
