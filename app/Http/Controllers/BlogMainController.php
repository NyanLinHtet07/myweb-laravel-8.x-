<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Blog;
use App\Models\Tag;

class BlogMainController extends Controller
{
    public function index(){
        $blogs = Blog::orderBy('id' , 'desc')
                        ->paginate(6);
        $tags = Tag::all();
        return Inertia::render('Main/Blog', [
            'blogs' => $blogs,
            'tags' => $tags
        ]);
    }
}