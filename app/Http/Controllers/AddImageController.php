<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;

class AddImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['image_list'] = Image::get();
        return view('updateImage.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["author_list"] = Author::get();
        return view('updateImage.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image_name' => 'required|max:255|unique:images,name',
            'image' => 'required',
        ]);
        $images = new Image();
        $images->name = $request->image_name;
        $images->details = $request->image_details;
        if (!empty($request->image)) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/'), $filename);
            $images->image = 'uploads/' . $filename;
        }       
        $images->author_id = $request->author_id;

        $images->save();
        return redirect('/addImage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $img = Image::find($id);
        if (!$img) {
            return redirect("/addImage");
        }
        $data["img"] = $img;
        $data["author_list"] = Author::get();
        return view('updateImage.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $img = Image::find($id);
        if (!$img) {
            return redirect("/addImage");
        }
        $img->name = $request->image_name;
        $img->details = $request->image_details;
        if (!empty($request->image)) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/'), $filename);
            $img->image = 'uploads/' . $filename;
        }
        $img->author_id = $request->author_id;
        $img->save();
        return redirect("/addImage");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $img = Image::find($id);
        if (!$img) {
            return redirect("/addImage");
        }
        $img->delete();
        return redirect("/addImage");
    }
}
