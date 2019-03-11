<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DirectoryLorem;
use Validator;

class DirectoryLoremController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.directoryLorem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // foreach(config('app.locales') as $code => $locale){
        //     $rules = ['content.' . $code    => 'required'];
        //     $validator = Validator::make($request->all(), $rules);
        //     if( $validator->fails()) {

        //         return back()->withErrors($validator);
        //     }
        // }

        $directorylorem = new DirectoryLorem;

        foreach(config('app.locales') as $code => $locale){
        	$directorylorem->translateOrNew($code)->title1 = $request['title1'][$code];
        	$directorylorem->translateOrNew($code)->title2 = $request['title2'][$code];
            $directorylorem->translateOrNew($code)->content = $request['content'][$code];
        }
        $directorylorem->save();

        return redirect()->route('directories.index')->withMessage(__('backend.articles.added'));
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
        $directorylorem = DirectoryLorem::findOrFail($id);
        return view('backend.directoryLorem.edit', compact('directorylorem'));
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
        //     $rules = ['content.' . $code    => 'required'];
        //     $validator = Validator::make($request->all(), $rules);
        //     if( $validator->fails()) {

        //         return back()->withErrors($validator);
        //     }
        // }

        $directorylorem = DirectoryLorem::findOrFail($id);

        foreach (config('app.locales') as $code => $locale) {
            $directorylorem->translateOrNew($code)->title1 = $request['title1'][$code];
            $directorylorem->translateOrNew($code)->title2 = $request['title2'][$code];
            $directorylorem->translateOrNew($code)->content = $request['content'][$code];
        }
        $directorylorem->save();

        return redirect()->route('directories.index')->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $directorylorem = DirectoryLorem::findOrFail($id);
        $directorylorem->delete();

        return redirect()->route('directories.index')->withMessage(__('backend.articles.deleted'));
    }
}