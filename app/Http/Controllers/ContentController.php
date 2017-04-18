<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Session; // allows us to access session class
use Image;
use Storage;

/**
 * Class ContentController
 * @package App\Http\Controllers
 */
class ContentController extends Controller
{

    /**
     * ContentController constructor.
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * @param Content $content
     * @return mixed
     */
    public function edit(Content $content)
    {
        // find the content in the database and save as a var
        // $content = Content::find($id);
        // return the view and pass in the var we previously created
        return view('content.edit')->withContent($content);
    }

    /**
     * @param Content $content
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Content $content, Request $request)
    {
        // $content = Content::find($id);
        $this->validate($request, array(
            'image' => 'sometimes|image',
            'about' => 'required',
            'website' => 'required',
            'portfolio' => 'required',
        ));

        // Save the data to the database
        $content->update($request->all());
        // If photo uploaded
        if ($request->hasFile('image')) {
            // Add the new photo
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/profile/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            // Delete the old photo
            Storage::delete($content->image);
            // Update the image name within posts database
            $content->image = $filename;
        }
        $content->save();
        // Set flash data with success message
        Session::flash('success', 'Content Update Successful');
        // Redirect with flash data to posts.show
        return redirect()->route('pages.welcome');
    }

    /**
     * @param Content $content
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Content $content)
    {
        return redirect('/');
    }
}
