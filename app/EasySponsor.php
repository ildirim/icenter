<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EasySponsor extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\EasySponsorTranslation';

    protected $table = 'easy_sponsors';

    protected $translatedAttributes = [
                                       'easy_sponsor_id',
									   'title',
                                      ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}
