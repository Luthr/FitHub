<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Purifier; // Enables the use of purifier

/**
 * Class BlogController
 * @package App\Http\Controllers
 */
class BlogController extends Controller
{

    /**
     * @return mixed
     */
    public function getIndex() {
      $posts = Post::orderBy('id', 'desc')->paginate(5);
      $alltags = Tag::all();
      return view('blog.index')->withPosts($posts)->withTags($alltags);
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function getSingle(Post $post) {
       // fetch from the db based on slug
//       $post = Post::where('slug', '=', $slug)->first();
       // return the view and pass in the post object
       return view('blog.single')->withPost($post);
    }
}
