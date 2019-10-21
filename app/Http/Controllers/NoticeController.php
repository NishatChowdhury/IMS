<?php

namespace App\Http\Controllers;

use App\Notice;
use App\Repository\NoticeRepositories;
use App\Session;
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
        //dd($request->all());
        Notice::query()->create($request->all());
        $request->session()->flash('success','Notice published successfully!');
        return redirect('notices');
    }
}
