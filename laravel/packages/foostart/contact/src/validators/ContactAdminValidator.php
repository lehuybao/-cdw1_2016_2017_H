<?php
namespace Foostart\Contact\Validators;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;

use Illuminate\Support\MessageBag as MessageBag;

class ContactAdminValidator extends AbstractValidator
{
    protected static $rules = array(
        'contact_name' => 'required',
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
            'required' => ':attribute '.trans('contact::contact_admin.required')
        ];
    }

    public function isValidTitle($input) {

        $flag = TRUE;

        $min_lenght = config('contact_admin.name_min_length');
        $max_lenght = config('contact_admin.name_max_length');

        $contact_name = @$input['contact_name'];

        if ((strlen($contact_name) < $min_lenght)  || ((strlen($contact_name) > $max_lenght))) {
            $this->errors->add('name_unvalid_length', trans('name_unvalid_length', ['NAME_MIN_LENGTH' => $min_lenght, 'NAME_MAX_LENGTH' => $max_lenght]));
            $flag = TRUE;
        }

        return $flag;
    }
}