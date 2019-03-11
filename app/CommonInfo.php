<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommonInfo extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\CommonInfoTranslation';

    protected $table = 'common_infos';

    protected $translatedAttributes = [
                                       'common_info_id',
									   'title1',
                                       'title2',
									   'content'
                                      ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}
