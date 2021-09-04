<?php
namespace local_user_details\output;

defined('MOODLE_INTERNAL') || die();

use renderable;
use renderer_base;
use templatable;
use stdClass;

class cities_list implements renderable, templatable
{
    protected $context;
    protected $cities;

    public function __construct($context, $cities) {
        $this->context = $context;
        $this->cities = $cities;
    }

    public function export_for_template(renderer_base $output) {
        $data = new stdClass();
        $cities = $this->cities;
        foreach ($cities as $key => $city){
            $updCities[$key] = $city;
            $updCities[$key]->link = new \moodle_url('/local/user_details/addCity.php',['id'=>$city->id]);
        }
        $data->cities = array_values($this->cities);

        return $data;
    }

}