<?php

namespace Foostart\News\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategories extends Model {

    protected $table = 'news_categories';
    public $timestamps = false;
    protected $fillable = [
        'news_category_name'
    ];
    protected $primaryKey = 'news_category_id';

    public function get_news_categories($params = array()) {
        $eloquent = self::orderBy('news_category_id');

        if (!empty($params['news_category_name'])) {
            $eloquent->where('news_category_name', 'like', '%'. $params['news_category_name'].'%');
        }
        $news_category = $eloquent->paginate(10);
        return $news_category;
    }

    /**
     *
     * @param type $input
     * @param type $news_id
     * @return type
     */
    public function update_news($input, $news_id = NULL) {

        if (empty($news_id)) {
            $news_id = $input['news_category_id'];
        }

        $news = self::find($news_id);

        if (!empty($news)) {

            $news->news_category_name = $input['news_category_name'];

            $news->save();

            return $news;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_news($input) {

        $news = self::create([
                    'news_category_name' => $input['news_category_name'],
        ]);
        return $news;
    }
}
