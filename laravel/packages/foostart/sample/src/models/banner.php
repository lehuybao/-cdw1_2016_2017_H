<?php

namespace Foostart\Sample\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model {

    protected $table = 'banners';
    public $timestamps = false;
    protected $fillable = [
        'banner_img'
    ];
    protected $primaryKey = 'banner_id';

    public function get_banner($params = array()) {
        $banner = self::paginate(5);
        return $banner;
    }

    /**
     *
     * @param type $input
     * @param type $banner_id
     * @return type
     */
    public function update_banner($input, $banner_id = NULL) {

        if (empty($banner_id)) {
            $banner_id = $input['banner_id'];
        }

        $banner = self::find($banner_id);

        if (!empty($banner)) {

            $banner->banner_img = $input['banner_img'];

            $banner->save();

            return $banner;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_banner($input) {

        $banner = self::create([
                    'banner_img' => $input['banner_img'],
        ]);
        return $banner;
    }

}
