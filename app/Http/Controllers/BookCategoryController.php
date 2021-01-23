<?php

namespace App\Http\Controllers;

use App\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{

    public function index()
    {
        $categories = BookCategory::all();
        return view('admin.bookCategory.add-category',compact('categories'));
    }


    public function store(Request $request)
    {
        BookCategory::query()->create($request->all());
        return redirect('library/bookCategory');
    }



    public function destroy($id)
    {
        $book_categories = BookCategory::query()->findOrFail($id);
        $book_categories->delete();
        return redirect('library/bookCategory');
    }
}
