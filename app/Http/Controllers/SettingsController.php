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
        $mensagem = $request->session()->get('mensagem');

        if(!$userapi)
        {
            return view('settings',compact('name','mensagem'));
        }

        $apiid = $userapi->ApiId;
        $apiname = Api::find($apiid)->Name;

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

        $apiid = $request->id;
        $username = $request->email;
        $password =  $request->password;

        $create_userapi = new UserApi;
        $create_userapi->userId = $id;
        $create_userapi->ApiId = $apiid;
        $create_userapi->Username = $username;
        $create_userapi->Password = $password;
        $create_userapi->save();

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
