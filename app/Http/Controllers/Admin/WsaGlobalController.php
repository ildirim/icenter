<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WsaGlobal;
use Validator;

class WsaGlobalController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.wsaglobal.create');
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

        $wsaglobal = new WsaGlobal;

        if( !empty($request->file('image'))) {
            $path = $request->file('image')->hashName(); 
            $request->file('image')->move('storage/wsa/', $path);
            // Image::make($request->file('image'))->resize(378, 372)->save('storage/wsa/' . $path);
            $wsaglobal->image = $path;
        }
        foreach(config('app.locales') as $code => $locale){
            $wsaglobal->translateOrNew($code)->title = $request['title'][$code];
        }
        $wsaglobal->save();

        return redirect()->route('priPartTarIndex', ['name' => 'global'])->withMessage(__('backend.articles.added'));

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
        $wsaglobal = WsaGlobal::findOrFail($id);
        return view('backend.wsaglobal.edit', compact('wsaglobal'));
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
        $wsaglobal = WsaGlobal::findOrFail($id);

        $image = $request->file('image');
        if ($image) {
            $path = $image->hashName();
            if(!empty($wsaglobal->image) && file_exists('storage/wsa/'. $wsaglobal->image)){
                unlink('storage/wsa/'. $wsaglobal->image);
            }
            
            if( !empty($image)) {
                $image->move('storage/wsa/', $path);
                // Image::make($request->file('image'))->resize(378, 372)->save('storage/wsa/' . $path);
                $wsaglobal->image = $path;
            }
        }

        foreach(config('app.locales') as $code => $locale){
            $wsaglobal->translateOrNew($code)->title = $request['title'][$code];
        }

        $wsaglobal->save();

        return redirect()->route('priPartTarIndex', ['name' => 'global'])->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wsaglobal = WsaGlobal::findOrFail($id);
        if(!empty($wsaglobal->image) && file_exists('storage/wsa/'. $wsaglobal->image)){
            unlink('storage/wsa/'. $wsaglobal->image);
        }
        $wsaglobal->delete();    

        return redirect()->route('priPartTarIndex', ['name' => 'global'])->withMessage(__('backend.articles.deleted'));
    }
}
