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
        return view('admin.book.view-book',compact('allData'));
    }

    public function add()
    {
        $category = BookCategory::all()->pluck('book_category','id');
        return view('admin.book.add-book',compact('category'));
    }


    public function show()
    {
        $studentID = Student::all()->pluck('studentId','id');
        $bookCode =  NewBook::all()->pluck('book_title','id');
        $allBooks = NewBook::all();
        return view('admin.book.allBooks',compact('allBooks','studentID','bookCode'));
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
            $html.="<td>
                        <a class='btn btn-primary' > <i class='fa-info fas '></i></a>
                        <a class='btn btn-warning'> <i class='fa-edit fas'></i></a>
                        <a class='btn btn-danger'> <i class='fa fas fa-trash'></i></a>
                    </td>";
            $html.="</tr>";
        }

        return $html;
    }

    public function issueBook(Request $request)
    {
        $students = Student::all()->pluck('studentId','id');
        //$bookCode =  NewBook::all()->pluck('book_code','id');
        $book = NewBook::query()->findOrFail($request->get('id'));
        return view('admin.book._issue-book',compact('students','book'));
    }

    public function issueBookStore(Request $request)
    {
        $issueBook = new IssueBook;
        $issueBook->student_id = $request->student_id;
        $issueBook->book_id = $request->book_id;
        $issueBook->is_return = 0;
        $issueBook->save();
        return redirect('admin/library/allBooks');
    }

    public function returnBook()
    {
        $studentID = Student::all()->pluck('studentId','id');
        $bookCode =  NewBook::all()->pluck('book_title','id');
        $issuedData = IssueBook::all()->where('is_return','0');
        return view('admin.return-books.return-books',compact('studentID','bookCode','issuedData'));
    }

    public function returnBookStore(Request $request)
    {
        $returnBook = new IssueBook;
        $returnBook->student_id = $request->student_id;
        $returnBook->book_id = $request->book_id;
        $returnBook->is_return = 1;
        $returnBook->save();
        return redirect('admin/library/allBooks');
    }


    public function store(Request $request)
    {
        NewBook::query()->create($request->all());
        return redirect('admin/library/books');
    }


    public function destroy($id)
    {
        $books = NewBook::query()->findOrFail($id);
        $books->delete();
        return redirect('admin/library/books');
    }
}
