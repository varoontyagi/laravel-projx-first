<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; // To Use the DB class globally, else use .DB 

use App\Models\ProjxPost;  // ## Defining the Model to use.

class PostsController extends Controller
{
    
    /* Stattic Array Use */
    public function show($post)
    {
        $posts = [
            'my-first-post' => "Hello, This is my first post",
            'my-second-post' => "This is my second post",
        ];

        if (! array_key_exists($post, $posts)){
            abort(404, 'Sorry, this post do not exist');
        }

        return view('post', [
            'post' => $posts[$post]
        ]);

    }



    /* Coonection With Database */

    public function datashow($slug)
    {
        //$post = DB::table('projx_posts')->where('slug', $slug)->first();

        /*$post = ProjxPost::where('slug', $slug)->first();

        //dd($post);
        if (! $post)
        {
            abort(404, 'Sorry, this post do not exist');
        }*/

        $post = ProjxPost::where('slug', $slug)->firstOrfail(); // Cleaner Empty array Handling
    
        return view('post', [
            'post' => $post,
        ]);
    }

    

}
