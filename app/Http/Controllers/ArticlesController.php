<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show($id)
    {
       $article = Articles::find($id);
       return view('articles.show', ['article' => $article] ); 
    }

    public function list()
    {
        //$articles = Articles::all(); //$articles = Articles::paginate(2);
        $articles = Articles::latest()->get(); // latest - Order by created_at desc.

        return view('articles.list', ['articles' => $articles]);
    }

}
