<?php
	//File kelas_model.php
	class Model_login extends CI_Model{
		
		public function cek_user($username, $password){
			$this->db->where('username', $username);
			$this->db->where('password', md5($password));
			$hasil =$this->db->get("user");
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