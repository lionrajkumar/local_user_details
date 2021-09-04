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
