<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    public function studentSms()
    {
        return view('admin.communication.student-sms');
    }

    public function staffSms()
    {
        return view('admin.communication.staff-sms');
    }

    public function historySms()
    {
        return view('admin.communication.history-sms');
    }

}
