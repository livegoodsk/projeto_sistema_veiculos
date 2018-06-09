<?php

namespace FederalSt\Http\Controllers;

use FederalSt\Http\Requests\VeiculoRequest;
use FederalSt\Model\Veiculos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class VeiculoController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function listar()
    {
        Gate::denies('admin');
        $id = (Gate::denies("isAdmin") ) ? Auth::user()->id : null;

        $veiculos = (new Veiculos())->listar(['id' => $id]);

        return view("veiculo.listar",['veiculos' => $veiculos]);
    }

    public function cadastrarVisao()
    {
        Gate::denies('admin');

        $proprietarios = (new \FederalSt\Model\User())->listar();

        return view("veiculo.formulario",['proprietarios' => $proprietarios]);
    }

    public function cadastrarLogica(VeiculoRequest $request )
    {
        Gate::denies('admin');

        $resposta = (new Veiculos())->salvar($request->all());

        if( !$resposta )
            return back()->with('notificacaoErro' ,"Falha ao Cadastrar");

        return redirect('/veiculos')->with('notificacaoSucesso',"Cadastro Realizado");
    }


    public function editarVisao($id)
    {
        $idP = (Gate::denies("isAdmin") ) ? Auth::user()->id : null;

        $proprietarios = (new \FederalSt\Model\User())->listar([
            'id' => $idP
        ]);

        $veiculo = (new Veiculos())->listarUm($id);

        return view("veiculo.formulario",[
            'veiculo' => $veiculo,
            'proprietarios' => $proprietarios
        ]);
    }

    public function editarLogica(VeiculoRequest $request,$id)
    {
        $id = (int) $id;
        $resposta = (new Veiculos())->atualizar($id,$request->all());

        if( !$resposta )
            return back()->with('notificacaoErro' ,"Falha ao Atualizar");

        return redirect('/veiculos')->with('notificacaoSucesso',"Atualizado com Realizado");

    }

    public function excluir($id)
    {
        Gate::denies('admin');

        $resposta = (new Veiculos())->excluir($id);

        if( !$resposta )
            return back()->with('notificacaoErro' ,"Falha ao excluido");

        return redirect('/veiculos')->with('notificacaoSucesso',"Excluido com Sucesso");

    }


}
