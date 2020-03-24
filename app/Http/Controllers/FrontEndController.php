<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;

class FrontEndController extends Controller
{
    //
    public function index()
    {
        return view('index')
            ->with('title', Setting::first()->site_name)
            ->with('categories', Category::take(5)->get())
            ->with('first_post', Post::orderBy('created_at', 'DESC')->first())
            ->with('second_post', Post::orderBy('created_at', 'DESC')->skip(1)->take(1)->get()->first())
            ->with('third_post', Post::orderBy('created_at', 'DESC')->skip(2)->take(1)->get()->first())
            ->with('laravel', Category::find(2))
            ->with('bootstrap', Category::find(5))
            ->with('settings', Setting::first());
    }

    // FOR SINGLE PAGE
    public function single_page($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $next_id = Post::where('id', '>', $post->id)->min('id');
        $previous_id = Post::where('id', '<', $post->id)->max('id');
        return view('single_page')
            ->with('post', $post)
            ->with('title', $post->title)
            ->with('categories', Category::take(5)->get())
            ->with('settings', Setting::first())
            ->with('next', Post::find($next_id))
            ->with('previous', Post::find($previous_id))
            ->with('tags', Tag::all());

    }

    // FOR SINGLE CATEGORY'S POSTS
    public function single_category($id)
    {
        $category = Category::find($id);

        return view('single_category')
            ->with('category', $category)
            ->with('title', $category->name)
            ->with('categories', Category::take(5)->get())
            ->with('settings', Setting::first())
            ->with('tags', Tag::all());
    }

    // FOR SINGLE TAG TO SHOW MULTIPLE POSTS
    public function single_tag($id)
    {
        $tag = Tag::find($id);
        return view('single_tag')
            ->with('tag', $tag)
            ->with('title', $tag->tag)
            ->with('categories', Category::take(5)->get())
            ->with('settings', Setting::first())
            ->with('tags', Tag::all());
    }
}