<?php

namespace Foostart\News\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\News\Models\News;
/**
 * Validators
 */
use Foostart\News\Validators\NewsAdminValidator;

class NewsAdminController extends Controller {

    public $data_view = array();
    private $obj_news = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_news = new News();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {
        $params = $request->all();
        
        $list_news = $this->obj_news->get_news($params);
      

        $this->data_view = array_merge($this->data_view, array(
            'news' => $list_news,
            'request' => $request,
            'params' => $params
        ));
        return view('news::news.admin.news_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $news = NULL;
        $news_id = (int) $request->get('id');
        
        if (!empty($news_id) && (is_int($news_id))) {
            $news = $this->obj_news->find($news_id);
        }

        $this->data_view = array_merge($this->data_view, array(
            'news' => $news,
            'request' => $request
        ));
        return view('news::news.admin.news_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new NewsAdminValidator();

        $input = $request->all();

        $news_id = (int) $request->get('id');
        $news = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($news_id) && is_int($news_id)) {

                $news = $this->obj_news->find($news_id);
            }
        } else {
            if (!empty($news_id) && is_int($news_id)) {

                $news = $this->obj_news->find($news_id);

                if (!empty($news)) {

                    $input['news_id'] = $news_id;
                    $news = $this->obj_news->update_news($input);

                    //Message
                    \Session::flash('message', trans('news::news_admin.message_update_successfully'));
                    return Redirect::route("admin_news.edit", ["id" => $news->news_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('news::news_admin.message_update_unsuccessfully'));
                }
            } else {

                $news = $this->obj_news->add_news($input);

                if (!empty($news)) {

                    //Message
                    \Session::flash('message', trans('news::news_admin.message_add_successfully'));
                    return Redirect::route("admin_news.edit", ["id" => $news->news_id]);
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

        return view('news::news.admin.news_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $news = NULL;
        $news_id = $request->get('id');

        if (!empty($news_id)) {
            $news = $this->obj_news->find($news_id);

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

        return Redirect::route("admin_news");
    }

}
