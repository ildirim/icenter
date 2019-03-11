<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HeadService;
use Validator;

class HeadServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $headservices = HeadService::all();
        // return view('backend.headServices.index', compact('headservices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($name)
    {
        return view('backend.headServices.create', compact('name'));
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

        $headservice = new HeadService;

        if( !empty($request->file('image'))) {
            $path = $request->file('image')->hashName(); 
            $request->file('image')->move('storage/services/', $path);
            // Image::make($request->file('image'))->resize(378, 372)->save('storage/services/' . $path);
            $headservice->image = $path;
        } 
        foreach(config('app.locales') as $code => $locale){
            $headservice->translateOrNew($code)->title1 = $request['title1'][$code];
            $headservice->translateOrNew($code)->title2 = $request['title2'][$code];
            $headservice->translateOrNew($code)->content = $request['content'][$code];
        }
        $headservice->name = $name;
        
        $headservice->save();


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
        $headservice = HeadService::findOrFail($id);
        return view('backend.headServices.edit', compact('headservice'));
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

        $headservice = HeadService::findOrFail($id);

        $image = $request->file('image');
        if ($image) {
            $path = $image->hashName();
            if(!empty($headservice->image) && file_exists('storage/services/'. $headservice->image)){
                unlink('storage/services/'. $headservice->image);
            }
            
            if( !empty($image)) {
                $image->move('storage/services/', $path);
                // Image::make($request->file('image'))->resize(378, 372)->save('storage/services/' . $path);
                $headservice->image = $path;
            }
        }

        foreach (config('app.locales') as $code => $locale) {
            $headservice->translateOrNew($code)->title1 = $request['title1'][$code];
            $headservice->translateOrNew($code)->title2 = $request['title2'][$code];
            $headservice->translate($code)->content = $request['content'][$code];
        }

          
        $headservice->save();

        return redirect()->route('index', ['name' => $headservice->name])->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $headservice = HeadService::findOrFail($id);
        $name = $headservice->name;
        if(!empty($headservice->image) && file_exists('storage/services/'. $headservice->image)){
            unlink('storage/services/'. $headservice->image);
        }
        $headservice->delete();    

        return redirect()->route('index', ['name' => $name])->withMessage(__('backend.articles.deleted'));
    }
}
