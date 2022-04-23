<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\InstituteMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class MessageController extends Controller
{
    public function editChairmanMessage(){
         $message = InstituteMessage::query()->where('alias','chairman')->first();
        return view('admin.aboutInstitute.chairman',compact('message'));
    }
    public function editAboutInstitute(){
        $aboutInstitute = InstituteMessage::query()->where('alias','about')->first();
        return view('admin.aboutInstitute.about',compact('aboutInstitute'));
    }
    public function editPrincipalMessage(){
        $message = InstituteMessage::query()->where('alias','principal')->first();
        return view('admin.aboutInstitute.principal',compact('message'));
    }

    /**
     * Store/Update messages in storage
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     *
     */
    public function instituteMessageUpdate(Request $request): RedirectResponse
    {
        $this->validate($request,[
            'body' => 'required',
        ]);
        $alias = $request->alias;
        $msg = InstituteMessage::query()->where('alias',$alias)->first();
        $data['title'] = $request->title;
        $data['body'] = $request->body;
        $data['alias'] = $request->alias;

        if($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/message'), $filename);
            $data['image'] = $filename;
        }

        if($msg){
            $msg->update($data);
        }else{
            InstituteMessage::query()->create($data);
        }

        return redirect()->back()->with('success','Chairman Message Saved Successfully!');
    }


}
