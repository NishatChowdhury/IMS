<?php

namespace App\Http\Controllers\Backend;

use App\NoticeType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticeTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $types = NoticeType::all();
        return view('admin.notice.type',compact('types'));
    }
}
