<?php

/**
 * User objcet
 */
class users
{
	
	function __construct($id)
	{
		global $db;
		$this->db = $db;
		$this->user_id = $id;
		$sql = $db->query("SELECT * FROM user WHERE user_id = '$id' ");
		if (!$sql) {
			echo $db->error;
		}
		if ($sql->num_rows > 0) {
			$data = $sql->fetch_assoc();
			$this->fname = $data['fname'];
			$this->sname = $data['sname'];
			$this->username = $data['username'];
			$this->email = $data['email_address'];
			$this->role = $data['role'];
			$this->area = $data['area'];
			$this->department_id = $data['department_id'];
			$this->password = $data['password'];
		}
		else{
			die("Unable xxxxxxx");
		}
	}
}


?>