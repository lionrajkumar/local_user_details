<?php

namespace local_user_details;
defined('MOODLE_INTERNAL') || die();

class userList
{
    public function getUsersList()
    {
        global $DB;
        //$users = $DB->get_records('user_details');
        $users = $DB->get_records_sql('select ud.*, c.city_code, c.city_name from {user_details} as ud join {city} as c on c.id=ud.city');
        foreach($users as $user){
            $user->doj = userdate($user->doj, get_string('dojFormat','local_user_details'));
        }
        return $users;
    }

    public function getUserInfo($id)
    {
        global $DB;
        $user = $DB->get_record('user_details', ['id' => $id]);
        return $user;
    }

    public function createUser($data)
    {
        global $DB;
        $DB->insert_record('user_details', $data);
    }

    public function updateUser($data)
    {
        global $DB;
        $DB->update_record('user_details', $data);
    }

    public function delUser($id)
    {
        global $DB;
        $DB->delete_records('city',['id'=>$id]);
    }
}