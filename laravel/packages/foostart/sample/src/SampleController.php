<?php

namespace Foostart\Sample;

use App\Http\Controllers\Controller;
use Foostart\Sample\model\sample;
Class SampleController extends Controller
{

    public function index()
    {
        $sample = new sample();
        $sample = $sample->get();
    return view('sample::index', array('sample'=>$sample));

        
    }

}
