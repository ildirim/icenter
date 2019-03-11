<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\DirectoryTranslation';

    protected $table = 'directories';

    protected $translatedAttributes = [
                                       'directory_id',
									   'name',
									   'position',
									   'content',
                                      ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }

}
