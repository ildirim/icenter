<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StructureLorem;
use Validator;

class StructureLoremController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.structureLorem.create');
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

        $structurelorem = new StructureLorem;

        foreach(config('app.locales') as $code => $locale){
        	$structurelorem->translateOrNew($code)->title1 = $request['title1'][$code];
        	$structurelorem->translateOrNew($code)->title2 = $request['title2'][$code];
            $structurelorem->translateOrNew($code)->content = $request['content'][$code];
        }
        $structurelorem->save();

        return redirect()->route('structures.index')->withMessage(__('backend.articles.added'));
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
        $structurelorem = StructureLorem::findOrFail($id);
        return view('backend.structureLorem.edit', compact('structurelorem'));
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

        $structurelorem = StructureLorem::findOrFail($id);

        foreach (config('app.locales') as $code => $locale) {
            $structurelorem->translateOrNew($code)->title1 = $request['title1'][$code];
            $structurelorem->translateOrNew($code)->title2 = $request['title2'][$code];
            $structurelorem->translateOrNew($code)->content = $request['content'][$code];
        }
        $structurelorem->save();

        return redirect()->route('structures.index')->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $structurelorem = StructureLorem::findOrFail($id);
        $structurelorem->delete();

        return redirect()->route('structures.index')->withMessage(__('backend.articles.deleted'));
    }
}