<?php

namespace App\Services;

use App\Models\UserLog;

class UserLogger
{
    public static function SaveLogInInfo()
    {
        UserLog::create([
            'authenticable_type' => 'App\User',
            'authenticable_id' => auth()->user()->id,
            'ip_address' => request()->ip(),
            'agent_details' => request()->server('HTTP_USER_AGENT')
        ]);
        // return true;
    }

    public static function SaveLogOutInfo()
    {
        $logger = UserLog::where('authenticable_id',auth()->user()->id)->latest()->first();
        $logger->touch();
        // return true;
    }
}
