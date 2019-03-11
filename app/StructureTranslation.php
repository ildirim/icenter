<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StructureTranslation extends Model
{
    protected $table = 'structure_translations';

    protected $fillable = [
    						'structure_id',
    						'title'
    					  ];

    public $timestamps = null;
}
