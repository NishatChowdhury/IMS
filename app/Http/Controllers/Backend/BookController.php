<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Book;
use App\Models\Backend\BookCategory;
use App\Models\Backend\IssueBook;
use App\Models\Backend\Student;
use App\Repository\StudentRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $bookCode =  Book::all()->pluck('book_title','id');
        $allBooks = Book::all();
        return view('admin.book.allBooks',compact('allBooks','studentID','bookCode'));
    }

    public function search(Request $request)
    {
        $text = $request->text;
        $all_books = Book::query()
            ->where('title', 'LIKE', "%{$text}%")
            ->get();

        $html ="";

        foreach($all_books as $key =>$books){
            $total = $books->no_of_issue;
            $available=$total - $books->issue->count() + $books->return->count();
            $sl = $key+1;
            $html.="<tr class='{{$books->id}}'>";
            $html.="<td>{$sl}</td>";
            $html.="<td>{$books->title}</td>";
            $html.="<td>{$books->author}</td>";
            $html.="<td>{$books->description}</td>";
            $html.="<td>{$books->category->book_category}</td>";
            $html.="<td><a class='btn btn-success' role='button'>{$total}</a></td>";
            $html.="<td><a class='btn btn-success' role='button'>{$available}</a></td>";
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
        $book = Book::query()->findOrFail($request->get('id'));
        return view('admin.book._issue-book',compact('students','book'));
    }

    public function issueBookStore(Request $request)
    {

        $issueBook = new IssueBook;
        $issueBook->student_id = $request->student_id;
        $issueBook->book_id = $request->book_id;
        $issueBook->book_code = $request->book_code;
        $issueBook->is_return = 0;
        $issueBook->save();
        return redirect('admin/library/allBooks');
    }

    public function returnBook()
    {
        $studentID = Student::query();
        $studentID->latest()->get();

        $bookCode =  Book::all()->pluck('book_title','id');
        $issuedData = IssueBook::all()->where('is_return','0');
        return view('admin.return-books.return-books',compact('studentID','bookCode','issuedData'));
    }

    public function returnBookSearch(Request $request)
    {

        $student = Student::query()->where('studentId',$request->ajaxid)->first();

        if(!$student){
            return response()->json([
                'status' => 404,
                'message' => 'Data Not Found'
            ]);
        }

        $issuedDatas = IssueBook::query()
            ->where('student_id', $student->id)
            ->where('is_return',0)
            ->get(['id','book_id']);

        $stringTosend = ' <option value="">Select Option</option>';
        foreach ($issuedDatas as $issuedData) {
            $stringTosend = $stringTosend.'<option value="'.$issuedData->id.'">'.$issuedData->bookCode->book_code.'</option>';
        }
        echo $stringTosend;


    }

    public function returnBookStore(Request $request)
    {

        try {
            $studentInfo = Student::query()->where('studentId', $request->student_id)->first('id');
            $issueBooks = IssueBook::query()
                ->where('student_id', $studentInfo->id)
                ->where('book_id', $request->book_id)
                ->update([
                    'is_return' => 1
                ]);

        }catch (\Exception $exception){
            dd($exception);
        }


        return back()->with('status', 'Books Return Successfully');
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
        return redirect('admin/library/allBooks');
    }

    public function edit($id)
    {
        $repository = $this->repository;
        $book=Book::query()->findOrFail($id);
        return view('admin.book.edit-book',compact('book','repository'));
    }

    public function update($id, Request $request)
    {
        $data=Book::query()->find($id);
        $data->update($request->all());
        return redirect('admin/library/allBooks')->with('success','Updated successfully');

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
        return view('admin.book.report',compact('studentID','bookCode','issuedData'));
    }
}
