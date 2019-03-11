<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Preference;
use Validator;

class PreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preferences = Preference::orderBy('id', 'DESC')->get();
        return view('backend.preference.index', compact('preferences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($name)
    {
        return view('backend.preference.create', compact('name'));
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
        //     $rules = ['title.' . $code    => 'required'];
        //     $validator = Validator::make($request->all(), $rules);
        //     if( $validator->fails()) {

        //         return back()->withErrors($validator);
        //     }
        // }

        $preference = new Preference;
        foreach(config('app.locales') as $code => $locale){
            $preference->translateOrNew($code)->title = $request['title'][$code];
        }
        $preference->name = $name;
        $preference->save();

        return redirect()->route('mediaIndex', ['name' => $name])->withMessage(__('backend.articles.added'));
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
        $preference = Preference::findOrFail($id);
        return view('backend.preference.edit', compact('preference'));
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

        $preference = Preference::findOrFail($id);

        foreach (config('app.locales') as $code => $locale) {
            $preference->translateOrNew($code)->title = $request['title'][$code];
        }
        $preference->save();

        return redirect()->route('mediaIndex', ['name' => $preference->name])->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preference = Preference::findOrFail($id);
        $name = $preference->name;
        $preference->delete();    

        return redirect()->route('mediaIndex', ['name' => $name])->withMessage(__('backend.articles.deleted'));
    }
}
