<?php

namespace Foostart\Contact\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model {

    protected $table = 'contacts';
    public $timestamps = false;
    protected $fillable = [
        'contact_name'
    ];
    protected $primaryKey = 'contact_id';

    /**
     *
     * @param type $params
     * @return type
     */
    public function get_contacts($params = array()) {
        $eloquent = self::orderBy('contact_id');

        //contact_name
        if (!empty($params['contact_name'])) {
            $eloquent->where('contact_name', 'like', '%'. $params['contact_name'].'%');
        }

        $contacts = $eloquent->paginate(10);//TODO: change number of item per page to configs

        return $contacts;
    }



    /**
     *
     * @param type $input
     * @param type $contact_id
     * @return type
     */
    public function update_contact($input, $contact_id = NULL) {

        if (empty($contact_id)) {
            $contact_id = $input['contact_id'];
        }

        $contact = self::find($contact_id);

        if (!empty($contact)) {

            $contact->contact_name = $input['contact_name'];

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
                    'contact_name' => $input['contact_name'],
        ]);
        return $contact;
    }
}
