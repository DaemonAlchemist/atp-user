<?php

namespace ATPUser\Controller;

class UserController extends \ATPCore\Controller\AbstractController
{
	public function loginAction()
	{
		$view = new \Zend\View\Model\ViewModel();
		
		if(count($_POST))
		{
			$errors = array();
			$errors[] = "Invalid user credentials";
			$view->errors = $errors;
		}
		
		return $view;
	}
}
