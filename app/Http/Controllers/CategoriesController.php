<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleTag;
use App\Category;
use App\Http\Middleware\Authenticate;

use App\Http\Requests;
use App\Tag;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    //
    public function index()
    {
        dd(Article::first()->tags);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required|unique:categories',
        ]);
        if ($validator->fails()) {
            return redirect('categories/show')
                ->withErrors($validator)
                ->withInput();
        } else {
            $category = new Category();
            $category->name = $request->input('name');
            $category->save();
        }
        return redirect('categories/show');
    }

    public function show()
    {
        $pcategories = Category::withTrashed()->paginate(10);
        return view('categories/show')->with(['pcategories' => $pcategories]);
    }
    
    public function softdelete($id){
        $category = Category::withTrashed()->find($id);
        $category->delete();
        return redirect('categories/show');
    }
    public function activate($id){
        $category = Category::withTrashed()->find($id);
        $category->deleted_at = null;
        $category->save();
        return redirect('categories/show');
    }
    public function edit()
    {

    }

    public function update(Request $request,$id)
    {
        $validator = validator($request->all(), [
            'name' => 'required|unique:categories',
        ]);
        if ($validator->fails()) {
            return redirect('categories/show')
                ->withErrors($validator)
                ->withInput();
        } else {
            $category = Category::withTrashed()->find($id);
            $category->name = $request->input('name');
            $category->save();
        }
        return redirect('categories/show');
    }

    public function destroy()
    {

    }

}
