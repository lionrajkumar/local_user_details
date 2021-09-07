<?php
require_once('../../config.php');
require_once('lib.php');

require_login();
$systemcontext = context_system::instance();
if (!has_capability('local/local_user_details:manageUser', $systemcontext)) {
    throw new required_capability_exception($systemcontext, 'local/local_user_details:manageUser', 'nopermissions', 'local_user_details');
}

$linkurl = new moodle_url('/local/user_details/user_list.php');
$PAGE->set_context($systemcontext);
$PAGE->set_url($linkurl);
$PAGE->set_pagelayout('admin');
$PAGE->set_title("Users list");
$PAGE->set_heading("Manage users");
$PAGE->blocks->add_region('content');
$output = $PAGE->get_renderer('local_user_details');
$PAGE->requires->jquery();
$PAGE->requires->js(new moodle_url('/local/user_details/js/custom.js'), true);

$allUsersClass = new local_user_details\userList();
$usersList = $allUsersClass->getUsersList();
$allUsers = new local_user_details\output\users_list($systemcontext, $usersList);

if($_POST['method']==='del'){
    $allUsersClass->delUser($_POST['id']);
}

echo $OUTPUT->header();
$addLink = new \moodle_url('/local/user_details/addUser.php');
echo '<a class="btn btn-primary pull-right" href="' . $addLink . '">' . get_string('addUserBtnTitle', 'local_user_details') . '</a>';
$addCLink = new \moodle_url('/local/user_details/addCity.php');
echo '<a class="btn btn-primary pull-right mr-2" href="' . $addCLink . '">' . get_string('addCityTitle', 'local_user_details') . '</a>';

echo $output->render($allUsers);

echo $OUTPUT->footer();
