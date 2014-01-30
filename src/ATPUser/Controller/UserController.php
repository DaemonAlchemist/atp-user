<?php

namespace ATPUser\Controller;

class UserController extends \ATPCore\Controller\AbstractController
{
	public function loginAction()
	{
		$view = new \Zend\View\Model\ViewModel();
		
		if(count($_POST))
		{
			$auth = $this->get('User\Authenticator');
			$user = $auth->getUser();
			$user->setFrom($_POST);
		
			if($user->validate())
			{
				$auth->login($user);
				$this->redirect()->toRoute('home');
			}
			else
			{
				$errors = array();
				$errors[] = "Invalid user credentials";
				$view->errors = $errors;
			}
		}
		
		return $view;
	}
}
