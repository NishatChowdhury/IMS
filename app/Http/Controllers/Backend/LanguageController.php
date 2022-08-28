<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Backend\Language;
use Illuminate\Support\Facades\File;
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

        $exists = File::exists(base_path().'/resources/lang/'.$req->alias.'.json');

        if(!$exists){
            File::copy(base_path().'/resources/lang/wp.json',base_path().'/resources/lang/'.$req->alias.'.json');
        }

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
        $del = Language::query()->findOrFail($id);
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
        $lang = Language::query()->findOrFail($req->id);
        $lang->name = $req->name;
        $lang->alias = $req->alias;
        $lang->direction = $req->direction;
        $lang->is_active = $req->status;
        $lang->Update();
        return redirect('admin/languages');
    }

    /**
     * @param $id
     * @return View|RedirectResponse
     */
    public function translation($id)
    {
        $language = Language::query()->findOrFail($id);
        $exists = file_exists(base_path('resources/lang/'.$language->alias.'.json'));

        if(!$exists){
            return redirect()->back()->withErrors(['msg'=>__('Language file not exists. If you are trying to change English it is not necessary.')]);
        }

        $lines = json_decode(file_get_contents(base_path('resources/lang/'.$language->alias.'.json')));
        //dd(file_get_contents(base_path('resources/lang/'.$language->alias.'.json')));
        return view('admin.language.translation',compact('language','lines'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function translate($id, Request $request): RedirectResponse
    {
        $language = Language::query()->findOrFail($id);
        $file = json_decode(file_get_contents(base_path().'/resources/lang/'.$language->alias.'.json'),true);
        foreach ($request->trans as $key => $line){
            $file[$key] = $line;
        }

        $newJsonString = json_encode($file, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

        file_put_contents(base_path('resources/lang/'.$language->alias.'.json'), stripslashes($newJsonString));

        return redirect()->back();
    }
}
