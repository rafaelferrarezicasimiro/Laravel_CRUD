<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clientes;

class ClientesController extends Controller
{
    public function listar(){
        return Clientes::get();
    }

    public function cadastrar(Request $request){
        
        $dados = [];
        $dados['nome'] = $request['nome'];
        $dados['cpf'] = $request['cpf'];
        $dados['email'] = $request['email'];
        $dados['telefone'] = $request['telefone'];
        $dados['data_nasc'] = $request['data_nasc'];
        $dados['ativo'] = true;
        $dados['data_desativou'] = null;
        return Clientes::create($dados);
    }

    public function alterar(Request $request){
        
        $cliente = Clientes::FindOrFail($request['id']);
        $cliente['nome'] = $request['nome'];
        $cliente['cpf'] = $request['cpf'];
        $cliente['email'] = $request['email'];
        $cliente['telefone'] = $request['telefone'];
        $cliente['data_nasc'] = $request['data_nasc'];
        $cliente['ativo'] = $request['ativo'];
        $cliente['data_desativou'] = $request['data_desativou'];
        $cliente->save();
        return $cliente;
    }

    public function carregar($id){        
        return Clientes::where('id', '=', $id)->first();
    }

    public function desativar($id){
        $cliente = Clientes::where('id', '=', $id)->first();
        $cliente['ativo'] = false;
        $cliente['data_desativou'] = date("Y-m-d H:i:s");
        $cliente->save();
    }
}
