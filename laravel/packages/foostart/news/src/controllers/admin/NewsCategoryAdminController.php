<?php namespace Foostart\News\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\News\Models\NewsCategories;
/**
 * Validators
 */
use Foostart\News\Validators\NewsCategoryAdminValidator;

class NewsCategoryAdminController extends Controller {

    public $data_view = array();

    private $obj_news_category = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_news_category = new NewsCategories();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

         $params =  $request->all();

        $list_news_category = $this->obj_news_category->get_news_categories($params);

        $this->data_view = array_merge($this->data_view, array(
            'news_categories' => $list_news_category,
            'request' => $request,
            'params' => $params
        ));
        return view('news::news_category.admin.news_category_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $news = NULL;
        $news_id = (int) $request->get('id');
        

        if (!empty($news_id) && (is_int($news_id))) {
            $news = $this->obj_news_category->find($news_id);

        }

        $this->data_view = array_merge($this->data_view, array(
            'news' => $news,
            'request' => $request
        ));
        return view('news::news_category.admin.news_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new NewsCategoryAdminValidator();

        $input = $request->all();

        $news_id = (int) $request->get('id');

        $news = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($news_id) && is_int($news_id)) {

                $news = $this->obj_news_category->find($news_id);
            }

        } else {
            if (!empty($news_id) && is_int($news_id)) {

                $news = $this->obj_news_category->find($news_id);

                if (!empty($news)) {

                    $input['news_category_id'] = $news_id;
                    $news = $this->obj_news_category->update_news($input);

                    //Message
                    \Session::flash('message', trans('news::news_admin.message_update_successfully'));
                    return Redirect::route("admin_news_category.edit", ["id" => $news->news_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('news::news_admin.message_update_unsuccessfully'));
                }
            } else {

                $news = $this->obj_news_category->add_news($input);

                if (!empty($news)) {

                    //Message
                    \Session::flash('message', trans('news::news_admin.message_add_successfully'));
                    return Redirect::route("admin_news_category.edit", ["id" => $news->news_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('news::news_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'news' => $news,
            'request' => $request,
        ), $data);

        return view('news::news_category.admin.news_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $news = NULL;
        $news_id = $request->get('id');

        if (!empty($news_id)) {
            $news = $this->obj_news_category->find($news_id);

            if (!empty($news)) {
                  //Message
                \Session::flash('message', trans('news::news_admin.message_delete_successfully'));

                $news->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'news' => $news,
        ));

        return Redirect::route("admin_news_category");
    }

}