<?php
	//File kelas_model.php
	class Model_login extends CI_Model{
		
		public function cek_user($username, $password){
			 $sql = " SELECT * from user where username = '".$username."' and password = '".$password."'";
			//$sql = 'SELECT * from user where username = "'.$username.'" and password = "'.$password'"';
			$hasil = $this->db->query($sql);
			if ($hasil->num_rows() == 1){
				foreach ($hasil->result() as $user) {
					$data = array('username'=> $user->username , 'password'=>$user->password,'login'=>TRUE);
					$this->session->set_userdata('akun',$data);
				}
				return TRUE;
			}
			else{
				return FALSE;
			}
		}

	}
?>