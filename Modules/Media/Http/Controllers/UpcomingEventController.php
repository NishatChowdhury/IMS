<?php

namespace Modules\Media\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\Slider;
use App\Models\Backend\UpcomingEvent;
use App\Slim\Slim;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UpcomingEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $events = UpcomingEvent::query()->paginate(25);
        return view('media::event.index',compact('events'));
    }

    public function create()
    {
        return view('media::event.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'title'=>'required',
            'venue'=>'required',
            'date' => 'required|date',
            'time' => 'required',
            'details' => 'required',
            'thumbnail' => 'required',
        ]);

        $images = Slim::getImages('thumbnail');
        if (!empty($images)) {
            $image = array_shift($images);
            $Imagename = Str::slug(now()) . '.' . pathinfo($image['output']['name'], PATHINFO_EXTENSION);
            $Imagedata = $image['output']['data'];
            $output = Slim::saveFile($Imagedata, $Imagename, '../storage/app/public/uploads/events', false);
            $data['image'] = $Imagename;
            try{
                UpcomingEvent::query()->create($data);
            }catch (Exception $e){
                dd($e);
            }
        }else{
            try{
                UpcomingEvent::query()->create($request->all());
            }catch (Exception $e){
                dd($e);
            }
        }
//        UpcomingEvent::query()->create($data);
//        if($request->hasFile('thumbnail')){
//            $image = date('Ymdhis').'.'.$request->file('thumbnail')->getClientOriginalExtension();
//            $request->file('thumbnail')->move(public_path().'/assets/img/events/', $image);
//            $data = $request->except('thumbnail');
//            $data['image'] = $image;
//            try{
//                UpcomingEvent::query()->create($data);
//            }catch (Exception $e){
//                dd($e);
//            }
//        }else{
//            try{
//                UpcomingEvent::query()->create($request->all());
//            }catch (Exception $e){
//                dd($e);
//            }
//        }
        return redirect('admin/events');
    }

    public function edit($id)
    {
        $event = UpcomingEvent::query()->findOrFail($id);
        return view('media::event.edit',compact('event'));
    }

    public function update($id, Request $request)
    {
        $event = UpcomingEvent::query()->findOrFail($id);

        $data = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $images = Slim::getImages('thumbnail');
        if (!empty($images)) {
            $image = array_shift($images);
            $Imagename = Str::slug(now()) . '.' . pathinfo($image['output']['name'], PATHINFO_EXTENSION);
            $Imagedata = $image['output']['data'];
            $output = Slim::saveFile($Imagedata, $Imagename, '../storage/app/public/uploads/events', false);
            $data['image'] = $Imagename;
            try{
                $event->update($data);
            }catch (Exception $e){
                dd($e);
            }
        }else{
            try{
                $event->update($request->all());
            }catch (Exception $e){
                dd($e);
            }
        }

//        if($request->hasFile('thumbnail')){
//            $image = date('Ymdhis').'.'.$request->file('thumbnail')->getClientOriginalExtension();
//            $request->file('thumbnail')->move(public_path().'/assets/img/events/', $image);
//            $data = $request->except('thumbnail');
//            $data['image'] = $image;
//            try{
//                $event->update($data);
//            }catch (Exception $e){
//                dd($e);
//            }
//        }else{
//            try{
//                $event->update($request->all());
//            }catch (Exception $e){
//                dd($e);
//            }
//        }

        return redirect('admin/events');
    }

    public function destroy($id)
    {
        $event = UpcomingEvent::query()->findOrFail($id);
        if(File::exists(public_path('assets/img/events/'.$event->image))){
            File::delete(public_path('assets/img/events/'.$event->image));
        }
        $event->delete();
        return redirect('admin/events');
    }
}
