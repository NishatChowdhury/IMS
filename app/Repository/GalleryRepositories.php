<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 10/26/2019
 * Time: 1:14 AM
 */

namespace App\Repository;


use App\Models\Backend\Album;
use App\Models\Backend\GalleryCategory;

class GalleryRepositories
{
    public function categories()
    {
        return GalleryCategory::all()->pluck('name','id');
    }

    public function albums()
    {
        return Album::all()->pluck('name','id');
    }
}