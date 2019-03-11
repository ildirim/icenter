<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PriPartTar;
use App\WsaGlobal;
use Validator;

class PriPartTarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $wsaglobals = WsaGlobal::orderBy('id', 'DESC')->get();
        $priparttars = PriPartTar::where('name', $name)->orderBy('id', 'DESC')->get();
        return view('backend.priparttar.index', compact('wsaglobals', 'priparttars', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($name)
    {
        return view('backend.priparttar.create', compact('name'));
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
            if($name!='rule'){
                $rules = [
                    // 'title.' . $code    => 'required',
                    //       'content.' . $code  => 'required',
                          'image'             => 'required'];
            }
            else{
                $rules = [
                    // 'title.' . $code    => 'required',
                    //       'content.' . $code  => 'required'
                      ];
            }
            $validator = Validator::make($request->all(), $rules);
            if( $validator->fails()) {

                return back()->withErrors($validator);
            }
        }

        $priparttar = new PriPartTar;

        if( !empty($request->file('image'))) {
            $path = $request->file('image')->hashName(); 
            $request->file('image')->move('storage/wsa/', $path);
            // Image::make($request->file('image'))->resize(378, 372)->save('storage/wsa/' . $path);
            $priparttar->image = $path;
        } 
        foreach(config('app.locales') as $code => $locale){
            $priparttar->translateOrNew($code)->title = $request['title'][$code];
            $priparttar->translateOrNew($code)->content = $request['content'][$code];
        }
        $priparttar->name = $name;
        
        $priparttar->save();


        return redirect()->route('priPartTarIndex', ['name' => $name])->withMessage(__('backend.articles.added'));

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
        $priparttar = PriPartTar::findOrFail($id);
        return view('backend.priparttar.edit', compact('priparttar'));
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

        $priparttar = PriPartTar::findOrFail($id);

        $image = $request->file('image');
        if ($image) {
            $path = $image->hashName();
            if(!empty($priparttar->image) && file_exists('storage/wsa/'. $priparttar->image)){
                unlink('storage/wsa/'. $priparttar->image);
            }
            
            if( !empty($image)) {
                $image->move('storage/wsa/', $path);
                // Image::make($request->file('image'))->resize(378, 372)->save('storage/wsa/' . $path);
                $priparttar->image = $path;
            }
        }

        foreach (config('app.locales') as $code => $locale) {
            $priparttar->translate($code)->title = $request['title'][$code];
            $priparttar->translate($code)->content = $request['content'][$code];
        }

          
        $priparttar->save();

        return redirect()->route('priPartTarIndex', ['name' => $priparttar->name])->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $priparttar = PriPartTar::findOrFail($id);
        $name = $priparttar->name;
        if(!empty($priparttar->image) && file_exists('storage/wsa/'. $priparttar->image)){
            unlink('storage/wsa/'. $priparttar->image);
        }
        $priparttar->delete();    

        return redirect()->route('priPartTarIndex', ['name' => $name])->withMessage(__('backend.articles.deleted'));
    }
}
