<?php

namespace App\Http\Controllers;

use App\Mail\NewPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Testexd
{
    public $email = 'murillogodoi3@hotmail.com';
    public $name = 'Murillim';
}

class NewPasswordController extends Controller
{
    public function index(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        return view('password',compact('mensagem'));
    }

    public function newpasandemail(Request $request)
    {
        $emailrequest = $request->email;
        $user = User::where('Email', $emailrequest)->first();


        if(!$user)
        {
              $request->session()
                  ->flash(
                      'mensagem',
                      "O email inserido não existe em nossa base de dados"
                  );
              return redirect()->back();
        }

        else {
                $newpassword = $this->randomPassword();
                $user->Password = Hash::make($newpassword);
                $user->save();

                $email = new NewPassword(
                    $user->Name,
                    $newpassword
                );

                $teste = ['email' => 'murillogodoi3@hotmail.com', 'name' => 'Murillo'];
                Mail::to(Testexd::class)->send($email);

                $request->session()
                    ->flash(
                        'mensagem',
                        "A sua nova senha foi enviada em seu email"
                    );
                return redirect()->route('entrar');
        }

    }

    public function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }
}
