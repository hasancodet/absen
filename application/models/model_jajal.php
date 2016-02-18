<?php
	//File kelas_model.php
	class Model_jajal extends CI_Model{
		
		public function jajal(){
			$query = "SELECT * from absensi";
			$hasil = $this->db->query($query);
			return $hasil;
		}

	}
?>