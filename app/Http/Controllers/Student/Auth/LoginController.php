<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return Application|View|RedirectResponse|Redirector
     */
    public function showLoginForm()
    {
     // dd('form');
        if(auth()->guard('student')->user()){
            return redirect('student/profile');
        }

        return view('student.login',[
            'title' => 'Admin Login',
            'loginRoute' => 'student.',
            'forgotPasswordRoute' => 'admin.password.request',
        ]);
        //return view('student.login');
    }

    /**
     * Login the admin.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request)
    {



        $validator = $this->validator($request);



        if(Auth::guard('student')->attempt($request->only('studentId','password'))){
            //Authentication passed...
            return redirect()
                ->intended(route('student.profile'))
                ->with('status','You are Logged in as Student!');
        }

        //Authentication failed...
        return $this->loginFailed();
    }

    /**
     * Logout the admin.
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()
            ->route('student.login')
            ->with('status','Admin has been logged out!');
    }

    /**
     * Validate the form data.
     *
     * @param Request $request
     * @return
     */
    private function validator(Request $request)
    {
        //validation rules.

        $rules = [
            'studentId'    => 'required|exists:student_logins|min:2|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'studentId.exists' => 'These credentials do not match our records.',
        ];
        $customVariable = 'slogin';

        //validate the request.
        //$request->validate($rules,$messages,$custom_variable);
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('custom_variable', $customVariable);
        }
    }

    /**
     * Redirect back after a failed login.
     *
     * @return RedirectResponse
     */
    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }


}
