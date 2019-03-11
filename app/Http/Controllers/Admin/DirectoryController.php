<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Directory;
use App\DirectoryLorem;
use Validator;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directories = Directory::orderBy('id', 'DESC')->get();
        $lorems = DirectoryLorem::orderBy('id', 'DESC')->get();
        return view('backend.directory.index', compact('directories', 'lorems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.directory.create');
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
                      // 'name.' . $code    => 'required',
                      // 'position.' . $code    => 'required',
                      // 'content.' . $code  => 'required',
                      'image'            => 'required'];
            $validator = Validator::make($request->all(), $rules);
            if( $validator->fails()) {

                return back()->withErrors($validator);
            }
        }

        $directory = new Directory;

        if( !empty($request->file('image'))) {
            $path = $request->file('image')->hashName(); 
            $request->file('image')->move('storage/about/', $path);
            // Image::make($request->file('image'))->resize(378, 372)->save('storage/about/' . $path);
        } 

        foreach(config('app.locales') as $code => $locale){
            $directory->translateOrNew($code)->name = $request['name'][$code];
            $directory->translateOrNew($code)->position = $request['position'][$code];
            $directory->translateOrNew($code)->content = $request['content'][$code];
        }
        $directory->image = $path;
        $directory->email = $request['email'];
        $directory->phone = $request['phone'];
        $directory->twitter = $request['twitter'];
        $directory->facebook = $request['facebook'];
        $directory->linkedin = $request['linkedin'];
        $directory->save();

        return redirect()->route('directories.index')->withMessage(__('backend.articles.added'));
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
        $directory = Directory::findOrFail($id);
        return view('backend.directory.edit', compact('directory'));
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
        //     $rules = [
        //               'name.' . $code    => 'required',
        //               'position.' . $code    => 'required',
        //               'content.' . $code  => 'required'];
        //     $validator = Validator::make($request->all(), $rules);
        //     if( $validator->fails()) {

        //         return back()->withErrors($validator);
        //     }
        // }

        $directory = Directory::findOrFail($id);

        $image = $request->file('image');
        if ($image) {
            $path = $image->hashName();
            if(!empty($directory->image) && file_exists('storage/about/'. $directory->image)){
                unlink('storage/about/'. $directory->image);
            }
            
            if( !empty($image)) {
                $image->move('storage/about/', $path);
                // Image::make($request->file('image'))->resize(378, 372)->save('storage/about/' . $path);
            }
            $directory->image = $path;
        }

        foreach (config('app.locales') as $code => $locale) {
            $directory->translateOrNew($code)->name = $request['name'][$code];
            $directory->translateOrNew($code)->position = $request['position'][$code];
            $directory->translateOrNew($code)->content = $request['content'][$code];
        }
        $directory->email = $request['email'];
        $directory->phone = $request['phone'];
        $directory->twitter = $request['twitter'];
        $directory->facebook = $request['facebook'];
        $directory->linkedin = $request['linkedin'];

        $directory->save();

        return redirect()->route('directories.index')->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $directory = Directory::findOrFail($id);
        if(!empty($directory->image) && file_exists('storage/about/'. $directory->image)){
            unlink('storage/about/' . $directory->image);
        }
        $directory->delete();    

        return redirect()->route('directories.index')->withMessage(__('backend.articles.deleted'));
    }
}
