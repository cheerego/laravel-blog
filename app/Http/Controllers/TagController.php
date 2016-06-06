<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Tag;
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
        $ptags = Tag::withTrashed()->paginate(10);
        return view('tags/index')->with(['ptags' => $ptags]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required|unique:tags',
        ]);
        if ($validator->fails()) {
            return redirect('tags')
                ->withErrors($validator)
                ->withInput();
        } else {
            $tag = new Tag();
            $tag->name = $request->input('name');
            $tag->save();
        }
        return redirect('tags');
    }

    public function show()
    {

    }

    public function softdelete($id)
    {
        $tag = Tag::withTrashed()->find($id);
        $tag->delete();
        return redirect('tags');
    }

    public function activate($id)
    {
        $tag = Tag::withTrashed()->find($id);
        $tag->deleted_at = null;
        $tag->save();
        return redirect('tags');
    }

    public function edit()
    {

    }

    public function update(Request $request, $id)
    {
        $validator = validator($request->all(), [
            'name' => 'required|unique:tags',
        ]);
        if ($validator->fails()) {
            return redirect('tags')
                ->withErrors($validator)
                ->withInput();
        } else {
            $tag = Tag::withTrashed()->find($id);
            $tag->name = $request->input('name');
            $tag->save();
        }
        return redirect('tags');
    }

    public function destroy()
    {

    }

}
