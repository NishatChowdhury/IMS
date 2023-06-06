<?php

namespace Modules\Library\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\Book;
use App\Models\Backend\BookCategory;
use App\Models\Backend\IssueBook;
use App\Models\Backend\Student;
use App\Repository\StudentRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{

    /**
     * @var StudentRepository
     */
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $allData = Book::all();
        return view('library::book.view-book',compact('allData'));
    }

    public function add()
    {
        $category = BookCategory::all()->pluck('book_category','id');
        return view('library::book.add-book',compact('category'));
    }


    public function show()
    {
        $studentID = Student::all()->pluck('studentId','id');
        $bookCode =  Book::all()->pluck('book_title','id');
        $allBooks = Book::all();
        return view('library::book.allBooks',compact('allBooks','studentID','bookCode'));
    }

    public function search(Request $request)
    {
        $text = $request->text;
        $all_books = Book::query()
            ->where('book_title', 'LIKE', "%{$text}%")
            ->get();

        $html ="";

        foreach($all_books as $key =>$books){
            $total = $books->no_of_issue;
            $available=$total - $books->issue->count() + $books->return->count();
            $sl = $key+1;
            $html.="<tr class='{{$books->id}}'>";
            $html.="<td>{$sl}</td>";
            $html.="<td>{$books->book_title}</td>";
            $html.="<td>{$books->author_name}</td>";
            $html.="<td>{$books->description}</td>";
            $html.="<td>{$books->category->book_category}</td>";
            $html.="<td><a class='btn btn-success' role='button'>{$total}</a></td>";
           // $html.="<td><a class='btn btn-success' role='button'>{$available}</a></td>";
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
        //$bookCode =  Book::all()->pluck('book_code','id');
        $book = Book::query()->findOrFail($request->get('id'));
        return view('library::book._issue-book',compact('students','book'));
    }

    public function issueBookStore(Request $request)
    {
        $issueBook = new IssueBook;
        $issueBook->student_id = $request->student_id;
        $issueBook->book_id = $request->book_id;
        $issueBook->is_return = 0;
        $issueBook->save();
        session()->flash('success','successfully added');
        return redirect('admin/library/allBooks');
    }

    public function returnBook()
    {
        $studentID = Student::all()->pluck('studentId','id');
        $bookCode =  Book::all()->pluck('book_title','id');
        $issuedData = IssueBook::all()->where('is_return','0');
        return view('library::return-books.return-books',compact('studentID','bookCode','issuedData'));
    }

    public function returnBookStore(Request $request)
    {
        $issuedStudentId =IssueBook::all()->pluck('student_id','id');
        $issuedBookCode = IssueBook::all()->pluck('book_id','id');

        foreach ($issuedStudentId as $studentId){
            $studentId;
        }

        foreach ($issuedBookCode as $bookCode){
            $bookCode;
        }

        if ($request->student_id == $studentId && $request->book_id == $bookCode) {

//            $returnBook = new IssueBook;
//            $returnBook->student_id = $request->student_id;
//            $returnBook->book_id = $request->book_id;
//            $returnBook->is_return = 1;
//            $returnBook->save();

            IssueBook::where('student_id',$request->student_id)->where('book_id',$request->book_id)->update(['is_return'=>1]);
            session()->flash('success','book return success');
            return redirect('admin/library/return_books');
        }
        else
        {
            session()->flash('fail','Issue The Book First!');
            return redirect('admin/library/allBooks');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_title' => 'required',
            'book_code' => 'required|unique:books',
            'author_name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'no_of_issue' => 'required',
            'shelve' => 'required',
        ]);
        Book::query()->create($request->all());
        return redirect('admin/library/books');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $book=Book::query()->findOrFail($id);
        return view('library::book.edit-book',compact('book','repository'));
    }

    public function update($id, Request $request)
    {
        $data=Book::query()->find($id);
        $data->update($request->all());
        return redirect('admin/library/books')->with('success','Updated successfully');

    }

    public function destroy($id)
    {
        $books = Book::query()->findOrFail($id);
        $books->delete();
        return redirect('admin/library/allBooks');
    }

    public function report()
    {
        $studentID = Student::all()->pluck('studentId','id');
        $bookCode =  Book::all()->pluck('title','id');
        $issuedData = IssueBook::all();
        return view('library::book.report',compact('studentID','bookCode','issuedData'));
    }
}
