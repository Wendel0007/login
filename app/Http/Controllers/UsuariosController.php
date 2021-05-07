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
			session(['login'=> $email]);
    		return redirect()->route('usuario_lista');
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
		$endereco = $req->input('endereco');
		$cidade = $req->input('cidade');
		$cep = $req->input('cep');
		$estado = $req->input('estado');


		$u = new Usuario();
		$u->nome = $nome;
		$u->email = $email;
		$u->senha = $senha;
		$u->endereco = $endereco;
		$u->cidade = $cidade;
		$u->cep = $cep;
		$u->estado = $estado;
		$u->id_categoria = 1;
		

		$u->save();
		session()->flash('mensagem', "O usuario {$u->nome} foi inserido");
		return redirect()->route('usuario_lista');
	}
	function alterar( Request $req, $id){
		$u = Usuario::findOrFail($id);
		$u->nome = $req->input('nome');
		$u->email = $req->input('email');
		$u->senha = $req->input('senha');
		$u->endereco = $req->input('endereco');
		$u->cidade = $req->input('cidade');
		$u->cep = $req->input('cep');
		$u->estado = $req->input('estado');
		
		$u->save();
		session()->flash('mensagem', "O usuario {$u->nome} foi alterado");
		return redirect()->route('usuario_lista');
	}
	function tela_principal(){
		if(session()->has('login')){
		$us = Usuario::all();
		return view('retornologin', [
			'resposta' => "Acesso concedido",
			'tipo_resposta' => 'success',
			'usuarios' => $us
		]);
		}else{
			return redirect()->route('login');
		}
	}
	function editar($id){
		$u = Usuario::findOrFail($id);
		session()->flash('mensagem', "O usuario {$u->nome} foi editado");
		return view('usuario_editar', [ 'u' => $u ]);
	}
	
	function excluir( $id){
		$u = Usuario::findOrFail($id);
		$u->delete();
		return redirect()->route('usuario_lista');
	}

	function logout(){
		
		return redirect()->route('usuario_lista');
	}
}

