<?php

namespace App\Http\Controllers;

use App\COA;
use App\Journal;
use App\ChartOfAccount;
use App\JournalItem;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class JournalController extends Controller
{
    use SoftDeletes;

    public function index()
    {
        $journals = Journal::query()->orderByDesc('date')->paginate(25);
        return view('admin.journal.index',compact('journals'));
    }

    public function create()
    {
        $coa = COA::all()->pluck('name','id');
        $journalNo = $this->journalNumber();
        return view('admin.journal.create',compact('coa','journalNo'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'date' => 'required|date',
            'reference' => 'required',
            'description' => 'sometimes|max:255'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $request['user_id'] = auth()->id();
        $journal = Journal::query()->create($request->all());

        $len = count($request->journal_id);
        for ($i=0;$i<$len;$i++){
            $items['journal_id'] = $journal->id;
            $items['coa_id'] = $request->journal_id[$i];
            $items['description'] = $request->description[$i];
            $items['debit'] = $request->debit[$i];
            $items['credit'] = $request->credit[$i];
            JournalItem::query()->create($items);
        }

        return redirect('admin/journals');
    }

    /**
     * @param $id
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $journal = Journal::query()->findOrFail($id);
        return view('admin.journal.show',compact('journal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Journal  $journal
     * @return Response
     */
    public function edit(Journal $journal)
    {
        return view('admin.journals.edit', compact('journal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Journal  $journal
     * @return Response
     */
    public function update(Request $request, Journal $journal)
    {
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Journal  $journal
     * @return Response
     */
    public function destroy(Journal $journal)
    {
        //
    }

    /**
     * Figure out new and unique journal number
     * @return string
     */
    public function journalNumber(): string
    {
        $maxJournalId = Journal::query()->max('id');
        $increment = $maxJournalId + 1;
        $journalNumber = str_pad($increment,7,0,STR_PAD_LEFT);
        return 'JUR'.$journalNumber;
    }
}
