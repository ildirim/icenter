<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HeadService;
use App\ContentService;
use App\EasySponsor;
use Validator;

class ContentServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $headservices = HeadService::where('name', $name)->orderBy('id', 'DESC')->get();
        $contentservices = ContentService::where('name', $name)->orderBy('id', 'DESC')->get();
        $easysponsors = EasySponsor::orderBy('id', 'DESC')->get();
        return view('backend.contentServices.index', compact('contentservices', 'headservices', 'name', 'easysponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($name)
    {
        return view('backend.contentServices.create', compact('name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $name)
    {
        // foreach(config('app.locales') as $code => $locale){
        //     $rules = ['title.' . $code    => 'required',
        //               'content.' . $code  => 'required',];
        //     $validator = Validator::make($request->all(), $rules);
        //     if( $validator->fails()) {

        //         return back()->withErrors($validator);
        //     }
        // }

        $contentservice = new ContentService;

        foreach(config('app.locales') as $code => $locale){
            $contentservice->translateOrNew($code)->title = $request['title'][$code];
            $contentservice->translateOrNew($code)->content = $request['content'][$code];
        }
        $contentservice->name = $name;

        $contentservice->save();

        return redirect()->route('index', ['name' => $name])->withMessage(__('backend.articles.added'));
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
        $contentservice = ContentService::findOrFail($id);
        return view('backend.contentServices.edit', compact('contentservice'));
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
        //     $rules = ['title.' . $code    => 'required',
        //               'content.' . $code  => 'required'];
        //     $validator = Validator::make($request->all(), $rules);
        //     if( $validator->fails()) {

        //         return back()->withErrors($validator);
        //     }
        // }

        $contentservice = ContentService::findOrFail($id);

        foreach (config('app.locales') as $code => $locale) {
            $contentservice->translate($code)->title = $request['title'][$code];
            $contentservice->translate($code)->content = $request['content'][$code];
        }

        $contentservice->save();

        return redirect()->route('index', ['name' => $contentservice->name])->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contentservice = ContentService::findOrFail($id);
        $name = $contentservice->name;

        $contentservice->delete();    

        return redirect()->route('index', ['name' => $name])->withMessage(__('backend.articles.deleted'));
    }
}
