<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Theme extends Model
{
    use HasFactory;
     protected $table= "themes";
    protected $fillable = ['name','css','js'];

    /**
     * A theme has only one site
     * @return HasOne
     */
    public function current(): HasOne
    {
        return $this->hasOne(SiteInformation::class);
    }
}
