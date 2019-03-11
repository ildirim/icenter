<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerLoremTranslation extends Model
{
    protected $table = 'partner_lorem_translations';

    protected $fillable = [
    						'partner_lorem_id',
						    'title1',
						    'title2',
						    'content',
    					  ];

    public $timestamps = null;
}
