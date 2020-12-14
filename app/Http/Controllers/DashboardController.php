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

        $weekly_usage = $this->get_weekly_usage_for($user);
        $daily_usage_mean = $this->calculate_daily_usage_mean($weekly_usage);

        return view('dashboard', compact(
            'name',
            'requests_consumed',
            'requests_quantity',
            'requests_available',
            'extras',
            'weekly_usage',
            'daily_usage_mean',
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

    private function calculate_daily_usage_mean($weekly_usage) {
        return number_format(array_sum($weekly_usage)/count($weekly_usage), 1);
    }

    private function get_weekly_usage_for($user) {
        $user_id = $user->Id;
        $query_result = DB::select("exec dbo.get_api_weekly_usage $user_id");
        $result = [];

        for ($i = 0; $i < 7; $i++) {
            $days_ago = array_column($query_result, 'days_ago');
            if ($key = array_search($i, $days_ago)) {
                array_unshift($result, $query_result[$key]->request_count);
            }
            else {
                array_unshift($result, 0);
            }
        }

        return $result;
    }
}
