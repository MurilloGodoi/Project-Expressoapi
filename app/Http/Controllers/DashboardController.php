<?php

namespace App\Http\Controllers;

use App\Api;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $name = Auth::user()->name;
        $teste = $user->userapi->Password;

        return view('dashboard', compact('name','teste'));
    }
}
