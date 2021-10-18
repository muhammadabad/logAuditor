<?php

namespace App\Http\Controllers;

use App\Models\UserLog;
use App\Http\Controllers\Controller;
class DashboardController extends Controller
{

    public function dashboard()
    {
        $logs = UserLog::latest()->get();
        $login_time = UserLog::where('authenticable_id',auth()->user()->id)->select('created_at')->latest()->first();
        return view('dashboard',compact('logs','login_time'));
    }


}
