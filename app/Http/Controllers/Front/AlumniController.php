<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Alumni;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlumniController extends Controller
{
    public function index()
    {
        return view('front.pages.alumni-login');
    }

    /**
     * Store alumni information in storage
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Alumni::query()->create($request->all());
        Session::flash('success','Form has been submitted!');
        return redirect('alumni/success')->with(['user'=>$request->all()]);
    }

    public function show(Request $request)
    {
        dd($request->all());
    }

    public function success()
    {
        return view('front.pages.alumni-success');
    }

    public function sms($data)
    {
        $url = "https://sms.solutionsclan.com/api/sms/send";
        $data = [
            "apiKey" => smsConfig('api_key'),
            "contactNumbers" => $data['mobile'],
            "senderId" => smsConfig('sender_id'),
            "textBody" => $data['textbody']
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = curl_exec($ch);
        echo "$response";
        curl_close($ch);

    }

}
