<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleTag extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['article_id', 'tag_id'];
    protected $dates = ['deleted_at'];
}
