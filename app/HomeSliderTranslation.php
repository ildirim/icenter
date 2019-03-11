<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSliderTranslation extends Model
{
    protected $table = 'home_slider_translations';

    protected $fillable = [
    						'home_slider_id',
						    'title',
						    'content',
    					  ];

    public $timestamps = null;
}
