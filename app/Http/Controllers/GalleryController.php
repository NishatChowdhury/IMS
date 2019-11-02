<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Repository\GalleryRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $images = Gallery::all();
        $repository = $this->repositories;
        return view('admin.gallery.image',compact('images','repository'));
    }

    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $name = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/assets/img/gallery/'.$request->album_id.'/', $name);
            $data = $request->except('image');
            $data['image'] = $name;
            //dd($data);
            Gallery::query()->create($data);
        }else{
            Gallery::query()->create($request->all());
        }
        return redirect('gallery/image');
    }

    public function destroy($id)
    {
        $image = Gallery::query()->findOrFail($id);
        File::delete('assets/img/gallery/'.$image->album_id.'/'.$image->image);
        $image->delete();
        return redirect('gallery/image');
    }
}
