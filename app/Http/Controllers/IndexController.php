<?php

namespace App\Http\Controllers;

use App\Article;
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
        return view('index.index');
    }

    public function blog(Request $request)
    {
        $articles = Article::limit(5)->createdat()->get();
        $particles = Article::createdat()->simplePaginate(15);
        if ($request->pjax()) {
            return view('index.pblog')->with(['articles' => $articles, 'particles' => $particles]);
        } else {
            return view('index.blog')->with(['articles' => $articles, 'particles' => $particles]);
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
            return view('index.blog');
        }
    }

    public function destory()
    {

    }


}
