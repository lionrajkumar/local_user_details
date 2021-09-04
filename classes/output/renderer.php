<?php
namespace local_user_details\output;
defined('MOODLE_INTERNAL') || die();
use plugin_renderer_base;

class renderer extends plugin_renderer_base
{
    public function render_cities_list($page) {
        $data = $page->export_for_template($this);

        return parent::render_from_template('local_user_details/cities_list', $data);
    }
}