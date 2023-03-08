<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all posts
        $posts = Post::all();
        //return a json response
        return response()->json(["message"=>"posts retrieved successfully",'posts' => $posts]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function createPost(Request $request)
    {
        // Validate the request

    }







}
