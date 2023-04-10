<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['author_list'] = Author::get();
        return view('author.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
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
            'author_name' => 'required|max:255|unique:authors,name',
            'author_email' => 'required|unique:authors,email',
        ]);
        $author = new Author();
        $author->name = $request->author_name;
        $author->email = $request->author_email;
        $author->save();
        return redirect('/author');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return redirect('/author');
        }
        $data["author"] = $author;
        return view('author.edit', $data);
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
        $auth = Author::find($id);
        if (!$auth) {
            return redirect("/author");
        }
        $auth->name = $request->author_name;
        $auth->email = $request->author_email;
        // $img->image = $request->image;

        $auth->save();
        return redirect("/author");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return redirect("/author");
        }
        $author->delete();
        return redirect("/author");
    }
}
