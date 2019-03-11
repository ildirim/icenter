<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MediaProduct;
use App\Training;
use App\Preference;
use Validator;

class MediaProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $mediaproducts = MediaProduct::where('name', $name)->orderBy('id', 'DESC')->get();
        $trainings = Training::where('name', $name)->orderBy('id', 'DESC')->get();
        $preferences = Preference::where('name', $name)->orderBy('id', 'DESC')->get();
        return view('backend.mediaProducts.index', compact('mediaproducts', 'trainings', 'preferences', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($name)
    {
        return view('backend.mediaProducts.create', compact('name'));
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
                // 'imagecontent.' . $code  => 'required',
                      'image'                  => 'required|image',
                      // 'loremtitle1.' . $code    => 'required',
                      // 'loremtitle2.' . $code    => 'required',
                      // 'loremcontent.' . $code  => 'required',
                      // 'videotitle1.' . $code    => 'required',
                      // 'videotitle2.' . $code    => 'required',
                      // 'videocontent.' . $code  => 'required',
                      // 'video'                  => 'required'
                  ];
            $validator = Validator::make($request->all(), $rules);
            if( $validator->fails()) {

                return back()->withErrors($validator);
            }
        }

        $mediaproduct = new MediaProduct;

        if( !empty($request->file('image'))) {
            $path = $request->file('image')->hashName(); 
            $request->file('image')->move('storage/media/', $path);
            // Image::make($request->file('image'))->resize(378, 372)->save('storage/about/' . $path);
            $mediaproduct->image = $path;
        }

        foreach(config('app.locales') as $code => $locale){
            $mediaproduct->translateOrNew($code)->image_content = $request['imagecontent'][$code];
            $mediaproduct->translateOrNew($code)->lorem_title1 = $request['loremtitle1'][$code];
            $mediaproduct->translateOrNew($code)->lorem_title2 = $request['loremtitle2'][$code];
            $mediaproduct->translateOrNew($code)->lorem_content = $request['loremcontent'][$code];
            $mediaproduct->translateOrNew($code)->video_title1 = $request['videotitle1'][$code];
            $mediaproduct->translateOrNew($code)->video_title2 = $request['videotitle2'][$code];
            $mediaproduct->translateOrNew($code)->video_content = $request['videocontent'][$code];
        }
        $mediaproduct->name = $name;
        $mediaproduct->video = $request['video'];

        $mediaproduct->save();

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
        $mediaproduct = MediaProduct::findOrFail($id);
        return view('backend.mediaProducts.edit', compact('mediaproduct'));
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
        //     $rules = ['imagecontent.' . $code  => 'required',
        //               'loremtitle1.' . $code    => 'required',
        //               'loremtitle2.' . $code    => 'required',
        //               'loremcontent.' . $code  => 'required',
        //               'videotitle1.' . $code    => 'required',
        //               'videotitle2.' . $code    => 'required',
        //               'videocontent.' . $code  => 'required',
        //               'video'                  => 'required'];
        //     $validator = Validator::make($request->all(), $rules);
        //     if( $validator->fails()) {

        //         return back()->withErrors($validator);
        //     }
        // }

        $mediaproduct = MediaProduct::findOrFail($id);

        if( !empty($request->file('image'))) {
            $path = $request->file('image')->hashName(); 
            $request->file('image')->move('storage/media/', $path);
            // Image::make($request->file('image'))->resize(378, 372)->save('storage/about/' . $path);
            $mediaproduct->image = $path;
        }

        foreach(config('app.locales') as $code => $locale){
            $mediaproduct->translateOrNew($code)->image_content = $request['imagecontent'][$code];
            $mediaproduct->translateOrNew($code)->lorem_title1 = $request['loremtitle1'][$code];
            $mediaproduct->translateOrNew($code)->lorem_title2 = $request['loremtitle2'][$code];
            $mediaproduct->translateOrNew($code)->lorem_content = $request['loremcontent'][$code];
            $mediaproduct->translateOrNew($code)->video_title1 = $request['videotitle1'][$code];
            $mediaproduct->translateOrNew($code)->video_title2 = $request['videotitle2'][$code];
            $mediaproduct->translateOrNew($code)->video_content = $request['videocontent'][$code];
        }

        $mediaproduct->video = $request['video'];
        $mediaproduct->save();

        return redirect()->route('mediaIndex', ['name' => $mediaproduct->name])->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mediaproduct = MediaProduct::findOrFail($id);
        $name = $mediaproduct->name;
        if(!empty($mediaproduct->image) && file_exists('storage/media/'. $mediaproduct->image)){
            unlink('storage/media/'. $mediaproduct->image);
        }
        if(!empty($mediaproduct->video) && file_exists('storage/media/'. $mediaproduct->video)){
            unlink('storage/media/'. $mediaproduct->video);
        }
        $mediaproduct->delete();    

        return redirect()->route('mediaIndex', ['name' => $name])->withMessage(__('backend.articles.deleted'));
    }
}
