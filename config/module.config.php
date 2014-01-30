<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
	'user' => array(
		'user_model' => 'ATPUser\Model\User',
	),
	'admin' => array(
		'models' =>array(
			'user_user' => array(
				'displayName' => 'User',
				'class' => 'ATPUser\Model\User',
				'category' => 'Admin',
				'displayColumns' => array('Username', 'Email'),
				'defaultOrder' => 'username ASC',
				'fields' => array(
					'Username' => array(
						'type' => 'Text',
						'label' => 'Username'
					),
					'Email' => array(
						'type' => 'Text',
						'label' => 'Email',
					),
					'Password' => array(
						'type' => 'Password',
						'label' => 'Password',
					),
				),
			),
		),
	),
	'asset_manager' => array(
		'resolver_configs' => array(
			'paths' => array(
				__DIR__ . '/../public',
			),
		),
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
