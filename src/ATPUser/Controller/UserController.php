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
			$user->loadByUsername($this->params()->fromPost('username'));
		
			if($user->validatePassword($this->params()->fromPost('password')))
			{
				$auth->login($user);
				
				$config = $this->get('Config');
				$this->redirect()->toRoute($config['user']['loginRedirectRoute']);
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
	
	public function logoutAction()
	{
		$auth = $this->get('User\Authenticator');
		$auth->logout();
		
		$config = $this->get('Config');
		$this->redirect()->toRoute($config['user']['logoutRedirectRoute']);
	}
}
