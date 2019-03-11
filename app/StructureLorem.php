<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StructureLorem extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\StructureLoremTranslation';

    protected $table = 'structure_lorems';

    protected $translatedAttributes = [
                                       'structure_lorem_id',
									   'title1',
									   'title2',
									   'content',
                                      ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}
