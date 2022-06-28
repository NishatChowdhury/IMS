<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Role;
use App\Models\Backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
//        $routeName = $request->route()->getName();
//        $roles = auth()->user()->roles;
//
//        return $roles;



        $users = User::all();
        $roles = Role::all();
        return view('admin.user.list',compact('users', 'roles'));
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



    /// user list create
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role_id' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->sync($request->role_id);

        return back()->with('status', 'User Create Successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
         return view('admin.user.edit',compact('user', 'roles'));
    }

    public function assignRoleUpdate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'role_id' => 'required',
        ]);

        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->roles()->sync($request->role_id);

         return redirect()->route('user.index')->with('status', 'User Update Successfully');
    }



}