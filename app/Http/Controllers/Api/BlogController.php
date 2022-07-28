<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')
                       ->get();
        $tags = Tag::all();
            return response() -> json(['blogs' => $blogs, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'title' => 'required',
            'image' => 'nullable',
            'text' => 'nullable',
            'tag_id' => 'required',
        ]);

        if($request -> hasFile('image')){
            $file = $request -> file('image');
            $filename = uniqid().'_'.$file -> getClientOriginalName();
            $file -> move(public_path().'/upload/blog/', $filename);
        }
        else{
            $filename = null;
        } 

        //foreach(json_decode($request -> tag_id , true) as $tag)

        $blog = Blog::create([
            'title' => $request -> title,
            'image' => $filename,
            'text' => $request -> text,
            'tag_id' => $request -> tag_id,
        ]);

        return $blog;
    }


    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request -> validate([
            'title' => 'nullable',
            'text' => 'nullable',
            'tag_id' => 'nullable',
        ]);

        $blog = Blog::find($id);

        $blog -> update($request -> only('title' ,  'text', 'tag_id'));

        return $blog;
    }


    public function destroy($id)
    {
        $blog = Blog::find($id);

        $blog -> delete();

        return $blog;
    }
}