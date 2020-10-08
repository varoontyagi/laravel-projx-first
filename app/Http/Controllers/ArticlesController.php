<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles $article
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $article)
    {
       //$article = Articles::find($id);
       return view('articles.show', ['article' => $article] ); 
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(request('tag'))
        {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        }
        else {
            $articles = Articles::latest()->get(); // latest - Order by created_at desc.
        }
                         //$articles = Articles::all(); //$articles = Articles::paginate(2);
        return view('articles.index', ['articles' => $articles]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('articles.create', [
           'tags' => Tag::all()
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        //dd(\request()->all());

        $article = new Articles($this->validateArticle());
        $article->user_id = 1; //auth()->id() while user is logged in.
        $article->save();
        //Articles::create($this->validateArticle());

        $article->tags()->attach(\request('tags')); //Attach all the Array id's to the Article ID in the relation table. Opposite is detach.

        return redirect(route('articles.index'));
    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $article)
    {   
       // $article = Articles::find($id); Articles $article already has it.
        return view('articles.edit', compact('article'));
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articles  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Articles $article)
    {
        $article->update($this->validateArticle());
       
        /*$article = Articles::find($id);
        $article->title = request('title');
        $article->article_summary = request('article_summary');
        $article->article_body = request('article_body');
        $article->save();*/
        //return redirect('/articles/'.$article->id);

        return redirect(route('articles.show', $article));
    }


    protected function validateArticle()
    {
       return request()->validate([
            'title' =>  'required',
            'article_summary' => 'required',
            'article_body' => 'required',
            'tags' => 'exists:tags,id' //the tags should exists in 'tags' table in 'id' column.
        ]);
    }

}
