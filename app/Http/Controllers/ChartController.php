<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use App\Lease;
use App\Charts\ChartsDemo;



class ChartController extends Controller
{
    //
    public function index()
    {
        $manager=@auth::user();
        // dd($manager);
        $users = Lease::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Day(created_at)"))
                    ->pluck('count');

        $chart = new ChartsDemo;
        $chart->labels(['Mon', 'Tue', 'Wed', 'Thu','Fri','Sat', 'Sun']);
        $chart->dataset('Profits Chart', 'line', $users)
        ->options([
            'fill' => 'true',
            'borderColor' => '#5bCbC0'
        ]);

        return view('managers.managerHome', ['manager'=>$manager,'chart'=>$chart]);
    }
}
