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
		$class = $this->_userClass;
		$user = new $class();
		$user->setServiceLocator($this->getServiceLocator());
		return $user;
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
	
	public function getCurrentUser()
	{
		$session = new \Zend\Session\Container('user');
		return $session->currentUser;
	}
	
	public function login($user)
	{
		$user->setServiceLocator(null);
		$session = new \Zend\Session\Container('user');
		$session->currentUser = $user;
	}
	
	public function logout()
	{
		$session = new \Zend\Session\Container('user');
		unset($session->currentUser);
	}
}
