<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Partner;
use App\PartnerLorem;
use Validator;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::orderBy('id', 'DESC')->get();
        $lorems = PartnerLorem::all();
        return view('backend.partner.index', compact('partners', 'lorems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.partner.create');
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

        $partners = new Partner;
        if( !empty($request->file('image'))) {
            $path = $request->file('image')->hashName(); 
            $request->file('image')->move('storage/about/', $path);
            // Image::make($request->file('image'))->resize(378, 372)->save('storage/about/' . $path);
        }

        foreach(config('app.locales') as $code => $locale){
            $partners->translateOrNew($code)->title = $request['title'][$code];
        }
        $partners->image = $path;
        $partners->save();

        return redirect()->route('partners.index')->withMessage(__('backend.articles.added'));
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
        $partner = Partner::findOrFail($id);
        return view('backend.partner.edit', compact('partner'));
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

        $partner = Partner::findOrFail($id);

        $image = $request->file('image');
        if ($image) {
            $path = $image->hashName();
            if(!empty($partner->image) && file_exists('storage/about/'. $partner->image)){
                unlink('storage/about/'. $partner->image);
            }
            
            if( !empty($image)) {
                $image->move('storage/about/', $path);
                // Image::make($request->file('image'))->resize(378, 372)->save('storage/about/' . $path);
            }
            $partner->image = $path;
        }

        foreach (config('app.locales') as $code => $locale) {
            $partner->translateOrNew($code)->title = $request['title'][$code];
        }
        $partner->save();

        return redirect()->route('partners.index')->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        if(!empty($partner->image) && file_exists('storage/about/'. $partner->image)){
            unlink('storage/about/' . $partner->image);
        }
        $partner->delete();    

        return redirect()->route('partners.index')->withMessage(__('backend.articles.deleted'));
    }
}
