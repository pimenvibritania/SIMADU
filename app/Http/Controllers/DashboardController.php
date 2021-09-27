<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $allTask = $user->allTask();
        $approvedTask = $user->approvedTask();
        $declinedTask = $user->declinedTask();
        $monthlyTask = $user->allTask(true);

        return view('pages.dashboard', compact(['allTask', 'monthlyTask', 'approvedTask', 'declinedTask']));
    }

}
