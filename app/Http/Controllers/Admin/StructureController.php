<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Structure;
use App\StructureLorem;
use Validator;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $structures = Structure::orderBy('id', 'DESC')->get();
        $lorems = StructureLorem::all();
        return view('backend.structure.index', compact('structures', 'lorems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.structure.create');
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

        $structures = new Structure;
        if( !empty($request->file('image'))) {
            $path = $request->file('image')->hashName(); 
            $request->file('image')->move('storage/about/', $path);
            // Image::make($request->file('image'))->resize(378, 372)->save('storage/about/' . $path);
        } 

        foreach(config('app.locales') as $code => $locale){
            $structures->translateOrNew($code)->title = $request['title'][$code];
        }
        $structures->image = $path;
        $structures->save();

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
        $structure = Structure::findOrFail($id);
        return view('backend.structure.edit', compact('structure'));
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

        $structure = Structure::findOrFail($id);

        $image = $request->file('image');
        if ($image) {
            $path = $image->hashName();
            if(!empty($structure->image) && file_exists('storage/about/'. $structure->image)){
                unlink('storage/about/'. $structure->image);
            }
            
            if( !empty($image)) {
                $image->move('storage/about/', $path);
                // Image::make($request->file('image'))->resize(378, 372)->save('storage/about/' . $path);
            }
            $structure->image = $path;
        }

        foreach (config('app.locales') as $code => $locale) {
            $structure->translateOrNew($code)->title = $request['title'][$code];
        }
        $structure->save();

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
        $structure = Structure::findOrFail($id);
        if(!empty($structure->image) && file_exists('storage/about/'. $structure->image)){
            unlink('storage/about/' . $structure->image);
        }
        $structure->delete();    

        return redirect()->route('structures.index')->withMessage(__('backend.articles.deleted'));
    }
}
