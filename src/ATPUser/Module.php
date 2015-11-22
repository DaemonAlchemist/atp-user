<?php

namespace ATPUser;

class Module extends \ATP\Module
{
	protected $_moduleName = "ATPUser";
	protected $_moduleBaseDir = __DIR__;
	
	public function getInstallDbQueries()
	{
		return array(
			"CREATE TABLE `atp`.`atpuser_users` (
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				`username` CHAR(32) NULL,
				`password` CHAR(32) NULL,
				`real_name` CHAR(255) NULL,
				`initials` CHAR(4) NULL,
				`email` CHAR(64) NULL,
				PRIMARY KEY (`id`),
				UNIQUE INDEX `username_idx` (`username` ASC)
			)",
		);
	}
}
