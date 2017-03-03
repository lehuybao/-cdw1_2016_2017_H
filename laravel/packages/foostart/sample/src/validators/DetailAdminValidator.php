<?php

namespace Foostart\Sample\Validators;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;
use Illuminate\Support\MessageBag as MessageBag;

class DetailAdminValidator extends AbstractValidator {

    protected static $rules = array(
        'detail_code' => 'required',
        'detail_img' => 'required',
        'detail_desription' => 'required',
    );
    protected static $messages = [];

    public function __construct() {
        Event::listen('validating', function($input) {
            
        });
        $this->messages();
    }

    public function validate($input) {

        $flag = parent::validate($input);

        $this->errors = $this->errors ? $this->errors : new MessageBag();

        $flag = $this->isValidTitle($input) ? $flag : FALSE;
        return $flag;
    }

    public function messages() {
        self::$messages = [
            'required' => ':attribute ' . trans('sample::detail_admin.required')
        ];
    }

    public function isValidTitle($input) {

        $flag = TRUE;

        $min_lenght = config('detail.name_min_lengh');
        $max_lenght = config('detail.name_max_lengh');

        $detail_code = @$input['detail_code'];
        $detail_img = @$input['detail_img'];
        $detail_desription = @$input['detail_desription'];


        if ((strlen($detail_code,$detail_img,$detail_desription) <= $min_lenght) || ((strlen($detail_code,$detail_img,$detail_desription) >= $max_lenght))) {
            $this->errors->add('name_unvalid_length', trans('name_unvalid_length', ['NAME_MIN_LENGTH' => $min_lenght, 'NAME_MAX_LENGTH' => $max_lenght]));
            $flag = TRUE;
        }
        return $flag;
    }

}
