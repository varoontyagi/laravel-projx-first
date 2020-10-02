<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::get('/about', function () {

    //$articles = App\Models\Articles::all();
    //$articles = App\Models\Articles::paginate(3);
    //$articles = App\Models\Articles::take(3)->get();
    //$articles = App\Models\Articles::latest()->get(); // latest - Order by created_at desc.
        
    return view('about',[
        'articles' => App\Models\Articles::take(3)->latest()->get(), // take(number) -  To deifne how many to fetch.
    ]);
});

use App\Http\Controllers\ArticlesController;
Route::get('/articles/{article}', [ArticlesController::class, 'show']);
Route::get('/articles', [ArticlesController::class, 'list']);



use App\Http\Controllers\PostsController;

//Route::get('/posts/{post}', [PostsController::class, 'show']);

Route::get('/posts/{post}', [PostsController::class, 'datashow']);