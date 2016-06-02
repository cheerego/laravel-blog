<?php

namespace App\Http\Controllers;

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
        if ($request->pjax()) {
            echo 1231231;
        } else {
            return view('index.blog');
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
