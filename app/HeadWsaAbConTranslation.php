<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeadWsaAbConTranslation extends Model
{
    protected $table = 'head_wsa_ab_con_translations';

    protected $fillable = [
						   'head_wsa_ab_con_id',
						   'content',
						  ];

    public $timestamps = null;
}