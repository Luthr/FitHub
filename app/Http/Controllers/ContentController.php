<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Session; // allows us to access session class
use Purifier; // Enables the use of purifier
use Image;
use Storage;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit(Content $content)
    {
      // dd($content);
      // find the content in the database and save as a var
      // $content = Content::find($id);
      // return the view and pass in the var we previously created
      return view('content.edit')->withContent($content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Content $content, Request $request)
    {
      // $content = Content::find($id);
          $this->validate($request, array(
            'image' =>'sometimes|image',
            'about'       => 'required',
            'website'     => 'required',
            'portfolio'   => 'required',
            ));
      // Save the data to the database
      // $content = Content::find($id);
      $content->about = Purifier::clean($request->about);
      $content->website = Purifier::clean($request->website);
      $content->portfolio = Purifier::clean($request->portfolio);
      // If photo uploaded
      if ($request->hasFile('image')) {
        // Add the new photo
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(800,400)->save($location);
        $previousFilename = $content->image;
        // Update the image name within posts database
        $content->image = $filename;
        // Delete the old photo
        Storage::delete($previousFilename);
      }
      $content->save();
      // Set flash data with success message
      Session::flash('success', 'Content Update Successful');
      // Redirect with flash data to posts.show
      return redirect()->route('pages.welcome');
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
    }
}
