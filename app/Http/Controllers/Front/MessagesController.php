<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Backend\Message;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class cMessagesController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'       => 'required|min:4',
            'email'      => 'required|email',
            'phone'      => 'required',
            'message'    => 'required'
        ],[]);

        Message::query()->create($request->all());

        return redirect('contacts')->with('success','Your Message Send....');
    }
}
