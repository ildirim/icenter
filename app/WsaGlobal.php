<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WsaGlobal extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\WsaGlobalTranslation';

    protected $table = 'wsa_globals';

    protected $translatedAttributes = [
                                       'wsa_global_id',
									   'title',
                                      ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}
