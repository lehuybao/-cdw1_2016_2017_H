<?php

namespace Foostart\Work\Models;

use Illuminate\Database\Eloquent\Model;

class WorkCategories extends Model {

    protected $table = 'works_categories';
    public $timestamps = false;
    protected $fillable = [
        'work_category_name'
    ];
    protected $primaryKey = 'work_category_id';

    public function get_works_categories($params = array()) {
        $eloquent = self::orderBy('work_category_id');

        if (!empty($params['work_category_name'])) {
            $eloquent->where('work_category_name', 'like', '%'. $params['work_category_name'].'%');
        }
        $works_category = $eloquent->paginate(10);
        return $works_category;
    }

    /**
     *
     * @param type $input
     * @param type $work_id
     * @return type
     */
    public function update_work($input, $work_id = NULL) {

        if (empty($work_id)) {
            $work_id = $input['work_category_id'];
        }

        $work = self::find($work_id);

        if (!empty($work)) {

            $work->work_category_name = $input['work_category_name'];

            $work->save();

            return $work;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_work($input) {

        $work = self::create([
                    'work_category_name' => $input['work_category_name'],
        ]);
        return $work;
    }
}
