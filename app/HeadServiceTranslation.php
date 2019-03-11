<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeadServiceTranslation extends Model
{
    protected $table = 'head_service_translations';

    protected $fillable = [
    					   'head_service_id',
    					   'title1',
    					   'title2',
						   'content',
						  ];

    public $timestamps = null;
}
