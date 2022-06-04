<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Gallery;
use App\Models\Backend\GalleryCorner;
use App\Repository\GalleryRepositories;
use Illuminate\Http\RedirectResponse;
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
        return view('admin.gallery.image', compact('images', 'repository'));
    }

    /**
     * Upload images to gallery folder
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        if($request->hasFile('image')){
            foreach($request->file('image') as $key => $img){
                $name = time().'-'.$key.'.'.$img->getClientOriginalExtension();
                $img->move(storage_path('app/public/uploads/gallery/') . $request->album_id . '/', $name);
                $data = $request->except('image');
                $data['image'] = $name;
                Gallery::query()->create($data);
            }
        }else{
            Gallery::query()->create($request->all());
        }
        return redirect('admin/gallery/image');
    }

    /**
     * Remove images from storage
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $image = Gallery::query()->findOrFail($id);
        File::delete(storage_path('app/public/uploads/gallery/') . $image->album_id . '/' . $image->image);
        $image->delete();
        return back();
    }

    public function galleryCornerCreate()
    {
        $image = GalleryCorner::all();
        return view('admin.galleryCorner.galleryCorner',compact('image'));
    }

    public function galleryCornerStore(Request $request)
    {
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $img) {
                $name = rand(1000,100000).'-'.time() . '.' . $img->getClientOriginalExtension();
                $img->move(storage_path('app/public/uploads/gallery/'), $name);
                $data = $request->except('image');
                $data['image'] = $name;
                GalleryCorner::query()->create($data);
            }
        }
        return redirect()->back();
    }

    public function GalleryImageDestroy($id)
    {
        $image = GalleryCorner::query()->findOrFail($id);
        File::delete(storage_path('app/public/uploads/gallery/') . $image->image);
        $image->delete();
        return back();
    }
}