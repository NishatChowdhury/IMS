<?php

namespace Modules\ExamAndResult\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\Remark;
use Illuminate\Http\Request;

class RemarkController extends Controller
{
    public function index()
    {
        $remarks = Remark::all();
        return view('examandresult::remark.index',compact('remarks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);
        Remark::query()->create($request->all());
        return redirect('admin/remarks');
    }

    public function edit(Request $request)
    {
        $remark = Remark::query()->findOrFail($request->get('id'));
        return view('examandresult::remark._edit',compact('remark'));
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([ 
            'name' => 'required'
            ]);
            $data = Remark::query()->find($id);
            $data->update($request->all());
            return redirect('admin/remarks')->with('success','Remark Updated successfully');
    }


    public function destroy($id)
    {
        $remark = Remark::query()->findOrFail($id);
        $remark->delete();
        return redirect('admin/remarks');
    }
}
