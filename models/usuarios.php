<?php
class usuarios extends model {

	private $uid;

	public function __construct($id = '') {
		parent::__construct();

		if(!empty($id)) {
			$this->uid = $id;
		}
	}
	
	public function isLogged() {

		if(isset($_SESSION['twlg']) && !empty($_SESSION['twlg'])) {
			return true;
		} else {
			return false;
		}

	}

	public function usuarioExiste($email) {

		$sql = "SELECT * FROM usuarios WHERE email = '$email'";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}
}