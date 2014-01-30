<?php

namespace ATPUser;

class Authenticator implements \Zend\ServiceManager\FactoryInterface
{
	private $_sm = null;
	private $_userClass = null;

	public function createService(\Zend\ServiceManager\ServiceLocatorInterface $sm)
	{
		$config = $sm->get('Config');
	
		$auth = new self();
		$auth->setServiceLocator($sm);
		$auth->setUserClass($config['user']['user_class']);
		return $auth;
	}
	
	public function setServiceLocator($sm)
	{
		$this->_sm = $sm;
	}
	
	public function getServiceLocator()
	{
		return $this->_sm;
	}
	
	public function setUserClass($user)
	{
		$this->_userClass = $user;
	}
	
	public function getUser()
	{
		$ref = new \ReflectionClass($this->_userClass);
		return $ref->newInstanceArgs(func_get_args());
	}
	
	public function get($name)
	{
		return $this->getServiceLocator()->get($name);
	}
	
	public function isLoggedIn()
	{
		$session = new \Zend\Session\Container('user');
		return isset($session->currentUser);
	}
	
	public function login($user)
	{		
	}
	
	public function logout()
	{
	}
}
