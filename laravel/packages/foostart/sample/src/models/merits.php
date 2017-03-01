<?php

namespace Foostart\Sample\model;

use Illuminate\Database\Eloquent\Model;

class merits extends Model {

    protected $table = 'merits';
    protected $primaryKey = 'merit_id';
    public $timestamps = false;
    protected $filltable = ["merit_img", "merit_prize"];

    public function getData() {
        return self::paginate(5);
    }

}
