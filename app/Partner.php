<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\PartnerTranslation';

    protected $table = 'partners';

    protected $translatedAttributes = [
                                       'partner_id',
									   'title',
                                      ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}
