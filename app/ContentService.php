<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentService extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\ContentServiceTranslation';

    protected $table = 'content_services';

    protected $translatedAttributes = [
    								   'content_service_id',
			    					   'title',
									   'content',
									  ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}
