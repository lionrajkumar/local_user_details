<?php

namespace local_user_details\output;

defined('MOODLE_INTERNAL') || die();

use renderable;
use renderer_base;
use templatable;
use stdClass;

class users_list implements renderable, templatable
{
    protected $context;
    protected $users;

    public function __construct($context, $usersList) {
        $this->context = $context;
        $this->users = $usersList;
    }

    public function export_for_template(renderer_base $output) {
        $data = new stdClass();
        $allUsers = $this->users;
        foreach ($allUsers as $key => $user){
            $updUsers[$key] = $user;
            $updUsers[$key]->link = new \moodle_url('/local/user_details/addUser.php',['id'=>$user->id]);
        }
        $data->users = array_values($this->users);

        return $data;
    }
}