<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomeSlider;
use Validator;

class HomeSliderController extends Controller
{
	public function index()
    {
        $homesliders = HomeSlider::orderBy('place', 'ASC')->get();
        return view('backend.homeSlider.index', compact('homesliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.homeSlider.create');
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
        //     $rules = [	'title.' . $code    => 'required',
        //     			'content.' . $code    => 'required'
        //     		 ];
        //     $validator = Validator::make($request->all(), $rules);
        //     if( $validator->fails()) {

        //         return back()->withErrors($validator);
        //     }
        // }

        $homeslider = new HomeSlider;

        foreach(config('app.locales') as $code => $locale){
        	$homeslider->translateOrNew($code)->title = $request['title'][$code];
            $homeslider->translateOrNew($code)->content = $request['content'][$code];
        }
        $homeslider->link = $request['link'];
        $homeslider->place = $request['place'];
        $homeslider->save();

        return redirect()->route('homeslider.index')->withMessage(__('backend.articles.added'));
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
        $homeslider = HomeSlider::findOrFail($id);
        return view('backend.homeSlider.edit', compact('homeslider'));
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

        $homeslider = HomeSlider::findOrFail($id);

        foreach (config('app.locales') as $code => $locale) {
            $homeslider->translateOrNew($code)->title = $request['title'][$code];
            $homeslider->translateOrNew($code)->content = $request['content'][$code];
        }
        $homeslider->link = $request['link'];
        $homeslider->place = $request['place'];
        $homeslider->save();

        return redirect()->route('homeslider.index')->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homeslider = HomeSlider::findOrFail($id);
        $homeslider->delete();

        return redirect()->route('homeslider.index')->withMessage(__('backend.articles.deleted'));
    }
}
