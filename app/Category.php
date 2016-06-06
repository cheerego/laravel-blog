<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];

    public function articles()
    {
        return $this->belongsTo('App\Article','id','category_id');
    }
}
