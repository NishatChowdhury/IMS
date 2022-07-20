<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Language;
use Illuminate\Validation\Rule;


class LanguageController extends Controller
{
    public function index(){
        $languages = Language::query()->get();
        $language = Language::query()->where('is_active',1)->pluck('name','id');
        $active = Language::query()->where('default',1)->first();
        return view('admin.language.index',compact('languages','language','active'));
    }
    public function edit($id){
        $editData = Language::findOrFail($id);
        $languages = Language::query()->get();
        $language = Language::query()->where('is_active',1)->pluck('name','id');
        $active = Language::query()->where('default',1)->first();
        return view('admin.language.index',compact('languages','language','active','editData'));
    }
    public function store(Request $req){
        if (!isset($req->status)){
            $req->status = 0;
        }
        $this->validate($req, [
            'name'=>'unique:languages,name',
        ]);
        $lang = new Language();
        $lang->name = $req->name;
        $lang->alias = $req->alias;
        $lang->direction = $req->direction;
        $lang->is_active = $req->status;
        $lang->save();
        return redirect('admin/languages');
    }
    public function status(Request $req){
//        $lang = Language::findOrFail($req->id);
        if ($req->st==0){
            Language::where("id", $req->id)->update(["is_active" => 1]);
        }else{
            Language::where("id", $req->id)->update(["is_active" => 0]);
        }
        return response('success');
    }
    public function defaultUpdate(Request $req){
        Language::where("id", $req->prev)->update(["default" => 0]);
        Language::where("id", $req->id)->update(["default" => 1]);
        return redirect('admin/languages');
    }
    public function delete($id){
        $del = Language::findOrFail($id);
        $del->delete();
        return redirect('admin/languages');
    }
    public function update(Request $req){
        if (!isset($req->status)){
            $req->status = 0;
        }
        $this->validate($req, [
            'name'=>['required',Rule::unique('languages')->ignore($req->id)],
        ]);
        $lang = Language::findOrFail($req->id);
        $lang->name = $req->name;
        $lang->alias = $req->alias;
        $lang->direction = $req->direction;
        $lang->is_active = $req->status;
        $lang->Update();
        return redirect('admin/languages');
    }
}
