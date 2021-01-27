<?php

namespace App\Http\Controllers;

use App\BookCategory;
use App\IssueBook;
use App\NewBook;
use App\Student;
use Illuminate\Http\Request;

class NewBookController extends Controller
{

    public function index()
    {
        $allData = NewBook::all();
        return view('admin.AddBook.view-book',compact('allData'));
    }

    public function show()
    {
        $studentID = Student::all()->pluck('studentId','id');
        $bookCode =  NewBook::all()->pluck('book_code','id');
        $allBooks = NewBook::all();
        return view('admin.AddBook.allBooks',compact('allBooks','studentID','bookCode'));
    }
    public function search(Request $request)
    {
        $text = $request->text;
        $all_books = NewBook::query()
            ->where('book_title', 'LIKE', "%{$text}%")
            ->get();

        $html ="";

        foreach($all_books as $key =>$books){
            $sl = $key+1;
            $html.="<tr class='{{$books->id}}'>";
            $html.="<td>{$sl}</td>";
            $html.="<td>{$books->book_title}</td>";
            $html.="<td>{$books->author_name}</td>";
            $html.="<td>{$books->description}</td>";
            $html.="<td>{$books->category->book_category}</td>";
            $html.="<td><a class='btn btn-success' role='button'>{$books->no_of_issue}</a></td>";
            $html.="<td><a class='btn btn-warning'> <i class='fa-edit fas'></i></a> <a class='btn btn-danger'> <i class='fa-edit fas'></i></a></td>";
            $html.="</tr>";
        }

        return $html;
    }

    public function issueBook()
    {
        $studentID = Student::all()->pluck('studentId','id');
        $bookCode =  NewBook::all()->pluck('book_code','id');
        return view('admin.AddBook.allBooks',compact('studentID','bookCode'));
    }

    public function issueBookStore(Request $request)
    {
//        dd($request->all());
        IssueBook::query()->create($request->all());
        return redirect('library/allBooks');
    }

    public function returnBook()
    {
        $studentID = Student::all()->pluck('studentId','id');
        $bookCode =  NewBook::all()->pluck('book_code','id');
        return view('admin.return-books.return-books',compact('studentID','bookCode'));
    }

    public function returnBookStore(Request $request)
    {

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
