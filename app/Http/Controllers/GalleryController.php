<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Repository\GalleryRepositories;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * @var GalleryRepositories
     */
    private $repositories;

    public function __construct(GalleryRepositories $repositories)
    {
        $this->middleware('auth');
        $this->repositories = $repositories;
    }

    public function index()
    {
        $repository = $this->repositories;
        return view('admin.settings.image',compact('repository'));
    }

    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $name = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/assets/img/gallery/'.$request->album_id, $name);
            $data = $request->except('image');
            $data['image'] = $name;
            Gallery::query()->create($data);
        }else{
            Gallery::query()->create($request->all());
        }
        return redirect('settings/image');
    }
}
