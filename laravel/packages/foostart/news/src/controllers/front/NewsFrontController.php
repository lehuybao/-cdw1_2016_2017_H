<?php

namespace Foostart\News\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use URL,
    Route,
    Redirect;
use Foostart\News\Models\News;

class NewsFrontController extends Controller
{
    public $data = array();
    public function __construct() {

    }

    public function index(Request $request)
    {

        $obj_news = new News();
        $news = $obj_news->get_news();
        $this->data = array(
            'request' => $request,
            'news' => $news
        );
        return view('news::news.index', $this->data);
    }

}