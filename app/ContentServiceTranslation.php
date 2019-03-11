<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentServiceTranslation extends Model
{
    protected $table = 'content_service_translations';

    protected $fillable = [
    					   'content_service_id',
    					   'title',
						   'content',
						  ];

    public $timestamps = null;
}
