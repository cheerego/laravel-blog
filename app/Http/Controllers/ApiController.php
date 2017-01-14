<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Barryvdh\Cors\Stack\Cors;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    //
    public function index(Request $request,$id){
        echo $id;
    }
    public function getOnePost(Request $request,$id){
        return response()->json(Article::find($id));
    }
    public function getAllTags(Request $request){
        return Tag::all();
    }
    public function getPostsByTag(Request $request,$id){

    }

    public function getTagsByPostId(Request $request,$id)
    {
        return response()->json(Article::find($id)->tags);
    }
    public function getCategoryByPostId(Request $request,$id)
    {
        return response()->json(Article::find($id)->category);
    }
    public function loadmore(Request $request){
        return Article::orderBy('id', 'desc')->paginate(15);
    }
}
