<?php
require_once('../../config.php');
require_once('lib.php');

$id = optional_param('id', 0, PARAM_INT);
global $DB, $PAGE, $OUTPUT;

require_login();
$systemcontext = context_system::instance();
$linkurl = new moodle_url('/local/user_details/addUser.php');
$PAGE->set_context($systemcontext);
$PAGE->set_url($linkurl);
$PAGE->set_pagelayout('admin');
$PAGE->set_title("Add User");
$PAGE->set_heading("Create new user");
$PAGE->blocks->add_region('content');

$userClass = new local_user_details\userList();
$user = $userClass->getUserInfo($id);

echo $OUTPUT->header();

$mform = new admin_add_new_user_form();
if ($mform->is_cancelled()) {
    $myurl = new moodle_url('/local/user_details/users_list.php');
    redirect($myurl);
} else if ($formData = $mform->get_data()) {

    if (is_null($formData->id) || $formData->id == '') {
        $userClass->createUser($formData);
    } else {
        $userClass->updateUser($formData);
    }

    $myurl = new moodle_url('/local/user_details/users_list.php');
    redirect($myurl, get_string('addUserSuccess', 'local_user_details'));
} else {
    $mform->set_data($user);
    $mform->display();
}

echo $OUTPUT->footer();
