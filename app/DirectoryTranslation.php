<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirectoryTranslation extends Model
{
    protected $table = 'directory_translations';

    protected $fillable = [
    					   'name',
						   'position',
						   'content',
						  ];

    public $timestamps = null;
}
