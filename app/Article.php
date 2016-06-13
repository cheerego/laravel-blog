<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['title', 'html', 'author', 'category_id','content'];
    protected $dates = ['deleted_at','published_at'];

    public function scopeCreatedAt($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function category(){
       return $this->belongsTo('App\Category','category_id');
    }

    /**
     * @return array
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
