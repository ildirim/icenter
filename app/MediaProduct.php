<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaProduct extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\MediaProductTranslation';

    protected $table = 'media_products';

    protected $translatedAttributes = [
    								   'media_product_id',
			    					   'image_content',
                                       'lorem_title1',
                                       'lorem_title2',
                                       'lorem_content',
			    					   'video_title1',
                                       'video_title2',
									   'video_content',
									  ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}