<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    //
    use SoftDeletes;
    
    protected $fillable = ['title', 'html', 'author', 'category_id'];
    protected $dates = ['deleted_at','published_at'];

    public function scopeCreatedAt($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function category(){
        $this->hasOne('App/Category');
    }
}
