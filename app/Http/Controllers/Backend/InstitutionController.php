<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\AssignSubject;
use App\Models\Backend\Classes;
use App\Models\Backend\Group;
use App\Models\Backend\Section;
use App\Models\Backend\Session;
use App\Models\Backend\Staff;
use App\Models\Backend\StudentAcademic;
use App\Models\Backend\StudentSubject;
use App\Models\Backend\Subject;
use App\Repository\StudentRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstitutionController extends Controller
{
    /**
     * @var StudentRepository
     */
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function academicyear()
    {

        $sessions = Session::all();
        return view ('admin.institution.academicyear', compact('sessions'));
    }

    public function academicyearstore(Request $request){
       return $request->all();
    }

    public function store_session(Request $request){
        //dd($request->all());
        $this->validate($request, [
            'session' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);
        $request['active'] = 0;
        Session::query()->create($request->all());
        return redirect('admin/institution/academicyear')->with('success', 'Academic year added successfully');
    }

    public function edit_session(Request $request){
        $session = Session::query()->findOrFail($request->session_id);
        return $session;
    }

    public function update_session(Request $request){
        $session = Session::query()->findOrFail($request->session_id);
        $session->update($request->all());
        return redirect('admin/institution/academicyear')->with('success', 'Academic year Updated');
    }

    public function delete_session($id){
         $session = Session::query()->findOrFail($id);
         $session->delete();
         return redirect('admin/institution/academicyear')->with('success', 'Academic Year Deleted Successfully');
    }

    public function sessionStatus($id){
         $session = Session::query()->findOrFail($id);
         if($session->active == 0){
             $session->update(['active'=>1]);
         }else{
             $session->update(['active'=>0]);
         }
         return redirect('admin/institution/academicyear')->with('success', 'Status change successfully!');
    }

    public function section_group()
    {
        $sections = Section::all();
        $groups = Group::all();
        return view ('admin.institution.section-group', compact('sections', 'groups'));
    }

    public function create_section(Request $req){

//        return $req->all();

        $req->validate([
            'name' => 'required|unique:sections',
        ]);

        Section::query()->create($req->all());
        return redirect('admin/institution/section-groups')->with('success', 'Section added successfully');
    }

    public function edit_section(Request $req){
        $section = Section::query()->findorFail($req->id);
        return $section;
    }

    public function update_section(Request $req){
        $req->validate([
            'section_name' => 'required|unique:sections,name,'.$req->id,
        ]);

        $section = Section::query()->findOrFail($req->id);
        $section->update(['name' => $req->section_name]);
        return redirect('admin/institution/section-groups')->with('success', 'Section has been Updated');
    }

    public function delete_section($id){
        $section= Section::query()->findOrFail($id);
        $section->delete();
        return redirect('admin/institution/section-groups')->with('success', 'Section deleted successfully');
    }

    public function create_group(Request $req){
         $req->validate([
            'name' => 'required|unique:groups',
        ]);
        Group::query()->create($req->all());
        return redirect('admin/institution/section-groups')->with('success', 'Group added successfully');
    }

    public function edit_group(Request $req){
        $data = Group::query()->findorFail($req->id);
        return $data;
    }

    public function update_group(Request $req){

//        return $req->all();
        $req->validate([
            'group_name' => 'required|unique:groups,name,'.$req->group_id,
        ]);
        $data = Group::query()->findOrFail($req->group_id);
        $info = ['name' => $req->group_name];
        $data->update($info);
        return redirect('admin/institution/section-groups')->with('success', 'Group has been Updated');
    }

    public function delete_grp($id){
        $group = Group::query()->findOrFail($id)->first();
        $group->delete();
        return redirect('admin/institution/section-groups')->with('success', 'Group deleted successfully');
    }
    /*Institute >> Section-Groups End*/


    public function academicClasses()
    {
         $classes = AcademicClass::withCount('studentAcademic')->get()->whereIn('session_id',activeYear());
        // dd($classes);
        // return $sutdent = AcademicClass::->get();
        $repository = $this->repository;
        return view ('admin.institution.academicClasses', compact('classes','repository'));
    }

    public function storeAcademicClass(Request $req){

        $checkexits = AcademicClass::query()
                                    ->where('session_id', $req->session_id)
                                    ->where('class_id', $req->class_id)
                                    ->where('section_id', $req->section_id)
                                    ->where('group_id', $req->group_id)
                                    ->exists();
        if($checkexits){
            return back()->with('status','Academic Class Already Exist :) ');
        }


        AcademicClass::query()->create($req->all());
        return redirect('admin/institution/academic-class')->with('success','Academic Class added successfully ');
    }

    public function editAcademicClass(Request $request)
    {
       $data = AcademicClass::query()->findOrFail($request->id);
       return $data;
    }

    public function updateAcademicClass(Request $request)
    {
        $data = AcademicClass::query()->findOrFail($request->id);
        $data->update($request->all());
        return redirect('admin/institution/academic-class');

    }

    public function classes()
    {
        $classes = Classes::withCount('studentAcademic')->get();

        return view ('admin.institution.classes', compact('classes'));
    }

    public function store_class(Request $req){
        //dd($req->all());
        $validated = $req->validate([
            'name' => 'required|unique:classes',
            'numeric_class' => 'required|unique:classes',
        ]);


        Classes::query()->create($req->all());
        return redirect('admin/institution/class');
    }

    public function edit_SessionClass(Request $req){

//         return $req->id;
        $class = Classes::query()->findOrFail($req->id);
        return $class;
    }

    public function update_SessionClass(Request $req){
        $validated = $req->validate([
            'name' => 'required|unique:classes,name,'.$req->id,
            'numeric_class' => 'required|unique:classes,numeric_class,'.$req->id,
        ]);
        $class = Classes::query()->findOrFail($req->id);
        $class->update($req->all());
        return redirect('admin/institution/class')->with('success', 'Class has been Updated');
    }

    public function delete_SessionClass($id){
        $class = Classes::query()->findOrFail($id);
        $class->delete();
        return redirect('admin/institution/class')->with('success', 'Class has been Deleted');
    }

    /*Subjects Start*/
    public function subjects()
    {
         $subjects = Subject::all();
        return view ('admin.institution.subjects', compact('subjects'));
    }

    public function create_subject(Request $request){

//        return $request->all(); credit_fee
        $request->validate([
            'code' => 'required|unique:subjects',
            'name' => 'required',
            'short_name' => 'required',
            'level' => 'required',
            'type' => 'required',
//            'credit_fee' => 'decimal',
        ]);
        Subject::create($request->all());
        return redirect('admin/institution/subjects')->with('success', 'Subject Added Successfully');
    }

    public function edit_subject(Request $req){
        $subject = Subject::findOrFail($req->id);
        return $subject;
    }

    public function update_subject(Request $req){
        $subject = Subject::findOrFail($req->id);
        $subject->update($req->all());
        return redirect('admin/institution/subjects')->with('success', 'Class has been Updated');
    }

    public function delete_subject($id){
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect('admin/institution/subjects')->with('success', 'Class has been Deleted');
    }
    /*Subjects End*/

    public function classSubjects($classId)
    {
        $class = AcademicClass::query()->findOrFail($classId);
        //$classes = AcademicClass::all()->pluck('name', 'id');
         $subject = Subject::all();
         $subjects = $subject->groupBy('type');
        //$staffs = Staff::all()->pluck('name','id');
        $assignedSubjects = AssignSubject::query()->where('academic_class_id',$classId)->get();
        return view('admin.institution.classsubjects', compact( 'subjects','assignedSubjects','class'));
    }

    public function assign_subject(Request $request){
//        return $request->all();
        // delete unassigned subjects starts
         $studentAcademic = StudentAcademic::where('academic_class_id', $request->academic_class_id)->get();
//        dd($studentAcademic);
         $academic = AcademicClass::find($request->academic_class_id);
         $deletable = AssignSubject::query()
            ->where('academic_class_id',$request->academic_class_id)
            ->whereNotIn('subject_id',$request->subjects)
            ->get();
        foreach($deletable as $delete){
            $delete->delete();
        }
        // delete unassigned subjects ends

        foreach($request->subjects as $subject){
            $data['academic_class_id'] = $request->academic_class_id;
            $data['class_id'] = $academic->class_id;
            $data['teacher_id'] = 0;
            $data['subject_id'] = $subject;

//            dd($data);

            $isExist = AssignSubject::query()
                ->where('academic_class_id',$request->academic_class_id)
                ->where('subject_id',$subject)
                ->exists();

            if(!$isExist){
                AssignSubject::query()->create($data);
            }
        }
                foreach ($studentAcademic as $stuAcademic) {
                    foreach ($request->subjects as $sb){

                        $check = StudentSubject::query()
                                                ->where('student_academic_id', $stuAcademic->id)
                                                ->where('student_id', $stuAcademic->student_id)
                                                ->where('subject_id', $sb)
                                                ->exists();

                        if (!$check){

                            $storeSubject = new StudentSubject();
                            $storeSubject->student_academic_id = $stuAcademic->id;
                            $storeSubject->student_id = $stuAcademic->student_id;
                            $storeSubject->subject_id = $sb;
                            $storeSubject->save();
                        }

                    }
                }

        //AssignSubject::query()->create($request->all());

        //return redirect('institution/subjects/classsubjects')->with('success', 'Subjects assigned Successfully');
        return redirect()->back();
    }

    public function unAssignSubject($id)
    {
        $subject = AssignSubject::query()->findOrFail($id);
        $subject->delete();
        \Illuminate\Support\Facades\Session::flash('success','Subject unmount successfully');
        return redirect()->back();
    }

    public function signature()
    {
        return view('admin.institution.signature');
    }

    public function sig(Request $request)
    {
        $this->validate($request,[
            'signature' => 'required|mimetypes:image/png'
        ]);
        $image = 'signature.png';
        $request->file('signature')->move(public_path().'/assets/img/signature/', $image);
        return redirect()->back();
    }

    public function profile()
    {
        return view ('admin.institution.profile');
    }


    public function assignTeacher($id)
    {
         $subjects = AssignSubject::query()
                ->where('academic_class_id',$id)
                ->get();
         $academic = AcademicClass::find($id);
        $teachers = Staff::query()->where('staff_type_id', 2)->get();
        return view('admin.institution.assign-teacher', compact('subjects', 'teachers','academic'));
    }

    public function assignTeacherStore(Request $request)
    {
       $teacherID =  $request->staff_id;
       $integerIDs = array_map('intval', $teacherID);

     $assignSubject = AssignSubject::find($request->assign_subject_id);
     $assignSubject->update([
         'teacher_id' => $integerIDs,
         'updated_at' => Carbon::now(),
     ]);


     return back();
    }
}
