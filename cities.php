<?php
require_once('../../config.php');
require_once('lib.php');

require_login();
$systemcontext = context_system::instance();
if (!has_capability('local/local_user_details:manageCity', $systemcontext)) {
    throw new required_capability_exception($systemcontext, 'local/local_user_details:manageCity', 'nopermissions', 'local_user_details');
}

$linkurl = new moodle_url('/local/user_details/cities.php');
$PAGE->set_context($systemcontext);
$PAGE->set_url($linkurl);
$PAGE->set_pagelayout('admin');
$PAGE->set_title("City list");
$PAGE->set_heading("Manage Cities");
$PAGE->blocks->add_region('content');
$output = $PAGE->get_renderer('local_user_details');
$PAGE->requires->jquery();
$PAGE->requires->js(new moodle_url('/local/user_details/js/custom.js'), true);

$cityLists = new local_user_details\cities();
$cities = $cityLists->getCityList();
$citieslist = new local_user_details\output\cities_list($systemcontext, $cities);

if($_POST['method']==='del'){
    $DB->delete_records('city',['id'=>$_POST['id']]);
}

echo $OUTPUT->header();
$addLink = new \moodle_url('/local/user_details/addCity.php');
echo '<a class="btn btn-primary pull-right" href="' . $addLink . '">' . get_string('addCityTitle', 'local_user_details') . '</a>';

echo $output->render($citieslist);

echo $OUTPUT->footer();
