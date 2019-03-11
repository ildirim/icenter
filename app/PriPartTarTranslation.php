<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriPartTarTranslation extends Model
{
    protected $table = 'pri_part_tar_translations';

    protected $fillable = [
    					   'pri_part_tar_id',
    					   'title',
						   'content',
						  ];

    public $timestamps = null;
}
