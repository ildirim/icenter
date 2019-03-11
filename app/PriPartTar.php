<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriPartTar extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\PriPartTarTranslation';

    protected $table = 'pri_part_tars';

    protected $translatedAttributes = [
    								   'pri_part_tar_id',
    								   'title',
									   'content',
									  ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}
