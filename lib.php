<?php
defined('MOODLE_INTERNAL') || die();

require_once $CFG->libdir . '/formslib.php';

class admin_add_new_city_form extends moodleform
{
    function definition()
    {
        global $CFG, $USER;

        $mform =& $this->_form;

        $mform->addElement('header', 'add_cities_form', get_string('addCityTitle', 'local_user_details'));

        $mform->addElement('text', 'city_name', get_string('cityName', 'local_user_details'));
        $mform->addRule('city_name', null, 'required', null, 'client');
        $mform->setType('city_name', PARAM_RAW);

        $mform->addElement('text', 'city_code', get_string('cityCode', 'local_user_details'));
        $mform->addRule('city_code', null, 'required', null, 'client');
        $mform->setType('city_code', PARAM_RAW);

        $mform->addElement('hidden', 'id');
        $mform->setType('id', PARAM_RAW);
        $this->add_action_buttons();
    }
}

class admin_add_new_user_form extends moodleform
{
    function definition()
    {
        global $CFG, $USER;

        $mform =& $this->_form;

        $mform->addElement('header', 'add_user_form', get_string('addUserBtnTitle', 'local_user_details'));

        $mform->addElement('text', 'employee_code', get_string('employeeCode', 'local_user_details'));
        $mform->addRule('employee_code', null, 'required', null, 'client');
        $mform->setType('employee_code', PARAM_RAW);

        $mform->addElement('text', 'employee_name', get_string('employeeName', 'local_user_details'));
        $mform->addRule('employee_name', null, 'required', null, 'client');
        $mform->setType('employee_name', PARAM_RAW);

        $mform->addElement('date_selector', 'doj', get_string('doj', 'local_user_details'));
        $mform->setType('doj', PARAM_RAW);

        $mform->addElement('text', 'address', get_string('address', 'local_user_details'));
        $mform->setType('address', PARAM_RAW);

        $cityLists = new local_user_details\cities();
        $cities = $cityLists->getCitiesForSelect();
        $mform->addElement('select', 'city', get_string('cityName', 'local_user_details'), $cities, array('onchange' => 'javascript:myFunctionToDoSomething();'));
        $mform->setType('city', PARAM_RAW);

        $mform->addElement('text', 'zip', get_string('zip', 'local_user_details'));
        $mform->setType('zip', PARAM_RAW);

        $mform->addElement('hidden', 'id');
        $mform->setType('id', PARAM_RAW);
        $this->add_action_buttons();
    }
}