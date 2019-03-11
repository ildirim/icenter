<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CommonLorem;
use Validator;

class CommonInfoLoremController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.commonInfoLorem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $commoninfolorem = new CommonLorem;

        foreach(config('app.locales') as $code => $locale){
        	$commoninfolorem->translateOrNew($code)->title11 = $request['title11'][$code];
        	$commoninfolorem->translateOrNew($code)->title12 = $request['title12'][$code];
            $commoninfolorem->translateOrNew($code)->content1 = $request['content1'][$code];
            $commoninfolorem->translateOrNew($code)->title2 = $request['title2'][$code];
            $commoninfolorem->translateOrNew($code)->content2 = $request['content2'][$code];

            $commoninfolorem->translateOrNew($code)->title3 = $request['title3'][$code];
            $commoninfolorem->translateOrNew($code)->title4 = $request['title4'][$code];
            $commoninfolorem->translateOrNew($code)->content4 = $request['content4'][$code];
        }
        $commoninfolorem->save();

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
        $commoninfolorem = CommonLorem::findOrFail($id);
        return view('backend.commonInfoLorem.edit', compact('commoninfolorem'));
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
        
        $commoninfolorem = CommonLorem::findOrFail($id);

        foreach (config('app.locales') as $code => $locale) {
            $commoninfolorem->translateOrNew($code)->title11 = $request['title11'][$code];
        	$commoninfolorem->translateOrNew($code)->title12 = $request['title12'][$code];
            $commoninfolorem->translateOrNew($code)->content1 = $request['content1'][$code];
            $commoninfolorem->translateOrNew($code)->title2 = $request['title2'][$code];
            $commoninfolorem->translateOrNew($code)->content2 = $request['content2'][$code];

            $commoninfolorem->translateOrNew($code)->title3 = $request['title3'][$code];
            $commoninfolorem->translateOrNew($code)->title4 = $request['title4'][$code];
            $commoninfolorem->translateOrNew($code)->content4 = $request['content4'][$code];
        }
        $commoninfolorem->save();

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
        $commoninfolorem = CommonLorem::findOrFail($id);
        $commoninfolorem->delete();

        return redirect()->route('commoninfo.index')->withMessage(__('backend.articles.deleted'));
    }
}