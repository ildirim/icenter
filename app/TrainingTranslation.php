<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingTranslation extends Model
{
    protected $table = 'training_translations';

    protected $fillable = [
                           'training_id',
						   'title',
						   'content'
                          ];

    public $timestamps = null;
}
