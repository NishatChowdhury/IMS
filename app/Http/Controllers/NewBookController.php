<?php

namespace App\Http\Controllers;

use App\BookCategory;
use App\NewBook;
use Illuminate\Http\Request;

class NewBookController extends Controller
{

    public function index()
    {
        $allData = NewBook::all();
        return view('admin.AddBook.view-book',compact('allData'));
    }


    public function add()
    {
        $category = BookCategory::all()->pluck('book_category','id');
        return view('admin.AddBook.add-book',compact('category'));
    }


    public function store(Request $request)
    {
        NewBook::query()->create($request->all());
        return redirect('library/books');
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $books = NewBook::query()->findOrFail($id);
        $books->delete();
        return redirect('library/books');
    }
}
