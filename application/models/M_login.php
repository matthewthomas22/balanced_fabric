<?php
class M_login extends CI_Model{
	//cek username dan paaword
	function f_login_user($username,$password){
    //cara normal kalau pakai default database
    // $query=$this->db->query("select * from prominent.t_zroh");
		// return $query;

    // $db2 = $this->load->database('second_db', TRUE);
		$string = "select * from t_users where c_username='$username' and c_password=MD5('$password') ";
		$query=$this->db->query($string);
		return $query;
	}

}
