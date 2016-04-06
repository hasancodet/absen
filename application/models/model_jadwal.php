<?php
	//File kelas_model.php
	class Model_jadwal extends CI_Model{
		
		public function tampilJadwalHariIni(){
			date_default_timezone_set("Asia/Jakarta");
			$harikee = date('w');
			$query = "SELECT id_jadwal, mata_kuliah.id_mata_kuliah , mata_kuliah, nama_dosen, hari, jam 
						from jadwal, mata_kuliah, dosen, hari, sesi
						where jadwal.id_mata_kuliah = mata_kuliah.id_mata_kuliah 
						and jadwal.id_dosen = dosen.id_dosen
						and jadwal.id_hari = hari.id_hari
						and jadwal.id_sesi = sesi.id_sesi
						and hari.id_hari = '$harikee'";
			$hasil = $this->db->query($query);
			return $hasil;
		}
		
		public function tampilJadwal(){
			 $query = "SELECT id_jadwal, mata_kuliah.id_mata_kuliah , mata_kuliah, nama_dosen, hari, jam, jadwal.semester
						from jadwal, mata_kuliah, dosen,  hari, sesi
						where jadwal.id_mata_kuliah = mata_kuliah.id_mata_kuliah 
						and jadwal.id_dosen = dosen.id_dosen
						and jadwal.id_hari = hari.id_hari
						and jadwal.id_sesi = sesi.id_sesi";
			$hasil = $this->db->query($query);
			return $hasil;
		}

		public function detailJadwal($id_jadwal){
			$query = "SELECT mata_kuliah.id_mata_kuliah,jadwal.id_jadwal, mata_kuliah ,  hari, jam 
						from jadwal, mata_kuliah, hari , sesi 
						where jadwal.id_mata_kuliah = mata_kuliah.id_mata_kuliah
						and jadwal.id_hari = hari.id_hari
						and jadwal.id_sesi = sesi.id_sesi
						and mata_kuliah.id_mata_kuliah = '$id_jadwal'";
 			$hasil = $this->db->query($query);
			return $hasil;
		}
		
		public function detailJadwalMahasiswa($id_jadwal){
			$query = "SELECT mahasiswa.nim , nama_mahasiswa , mata_kuliah.id_mata_kuliah
						FROM mahasiswa, jadwal_mahasiswa, jadwal, mata_kuliah
						WHERE jadwal_mahasiswa.nim = mahasiswa.nim
						AND mata_kuliah.id_mata_kuliah = jadwal_mahasiswa.id_jadwal
						AND jadwal_mahasiswa.id_jadwal = jadwal.id_jadwal
						AND jadwal.id_mata_kuliah = '$id_jadwal'";
			$hasil = $this->db->query($query);
			return $hasil;
		}

	}
?>