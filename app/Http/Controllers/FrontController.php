<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function introduction()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.introduction',compact('content'));
    }
}
