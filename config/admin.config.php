<?php

return array(
	'admin' => array(
		'models' =>array(
			'atpuser_user' => array(
				'displayName' => 'User',
				'class' => 'ATPUser\Model\User',
				'category' => 'Users',
				'displayColumns' => array('IsActive'),
				'defaultOrder' => 'username ASC',
			),
			'atpuser_group' => array(
				'displayName' => 'Group',
				'class' => 'ATPUser\Model\Group',
				'category' => 'Users',
				'displayColumns' => array(),
				'defaultOrder' => 'name ASC',
			),
		),
	),
);
