<?php

namespace Foostart\Product\Controlers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use URL,
    Route,
    Redirect;
use Foostart\Product\Models\Products;

class ProductFrontController extends Controller
{
    public $data = array();
    public function __construct() {

    }

    public function index(Request $request)
    {

        $obj_product = new Products();
        $products = $obj_product->get_products();
        $this->data = array(
            'request' => $request,
            'products' => $products
        );
        return view('product::product.index', $this->data);
    }

}