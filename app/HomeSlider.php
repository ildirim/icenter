<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\HomeSliderTranslation';

    protected $table = 'home_sliders';

    protected $translatedAttributes = [
                                       'home_slider_id',
									   'title',
									   'content',
                                      ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}
