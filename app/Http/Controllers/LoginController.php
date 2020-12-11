<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        return view('index',compact('mensagem'));
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))){
            return redirect()
                ->back()
                ->withErrors('Email e/ou senha inválidos');
        }
        else {
            return redirect()->route('dashboard');
        }
    }
}
