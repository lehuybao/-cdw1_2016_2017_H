<?php

namespace Foostart\Sample\model;

use Illuminate\Database\Eloquent\Model;

class lists extends Model {

    protected $table = 'lists';
    protected $primaryKey = 'list_id';
    public $timestamps = false;
    protected $filltable = ["list_img", "list_code","list_info"];

    public function getData() {
        return self::paginate(5);
    }

}
