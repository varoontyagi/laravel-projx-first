<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['title', 'article_summary', 'article_body'];


    /*public function user()
    {
        return $this->belongsTo(User::class);
    }*/

    public function author()
    {
        return $this->belongsTo(User::class,'user_id'); //By default the foreign id is user_id (functionname_id), if not pass the F key in second argument.
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps(); //To add timestamo use withTimestamps();. By defauls it's empty.
    }
}
