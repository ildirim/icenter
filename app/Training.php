<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\TrainingTranslation';

    protected $table = 'trainings';

    protected $translatedAttributes = [
                                       'training_id',
									   'title',
									   'content'
                                      ];


    public function __construct(array $attributes = []) {

    	 parent::__construct($attributes);

    	 $this->defaultLocale = 'az';
         
    }
}
