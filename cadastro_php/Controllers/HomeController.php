<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;

class HomeController extends Controller {

	public $usuarios;

	public function __construct(){
		$this->usuarios = new Usuarios();

		if(!$this->usuarios->isLogged()) {
			header("Location: ".BASE_URL."login");
			exit;
		}

	}

	public function index() {
		$array = array();

		
		$this->loadTemplate('home', $array);
	}

}