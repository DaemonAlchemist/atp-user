<?php

namespace ATPUser\Model;

class Group extends \ATP\ActiveRecord
{
	public function displayName()
	{
		return $this->name;
	}
}
Group::init();