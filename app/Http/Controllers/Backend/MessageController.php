<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AboutInstitute;
use App\Models\Backend\ChairmanMessage;
use App\Models\Backend\InstituteMessage;
use App\Models\Backend\PrincipalMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function instituteMessageUpdate(Request $request){
        $this->validate($request,[
            'body' => 'required',
        ]);
        $alias = $request->alias;
        $msg = InstituteMessage::query()->where('alias',$alias)->first();
        $data['title'] = $request->title;
        $data['body'] = $request->body;

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

//    public function  updatePrincipalMessage(Request $request){
//        $this->validate($request,[
//            'title' => 'required|max:255',
//            'body' => 'required',
//        ]);
//        $msg = PrincipalMessage::query()->first();
//        $msg['title'] = $request->title;
//        $msg['body'] = $request->body;
//        if($request->file('image')){
//            $file= $request->file('image');
//            $filename= date('YmdHi').'.'.$file->getClientOriginalExtension();
//            $file-> move(public_path('uploads/message'), $filename);
//            $msg['image']= $filename;
//        }
//        $msg->update();
//        Session::flash('success','Principal Message Saved Successfully!');
//        return redirect('admin/principalMessage');
//    }

//    public function  updateAboutInstitute(Request $request){
//        $this->validate($request,[
//            'body' => 'required',
//        ]);
//        $msg = aboutInstitute::query()->first();
//        $msg->update($request->all());
//        Session::flash('success','About Saved Successfully!');
//        return redirect('admin/aboutInstitute');
//    }
}
