<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirectoryLoremTranslation extends Model
{
    protected $table = 'directory_lorem_translations';

    protected $fillable = [
    						'directory_lorem_id',
						    'title1',
						    'title2',
						    'content',
    					  ];

    public $timestamps = null;
}
