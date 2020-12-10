<?php

namespace App\Http\Controllers;

use App\Api;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $name = Auth::user()->name;
        $user = Auth::user();

        $user->userconfiguration->smtpport=50;

        $user->save();
        $nome =  $user->userconfiguration->smtpport;





        return view('dashboard', compact('name'));
    }
}
