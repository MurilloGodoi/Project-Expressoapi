<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $name = $user->name;
        return view('resume',compact('name'));
    }
}
