<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Validation\Validator;

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
        dd($request->all());
        \Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
        ]);
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function show()
    {

    }

    public function destroy()
    {

    }

    public function edit()
    {

    }

    public function editor()
    {
        echo asset('bower_components');
        exit();
        return view('articles.editor');
    }

    /**
     * @return mixed
     */
    public function uploadimg(Request $request)
    {
        dd($request->allFiles());
    }


}
