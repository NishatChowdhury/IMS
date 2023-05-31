<?php

namespace Modules\Settings\Http\Controllers;

use App\Models\Backend\Slider;
use App\Slim\Slim;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sliders = Slider::all();
        return view('settings::slider.index',compact('sliders'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();

        $images = Slim::getImages('image');
        // dd($images);
        if (!empty($images)) {
            $image = array_shift($images);
            $Imagename = Str::slug(now()) . '.' . pathinfo($image['output']['name'], PATHINFO_EXTENSION);
            $Imagedata = $image['output']['data'];
            $output = Slim::saveFile($Imagedata, $Imagename, '../storage/app/public/uploads/sliders', false);
            $data['image'] = $Imagename;
            $data['active'] = 1;
            try{
                Slider::query()->create($data);
            }catch(\Exception $e){
                dd($e);
            }
        }
        session()->flash('success', 'Slider added successfully!');

        // if ($request->hasFile('image')) {
        //     $name = time() . $request->file('image')->getClientOriginalName();
        //     $request->file('image')->move(public_path() . '/assets/img/sliders/', $name);
        //     $data = $request->except('image');
        //     $data['image'] = $name;
        //     $data['active'] = 1;
        //     try {
        //         Slider::query()->create($data);
        //     } catch (\Exception $e) {
        //         dd($e);
        //     }
        // }

        return redirect('admin/sliders');
    }

    public function destroy($id)
    {
        $slider = Slider::query()->findOrFail($id);
        File::delete(public_path().'/storage/app/public/uploads/sliders/'.$slider->image);
        $slider->delete();
        session()->flash('success', 'Slider removed successfully!');
        return redirect('admin/sliders');
    }
}
