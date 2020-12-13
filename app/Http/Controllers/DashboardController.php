<?php

namespace App\Http\Controllers;

use App\Api;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $name = Auth::user()->name;
        $sms_credits = $user->userplan->SMSCredits;
        $price_plan = $sms_credits = $user->userplan->SMSCredits;
        $planid = $user->userplan->planId;
        $plan = Plan::find($planid);
        $requests_quantity = $plan->RequestsQuantity;
        $extras = $this->calculate_extras($sms_credits,$requests_quantity);


        return view('dashboard', compact('name', 'sms_credits', 'requests_quantity','extras'));
    }

    public function search(Request $request)
    {
        $teste = $request->mes;
        dd($teste);
    }

    public function calculate_extras($sms_credits, $requests_quantity)
    {
        if($requests_quantity > $sms_credits)
        {
            return $requests_quantity - $sms_credits;
        }
        else{
            return 0;
        }
    }
}
