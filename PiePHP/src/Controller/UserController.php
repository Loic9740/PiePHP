<?php
namespace Controller;
use Core\Controller;
class UserController extends \Core\Controller{
	public function addAction()
	{
		echo 'aurevoir';
	}

	public function errorAction() {
		echo "Error";
	}
	
	public function loginAction()
	{
		$this->render('../src/view/register');
	}
	
}
