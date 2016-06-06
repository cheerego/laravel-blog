<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;

use App\Http\Requests;

class TagController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    //
    public function index()
    {

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

    }

    public function softdelete($id){

    }
    public function activate($id){

    }
    public function edit()
    {

    }

    public function update(Request $request,$id)
    {

    }

    public function destroy()
    {

    }

}
