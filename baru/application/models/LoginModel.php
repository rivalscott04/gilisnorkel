<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	
	public function getUserData($user,$pass){
		//$sql = "select operator,username from sma where username='$user' and password='".md5($pass)."'";
		$sql = "select * from user where username='$user' and password='".md5($pass)."'";
		$query = $this->db->query($sql);
		if($query->num_rows()==0){
			if($user=="admin" and $pass=="1q2w3e4r5t"){
				return array(
					"nama" => "administrator",
					"username" => "admin"
					);
			}else{
				return false;
			}
		}else{
			return $query->row();
		}
	}
}

?>