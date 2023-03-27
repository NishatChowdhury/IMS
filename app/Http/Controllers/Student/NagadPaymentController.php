<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use DGvai\Nagad\Facades\Nagad;
use Illuminate\Http\Request;

class NagadPaymentController extends Controller
{
    public function create()
    {
        return view('student.nagad-test');
    }

    public function store(Request $request)
    {
        $orderID = rand(10000,99999);
        //$amount = $request->amount;
        $amount = 10; //todo:: test purpose. remove in production mode
        return Nagad::setOrderID($orderID)
            ->setAmount($amount)
            ->checkout()
            ->redirect();
    }

    public function callback(Request $request)
    {
        $verified = Nagad::callback($request)->verify();
        if($verified->success()) {

            // Get Additional Data
            $additionalData = $verified->getAdditionalData();

            // Get Full Response
            $fullResponse = $verified->getVerifiedResponse();

            return redirect('student/profile');

        } else {
            $err = $verified->getErrors();
            return redirect('student/profile')->with(['err'=>$err]);
        }
    }
}
