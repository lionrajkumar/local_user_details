<?php
$capabilities = array(

    'local/local_user_details:manageCity' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'companymanager' => CAP_ALLOW,
            'companydepartmentmanager' => CAP_ALLOW,
            'clientadministrator' => CAP_ALLOW
        ),
    ),

    'local/local_user_details:manageUser' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'companymanager' => CAP_ALLOW,
            'companydepartmentmanager' => CAP_ALLOW,
            'clientadministrator' => CAP_ALLOW
        ),
    ),
);