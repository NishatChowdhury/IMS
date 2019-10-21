<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = ['type_id','title','description','start','end','file'];

    public function type()
    {
        return $this->belongsTo(NoticeType::class);
    }
}
