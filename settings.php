<?php
if (is_null($ADMIN->locate('user_details'))) {
    $ADMIN->add( 'root', new admin_category( 'user_details', 'User Details'));
}
if (is_null($ADMIN->locate('list_users'))) {
    $ADMIN->add('user_details', new admin_externalpage('list_users', 'Users List',
        $CFG->wwwroot.'/local/user_details/users_list.php'));
}
if (is_null($ADMIN->locate('list_city'))) {
    $ADMIN->add('user_details', new admin_externalpage('list_city', 'Cities',
        $CFG->wwwroot.'/local/user_details/cities.php'));
}