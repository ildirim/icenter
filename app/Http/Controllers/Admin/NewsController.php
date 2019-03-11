<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\NewsImage;
use Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id', 'DESC')->paginate(10);
        $images = NewsImage::all();
        return view('backend.news.index', compact('news', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news.create');
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
                // 'title.' . $code    => 'required',
                //       'content.' . $code  => 'required',
                      'images'            => 'required'];
            $validator = Validator::make($request->all(), $rules);
            if( $validator->fails()) {

                return back()->withErrors($validator);
            }
        }

        $news = new News;

        foreach(config('app.locales') as $code => $locale){
            $news->translateOrNew($code)->title = $request['title'][$code];
            $news->translateOrNew($code)->content = $request['content'][$code];
        }
        $news->save();

        $photos = array();
        $images = $request->file('images');
        if( !empty($images)) {
            foreach($images as $image) {
                $path = $image->hashName();
                $image->move('storage/news/', $path);
                array_push($photos, $path);

            }
            foreach($photos as $photo){
                $newsImage = new NewsImage([
                'image' => $photo,]);
                News::find($news->id)->images()->save($newsImage);
            }
        }

        return redirect()->route('news.index')->withMessage(__('backend.articles.added'));
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
        $news = News::findOrFail($id);
        $images = NewsImage::where('news_id', $id)->get();
        return view('backend.news.edit', compact('news', 'images'));
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
        //               'content.' . $code  => 'required',];
        //     $validator = Validator::make($request->all(), $rules);
        //     if( $validator->fails()) {

        //         return back()->withErrors($validator);
        //     }
        // }

        $news = News::findOrFail($id);
        $images = NewsImage::where('news_id', $id)->get();

        foreach ($images as $image) {
            if ($request->file($image->id)) {
                if(!empty($image->image) && file_exists('storage/news/'. $image->image)){
                    unlink('storage/news/' . $image->image);
                }
                $image2 = $request->file($image->id);
                $path = $image2->hashName();
                if( !empty($image2)) {
                    $image2->move('storage/news/', $path);
                }
                $image->image = $path;
                $image->save();
                $news->image = $path;
            }    
        }

        foreach (config('app.locales') as $code => $locale) {
            $news->translate($code)->title = $request->get('title')[$code];
            $news->translate($code)->content = $request->get('content')[$code];
        }

          
        $news->save();

        return redirect()->route('news.index')->withMessage(__('backend.articles.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::where('id', $id)->first();
        $images = NewsImage::where('news_id', $news->id)->get();
        foreach($images as $image){
            if(!empty($image->image) && file_exists('storage/news/'. $image->image)){
                unlink('storage/news/' . $image->image);
            }
        }
        $news->delete();    

        return redirect()->route('news.index')->withMessage(__('backend.articles.deleted'));
    }

    public function removeImage($id){
        $image = NewsImage::findOrFail($id);
        if(!empty($image->image) && file_exists('storage/news/'. $image->image)){
            unlink('storage/news/' . $image->image);
        }
        $image->delete();
        return back()->withMessage(__('backend.image.deleted'));
    }
}
