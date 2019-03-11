<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContWsaAbCon extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\ContWsaAbConTranslation';

    protected $table = 'cont_wsa_ab_con';

    protected $translatedAttributes = [
			    					   'cont_wsa_ab_con_id',
                                       'title',
									   'content',
									  ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}
