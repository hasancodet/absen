<?php
	//File kelas_model.php
	class Model_ruang extends CI_Model{
		
		public function ruang(){
			date_default_timezone_set("Asia/Jakarta");
			$query = "SELECT * from ruang"; 
			$hasil = $this->db->query($query);
			return $hasil;
		}

		public function editRuang($ruang, $id_ruang){
			$this->db->update('ruang', $ruang, "id_ruang = $id_ruang" );
		}
	}
?>