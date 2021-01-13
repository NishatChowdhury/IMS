<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Menu;
use Exception;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $features = Feature::query()->paginate(20);
        return view('admin.feature.index',compact('features'));
    }

    public function create()
    {
        $pages = Menu::query()
            ->where('menu_id',null)
            ->get();
            //->pluck('name','id');
        return view('admin.feature.create',compact('pages'));
    }

    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $image = date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/assets/img/features/', $image);
            $data = $request->except('image');
            $data['image'] = $image;
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

        return redirect('admin/features');
    }
}
