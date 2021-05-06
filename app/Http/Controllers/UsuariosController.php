<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    
    function exibeLogin(){
    	return view('login');
    }

    function tentaLogin(Request $req){
       	// verificar usuario e senha
    	$email = $req->input('email');
    	$senha = $req->input('senha');
    	
    	$u = Usuario::where('email', '=', $email)->first();
    	$us = Usuario::all();
    	
    	if ($u && $u->senha == $senha){
    		return view('retornologin', [
    			'resposta' => "Acesso concedido",
    			'tipo_resposta' => 'success',
    			'usuarios' => $us
    		]);
    	} else {
       		return view('retornologin', [
    			'resposta' => "Acesso negado",
    			'tipo_resposta' => 'danger',
    			'usuarios' => $us
    		]);
    	}
    }
	function novo(){
		return view('user_novo');
	}
	function inserir(Request $req){
		$nome = $req->input('name');
		$email = $req->input('email');
		$senha = $req->input('senha');

		$u = new Usuario();
		$u->nome = $nome;
		$u->email = $email;
		$u->senha = $senha;

		$u->save();
		return redirect()->route('usuario_lista');
	}
	function tela_principal(){
		$us = Usuario::all();
		return view('retornologin', [
			'resposta' => "Acesso concedido",
			'tipo_resposta' => 'success',
			'usuarios' => $us
		]);
	}
	function editar($id){
		$u = Usuario::findOrFail($id);
		return view('usuario_editar', [ 'u' => $u ]);
	}
	function alterar( Request $req, $id){
		$u = Usuario::findOrFail($id);
		$u->nome = $req->input('nome');
		$u->email = $req->input('email');
		$u->senha = $req->input('senha');
		$u->save();
		return redirect()->route('usuario_lista');
	}
	function excluir( $id){
		$u = Usuario::findOrFail($id);
		$u->delete();
		return redirect()->route('usuario_lista');
	}
}
