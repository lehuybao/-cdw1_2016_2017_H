<?php namespace Foostart\Product\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Product\Models\ProductsCategories;
/**
 * Validators
 */
use Foostart\Product\Validators\ProductCategoryAdminValidator;

class ProductCategoryAdminController extends Controller {

    public $data_view = array();

    private $obj_product_category = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_product_category = new ProductsCategories();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

         $params =  $request->all();
         
        $list_product_category = $this->obj_product_category->get_products_categories($params);

        $this->data_view = array_merge($this->data_view, array(
            'products_categories' => $list_product_category,
            'request' => $request,
            'params' => $params
        ));
        return view('product::product_category.admin.product_category_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $product = NULL;
        $product_id = (int) $request->get('id');

        if (!empty($product_id) && (is_int($product_id))) {
            $product = $this->obj_product_category->find($product_id);

        }

        $this->data_view = array_merge($this->data_view, array(
            'product' => $product,
            'request' => $request
        ));
        return view('product::product_category.admin.product_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new ProductCategoryAdminValidator();

        $input = $request->all();

        $product_id = (int) $request->get('id');

        $product = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($product_id) && is_int($product_id)) {

                $product = $this->obj_product_category->find($product_id);
            }

        } else {
            if (!empty($product_id) && is_int($product_id)) {

                $product = $this->obj_product_category->find($product_id);

                if (!empty($product)) {

                    $input['product_category_id'] = $product_id;
                    $product = $this->obj_product_category->update_product($input);

                    //Message
                    \Session::flash('message', trans('product::product_admin.message_update_successfully'));
                    return Redirect::route("admin_product_category.edit", ["id" => $product->product_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('product::product_admin.message_update_unsuccessfully'));
                }
            } else {

                $product = $this->obj_product_category->add_product($input);

                if (!empty($product)) {

                    //Message
                    \Session::flash('message', trans('product::product_admin.message_add_successfully'));
                    return Redirect::route("admin_product_category.edit", ["id" => $product->product_id]);
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

        return view('product::product_category.admin.product_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $product = NULL;
        $product_id = $request->get('id');

        if (!empty($product_id)) {
            $product = $this->obj_product_category->find($product_id);

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

        return Redirect::route("admin_product_category");
    }

}