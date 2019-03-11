<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\PreferenceTranslation';

    protected $table = 'preferences';

    protected $translatedAttributes = [
                                       'preference_id',
									   'title',
                                      ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}
