<?php

namespace Modules\Settings\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\Feature;
use App\Models\Backend\Menu;
use App\Models\Backend\Page;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Slim\Slim;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $features = Feature::query()->paginate(20);
        return view('settings::feature.index',compact('features'));
    }

    public function create()
    {
        $pages = Menu::query()
            ->where('menu_id',null)
            ->get();
        return view('settings::feature.create',compact('pages'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $images = Slim::getImages();
//         dd($images);
        if (!empty($images)) {
            $image = array_shift($images);
            $Imagename = Str::slug(now()) . '.' . pathinfo($image['output']['name'], PATHINFO_EXTENSION);
            $imageData = $image['output']['data'];
            $output = Slim::saveFile($imageData, $Imagename, '../storage/app/public/uploads/feature', false);
            $data['image'] = $Imagename;
            try{
                Feature::query()->create($data);
            }catch (Exception $e){
                dd($e);
            }
        }else{
            try{
                Feature::query()->create($request->all());
            }catch (Exception $e){
                dd($e);
            }
        }

//        if($request->hasFile('image')){
//            $image = date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
//            $request->file('image')->move(public_path().'/assets/img/features/', $image);
//            $data = $request->except('image');
//            $data['image'] = $image;
//            try{
//                Feature::query()->create($data);
//            }catch (Exception $e){
//                dd($e);
//            }
//        }else{
//            try{
//                Feature::query()->create($request->all());
//            }catch (Exception $e){
//                dd($e);
//            }
//        }

        Session::flash('success','Item added to feature!');

        return redirect('admin/features');
    }

    public function edit($id)
    {
        $feature = Feature::query()->findOrFail($id);
        $pages = Menu::query()
            ->where('menu_id',null)
            ->get();
        return view('settings::feature.edit',compact('feature','pages'));
    }

    public function update($id, Request $request)
    {
        $featureId = Feature::query()->findOrFail($id);
        $feature = $request->all();
        $images = Slim::getImages();
//         dd($images);
        if (!empty($images)) {
            $image = array_shift($images);
            $Imagename = Str::slug(now()) . '.' . pathinfo($image['output']['name'], PATHINFO_EXTENSION);
            $imageData = $image['output']['data'];
            $output = Slim::saveFile($imageData, $Imagename, '../storage/app/public/uploads/feature', false);
            $feature['image'] = $Imagename;
        }
        $featureId->update($feature);

//        if($request->hasFile('image')){
//            $image = date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
//            $request->file('image')->move(public_path().'/assets/img/features/', $image);
//            $data = $request->except('image');
//            $data['image'] = $image;
//            try{
//                $feature->update($data);
//            }catch (Exception $e){
//                dd($e);
//            }
//        }else{
//            try{
//                $feature->update($request->except('image'));
//            }catch (Exception $e){
//                dd($e);
//            }
//        }

        Session::flash('success','Feature has been updated!');

        return redirect('admin/features');
    }

    public function destroy($id)
    {
        $feature = Feature::query()->findOrFail($id);
        $feature->delete();
        Session::flash('success','Feature has been removed from home page.');
        return redirect('admin/features');
    }
}
