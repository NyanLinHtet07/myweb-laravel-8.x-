<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;
use App\Models\Project;
use App\Models\Blog;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'desc')
                    ->get();
        return response() -> json(['tags' => $tags]);
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
                'name' => 'required',
                'icon' => 'nullable',
            ]);

        if($request -> hasFile('icon')){
            $file = $request -> file('icon');
            $filename = uniqid().'_'.$file -> getClientOriginalName();
            $file -> move(public_path().'/upload/tag/', $filename);
        }

        else {
            $filename = null;
        }

        $tag = Tag::create([
            'name' => $request -> name,
            'icon' => $filename,
        ]);

        return $tag;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag -> update($request -> only('name'));

        return $tag;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag -> delete();

    }
}