<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;

class LoginController extends Controller {
		

	public function index() {
		$array = array();

		
		$this->loadView('login', $array);
	}

	public function index_aluno() {

		if(!empty($_POST['email']) && !empty($_POST['pass'])) {
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			
			$u = new Usuarios();
			if($u->validateLoginA($email, $pass)) {
				header("Location: ".BASE_URL);
				exit;
			} else {
			header("Location: ".BASE_URL."login");
			exit;
			}	
		} else {
		header("Location: ".BASE_URL."login");
		exit;
		}	
	}

	public function index_user() {

		if(!empty($_POST['email']) && !empty($_POST['pass'])) {
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			
			$u = new Usuarios();

			if($u->validateLoginU($email, $pass)) {
				header("Location: ".BASE_URL);
				exit;
			}else {
			header("Location: ".BASE_URL."login");
			exit;
			}	
		} else {
		header("Location: ".BASE_URL."login");
		exit;
		}	
	}
}