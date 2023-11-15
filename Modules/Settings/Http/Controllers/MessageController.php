<?php

namespace Modules\Settings\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\InstituteMessage;
use App\Models\Backend\Slider;
use App\Slim\Slim;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class MessageController extends Controller
{
    public function editChairmanMessage(){
        $message = InstituteMessage::query()->where('alias','chairman')->first();
        return view('settings::aboutInstitute.chairman',compact('message'));
    }
    public function editAboutInstitute(){
        $aboutInstitute = InstituteMessage::query()->where('alias','about')->first();
        return view('settings::aboutInstitute.about',compact('aboutInstitute'));
    }
    public function editPrincipalMessage(){
        $message = InstituteMessage::query()->where('alias','principal')->first();
        return view('settings::aboutInstitute.principal',compact('message'));
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
            'title' => 'required',
            'body' => 'required',
        ]);
        $alias = $request->alias;
        $msg = InstituteMessage::query()->where('alias',$alias)->first();
        $data['title'] = $request->title;
        $data['body'] = $request->body;
        $data['alias'] = $request->alias;

//        if($request->file('image')) {
//            $file = $request->file('image');
//            $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
//            $file->move(public_path('uploads/message'), $filename);
//            $data['image'] = $filename;
//        }

        $images = Slim::getImages('image');
        if (!empty($images)) {
            $image = array_shift($images);
            $imageName = date('YmdHi') . '.' . pathinfo($image['output']['name'], PATHINFO_EXTENSION);
            $imageData = $image['output']['data'];
            $output = Slim::saveFile($imageData, $imageName, '../storage/app/public/uploads/message', false);
            $data['image'] = $imageName;
            $data['active'] = 1;
            try{
                Slider::query()->create($data);
            }catch(\Exception $e){
                dd($e);
            }
        }

        if($msg){
            $msg->update($data);
        }else{
            InstituteMessage::query()->create($data);
        }

        return redirect()->back()->with('success','Institute Message Updated Successfully!');
    }


}
