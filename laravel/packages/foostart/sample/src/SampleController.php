<?php

namespace Foostart\Sample;

use App\Http\Controllers\Controller;
use Foostart\Sample\model\banner;
use Foostart\Sample\model\detail;
use Foostart\Sample\model\event;
use Foostart\Sample\model\introduce;
use Foostart\Sample\model\lists;
use Foostart\Sample\model\merits;
use Foostart\Sample\model\slideshows;
Class SampleController extends Controller {

    public function index() {


        $banner = new banner();
        $banner = $banner->getData();

        $detail = new detail();
        $detail = $detail->getData();

        $event = new event();
        $event = $event->getData();

        $introduce = new introduce();
        $introduce = $introduce->getData();

        $lists = new lists();
        $lists = $lists->getData();
        
        $merits = new merits();
        $merits = $merits->getData();
        
        $slideshows = new slideshows();
        $slideshows = $slideshows->getData();
        
        return view('sample::index', array('banner' => $banner, 'detail' => $detail,
            'event' => $event, 'introduce' => $introduce,'lists'=>$lists,
            'slideshows'=>$slideshows,'merits'=>$merits));
    }

}
