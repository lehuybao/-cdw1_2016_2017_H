<?php namespace Foostart\Contact\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Contact\Models\ContactsCategories;
/**
 * Validators
 */
use Foostart\Contact\Validators\ContactCategoryAdminValidator;

class ContactCategoryAdminController extends Controller {

    public $data_view = array();

    private $obj_contact_category = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_contact_category = new ContactsCategories();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

         $params =  $request->all();

        $list_contact_category = $this->obj_contact_category->get_contacts_categories($params);

        $this->data_view = array_merge($this->data_view, array(
            'contacts_categories' => $list_contact_category,
            'request' => $request,
            'params' => $params
        ));
        return view('contact::contact_category.admin.contact_category_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $contact = NULL;
        $contact_id = (int) $request->get('id');
        

        if (!empty($contact_id) && (is_int($contact_id))) {
            $contact = $this->obj_contact_category->find($contact_id);

        }

        $this->data_view = array_merge($this->data_view, array(
            'contact' => $contact,
            'request' => $request
        ));
        return view('contact::contact_category.admin.contact_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new ContactCategoryAdminValidator();

        $input = $request->all();

        $contact_id = (int) $request->get('id');

        $contact = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($contact_id) && is_int($contact_id)) {

                $contact = $this->obj_contact_category->find($contact_id);
            }

        } else {
            if (!empty($contact_id) && is_int($contact_id)) {

                $contact = $this->obj_contact_category->find($contact_id);

                if (!empty($contact)) {

                    $input['contact_category_id'] = $contact_id;
                    $contact = $this->obj_contact_category->update_contact($input);

                    //Message
                    \Session::flash('message', trans('contact::contact_admin.message_update_successfully'));
                    return Redirect::route("admin_contact_category.edit", ["id" => $contact->contact_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('contact::contact_admin.message_update_unsuccessfully'));
                }
            } else {

                $contact = $this->obj_contact_category->add_contact($input);

                if (!empty($contact)) {

                    //Message
                    \Session::flash('message', trans('contact::contact_admin.message_add_successfully'));
                    return Redirect::route("admin_contact_category.edit", ["id" => $contact->contact_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('contact::contact_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'contact' => $contact,
            'request' => $request,
        ), $data);

        return view('contact::contact_category.admin.contact_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $contact = NULL;
        $contact_id = $request->get('id');

        if (!empty($contact_id)) {
            $contact = $this->obj_contact_category->find($contact_id);

            if (!empty($contact)) {
                  //Message
                \Session::flash('message', trans('contact::contact_admin.message_delete_successfully'));

                $contact->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'contact' => $contact,
        ));

        return Redirect::route("admin_contact_category");
    }

}