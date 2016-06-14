<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    //
    use SoftDeletes;
    protected $table = 'images';
    protected $fillable = ['path','name'];
    protected $dates = ['deleted_at'];
}
