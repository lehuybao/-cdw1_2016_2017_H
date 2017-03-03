<?php

namespace Foostart\Sample\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model {

    protected $table = 'details';
    public $timestamps = false;
    protected $fillable = [
        'detail_code', 'detail_img', 'detail_desription'
    ];
    protected $primaryKey = 'detail_id';

    public function get_detail($params = array()) {
        $detail = self::paginate(5);
        return $detail;
    }

    /**
     *
     * @param type $input
     * @param type $detail_id
     * @return type
     */
    public function update_detail($input, $detail_id = NULL) {

        if (empty($detail_id)) {
            $detail_id = $input['detail_id'];
        }

        $detail = self::find($detail_id);

        if (!empty($detail)) {
            $detail->detail_code = $input['detail_code'];
            $detail->detail_img = $input['detail_img'];
            $detail->detail_desription = $input['detail_desription'];

            $detail->save();

            return $detail;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_detail($input) {

        $detail = self::create([
                    'detail_img' => $input['detail_img'],
        ]);
        return $detail;
    }

}
