<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 10/21/2019
 * Time: 12:20 AM
 */

namespace App\Repository;


use App\NoticeType;

class NoticeRepositories
{
    public function types()
    {
        return NoticeType::all()->pluck('name','id');
    }
}