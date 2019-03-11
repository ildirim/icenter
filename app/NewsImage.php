<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    protected $table = 'news_images';

    protected $fillable = ['image'];

    public $timestamps = null;

    public function news(){
    	return $this->belongsTo('App\News');
    }
}
