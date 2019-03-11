<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\NewsTranslation';

    protected $table = 'news';

    protected $translatedAttributes = [
                                       'news_id',
									   'title',
									   'content',
                                      ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }

    public function images(){
    	return $this->hasMany('App\NewsImage', 'news_id');
    }

}
