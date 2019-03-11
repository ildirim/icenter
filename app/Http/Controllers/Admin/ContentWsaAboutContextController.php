<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HeadWsaAbCon;
use App\ContWsaAbCon;
use Validator;

class ContentWsaAboutContextController extends Controller
{
    public function index($name)
    {
        $headwsas = HeadWsaAbCon::where('name', $name)->orderBy('id', 'DESC')->get();
        $contentwsas = ContWsaAbCon::where('name', $name)->orderBy('id', 'DESC')->get();
        return view('backend.contentWsaAboutContext.index', compact('headwsas', 'contentwsas', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($name)
    {
        return view('backend.contentWsaAboutContext.create', compact('name'));
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

        $contentwsa = new ContWsaAbCon;

        foreach(config('app.locales') as $code => $locale){
            $contentwsa->translateOrNew($code)->title = $request['title'][$code];
            $contentwsa->translateOrNew($code)->content = $request['content'][$code];
        }
        $contentwsa->name = $name;

        $contentwsa->save();
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
        $contentwsa = ContWsaAbCon::findOrFail($id);
        return view('backend.contentWsaAboutContext.edit', compact('contentwsa'));
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

        $contentwsa = ContWsaAbCon::findOrFail($id);

        foreach (config('app.locales') as $code => $locale) {
            $contentwsa->translate($code)->title = $request['title'][$code];
            $contentwsa->translate($code)->content = $request['content'][$code];
        }

        $contentwsa->save();

        return redirect()->route('contentAboutContextIndex', ['name' => $contentwsa->name])->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contentwsa = ContWsaAbCon::findOrFail($id);
        $name = $contentwsa->name;

        $contentwsa->delete();    

        return redirect()->route('contentAboutContextIndex', ['name' => $name])->withMessage(__('backend.articles.deleted'));
    }
}
