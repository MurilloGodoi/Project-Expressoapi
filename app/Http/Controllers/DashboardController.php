<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $name = $user->name;

        $requests_quantity = $this->get_requests_quantity_for($user);
        $requests_consumed = $this->get_requests_consumed_for($user);
        $requests_available = $this->calculate_available($requests_consumed, $requests_quantity);
        $extras = $this->calculate_extras($requests_consumed, $requests_quantity);


        return view('dashboard', compact(
            'name',
            'requests_consumed',
            'requests_quantity',
            'requests_available',
            'extras',
        ));
    }

    public function search(Request $request)
    {
        $teste = $request->mes;
        dd($teste);
    }

    private function calculate_extras($consumed, $total)
    {
        if($consumed > $total)
        {
            return $consumed - $total;
        }
        else {
            return 0;
        }
    }

    private function get_requests_consumed_for($user) {
        $user_id = $user->Id;
        return DB::select("exec dbo.get_api_usage $user_id")[0]->request_count;
    }

    private function calculate_available($consumed, $total)
    {
        if ($total > $consumed) {
            return $total - $consumed;
        }
        else {
            return 0;
        }
    }

    private function get_requests_quantity_for($user) {
        return $user->userplan->plan->RequestsQuantity;
    }
}
