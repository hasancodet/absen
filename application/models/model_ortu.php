<?php
	//File kelas_model.php
	class Model_ortu extends CI_Model{
		public function tampilJadwal($nim){
			$query = "SELECT nama_mahasiswa,jadwal.id_mata_kuliah, mata_kuliah
						FROM mata_kuliah, jadwal, jadwal_mahasiswa, mahasiswa
						WHERE mata_kuliah.id_mata_kuliah = jadwal.id_mata_kuliah
						AND jadwal.id_jadwal = jadwal_mahasiswa.id_jadwal
						AND jadwal_mahasiswa.nim = mahasiswa.nim
						AND mahasiswa.nim ='$nim'";
			$hasil = $this->db->query($query);
			return $hasil;
		}
		public function tampilAbsensi($nim, $id_mata_kuliah){
			$query = "SELECT tanggal, status
						FROM absensi, jadwal_mahasiswa, jadwal
						WHERE absensi.id_jadwal_mahasiswa = jadwal_mahasiswa.id_jadwal_mahasiswa
						AND jadwal_mahasiswa.id_jadwal = jadwal.id_jadwal
						AND jadwal.id_mata_kuliah ='$id_mata_kuliah'
						AND jadwal_mahasiswa.nim ='$nim'";
			$hasil = $this->db->query($query);
			return $hasil;
		}
	}
?>