<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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

    public function blog()
    {
        return view('index.blog');
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

    public function aboutme()
    {

    }

    public function destory()
    {

    }



}
