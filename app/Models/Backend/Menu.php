<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['menu_id','type','name','uri','page_id','system_page','url','order','editable','deletable','is_active'];

    public function children()
    {
        return $this->hasMany(Menu::class);
    }

    public function hasChild()
    {
        return $this->children()->count() > 0;
    }

    /**\
     * @return BelongsTo
     */
    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
