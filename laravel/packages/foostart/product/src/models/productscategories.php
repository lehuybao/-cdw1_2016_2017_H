<?php

namespace Foostart\Product\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsCategories extends Model {

    protected $table = 'products_categories';
    public $timestamps = false;
    protected $fillable = [
        'product_category_name'
    ];
    protected $primaryKey = 'product_category_id';

    public function get_products_categories($params = array()) {
        $eloquent = self::orderBy('product_category_id');

        if (!empty($params['product_category_name'])) {
            $eloquent->where('product_category_name', 'like', '%'. $params['product_category_name'].'%');
        }
        $products_category = $eloquent->paginate(10);
        return $products_category;
    }

    /**
     *
     * @param type $input
     * @param type $product_id
     * @return type
     */
    public function update_product($input, $product_id = NULL) {

        if (empty($product_id)) {
            $product_id = $input['product_category_id'];
        }

        $product = self::find($product_id);

        if (!empty($product)) {

            $product->product_category_name = $input['product_category_name'];

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
                    'product_category_name' => $input['product_category_name'],
        ]);
        return $product;
    }
}
