<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WsaGlobalTranslation extends Model
{
    protected $table = 'wsa_global_translations';

    protected $fillable = [
    					   'wsa_global_id',
    					   'title',
						  ];

    public $timestamps = null;
}
