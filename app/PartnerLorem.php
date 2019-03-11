<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerLorem extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\PartnerLoremTranslation';

    protected $table = 'partner_lorems';

    protected $translatedAttributes = [
                                       'partner_lorem_id',
									   'title1',
									   'title2',
									   'content',
                                      ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}