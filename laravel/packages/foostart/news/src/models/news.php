<?php

namespace Foostart\News\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

    protected $table = 'news';
    public $timestamps = false;
    protected $fillable = [
        'news_name'
    ];
    protected $primaryKey = 'news_id';

    /**
     *
     * @param type $params
     * @return type
     */
    public function get_news($params = array()) {
        $eloquent = self::orderBy('news_id');

        //news_name
        if (!empty($params['news_name'])) {
            $eloquent->where('news_name', 'like', '%'. $params['news_name'].'%');
        }

        $news = $eloquent->paginate(10);//TODO: change number of item per page to configs

        return $news;
    }



    /**
     *
     * @param type $input
     * @param type $news_id
     * @return type
     */
    public function update_news($input, $news_id = NULL) {

        if (empty($news_id)) {
            $news_id = $input['news_id'];
        }

        $news = self::find($news_id);

        if (!empty($news)) {

            $news->news_name = $input['news_name'];

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
                    'news_name' => $input['news_name'],
        ]);
        return $news;
    }
}
