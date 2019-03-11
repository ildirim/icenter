<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'DESC')->get();
        return view('backend.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['image' => 'required'];

        $validator = Validator::make($request->all(), $rules);
        if( $validator->fails()) {
            return back()->withErrors($validator);
        }

        if( !empty($request->file('image'))) {
            $path = $request->file('image')->hashName(); 
            $request->file('image')->move('storage/wsa/', $path);
            // Image::make($request->file('image'))->resize(378, 372)->save('storage/wsa/' . $path);
            $gallery = Gallery::create(['image' => $path]);
        }
        return redirect()->route('gallery.index')->withMessage(__('backend.articles.added'));

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
        $gallery = Gallery::findOrFail($id);
        return view('backend.gallery.edit', compact('gallery'));
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
        $gallery = Gallery::findOrFail($id);

        $image = $request->file('image');
        if ($image) {
            $path = $image->hashName();
            if(!empty($gallery->image) && file_exists('storage/wsa/'. $gallery->image)){
                unlink('storage/wsa/'. $gallery->image);
            }
            
            if( !empty($image)) {
                $image->move('storage/wsa/', $path);
                // Image::make($request->file('image'))->resize(378, 372)->save('storage/wsa/' . $path);
                $gallery->image = $path;
            }
        }

        $gallery->save();

        return redirect()->route('gallery.index')->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        if(!empty($gallery->image) && file_exists('storage/wsa/'. $gallery->image)){
            unlink('storage/wsa/'. $gallery->image);
        }
        $gallery->delete();    

        return redirect()->route('gallery.index')->withMessage(__('backend.articles.deleted'));
    }
}
