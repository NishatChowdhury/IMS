<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('admin.user.view',compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.user.view',compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => [
                'email',
                Rule::unique('users')->ignore(Auth::id())
            ]
        ]);
        $user = Auth::user();
        $user->update($request->except('password'));
        Session::flash('success','Profile information updated!');
        return redirect()->back();
    }

    public function password(Request $request)
    {
        $this->validate($request,[
            'password' => 'required|confirmed'
        ]);

        $request['password'] = bcrypt($request->get('password'));

        $user = Auth::user();
        $user->update($request->only('password'));
        Session::flash('success','Profile information updated!');
        return redirect()->back();
    }
}
