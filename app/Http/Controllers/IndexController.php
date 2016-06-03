<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;

class IndexController extends Controller
{
    //


    public function __construct()
    {
    }

    public function index()
    {
        $articles = Article::limit(5)->createdat()->get();
        $categorys = Category::all();
        return view('index.index')->with(['articles' => $articles, 'categorys' => $categorys]);
    }

    public function blog(Request $request)
    {
        $articles = Article::limit(5)->createdat()->get();
        $particles = Article::createdat()->simplePaginate(10);
        $categorys = Category::all();
        if ($request->pjax()) {
            return view('index.pblog')->with([
                'articles' => $articles,
                'particles' => $particles,
                'categorys' => $categorys]);
        } else {
            return view('index.blog')->with(['articles' => $articles, 'particles' => $particles, 'categorys' => $categorys]);
        }
    }

    public function details(Request $request, $id)
    {
        $articles = Article::limit(5)->createdat()->get();
        $categorys = Category::all();
        $detail = Article::withTrashed()->find($id);
        if ($request->pjax()) {
            return view('index.pdetail')->with(['articles' => $articles, 'categorys' => $categorys,'detail'=>$detail]);
        } else {
            return view('index.detail')->with(['articles' => $articles, 'categorys' => $categorys,'detail'=>$detail]);
        }
    }

    public function toys()
    {

    }

    public function message()
    {

    }

    public function edit()
    {

    }

    public function aboutme(Request $request)
    {
        if ($request->pjax()) {
            return view('index.paboutme');
        } else {
            return view('index.aboutme');
        }
    }

    public function destory()
    {

    }


}
