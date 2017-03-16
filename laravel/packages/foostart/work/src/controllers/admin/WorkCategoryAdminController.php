<?php namespace Foostart\Work\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Work\Models\Workscategories;
/**
 * Validators
 */
use Foostart\Work\Validators\WorkCategoryAdminValidator;

class WorkCategoryAdminController extends Controller {

    public $data_view = array();

    private $obj_Work_category = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_Work_category = new WorksCategories();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

         $params =  $request->all();

        $list_Work_category = $this->obj_Work_category->get_works_categories($params);

        $this->data_view = array_merge($this->data_view, array(
            'Works_categories' => $list_Work_category,
            'request' => $request,
            'params' => $params
        ));
        return view('Work::Work_category.admin.Work_category_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $Work = NULL;
        $Work_id = (int) $request->get('id');
        

        if (!empty($Work_id) && (is_int($Work_id))) {
            $Work = $this->obj_Work_category->find($Work_id);

        }

        $this->data_view = array_merge($this->data_view, array(
            'Work' => $Work,
            'request' => $request
        ));
        return view('Work::Work_category.admin.Work_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new WorkCategoryAdminValidator();

        $input = $request->all();

        $Work_id = (int) $request->get('id');

        $Work = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($Work_id) && is_int($Work_id)) {

                $Work = $this->obj_Work_category->find($Work_id);
            }

        } else {
            if (!empty($Work_id) && is_int($Work_id)) {

                $Work = $this->obj_Work_category->find($Work_id);

                if (!empty($Work)) {

                    $input['Work_category_id'] = $Work_id;
                    $Work = $this->obj_Work_category->update_Work($input);

                    //Message
                    \Session::flash('message', trans('Work::Work_admin.message_update_successfully'));
                    return Redirect::route("admin_Work_category.edit", ["id" => $Work->Work_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('Work::Work_admin.message_update_unsuccessfully'));
                }
            } else {

                $Work = $this->obj_Work_category->add_Work($input);

                if (!empty($Work)) {

                    //Message
                    \Session::flash('message', trans('Work::Work_admin.message_add_successfully'));
                    return Redirect::route("admin_Work_category.edit", ["id" => $Work->Work_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('Work::Work_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'Work' => $Work,
            'request' => $request,
        ), $data);

        return view('Work::Work_category.admin.Work_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $Work = NULL;
        $Work_id = $request->get('id');

        if (!empty($Work_id)) {
            $Work = $this->obj_Work_category->find($Work_id);

            if (!empty($Work)) {
                  //Message
                \Session::flash('message', trans('Work::Work_admin.message_delete_successfully'));

                $Work->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'Work' => $Work,
        ));

        return Redirect::route("admin_Work_category");
    }

}