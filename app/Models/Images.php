<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //
    protected $image = 'image';
    protected $fillable = ['image_title', 'image_desc', 'image_src'];
}
