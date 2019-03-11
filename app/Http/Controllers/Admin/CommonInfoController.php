<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CommonInfo;
use App\CommonLorem;
use Validator;

class CommonInfoController extends Controller
{
    public function index()
    {
        $commoninfos = CommonInfo::orderBy('id', 'DESC')->get();
        $lorems = CommonLorem::orderBy('id', 'DESC')->get();
        return view('backend.commoninfo.index', compact('commoninfos', 'lorems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.commoninfo.create');
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
                // 'content.' . $code  => 'required',
                      'image'             => 'required'];
            $validator = Validator::make($request->all(), $rules);
            if( $validator->fails()) {

                return back()->withErrors($validator);
            }
        }

        $commoninfos = new CommonInfo;
        if( !empty($request->file('image'))) {
            $path = $request->file('image')->hashName(); 
            $request->file('image')->move('storage/common/', $path);
            // Image::make($request->file('image'))->resize(378, 372)->save('storage/common/' . $path);
        }

        foreach(config('app.locales') as $code => $locale){
            $commoninfos->translateOrNew($code)->title1 = $request['title1'][$code];
            $commoninfos->translateOrNew($code)->title2 = $request['title2'][$code];
            $commoninfos->translateOrNew($code)->content = $request['content'][$code];
        }
        $commoninfos->image = $path;
        $commoninfos->save();

        return redirect()->route('commoninfo.index')->withMessage(__('backend.articles.added'));
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
        $commoninfo = CommonInfo::findOrFail($id);
        return view('backend.commoninfo.edit', compact('commoninfo'));
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

        $commoninfo = CommonInfo::findOrFail($id);

        $image = $request->file('image');
        if ($image) {
            $path = $image->hashName();
            if(!empty($partner->image) && file_exists('storage/common/'. $partner->image)){
                unlink('storage/common/'. $partner->image);
            }
            
            if( !empty($image)) {
                $image->move('storage/common/', $path);
                // Image::make($request->file('image'))->resize(378, 372)->save('storage/common/' . $path);
            }
            $commoninfo->image = $path;
        }

        foreach (config('app.locales') as $code => $locale) {
            $commoninfo->translateOrNew($code)->title1 = $request['title1'][$code];
            $commoninfo->translateOrNew($code)->title2 = $request['title2'][$code];
            $commoninfo->translateOrNew($code)->content = $request['content'][$code];
        }
        $commoninfo->save();

        return redirect()->route('commoninfo.index')->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commoninfo = CommonInfo::findOrFail($id);
        if(!empty($commoninfo->image) && file_exists('storage/common/'. $commoninfo->image)){
            unlink('storage/common/' . $commoninfo->image);
        }
        $commoninfo->delete();    

        return redirect()->route('commoninfo.index')->withMessage(__('backend.articles.deleted'));
    }
}
