<?php
require_once('../../config.php');
require_once('lib.php');

$id = optional_param('id', 0, PARAM_INT);
global $DB, $PAGE, $OUTPUT;

require_login();
$systemcontext = context_system::instance();
$linkurl = new moodle_url('/local/user_details/cities.php');
$PAGE->set_context($systemcontext);
$PAGE->set_url($linkurl);
$PAGE->set_pagelayout('admin');
$PAGE->set_title("City list");
$PAGE->set_heading("Manage Cities");
$PAGE->blocks->add_region('content');

$cityLists = new local_user_details\cities();
$city = $cityLists->getCityInfo($id);

echo $OUTPUT->header();

$mform = new admin_add_new_city_form();
if ($mform->is_cancelled()) {
    $myurl = new moodle_url('/local/user_details/cities.php');
    redirect($myurl);
} else if ($formData = $mform->get_data()) {

    if (is_null($formData->id) || $formData->id == '') {
        $DB->insert_record('city', $formData);
    } else {
        $DB->update_record('city', $formData);
    }

    $myurl = new moodle_url('/local/user_details/cities.php');
    redirect($myurl, get_string('addCitySuccess', 'local_user_details'));
} else {
    $mform->set_data($city);
    $mform->display();
}

echo $OUTPUT->footer();
