<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommonLoremTranslation extends Model
{
    
    protected $table = 'common_lorem_translations';

    protected $fillable = [
    						'common_lorem_id',
						    'title11',
						    'title12',
						    'content1',
						    'title2',
						    'content2',
						    'title3',
						    'title4',
						    'content4',
    					  ];

    public $timestamps = null;
    
}
