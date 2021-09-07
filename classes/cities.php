<?php

namespace local_user_details;
defined('MOODLE_INTERNAL') || die();

class cities
{

    public function getCityList()
    {
        global $DB;
        $cities = $DB->get_records('city');
        return $cities;
    }

    public function getCityInfo($id)
    {
        global $DB;
        $city = $DB->get_record('city', ['id' => $id]);
        return $city;
    }

    public function getCitiesForSelect()
    {
        global $DB;
        $selectList=[];
        $selectList[0]='Select City';
        $cities = $DB->get_records('city');
        foreach ($cities as $key=>$city){
            $selectList[$key]=$city->city_name." - ".$city->city_code;
        }
        return $selectList;
    }

}