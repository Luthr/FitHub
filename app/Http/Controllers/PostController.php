<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session; // allows us to access session class
use Image;
use Storage;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all blog posts from database
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        // return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'title' => 'required|max:255|unique:posts,title',
            'category_id' => 'required|integer',
            'slected_image' => 'sometimes|image',
            'body' => 'required'
        ));

        $post = new Post($request->all());

        //saving the image
        if ($request->hasFile('selected_image')) {
            $image = $request->file('selected_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            // So application can find File - saving the filename
            $post->image = $filename;
        }
        $post->save();
        // attaching tag array associations
        $post->tags()->sync($request->tags, false);
        Session::flash('success', 'The post was succesfully saved!'); //flash= only let it exist for one request
        // redirect to another page
        // passes post id
        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Display the specified resource.
     * @param Post $post
     * @return mixed
     */
    public function show(Post $post)
    {
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Post $post
     * @return mixed
     */
    public function edit(Post $post)
    {
        $categories = Category::all()->pluck('name')->all();
        $tags = Tag::all()->pluck('name')->all();

        // return the view and pass in the var we previously created
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
    }


    /**
     * Update the specified resource in storage.
     * @param Post $post
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Post $post, Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'category_id' => 'required|integer',
            'body' => 'required',
            'selected_image' => 'sometimes|image'
        ));
        // Save the data to the database
        $post->update($request->all());
        // If photo uploaded
        if ($request->hasFile('selected_image')) {
            // Add the new photo
            $image = $request->file('selected_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            // Delete the old photo
            Storage::delete($post->image);
            // Update the image name within posts database
            $post->image = $filename;
        }
        $post->save();
        // Save tags - taken out 'true' to overwrite on edit
        $post->tags()->sync($request->tags);
        // Set flash data with success message
        Session::flash('success', 'Post Update Successful');
        // Redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();
        Session::flash('success', 'Post Successfully Deleted');
        return redirect()->route('posts.index');
    }
}
