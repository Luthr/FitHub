<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session; // allows us to access session class
use Purifier; // Enables the use of purifier
use Image;
use Storage;
class PostController extends Controller
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
        // create a variable and store all blog posts from database
        $posts = Post::orderBy('id', 'desc')->paginate(5);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'title'         => 'required|max:255',
            'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'   => 'required|integer',
            'slected_image' =>'sometimes|image',
            'body'          => 'required'
          ));
        // store post in database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);
        //saving the image
        if ($request->hasFile('selected_image')) {
          $image = $request->file('selected_image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(800,400)->save($location);
          // So application can find File - saving the filename
          $post->image = $filename;
        }
        $post->save();
        // attaching tag array associations
        $post->tags()->sync($request->tags, false);
        Session::flash('success', 'The post was succesfully saved!'); //flash= only let it exist for one request
        // redirect to another page
        // passes post id
        return redirect()->route('posts.show', $post->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save as a var
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        // return the view and pass in the var we previously created
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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
        $post = Post::find($id);
            $this->validate($request, array(
                'title'           => 'required|max:255',
                'slug'            => "required|alpha_dash|min:5|max:255|unique:posts,slug, $id",
                'category_id'     => 'required|integer',
                'body'            => 'required',
                'selected_image'  => 'sometimes|image'
              ));
        // Save the data to the database
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->input('body'));
        // If photo uploaded
        if ($request->hasFile('selected_image')) {
          // Add the new photo
          $image = $request->file('selected_image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(800,400)->save($location);
          $previousFilename = $post->image;
          // Update the image name within posts database
          $post->image = $filename;
          // Delete the old photo
          Storage::delete($previousFilename);
        }
        $post->save();
        // Save tags - taken out 'true' to overwrite on edit
        $post->tags()->sync($request->tags);
        // Set flash data with success message
        Session::flash('success', 'Post Update Successful');
        // Redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();
        Session::flash('success', 'Post Successfully Deleted');
        return redirect()->route('posts.index');
    }
}
