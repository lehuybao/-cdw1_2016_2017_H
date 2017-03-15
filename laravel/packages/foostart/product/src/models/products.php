<?php

namespace Foostart\Product\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model {

    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = [
        'product_name'
    ];
    protected $primaryKey = 'product_id';

    /**
     *
     * @param type $params
     * @return type
     */
    public function get_products($params = array()) {
        $eloquent = self::orderBy('product_id');

        //product_name
        if (!empty($params['product_name'])) {
            $eloquent->where('product_name', 'like', '%'. $params['product_name'].'%');
        }

        $products = $eloquent->paginate(10);//TODO: change number of item per page to configs

        return $products;
    }



    /**
     *
     * @param type $input
     * @param type $product_id
     * @return type
     */
    public function update_product($input, $product_id = NULL) {

        if (empty($product_id)) {
            $product_id = $input['product_id'];
        }

        $product = self::find($product_id);

        if (!empty($product)) {

            $product->product_name = $input['product_name'];

            $product->save();

            return $product;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_product($input) {

        $product = self::create([
                    'product_name' => $input['product_name'],
        ]);
        return $product;
    }
}
