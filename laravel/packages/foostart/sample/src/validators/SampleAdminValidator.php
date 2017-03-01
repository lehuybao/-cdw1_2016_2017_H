<?php
namespace Foostart\Sample\Validators;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;

use Illuminate\Support\MessageBag as MessageBag;

class SampleAdminValidator extends AbstractValidator
{
    protected static $rules = array(
        'sample_name' => 'required',
    );

    protected static $messages = [];


    public function __construct()
    {
        Event::listen('validating', function($input)
        {
        });
        $this->messages();
    }

    public function validate($input) {

        $flag = parent::validate($input);

        $this->errors = $this->errors?$this->errors:new MessageBag();

        $flag = $this->isValidTitle($input)?$flag:FALSE;
        return $flag;
    }


    public function messages() {
        self::$messages = [
            'required' => ':attribute '.trans('sample::sample_admin.required')
        ];
    }

    public function isValidTitle($input) {

        $flag = TRUE;

        $min_lenght = config('sample.name_min_lengh');
        $max_lenght = config('sample.name_max_lengh');

        $sample_name = @$input['sample_name'];


        return $flag;
    }
}