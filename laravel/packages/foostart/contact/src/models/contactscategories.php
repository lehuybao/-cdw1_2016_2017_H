<?php

namespace Foostart\Contact\Models;

use Illuminate\Database\Eloquent\Model;

class ContactsCategories extends Model {

    protected $table = 'contacts_category';
    public $timestamps = false;
    protected $fillable = [
        'contact_category_name'
    ];
    protected $primaryKey = 'contact_category_id';

    public function get_contacts_categories($params = array()) {
        $eloquent = self::orderBy('contact_category_id');

        if (!empty($params['contact_category_name'])) {
            $eloquent->where('contact_category_name', 'like', '%'. $params['contact_category_name'].'%');
        }
        $contacts_category = $eloquent->paginate(10);
        return $contacts_category;
    }

    /**
     *
     * @param type $input
     * @param type $contact_id
     * @return type
     */
    public function update_contact($input, $contact_id = NULL) {

        if (empty($contact_id)) {
            $contact_id = $input['contact_category_id'];
        }

        $contact = self::find($contact_id);

        if (!empty($contact)) {

            $contact->contact_category_name = $input['contact_category_name'];

            $contact->save();

            return $contact;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_contact($input) {

        $contact = self::create([
                    'contact_category_name' => $input['contact_category_name'],
        ]);
        return $contact;
    }
}
