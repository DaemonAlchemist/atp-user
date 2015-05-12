<?php

return array(
	'modules' => array(
		'ATPUser' => array(
			'version' => '0.9.0',
		),
	),
	'user' => array(
		'user_model' => 'ATPUser\Model\User',
		'loginRedirectRoute' => 'home',
		'logoutRedirectRoute' => 'home',
	),
    'router' => array(
        'routes' => array(
            'user' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/user/:action',
                    'defaults' => array(
                        'controller'    => 'ATPUser\Controller\UserController',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'ATPUser\Controller\UserController' => 'ATPUser\Controller\UserController'
        ),
    ),
    'service_manager' => array(
		'factories' => array(
			'User\Authenticator' => 'ATPUser\Authenticator',
		),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
	),
);
