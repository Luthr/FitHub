<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;
use Session;

class TagController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // Display a view, of all categories
      // it will also have a form to create a new category
      // create a variable and store all categories from database
      $tags = Tag::all();
      // return a view and pass in the above variable
      return view('tags.index')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Save a new category into the database and then redirect back to index
      $this->validate($request, array(
          'name' => 'required|max:255'
        ));

      // store in database
      $tag = new Tag;

      $tag->name = $request->name;
      $tag->save();

      Session::flash('success', 'New Tag Created!'); //flash= only let it exist for one request
      // redirect to another page
      // passes post id
      return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tags.show')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tag = Tag::find($id);
      return view('tags.edit')->withTag($tag);
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
      $tag = Tag::find($id);

      $this->validate($request,
          ['name' => 'required|max:255']);

      $tag->name = $request->name;

      $tag->save();

      Session::flash('success', 'Tag Update Successful');
      // Redirect with flash data to posts.show
      return redirect()->route('tags.show', $tag->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tag = Tag::find($id);
      $tag->posts()->detach();
      $tag->delete();
      Session::flash('success', 'Tag Successfully Deleted');
      return redirect()->route('tags.index');
    }
}
