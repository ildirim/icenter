<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PartnerLorem;
use Validator;

class PartnerLoremController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.partnerLorem.create');
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

        $partnerlorem = new PartnerLorem;

        foreach(config('app.locales') as $code => $locale){
        	$partnerlorem->translateOrNew($code)->title1 = $request['title1'][$code];
        	$partnerlorem->translateOrNew($code)->title2 = $request['title2'][$code];
            $partnerlorem->translateOrNew($code)->content = $request['content'][$code];
        }
        $partnerlorem->save();

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
        $partnerlorem = PartnerLorem::findOrFail($id);
        return view('backend.partnerLorem.edit', compact('partnerlorem'));
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

        $partnerlorem = partnerLorem::findOrFail($id);

        foreach (config('app.locales') as $code => $locale) {
            $partnerlorem->translateOrNew($code)->title1 = $request['title1'][$code];
            $partnerlorem->translateOrNew($code)->title2 = $request['title2'][$code];
            $partnerlorem->translateOrNew($code)->content = $request['content'][$code];
        }
        $partnerlorem->save();

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
        $partnerlorem = PartnerLorem::findOrFail($id);
        $partnerlorem->delete();

        return redirect()->route('partners.index')->withMessage(__('backend.articles.deleted'));
    }
}