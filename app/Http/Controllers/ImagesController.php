<?php

namespace App\Http\Controllers;

use App\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;

class ImagesController extends Controller
{
    //

    public function index()
    {
        $images = Image::orderBy('created_at', 'desc')->paginate(15);
        return view('images.index', ['images' => $images]);
    }

    public function create()
    {

    }

    public function show()
    {

    }

    public function store(Request $request){



        if ($request->hasFile('image')) {
            //
            if ($request->file('image')->isValid()) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();

                $dir  = public_path('upload');
                $asset_path = asset('upload');
                $name = Carbon::now().".$extension";
                $new = $file->move($dir,$name);
                Image::create([
                    'path' => $asset_path . '/' . $name,
                ]);
            }
        }

        return redirect()->back();
        

    }

}
