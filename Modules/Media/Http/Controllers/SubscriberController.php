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

    public function subscriberStatusUpdate($id)
    {
        $subscribers =  Subscriber::query()->find($id);
        if ($subscribers->unsubscribed == 1)
        {
            $subscribers->unsubscribed = 0;
        }else{
            $subscribers->unsubscribed = 1;
        }
        $subscribers->update();
        return back();
    }


}
