<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EasySponsor;
use Validator;

class EasySponsorController extends Controller
{
    public function create()
    {
        return view('backend.easySponsors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach(config('app.locales') as $code => $locale){
            $rules = [
                // 'title.' . $code    => 'required',
                      'image'            => 'required'];
            $validator = Validator::make($request->all(), $rules);
            if( $validator->fails()) {

                return back()->withErrors($validator);
            }
        }

        $easysponsor = new EasySponsor;
        if( !empty($request->file('image'))) {
            $path = $request->file('image')->hashName(); 
            $request->file('image')->move('storage/services/', $path);
            // Image::make($request->file('image'))->resize(378, 372)->save('storage/services/' . $path);
        }

        foreach(config('app.locales') as $code => $locale){
            $easysponsor->translateOrNew($code)->title = $request['title'][$code];
        }
        $easysponsor->image = $path;
        $easysponsor->save();

        return redirect()->route('index', ['name' => 'asan'])->withMessage(__('backend.articles.added'));
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
        $easysponsor = EasySponsor::findOrFail($id);
        return view('backend.easySponsors.edit', compact('easysponsor'));
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
        // foreach(config('app.locales') as $code => $locale){
        //     $rules = ['title.' . $code    => 'required'];
        //     $validator = Validator::make($request->all(), $rules);
        //     if( $validator->fails()) {

        //         return back()->withErrors($validator);
        //     }
        // }

        $easysponsor = EasySponsor::findOrFail($id);

        $image = $request->file('image');
        if ($image) {
            $path = $image->hashName();
            if(!empty($easysponsor->image) && file_exists('storage/services/'. $easysponsor->image)){
                unlink('storage/services/'. $easysponsor->image);
            }
            
            if( !empty($image)) {
                $image->move('storage/services/', $path);
                // Image::make($request->file('image'))->resize(378, 372)->save('storage/services/' . $path);
            }
            $easysponsor->image = $path;
        }

        foreach (config('app.locales') as $code => $locale) {
            $easysponsor->translateOrNew($code)->title = $request['title'][$code];
        }
        $easysponsor->save();

        return redirect()->route('index', ['name' => 'asan'])->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $easysponsor = EasySponsor::findOrFail($id);
        if(!empty($easysponsor->image) && file_exists('storage/services/'. $easysponsor->image)){
            unlink('storage/services/' . $easysponsor->image);
        }
        $easysponsor->delete();    

        return redirect()->route('index', ['name' => 'asan'])->withMessage(__('backend.articles.deleted'));
    }
}
