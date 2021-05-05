<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Auth::user()->photos;

        return view('photos.photo', ['photos' => $photos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'caption' => 'required',
            'description' => 'required',
        ]);

        // moving image to public/images
        $file = $request->file('image');
        $destinationPath = public_path() . '/storage/';
        $originalFile = $file->getClientOriginalName();
        $filename=strtotime('now') . $originalFile;
        $file->move($destinationPath, $filename);


        $photo = new Photo();
        $photo->user_id = Auth::user()->id;
        $photo->title = $filename;
        $photo->caption = $validated['caption'];
        $photo->description = $validated['description'];
        $photo->save();

        // move_uploaded_file($request->title, asset('images/'));

        // Storage::put('images/', $file);
        
        return redirect('/photos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
