<?php

namespace Foostart\Product\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Product\Models\Products;
/**
 * Validators
 */
use Foostart\Product\Validators\ProductAdminValidator;

class ProductAdminController extends Controller {

    public $data_view = array();
    private $obj_product = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_product = new Products();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {
        $params = $request->all();

        $list_product = $this->obj_product->get_products($params);


        $this->data_view = array_merge($this->data_view, array(
            'products' => $list_product,
            'request' => $request,
            'params' => $params
        ));
        return view('product::product.admin.product_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $product = NULL;
        $product_id = (int) $request->get('id');

        if (!empty($product_id) && (is_int($product_id))) {
            $product = $this->obj_product->find($product_id);
        }

        $this->data_view = array_merge($this->data_view, array(
            'product' => $product,
            'request' => $request
        ));
        return view('product::product.admin.product_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new ProductAdminValidator();

        $input = $request->all();

        $product_id = (int) $request->get('id');
        $product = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($product_id) && is_int($product_id)) {

                $product = $this->obj_product->find($product_id);
            }
        } else {
            if (!empty($product_id) && is_int($product_id)) {

                $product = $this->obj_product->find($product_id);

                if (!empty($product)) {

                    $input['product_id'] = $product_id;
                    $product = $this->obj_product->update_product($input);

                    //Message
                    \Session::flash('message', trans('product::product_admin.message_update_successfully'));
                    return Redirect::route("admin_product.edit", ["id" => $product->product_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('product::product_admin.message_update_unsuccessfully'));
                }
            } else {

                $product = $this->obj_product->add_product($input);

                if (!empty($product)) {

                    //Message
                    \Session::flash('message', trans('product::product_admin.message_add_successfully'));
                    return Redirect::route("admin_product.edit", ["id" => $product->product_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('product::product_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'product' => $product,
            'request' => $request,
                ), $data);

        return view('product::product.admin.product_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $product = NULL;
        $product_id = $request->get('id');

        if (!empty($product_id)) {
            $product = $this->obj_product->find($product_id);

            if (!empty($product)) {
                //Message
                \Session::flash('message', trans('product::product_admin.message_delete_successfully'));

                $product->delete();
            }
        } else {
            
        }

        $this->data_view = array_merge($this->data_view, array(
            'product' => $product,
        ));

        return Redirect::route("admin_product");
    }

}
