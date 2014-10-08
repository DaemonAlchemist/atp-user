<?php

namespace ATPUser;

class Authenticator implements \Zend\ServiceManager\FactoryInterface
{
	private $_sm = null;

	public function createService(\Zend\ServiceManager\ServiceLocatorInterface $sm)
	{
		$auth = new self();
		$auth->setServiceLocator($sm);
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
	
	public function getUser()
	{
		$user = new \ATPUser\Model\User();
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
		$id = $session->currentUser;
		$user = $this->getUser();
		if($this->isLoggedIn()) $user->loadById($id);
		return $user;
	}
	
	public function login($user)
	{
		$session = new \Zend\Session\Container('user');
		$session->currentUser = $user->id;
	}
	
	public function logout()
	{
		$session = new \Zend\Session\Container('user');
		unset($session->currentUser);
	}
}
