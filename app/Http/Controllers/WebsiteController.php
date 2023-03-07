<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function createPost(Request $request, $websiteId)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $website = Website::findOrFail($websiteId);



        $post = new Post([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        $website->posts()->save($post);


        //return a json response
        return response()->json(['message' => 'Post created successfully', 'post' => $post]);

    }


}
