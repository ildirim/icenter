<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EasySponsorTranslation extends Model
{
    protected $table = 'easy_sponsor_translations';

    protected $fillable = [
    						'easy_sponsor_id',
    						'title'
    					  ];

    public $timestamps = null;
}
