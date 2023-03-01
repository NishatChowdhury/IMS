<?php

namespace Modules\Media\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index(){
        $subscribers =  Subscriber::query()->latest()->get();
        return view('media::subscriber.list',compact('subscribers'));
    }
}
