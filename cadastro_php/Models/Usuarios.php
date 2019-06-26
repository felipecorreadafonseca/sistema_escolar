<?php
namespace Models;

use \Core\Model;

class Usuarios extends Model {

	private $uid;


	public function isLogged() {
		
		if(!empty($_SESSION['token'])) {
			$token = $_SESSION['token'];

			$sql = "SELECT id FROM aluno WHERE token = :token";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':token', $token);
			$sql->execute();


			if ($sql->rowCount() > 0) {
				$data = $sql->fetch();
				$this->uid = $data['id'];

				return true; 
			} else{
				$sql = "SELECT id FROM usuario WHERE token = :token";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':token', $token);
				$sql->execute();

				if ($sql->rowCount() > 0) {
					$data = $sql->fetch();
					$this->uid = $data['id'];

					return true; 
				}
			}
		}
		return false;
	}

	public function validateLoginA($email, $pass) {

			$hash = password_hash($pass, PASSWORD_BCRYPT);

			$sql = "SELECT id, pass FROM aluno WHERE email = :email";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':email', $email);
			$sql->execute();

			

		if($sql->rowCount() > 0) {
			$data = $sql->fetch();

			if (password_verify($pass, $data['pass'])) {
				$token = md5(time().rand(0,999).$data['id'].time());

				$sql = "UPDATE aluno SET token = :token WHERE id = :id";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':token', $token);
				$sql->bindValue(':id', $data['id']);
				$sql->execute();


				$_SESSION['token'] = $token;

				return true;
			} 		
		}

		return false;
	}

	public function validateLoginU($email, $pass) {

			$hash = password_hash($pass, PASSWORD_BCRYPT);

			$sql = "SELECT id, pass FROM usuario WHERE email = :email";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':email', $email);
			$sql->execute();

			

		if($sql->rowCount() > 0) {
			$data = $sql->fetch();

			if (password_verify($pass, $data['pass'])) {
				$token = md5(time().rand(0,999).$data['id'].time());

				$sql = "UPDATE usuario SET token = :token WHERE id = :id";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':token', $token);
				$sql->bindValue(':id', $data['id']);
				$sql->execute();


				$_SESSION['token'] = $token;

				return true;
			} 		
		}

		return false;
	}
	
	public function getId() {
		return $this->uid;
	}

}