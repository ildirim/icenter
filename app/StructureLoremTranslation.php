<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StructureLoremTranslation extends Model
{
    protected $table = 'structure_lorem_translations';

    protected $fillable = [
    						'structure_lorem_id',
						    'title1',
						    'title2',
						    'content',
    					  ];

    public $timestamps = null;
}
