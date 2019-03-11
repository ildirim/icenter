<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeadWsaAbCon extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\HeadWsaAbConTranslation';

    protected $table = 'head_wsa_ab_con';

    protected $translatedAttributes = [
    								   'head_wsa_ab_con_id',
									   'content',
									  ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}
