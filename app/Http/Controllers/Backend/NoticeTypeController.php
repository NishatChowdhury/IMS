<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\NoticeType;

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
