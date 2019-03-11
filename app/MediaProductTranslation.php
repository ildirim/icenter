<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaProductTranslation extends Model
{
    protected $table = 'media_product_translations';

    protected $fillable = [
    					   'media_product_id',
    					   'image_content',
    					   'lorem_title1',
                           'lorem_title2',
						   'lorem_content',
    					   'video_title1',
                           'video_title2',
						   'video_content',
						  ];

    public $timestamps = null;
}
