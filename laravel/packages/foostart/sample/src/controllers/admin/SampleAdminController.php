<?php namespace Foostart\Sample\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Sample\Models\Samples;
use Foostart\Sample\Models\Banner;
use Foostart\Sample\Models\Detail;


/**
 * Validators
 */
use Foostart\Sample\Validators\SampleAdminValidator;
use Foostart\Sample\Validators\BannerAdminValidator;
use Foostart\Sample\Validators\DetailAdminValidator;

class SampleAdminController extends Controller {

    public $data_view = array();

    private $obj_sample = NULL;
    private $obj_banner = NULL;
    private $obj_detail = NULL;
    private $obj_validator = NULL;
    
    public function __construct() {
        $this->obj_sample = new Samples();
        $this->obj_banner = new Banner();
        $this->obj_detail = new Detail();
        }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

        $params = array();

        $list_sample = $this->obj_sample->get_samples($params);

        $this->data_view = array_merge($this->data_view, array(
            'samples' => $list_sample,
            'request' => $request
        ));
        return view('sample::sample.admin.sample.sample_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $sample = NULL;
        $sample_id = (int) $request->get('id');


        if (!empty($sample_id) && (is_int($sample_id))) {
            $sample = $this->obj_sample->find($sample_id);
        }

        $this->data_view = array_merge($this->data_view, array(
            'sample' => $sample,
            'request' => $request
        ));
        return view('sample::sample.admin.sample.sample_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {
                $this->obj_validator = new SampleAdminValidator();


        $input = $request->all();

        $sample_id = (int) $request->get('id');
        $sample = NULL;


        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($sample_id) && is_int($sample_id)) {

                $sample = $this->obj_sample->find($sample_id);
            }

        } else {
            if (!empty($sample_id) && is_int($sample_id)) {

                $sample = $this->obj_sample->find($sample_id);

                if (!empty($sample)) {

                    $input['sample_id'] = $sample_id;
                    $sample = $this->obj_sample->update_sample($input);

                    //Message
                    \Session::flash('message', trans('sample::sample.message_update_successfully'));
                    return Redirect::route("admin_sample.edit", ["id" => $sample->sample_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('sample::sample.message_update_unsuccessfully'));
                }
            } else {

                $sample = $this->obj_sample->add_sample($input);

                if (!empty($sample)) {

                    //Message
                    \Session::flash('message', trans('sample::sample.message_add_successfully'));
                    return Redirect::route("admin_sample.edit", ["id" => $sample->sample_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('sample::sample.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'sample' => $sample,
            'request' => $request,
        ), $data);

        return view('sample::sample.admin.sample.sample_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $sample = NULL;
        $sample_id = $request->get('id');

        if (!empty($sample_id)) {
            $sample = $this->obj_sample->find($sample_id);

            if (!empty($sample)) {
                  //Message
                \Session::flash('message', trans('sample::sample.message_delete_successfully'));

                $sample->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'sample' => $sample,
        ));

        return Redirect::route("admin_sample");
    }
    
    
        /*-------------Banner---------------*/
    public function banner(Request $request) {

        $params = array();

        $list_banner = $this->obj_banner->get_banner($params);
        
        $this->data_view = array_merge($this->data_view, array(
            'banner' => $list_banner,
            'request' => $request
        ));
        return view('sample::sample.admin.banner.banner_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit1(Request $request) {

        $banner = NULL;
        $banner_id = (int) $request->get('id');


        if (!empty($banner_id) && (is_int($banner_id))) {
            $banner = $this->obj_banner->find($banner_id);
        }

        $this->data_view = array_merge($this->data_view, array(
            'banner' => $banner,
            'request' => $request
        ));
        return view('sample::sample.admin.banner.banner_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post1(Request $request) {
                $this->obj_validator = new BannerAdminValidator();


        $input = $request->all();

        $banner_id = (int) $request->get('id');
        $banner = NULL;


        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($banner_id) && is_int($banner_id)) {

                $banner = $this->obj_banner->find($banner_id);
            }

        } else {
            if (!empty($banner_id) && is_int($banner_id)) {

                $banner = $this->obj_banner->find($banner_id);

                if (!empty($banner)) {

                    $input['banner_id'] = $banner_id;
                    $banner = $this->obj_banner->update_banner($input);

                    //Message
                    \Session::flash('message', trans('sample::banner.message_update_successfully'));
                    return Redirect::route("admin_banner.edit", ["id" => $banner->banner_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('sample::banner.message_update_unsuccessfully'));
                }
            } else {

                $banner = $this->obj_banner->add_banner($input);

                if (!empty($banner)) {

                    //Message
                    \Session::flash('message', trans('sample::banner.message_add_successfully'));
                    return Redirect::route("admin_banner.edit", ["id" => $banner->banner_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('sample::banner.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'banner' => $banner,
            'request' => $request,
        ), $data);

        return view('sample::sample.admin.banner.banner_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete1(Request $request) {

        $banner = NULL;
        $banner_id = $request->get('id');

        if (!empty($banner_id)) {
            $banner = $this->obj_banner->find($banner_id);

            if (!empty($banner)) {
                  //Message
                \Session::flash('message', trans('sample::banner.message_delete_successfully'));

                $banner->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'banner' => $banner,
        ));

        return Redirect::route("admin_banner");
    }
         /*-------------Detail---------------*/
    public function detail(Request $request) {

        $params = array();

        $list_detail = $this->obj_detail->get_detail($params);
        
        $this->data_view = array_merge($this->data_view, array(
            'detail' => $list_detail,
            'request' => $request
        ));
        return view('sample::sample.admin.detail.detail_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit_detail(Request $request) {

        $detail = NULL;
        $detail_id = (int) $request->get('id');


        if (!empty($detail_id) && (is_int($detail_id))) {
            $detail = $this->obj_banner->find($detail_id);
        }

        $this->data_view = array_merge($this->data_view, array(
            'detail' => $detail,
            'request' => $request
        ));
        return view('sample::sample.admin.detail.detail_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post_detail(Request $request) {
                $this->obj_validator = new BannerAdminValidator();


        $input = $request->all();

        $detail_id = (int) $request->get('id');
        $detail = NULL;


        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($detail_id) && is_int($detail_id)) {

                $detail = $this->obj_detail->find($detail_id);
            }

        } else {
            if (!empty($detail_id) && is_int($detail_id)) {

                $detail = $this->obj_detail->find($detail_id);

                if (!empty($detail)) {

                    $input['detail_id'] = $detail_id;
                    $detail = $this->obj_detail->update_detail($input);

                    //Message
                    \Session::flash('message', trans('sample::detail.message_update_successfully'));
                    return Redirect::route("admin_detail.edit", ["id" => $detail->detail_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('sample::detail.message_update_unsuccessfully'));
                }
            } else {

                $detail = $this->obj_detail->add_detail($input);

                if (!empty($detail)) {

                    //Message
                    \Session::flash('message', trans('sample::detail.message_add_successfully'));
                    return Redirect::route("admin_detail.edit", ["id" => $detail->detail_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('sample::detail.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'detail' => $detail,
            'request' => $request,
        ), $data);

        return view('sample::sample.admin.detail.detail_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete_detail(Request $request) {

        $detail = NULL;
        $detail_id = $request->get('id');

        if (!empty($detail_id)) {
            $detail = $this->obj_detail->find($detail_id);

            if (!empty($detail)) {
                  //Message
                \Session::flash('message', trans('sample::detail.message_delete_successfully'));

                $detail->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'detail' => $detail,
        ));

        return Redirect::route("admin_detail");
    }
}