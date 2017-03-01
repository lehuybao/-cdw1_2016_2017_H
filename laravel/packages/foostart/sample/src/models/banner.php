<?php
namespace Foostart\Sample\model;

use Illuminate\Database\Eloquent\Model;

class banner extends Model {

    protected $table = 'banners';
    protected $primaryKey = 'banner_id';
    public $timestamps = false;
    protected $filltable = ["banner_img"];

    public function getData() {
        return self::paginate(5);
    }

}
