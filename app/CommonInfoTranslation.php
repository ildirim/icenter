<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommonInfoTranslation extends Model
{
    protected $table = 'common_info_translations';

    protected $fillable = [
    						'common_info_id',
    						'title1',
    						'title2',
    						'content'
    					  ];

    public $timestamps = null;
}
