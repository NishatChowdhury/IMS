<?php

namespace App\Http\Controllers;

use App\ChartOfAccount;
use App\CoaGrandParent;
use App\Repository\FinanceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class ChartOfAccountController extends Controller
{
    /**
     * @var FinanceRepository
     */
    private $repository;

    public function __construct(FinanceRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        //$coa = CoaGrandParent::all();
        $chartOfAccounts = ChartOfAccount::query()->paginate(50);
        return view('admin.coa.index',compact('chartOfAccounts'));
    }

    public function create()
    {
        $repository = $this->repository;
        return view('admin.coa.create',compact('repository'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:chart_of_accounts',
            'coa_parent_id' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $request['is_active'] = 1;

        ChartOfAccount::query()->create($request->all());

        return redirect('admin/coa');
    }

    public function edit($id)
    {
        $coa = ChartOfAccount::query()->findOrFail($id);

        $repository = $this->repository;

        return view('admin.coa.edit',compact('coa','repository'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required',Rule::unique(ChartOfAccount::class)->ignore($id)],
            'coa_parent_id' => 'required'
        ]);

        $coa = ChartOfAccount::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        //$request['is_active'] = 1;

        $coa->update($request->all());

        return redirect('admin/coa');
    }

    public function destroy($id)
    {
        $coa = ChartOfAccount::query()->findOrFail($id);

        $coa->delete();

        Session::flash('success','Account head has been deleted!');

        return redirect('admin/coa');
    }
}
