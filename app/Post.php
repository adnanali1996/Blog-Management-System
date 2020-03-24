<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'content', 'category_id', 'featured', 'slug', 'user_id',
    ];

    protected $dates = ['deleted_at'];

    // THIS FUNCTION IS USED TO GET FULL LINK OF IMAGE OF THE POST
    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }
    //
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    // THIS RELATION IS MANY TO ONE WITH USER
    public function user()
    {
        return $this->belongsTo('App\User');

    }
}