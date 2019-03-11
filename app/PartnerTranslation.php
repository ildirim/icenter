<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerTranslation extends Model
{
    protected $table = 'partner_translations';

    protected $fillable = [
    						'partner_id',
    						'title'
    					  ];

    public $timestamps = null;
}
