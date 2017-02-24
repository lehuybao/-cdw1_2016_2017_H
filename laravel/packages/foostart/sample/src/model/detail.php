<?php

namespace Foostart\Sample\model;

use Illuminate\Database\Eloquent\Model;

class detail extends Model {

    protected $table = 'details';
    protected $primaryKey = 'details_id';
    public $timestamps = false;
    protected $filltable = ["details_code", "details_img", "details_desription"];

    public function getData() {
        return self::paginate(5);
    }

}
