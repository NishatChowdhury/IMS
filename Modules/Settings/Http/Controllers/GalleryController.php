<?php

namespace Modules\Settings\Http\Controllers;

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

    public function galleryCornerCreate()
    {
        $image = GalleryCorner::all();
        return view('settings::galleryCorner.galleryCorner',compact('image'));
    }

    public function galleryCornerStore(Request $request)
    {
        if ($request->hasFile('image')) {
            $i=0;
            foreach ($request->file('image') as $img) {
                $name = rand(1000,100000).'-'.time() . '.' . $img->getClientOriginalExtension();
                $img->move(storage_path('app/public/gallery/'), $name);
                $data = $request->except('image');
                $data['image'] = $name;
                GalleryCorner::query()->create($data);
                $i++;
            }
        }
        return redirect()->back()->with('status', $i.' Image Added Successfully');
    }

    public function GalleryImageDestroy($id)
    {
        $image = GalleryCorner::query()->findOrFail($id);
        File::delete(storage_path('app/public/gallery/') . $image->image);
        $image->delete();
        return back()->with('status','Image has been Successfully deleted');
    }
}