<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    //


    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $articles = Article::limit(5)->createdat()->get();
        $categorys = Category::all();
        $tags = Tag::all();
        if ($request->pjax()) {
            return view('index.pindex')->with(['articles' => $articles, 'categorys' => $categorys, 'tags' => $tags]);
        } else {
            return view('index.index')->with(['articles' => $articles, 'categorys' => $categorys, 'tags' => $tags]);
        }


    }

    public function blog(Request $request)
    {
        $articles = Article::limit(5)->createdat()->get();
        $particles = Article::createdat()->simplePaginate(10);
        $categorys = Category::all();
        $tags = Tag::all();
        if ($request->pjax()) {
            return view('index.pblog')->with([
                'articles' => $articles,
                'particles' => $particles,
                'categorys' => $categorys,
                'tags' => $tags
            ]);
        } else {
            return view('index.blog')->with(['articles' => $articles, 'particles' => $particles, 'categorys' => $categorys, 'tags' => $tags]);
        }
    }

    public function details(Request $request, $id)
    {
        if (!is_numeric($id) || is_null($id)) {
            abort('404');
        }
        $articles = Article::limit(5)->createdat()->get();
        $categorys = Category::all();
        $detail = Article::withTrashed()->find($id);
        $tags = Tag::all();
        if ($request->pjax()) {
            return view('index.pdetail')->with(['articles' => $articles, 'categorys' => $categorys, 'detail' => $detail, 'tags' => $tags]);
        } else {
            return view('index.detail')->with(['articles' => $articles, 'categorys' => $categorys, 'detail' => $detail, 'tags' => $tags]);
        }
    }

    public function toys()
    {

    }

    public function message(Request $request)
    {
        
        if ($request->pjax()) {
            return view('index.pmessage');
        } else {
            return view('index.message');
        }
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
    public function findarticlesbycategory(Request $request,$id)
    {
        $articles = Article::limit(5)->createdat()->get();
        $particles = Category::find($id)->articles->simplePaginate(10);
        $categorys = Category::all();
        $tags = Tag::all();
       
        if ($request->pjax()) {
            return view('index.pblog')->with([
                'articles' => $articles,
                'particles' => $particles,
                'categorys' => $categorys,
                'tags' => $tags
            ]);
        } else {
            return view('index.blog')->with(['articles' => $articles, 'particles' => $particles, 'categorys' => $categorys, 'tags' => $tags]);
        }
    }
}
