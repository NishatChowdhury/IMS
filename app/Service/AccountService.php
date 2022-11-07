<?php

namespace App\Service;

use App\Models\Backend\Journal;
use App\Models\Backend\JournalItem;
use Carbon\Carbon;

class AccountService
{
    public function makeJournal($stuAcaId, $total)
    {
//        return $total;
        // for local 35 = tution fee 34 = cash
        // for dev 34 = cash 35 = Form Fillup Fee
        $journal_id = [35,34];
        $len = count($journal_id);

        $debit =[$total,null];
        $credit = [null, $total];

        $journalNo = $this->journalNumber();
        $date = Carbon::now()->format('Y-m-d');
        $reference = $stuAcaId;
        $description = 'From Fee Collection';

        $journal = Journal::query()->create([
            'date' => $date,
            'reference' => $reference,
            'description' => $description. ' & Online Apply Fill Up With Reference',
            'journal_no' => $journalNo,
            'user_id' =>  auth()->id() ?? 1,
        ]);

        for ($i=0;$i<$len;$i++){
            $items['journal_id'] = $journal->id;
            $items['coa_id'] = $journal_id[$i];
            $items['description'] = $description;
            $items['debit'] = $debit[$i];
            $items['credit'] = $credit[$i];
            JournalItem::query()->create($items);
        }
        return 'done';
    }

    public function journalNumber(): string
    {
        $maxJournalId = Journal::query()->max('id');
        $increment = $maxJournalId + 1;
        $journalNumber = str_pad($increment,7,0,STR_PAD_LEFT);
        return 'JUR'.$journalNumber;
    }
}