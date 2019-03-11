<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommonLorem extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\CommonLoremTranslation';

    protected $table = 'common_lorems';

    protected $translatedAttributes = [
                                       'common_lorem_id',
									   'title11',
									   'title12',
									   'content1',
									   'title2',
									   'content2',
									   'title3',
									   'title4',
									   'content4',
                                      ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}
