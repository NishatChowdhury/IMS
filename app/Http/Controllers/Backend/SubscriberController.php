<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index(){
        return 'ddddd';
        $subscribers =  Subscriber::query()->latest()->get();
        return view('admin.subscriber.list',compact('subscribers'));
    }
}
