<?php

namespace App\Http\Controllers;

use App\Notice;
use App\Repository\NoticeRepositories;
use App\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * @var NoticeRepositories
     */
    private $repositories;

    public function __construct(NoticeRepositories $repositories)
    {
        $this->middleware('auth');
        $this->repositories = $repositories;
    }

    public function index()
    {
        $notices = Notice::query()->get();
        $repository = $this->repositories;
        return view('admin.notice.index',compact('notices','repository'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'notice_type_id' => 'required',
            'notice_category_id' => 'required',
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'sometimes|date',
            'file' => 'sometimes|size:20000'
        ]);
        if($request->hasFile('file')){
            $file = Carbon::now().'_'.$request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path().'/assets/img/notices/', $file);
            $data = $request->except('file');
            $data['file'] = $file;
            try{
                Notice::query()->create($data);
            }catch (\Exception $e){
                dd($e);
            }
        }else{
            Notice::query()->create($request->all());
        }
        $request->session()->flash('success','Notice published successfully!');
        return redirect('notices');
    }

    public function edit(Request $request)
    {
        //$notices = Notice::query()->get();
        $notice = Notice::query()->findOrFail($request->get('notice_id'));
        //return view('admin.notice.edit',compact('notice'));
        return $notice;
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'notice_type_id' => 'required',
            'notice_category_id' => 'required',
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'sometimes|date',
            'file' => 'sometimes|size:20000'
        ]);
        $notice = Notice::query()->findOrFail($request->get('notice_id'));

        if($request->hasFile('file')){
            $file = Carbon::now().'_'.$request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path().'/assets/img/notices/', $file);
            $data = $request->except('file');
            $data['file'] = $file;
            try{
                $notice->update($data);
            }catch (\Exception $e){
                dd($e);
            }
        }else{
            $notice->update($request->all());
        }

        return redirect()->back();
    }
}
