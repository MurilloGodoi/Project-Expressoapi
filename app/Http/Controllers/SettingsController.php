<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\UserApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{


    public function index(Request $request)
    {
        $user = Auth::user();
        $name = $user->name;
        $id = $user->Id;
        $userapi = UserApi::where('userId', $id)->first();

        if(!$userapi)
        {
            return view('settings',compact('name','mensagem','apiname'));
        }

        $apiid = $userapi->ApiId;
        $apiname = Api::find($apiid)->Name;

        $mensagem = $request->session()->get('mensagem');


        return view('settings',compact('name','mensagem','apiname'));


    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $id = $user->Id;
        $userapi = UserApi::where('userId', $id)->first();

        if($userapi){
            return redirect()
                ->back()
                ->withErrors('Você precisa excluir o seu provedor ativo para adicionar outro');

        }

        $apid = $request->id;
        $username = $request->email;
        $password =  $request->password;
        $userapi->ApiId = $apid;
        $userapi->Username = $username;
        $userapi->Password = $password;
        $userapi->save();

        $request->session()
            ->flash(
                'mensagem',
                "O seu novo provedor foi adicionado"
            );
        return redirect()->back();

    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        $id = $user->Id;
        $userapi = UserApi::where('userId', $id)->first();
        $userapi->delete();

        $request->session()
            ->flash(
                'mensagem',
                "O seu provedor foi excluido com sucesso"
            );
        return redirect()->back();
    }
}
