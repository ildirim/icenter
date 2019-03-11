<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreferenceTranslation extends Model
{
    protected $table = 'preference_translations';

    protected $fillable = [
    						'preference_id',
    						'title'
    					  ];

    public $timestamps = null;
}
