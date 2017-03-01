<?php
namespace Foostart\Sample\model;

use Illuminate\Database\Eloquent\Model;

class sample extends Model {

    protected $table = 'sample';
    protected $primaryKey = 'sample_id';
    public $timestamps = false;
    protected $filltable = ["sample_name"];

    public function getData() {
        return self::paginate(5);
    }

}
