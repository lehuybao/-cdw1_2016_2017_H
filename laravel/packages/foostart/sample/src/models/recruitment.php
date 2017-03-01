<?php

namespace Foostart\Sample\model;

use Illuminate\Database\Eloquent\Model;

class recruitment extends Model {

    protected $table = 'recruitments';
    protected $primaryKey = 'recruitment_id';
    public $timestamps = false;
    protected $filltable = ["recruitment_post", "recruitment_des", "recruitment_location","recruitment_expired"];

    public function getData() {
        return self::paginate(5);
    }

}
