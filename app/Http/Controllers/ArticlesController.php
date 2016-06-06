<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleTag;
use App\Category;
use App\Http\Middleware\Authenticate;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
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
            $tags = request('tags');
            if (!empty($tags)) {
                foreach ($tags as $tag) {
                    \DB::insert('insert into `article_tag` (`article_id`, `tag_id`) values (?, ?)', [$article->id, $tag]);
                }
            }
        }
        $categorys = Category::all();

        return redirect()->action('ArticlesController@create');
    }

    /**
     * 显示editor  显示文章类别
     * @return $this
     */
    public function create()
    {
        $categorys = Category::all();
        $tags = Tag::all();
        return view('articles.create')->with(['categorys' => $categorys, 'tags' => $tags]);
    }

    public function update(Request $request, $id)
    {
        $validator = validator($request->all(), [
            'title' => 'required',
            'html' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect("articles/$id/edit")
                ->withErrors($validator)
                ->withInput();
        } else {
            $article = Article::withTrashed()->find($id);
            $article->title = $request->input('title');
            $article->html = $request->input('html');
            $article->category_id = $request->input('category');
            $article->save();
            $articletags = \DB::table('article_tag')->where('article_id', '=', $id)->delete();
            $tags = request('tags');
            if (!empty($tags)) {
                foreach ($tags as $tag) {
                    \DB::insert('insert into `article_tag` (`article_id`, `tag_id`) values (?, ?)', [$article->id, $tag]);
                }
            }

        }
        return redirect("articles/$id/edit");
    }

    public function softdelete($id)
    {
        $article = Article::find($id);
        if (!$article) {
            abort(404);
        } else {
            $article->delete();
            return redirect('articles/show');
        }
    }

    public function show()
    {

        $articles = Article::withTrashed()->createdat()->paginate(10);
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
        $article = Article::withTrashed()->find($id);
        $categorys = Category::all();
        $tags = Tag::all();
        if (count($article) === 0) {
            abort('404');
        } else {
            return view('articles.edit', [
                'article' => $article,
                'categorys' => $categorys,
                'tags' => $tags,
            ]);
        }

    }

    public function reactivate($id)
    {
        $article = Article::withTrashed()->find($id);
        if (!$article) {
            abort(404);
        } else {
            $article->deleted_at = null;
            $article->save();
            return redirect('articles/show');
        }

    }

    /**
     * @return mixed
     */
    public function uploadimg(Request $request)
    {
        $file = $request->file('photo');
        if ($request->hasFile('photo')) {
            //
            if ($request->file('photo')->isValid()) {
                //
//                echo storage_path('image'),$file->getFilename().".jpg";
//                $new = $file->move(storage_path('image'),Carbon::now().".jpg");
//                var_dump( $new->getRealPath());
                /**
                 * {
                 *  "success": true/false,
                 *  "msg": "error message", # optional
                 *  "file_path": "[real file path]"
                 *   }
                 */
                return response()->json([
                    'success' => true,
                    'msg' => 'success',
                    "file_path" => "../../storage/image/" . $file->getFilename() . ".jpg"
                ]);
            }
        }
    }


}
