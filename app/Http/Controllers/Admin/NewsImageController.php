<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\NewsImage;
use Validator;

class NewsImageController extends Controller
{
    public function edit($id)
    {
        return view('backend.newsimage.create');
    }
    public function update(Request $request, $id){
        $rules = ['images' => 'required'];
        $validator = Validator::make($request->all(),  $rules);

        if( $validator->fails()) {

            return back()->withErrors($validator);
        }
        $photos = array();
        $image = $request->file('images');
        if( !empty($image)) {

            foreach($image as $photo) {
                $path = $photo->hashName();
                $photo->move('storage/news/', $path);
                array_push($photos, $path);
            }
            foreach($photos as $photo){

                $newsImage = new NewsImage([
                'image' => $photo,]);
                News::find($id)->images()->save($newsImage);
            
            }
        }
            
        return redirect()->route('news.index')->withMessage(__('backend.image.added'));

    }
}
