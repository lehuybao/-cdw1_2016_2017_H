<?php

namespace Foostart\Sample\model;

use Illuminate\Database\Eloquent\Model;

class event extends Model {

    protected $table = 'events';
    protected $primaryKey = 'event_id';
    public $timestamps = false;
    protected $filltable = ["event_img", "event_news", "event_title"];

    public function getData() {
        return self::paginate(5);
    }

}
