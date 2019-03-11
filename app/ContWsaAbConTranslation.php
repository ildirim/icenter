<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContWsaAbConTranslation extends Model
{
     protected $table = 'cont_wsa_ab_con_translations';

    protected $fillable = [
    					   'cont_wsa_ab_con_id',
    					   'title',
						   'content',
						  ];

    public $timestamps = null;
}
