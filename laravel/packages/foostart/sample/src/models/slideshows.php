<?php

namespace Foostart\Sample\model;

use Illuminate\Database\Eloquent\Model;

class slideshows extends Model {

    protected $table = 'slideshows';
    protected $primaryKey = 'slideshow_id';
    public $timestamps = false;
    protected $filltable = ["slideshow_img", "slideshow_title", "slideshow_code","slideshow_info"];

    public function getData() {
        return self::paginate(5);
    }

}
