<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HeadWsaAbCon;
use Validator;

class HeadWsaAboutContextController extends Controller
{
    public function create($name)
    {
        return view('backend.headWsaAboutContext.create', compact('name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $name)
    {
        foreach(config('app.locales') as $code => $locale){
            $rules = [
                // 'content.' . $code  => 'required',
                      'image'             => 'required'];
            $validator = Validator::make($request->all(), $rules);
            if( $validator->fails()) {

                return back()->withErrors($validator);
            }
        }

        $headwsa = new HeadWsaAbCon;

        if( !empty($request->file('image'))) {
            $path = $request->file('image')->hashName(); 
            $request->file('image')->move('storage/wsa/', $path);
            // Image::make($request->file('image'))->resize(378, 372)->save('storage/wsa/' . $path);
            $headwsa->image = $path;
        } 
        foreach(config('app.locales') as $code => $locale){
            $headwsa->translateOrNew($code)->content = $request['content'][$code];
        }
        $headwsa->name = $name;
        
        $headwsa->save();


        return redirect()->route('contentAboutContextIndex', ['name' => $name])->withMessage(__('backend.articles.added'));

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
        $headwsa = HeadWsaAbCon::findOrFail($id);
        return view('backend.headWsaAboutContext.edit', compact('headwsa'));
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
        //     $rules = ['content.' . $code  => 'required'];
        //     $validator = Validator::make($request->all(), $rules);
        //     if( $validator->fails()) {

        //         return back()->withErrors($validator);
        //     }
        // }

        $headwsa = HeadWsaAbCon::findOrFail($id);

        $image = $request->file('image');
        if ($image) {
            $path = $image->hashName();
            if(!empty($headwsa->image) && file_exists('storage/wsa/'. $headwsa->image)){
                unlink('storage/wsa/'. $headwsa->image);
            }
            
            if( !empty($image)) {
                $image->move('storage/wsa/', $path);
                // Image::make($request->file('image'))->resize(378, 372)->save('storage/wsa/' . $path);
                $headwsa->image = $path;
            }
        }

        foreach (config('app.locales') as $code => $locale) {
            if($request->file('image')){
            }
            $headwsa->translate($code)->content = $request['content'][$code];
        }

          
        $headwsa->save();

        return redirect()->route('contentAboutContextIndex', ['name' => $headwsa->name])->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $headservice = HeadWsaAbCon::findOrFail($id);
        $name = $headservice->name;
        if(!empty($headservice->image) && file_exists('storage/wsa/'. $headservice->image)){
            unlink('storage/wsa/'. $headservice->image);
        }
        $headservice->delete();    

        return redirect()->route('contentAboutContextIndex', ['name' => $name])->withMessage(__('backend.articles.deleted'));
    }
}
