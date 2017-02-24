<?php

namespace Foostart\Sample\model;

use Illuminate\Database\Eloquent\Model;

class introduce extends Model {

    protected $table = 'introduces';
    protected $primaryKey = 'introduce_id';
    public $timestamps = false;
    protected $filltable = ["introduce_img", "introduce_info"];

    public function getData() {
        return self::paginate(5);
    }

}
