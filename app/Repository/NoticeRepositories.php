<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 10/21/2019
 * Time: 12:20 AM
 */

namespace App\Repository;


use App\Models\Backend\NoticeCategory;
use App\Models\Backend\NoticeType;

class NoticeRepositories
{
    public function types()
    {
        return NoticeType::all()->pluck('name','id');
    }

    public function categories()
    {
        return NoticeCategory::all()->pluck('name','id');
    }
}