<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\StructureTranslation';

    protected $table = 'structures';

    protected $translatedAttributes = [
                                       'structure_id',
									   'title',
                                      ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}
