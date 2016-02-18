<?php
	//File kelas_model.php
	class Model_jadwal extends CI_Model{
		
		public function tampilJadwalHariIni(){
			$harikee = date('w');
			$query = "SELECT id_jadwal, mata_kuliah.id_mata_kuliah , mata_kuliah, nama_dosen, ruang.id_ruang, ruang, hari, jam 
						from jadwal, mata_kuliah, dosen, ruang, hari, sesi
						where jadwal.id_mata_kuliah = mata_kuliah.id_mata_kuliah 
						and jadwal.id_dosen = dosen.id_dosen
						and jadwal.id_ruang = ruang.id_ruang
						and jadwal.id_hari = hari.id_hari
						and jadwal.id_sesi = sesi.id_sesi
						and hari.id_hari = '$harikee'";
			$hasil = $this->db->query($query);
			return $hasil;
		}
		
		public function tampilJadwal(){
			 $query = "SELECT id_jadwal, mata_kuliah.id_mata_kuliah , mata_kuliah, nama_dosen, ruang.id_ruang, ruang, hari, jam, jadwal.semester
						from jadwal, mata_kuliah, dosen, ruang, hari, sesi
						where jadwal.id_mata_kuliah = mata_kuliah.id_mata_kuliah 
						and jadwal.id_dosen = dosen.id_dosen
						and jadwal.id_ruang = ruang.id_ruang
						and jadwal.id_hari = hari.id_hari
						and jadwal.id_sesi = sesi.id_sesi";
			$hasil = $this->db->query($query);
			return $hasil;
		}

		public function detailJadwal($id_jadwal){
			$query = "SELECT mata_kuliah.id_mata_kuliah,jadwal.id_jadwal, mata_kuliah , ruang, ip_address, hari, jam 
						from jadwal, mata_kuliah, ruang, fingerprint, hari , sesi 
						where jadwal.id_mata_kuliah = mata_kuliah.id_mata_kuliah
						and jadwal.id_ruang = ruang.id_ruang
						and jadwal.id_hari = hari.id_hari
						and jadwal.id_sesi = sesi.id_sesi
						and ruang.id_fingerprint = fingerprint.id_fingerprint
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