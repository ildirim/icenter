<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirectoryLorem extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\DirectoryLoremTranslation';

    protected $table = 'directory_lorems';

    protected $translatedAttributes = [
                                       'directory_lorem_id',
									   'title1',
									   'title2',
									   'content',
                                      ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}