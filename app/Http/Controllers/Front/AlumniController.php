<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Alumni;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $this->validate($request,[
            'name' => 'required',
            'father' => 'required',
            'mother' => 'required',
            'dob' => 'required|date',
            'nid' => 'required',
            'institute' => 'required',
            'designation' => 'required',
            'address' => 'required',
            'mobile' => 'required|numeric',
            'dakhil_from' => 'required|integer',
            'image' => 'required|mimetypes:image/png,image/jpeg'
        ]);
        $data = $request->except('image');
        if($request->hasFile('image')){
            $image = $request->file('image')->store('alumni');
            $data['image'] = $image;
        }
        $data['login'] = $this->generateRandomNumber();
        Alumni::query()->create($data);
        Session::flash('success','Form has been submitted!');
        $info = [
            'contactNumbers' => $data['mobile'],
            'textBody' => 'Your unique application id is '.$data['login']
        ];
        $this->sms($info);
        return redirect('alumni/success')->with($data);
    }

    public function show(Request $request)
    {
        $this->validate($request,[
            'applicationId' => 'required|exists:alumni,login',
            'mobile' => 'required|exists:alumni'
        ]);

        $alumni = Alumni::query()
            ->where('login',$request->applicationId)
            ->where('mobile',$request->mobile)
            ->first();

        if(!$alumni){
            return redirect()
                ->back()
                ->withInput(['applicationId'=>$request->applicationId,'mobile'=>$request->mobile])
                ->withErrors(['applicationId'=>'We can\'t find you in our database']);
        }

        return view('front.pages.alumni-show',compact('alumni'));
    }

    public function success()
    {
        return view('front.pages.alumni-success');
    }

    public function sms($data)
    {
        $url = "https://a2p.solutionsclan.com/api/sms/send";
        $data = [
            "apiKey" => smsConfig('api_key'),
            "contactNumbers" => $data['contactNumbers'],
            "senderId" => smsConfig('sender_id'),
            "textBody" => $data['textBody']
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

    private static function generateRandomNumber()
    {
        $number = Str::random(9);
        if (Alumni::query()->where('login', $number)->count() > 0) self::generateRandomNumber();
        return $number;
    }

}
