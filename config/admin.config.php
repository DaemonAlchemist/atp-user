<?php

return array(
	'admin' => array(
		'models' =>array(
			'atpuser_user' => array(
				'displayName' => 'User',
				'class' => 'ATPUser\Model\User',
				'category' => 'Users',
				'displayColumns' => array('RealName', 'Initials', 'Email'),
				'defaultOrder' => 'username ASC',
			),
		),
	),
);
