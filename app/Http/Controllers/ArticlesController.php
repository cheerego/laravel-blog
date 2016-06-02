<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Middleware\Authenticate;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    public function index(Request $request)
    {
//        dd($request->session()->all());
//        $request->session()->flush();
//        exit();
        return view('articles.index');
    }

    public function store(Request $request)
    {
//        dd($request->all());

        $validator = validator($request->all(), [
            'title' => 'required',
            'html' => 'required'
        ]);


        if ($validator->fails()) {
            return redirect('articles/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $article = Article::create([
                'title' => request('title'),
                'html' => request('html'),
                'category_id' => request('category'),
                'author' => \Auth::user()->name,
            ]);
        }
        $categorys = Category::all();

        return view('articles.create')->with(['categorys' => $categorys]);
    }

    /**
     * 显示editor  显示文章类别
     * @return $this
     */
    public function create()
    {
        $categorys = Category::all();

        return view('articles.create')->with(['categorys' => $categorys]);
    }

    public function update()
    {

    }

    public function show( )
    {

        $articles = Article::withTrashed()->select('articles.id as article_id','title','html','author','name','created_at','published_at','deleted_at','updated_at','category_id')->join('categorys', 'articles.category_id', '=', 'categorys.id')->createdat()->paginate(2);
//        $articles = Article::join('categorys', 'articles.category_id', '=', 'categorys.id')->createdat()->paginate(15);
        return view('articles.show', ['articles' => $articles]);
    }

    public function destroy()
    {

    }

    public function edit($id)
    {
        if (!is_numeric($id) || is_null($id)) {
            abort('404');
        }
        $article = Article::find($id);
        $categorys = Category::all();
        if (!$article) {
            abort('404');
        } else {
            return view('articles.edit', [
                'article' => $article,
                'categorys' => $categorys
            ]);
        }

    }

    public function activate(){
        
    }

    /**
     * @return mixed
     */
    public function uploadimg(Request $request)
    {
        dd($request->allFiles());
    }


}
