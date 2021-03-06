<?php

namespace App\Http\Controllers;



use App\Patrimonio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PatrimoniosController extends Controller
{
    public function index()
    {
        $patrimonios = Patrimonio::get();
        return view('patrimonios.lista', ['patrimonios' => $patrimonios]);
    }

    public function novo()
    {
        return view('patrimonios.formulario');
    }

    public function salvar(Request $request)
    {
        $patrimonio = new Patrimonio();

        $patrimonio = $patrimonio->create($request->all());


        \Session::flash('mensagem_sucesso', 'patrimonio cadastrado com sucesso!');
        \Session::flash('mensagem_sucesso', 'Patrimonio cadastrado com sucesso!');

        return Redirect::to('patrimonios/novo');
    }
    public function editar($id)
    {
        $patrimonio = Patrimonio::findOrFail($id);
        return view('patrimonios.formulario', ['patrimonio' => $patrimonio]);
    }
    public function atualizar($id, Request $request)
    {
        $patrimonio = Patrimonio::findOrFail($id);
        $patrimonio->update($request->all());
        \Session::flash('mensagem_sucesso', 'patrimonio atualizado com sucesso!');
        return Redirect::to('patrimonios/'.$patrimonio->id.'/editar');
    }
    public function deletar($id)
    {
        $patrimonio = Patrimonio::findOrFail($id);
        $patrimonio->delete();
        \Session::flash('mensagem_sucesso', 'Patrimonio deletado com sucesso!');
        return Redirect::to('patrimonios/');
    }
}