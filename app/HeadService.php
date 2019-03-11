<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeadService extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\HeadServiceTranslation';

    protected $table = 'head_services';

    protected $translatedAttributes = [
    								   'head_service_id',
			    					   'title1',
                                       'title2',
									   'content',
									  ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }

}
