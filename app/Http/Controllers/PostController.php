<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Auth;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.post.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();

        if ($categories->count() == 0 || $tags->count() == 0) {
            # code...
            // echo "string";
            Session::flash('info', 'You Must Have A Category and Tag Before Attempting To Create Post!');
            return redirect()->back();

        }
        return view('Admin.Post.create')->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $this->validate($request,
            [
                'title' => 'required|max:255',
                'featured' => 'required|image',
                'content' => 'required',
                'category_id' => 'required',
                'tags' => 'required',
            ]);
        $featured = $request->featured;
        $featured_new_name = time() . $featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'featured' => 'uploads/posts/' . $featured_new_name,
            'slug' => str_slug($request->title),
        ]);
        $post->tags()->attach($request->tags);

        Session::flash('success', "Post Is Created Successfully!");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('admin.post.edit')->with('posts', Post::find($id))->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [

            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
        ]);

        $post = Post::find($id);
        if ($request->hasFile('featured')) {
            # code...
            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('uploads/post/', $featured_new_name);
            $post->featured = 'uploads/post/' . $featured_new_name;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        Session::flash('success', 'Post Updated Successfully');
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();
        Session::flash('success', 'Post Successfully Deleted!');
        return redirect()->back();
    }

    // THIS FUNCTION IS USED TO SHOW THE POST IN TRASHED
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.post.trashed')->with('posts', $posts);
    }

    // THIS FUNCTION IS USED TO PERMANANTLY DELETE THE POST
    public function kill($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->forceDelete();
        Session::flash('success', 'Post Deleted Permanantly!');
        return redirect()->back();
    }

    // THIS FUNCTION IS USED TO RESTROE THE POST
    public function restore($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->restore();
        Session::flash('success', 'Post is Restored!');
        return redirect()->route('posts');
    }
}