<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use Session;

class CategoryController extends Controller
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
        $categories = Category::all();
        // return a view and pass in the above variable
        return view('categories.index')->withCategories($categories);
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
        $category = new Category;

        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'New Category Created!'); //flash= only let it exist for one request
        // redirect to another page
        // passes post id
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $category = Category::find($id);
      return view('categories.show')->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
      {
        $category = Category::find($id);
        return view('category.edit')->withCategory($category);
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
      $category = Category::find($id);

      $this->validate($request,
          ['name' => 'required|max:20']);

      $category->name = $request->name;

      $category->save();

      Session::flash('success', 'Catgory Update Successful');
      // Redirect with flash data to categories index
      return redirect()->route('category.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
      $category->delete();
      Session::flash('success', 'Category Successfully Deleted');
      return redirect()->route('category.index');
    }
}
