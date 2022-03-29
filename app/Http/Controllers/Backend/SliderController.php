<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Slider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'image' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        if($request->hasFile('image')){
            $name = time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/assets/img/sliders/', $name);
            $data = $request->except('image');
            $data['image'] = $name;
            $data['active'] = 1;
            try{
                Slider::query()->create($data);
            }catch(\Exception $e){
                dd($e);
            }
        }
        return redirect('admin/sliders');
    }

    public function destroy($id)
    {
        $slider = Slider::query()->findOrFail($id);
        File::delete(public_path().'/assets/img/sliders/'.$slider->image);
        $slider->delete();
        \Illuminate\Support\Facades\Session::flash('Slider removed successfully!');
        return redirect('admin/sliders');
    }
}
