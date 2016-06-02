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
      echo 1231231;
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
        echo 'adasd';
    }

    public function destory()
    {

    }



}
