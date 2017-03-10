<?php

namespace Foostart\Work\Controlers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use URL,
    Route,
    Redirect;
use Foostart\Work\Models\Works;

class WorkFrontController extends Controller
{
    public $data = array();
    public function __construct() {

    }

    public function index(Request $request)
    {

        $obj_Work = new Works();
        $Works = $obj_Work->get_Works();
        $this->data = array(
            'request' => $request,
            'Works' => $Works
        );
        return view('Work::Work.index', $this->data);
    }

}