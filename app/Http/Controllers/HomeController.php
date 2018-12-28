<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chamado;
use Auth;
use Illuminate\Support\Facades\Gate;


class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        //retorna apenas os chamados do usuario logado
        //$chamados = Chamado::where('user_id','=', $user->id)->get();

        //retorna todos os chamados
        $chamados = Chamado::all();
        return view('home', compact('chamados'));
    }

    public function detalhe($id)
    {

        $chamado = Chamado::find($id);

        //metodo para verificar se o usuario tem autorização
        //$this->authorize('ver-chamado',$chamado);

        //outro método verificar se o usuario não tem acesso com mensagem em português.
        /*if(Gate::denies('ver-chamado',$chamado))
        {
           abort(403,"Não autorizado");
        }
        */

        //outro método para verificar se o usuario tem acesso.
        /*if(Gate::allows('ver-chamado',$chamado))
        {
            return view('detalhe',compact('chamado'));
        }

        abort(403,"Não autorizado");*/

        //o controlhe de acesso está sendo feito na view em dethalhe.blade.php
        return view('detalhe',compact('chamado'));
    }
}
