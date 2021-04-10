<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\PesquisarConsultaRequest;
use App\Http\Requests\PesquisarProdutoRequest;
use App\Http\Requests\RegistroRequest;
use App\Paciente;
use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $produtos = Produto::query()->orderBy('nome_produto')->get();
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');
        return view('produto.index', compact('produtos', 'mensagem'));
    }

    public function create()
    {
        return view('produto.create');
    }

    public function store(Request $request)
    {
        $foto = null;
        if ($request->hasFile('foto_produto')) {
            $foto = $request->file('foto_produto')->store('produto');
        }

        $produto = Produto::create([
            'nome_produto' => $request->nome_produto,
            'preco_produto' => $request->preco_produto,
            'foto_produto' => $foto
        ]);
        $request->session()->flash('mensagem', "Produto '$produto->nome_produto' inserido com sucesso. ID: $produto->id");
        return redirect('/produtos');
    }

    public function destroy(Request $request)
    {
        $produto = Produto::find($request->id_produto);
        $nomeProduto = $produto->nome_produto;
        $produto->delete();
        $request->session()->flash('mensagem', "Produto '$nomeProduto' excluído com sucesso.");
        return redirect('/produtos');
    }

    public function editarProduto(Request $request)
    {
        $produto = Produto::find($request->id_produto);
        return view('produto.create', compact('produto'));
    }

    public function editarProdutoEfetuar(Request $request)
    {
        $produto = Produto::find($request->id_produto);
        $produto->nome_produto = $request->nome_produto;
        $produto->preco_produto = $request->preco_produto;

        if ($request->hasFile('foto_produto')) {
            $foto = $request->file('foto_produto')->store('produto');
            $produto->foto_produto = $foto;
        }

        $produto->save();
        $request->session()->flash('mensagem', "Dados do produto '$produto->nome_produto' alterados com sucesso");
        return redirect('/produtos');
    }

    public function indexPesquisar()
    {
        return view('produto.pesquisar');
    }

    public function pesquisar(PesquisarProdutoRequest $request)
    {
        $produtos = Produto::query()->where('nome_produto', 'LIKE', '%' . $request->nome_produto . '%')->get();
        $existeProduto = Produto::query()->where('nome_produto', 'LIKE', '%' . $request->nome_produto . '%')->count();

        if ($existeProduto == false) {
            return redirect()->back()->withErrors('Não existe nenhum produto com esse nome');
        }
        return view('produto.pesquisar', compact('produtos'));
    }
}
