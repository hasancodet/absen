<?php
	//File kelas_model.php
	class Model_absensi extends CI_Model{
		public function absenRealTime(){
			$query = "SELECT mahasiswa.nim, mahasiswa.nama_mahasiswa, mata_kuliah, tanggal, jam, absensi.status
						FROM absensi, mahasiswa, jadwal_mahasiswa, jadwal, mata_kuliah
						WHERE absensi.id_jadwal_mahasiswa = jadwal_mahasiswa.id_jadwal_mahasiswa
						AND jadwal_mahasiswa.nim = mahasiswa.nim
						AND jadwal_mahasiswa.id_jadwal = jadwal.id_jadwal
						AND mata_kuliah.id_mata_kuliah = jadwal.id_mata_kuliah
						AND tanggal = CURDATE()";
			$hasil = $this->db->query($query);
			return $hasil;
		}

		public function ambilJadwalAbsensi(){
			$harikee = date('w');
			$query = "SELECT id_jadwal_mahasiswa
						FROM jadwal, jadwal_mahasiswa, hari
						WHERE jadwal.id_hari = hari.id_hari
						AND jadwal.id_jadwal = jadwal_mahasiswa.id_jadwal
						and hari.id_hari='$harikee'";
			$hasil = $this->db->query($query);
			return $hasil;
		}

		public function ambilJadwalAbsensiAkeh($tanggal){
			$harikee = date('w', strtotime($tanggal));
			$query = "SELECT id_jadwal_mahasiswa
						FROM jadwal, jadwal_mahasiswa, hari
						WHERE jadwal.id_hari = hari.id_hari
						AND jadwal.id_jadwal = jadwal_mahasiswa.id_jadwal
						and hari.id_hari='$harikee'";
			$hasil = $this->db->query($query);
			return $hasil;
		}
		
		public function hitungPresensi($nim, $id_mata_kuliah){
			$query = "SELECT count(id_absensi) as jumlah_presensi
						from absensi, jadwal_mahasiswa, jadwal, mahasiswa, mata_kuliah
						where absensi.id_jadwal_mahasiswa = jadwal_mahasiswa.id_jadwal_mahasiswa
						and jadwal_mahasiswa.id_jadwal = jadwal.id_jadwal
						and jadwal_mahasiswa.nim = mahasiswa.nim
						and jadwal.id_mata_kuliah = mata_kuliah.id_mata_kuliah
						and mata_kuliah.id_mata_kuliah = $id_mata_kuliah
						and mahasiswa.nim = $nim
						and absensi.status='hadir'";
			$hasil = $this->db->query($query);
			return $hasil;
		}

		public function hitungPertemuan($nim, $id_mata_kuliah){
			$query = "SELECT count(id_absensi) as jumlah_pertemuan
						from absensi, jadwal_mahasiswa, jadwal, mahasiswa, mata_kuliah
						where absensi.id_jadwal_mahasiswa = jadwal_mahasiswa.id_jadwal_mahasiswa
						and jadwal_mahasiswa.id_jadwal = jadwal.id_jadwal
						and jadwal_mahasiswa.nim = mahasiswa.nim
						and jadwal.id_mata_kuliah = mata_kuliah.id_mata_kuliah
						and mata_kuliah.id_mata_kuliah = $id_mata_kuliah
						and mahasiswa.nim = $nim";
			$hasil = $this->db->query($query);
			return $hasil;	
		}

		public function tanggalKuliah($id_mata_kuliah){
			$query = "SELECT distinct absensi.tanggal
						FROM absensi, jadwal_mahasiswa, jadwal
						WHERE absensi.id_jadwal_mahasiswa = jadwal_mahasiswa.id_jadwal_mahasiswa
						AND jadwal_mahasiswa.id_jadwal = jadwal.id_jadwal
						AND id_mata_kuliah = $id_mata_kuliah
						order by tanggal";
			$hasil = $this->db->query($query);
			return $hasil;
		}

		public function statusBerangkat($nim, $id_mata_kuliah){
			$query = "SELECT id_absensi,jadwal_mahasiswa.nim, mahasiswa.nama_mahasiswa, tanggal, status
						from absensi, jadwal_mahasiswa, jadwal, mahasiswa
						where absensi.id_jadwal_mahasiswa = jadwal_mahasiswa.id_jadwal_mahasiswa
						and jadwal_mahasiswa.id_jadwal = jadwal.id_jadwal
						and jadwal_mahasiswa.nim = mahasiswa.nim
						and jadwal.id_mata_kuliah = $id_mata_kuliah
						and jadwal_mahasiswa.nim = $nim
						order by tanggal";
			$hasil = $this->db->query($query);
			return $hasil;
		}

		public function lihatJadwal($id_jadwal){
			$query = "SELECT id_jadwal_mahasiswa 
						from jadwal_mahasiswa 
						where id_jadwal = $id_jadwal";
			$hasil = $this->db->query($query);
			return $hasil; 
		}

		public function absenMahasiswa($nim , $id_ruang){
			$query = "SELECT id_absensi
						FROM absensi, jadwal_mahasiswa
						WHERE jadwal_mahasiswa.id_jadwal_mahasiswa = absensi.id_jadwal_mahasiswa
						AND nim = $nim
						AND id_ruang = $id_ruang
						AND status = 'tidak hadir'
						AND status_kelas = 'buka'" ;
			$hasil = $this->db->query($query);
			return $hasil;
		}

		public function editAbsensi($id_absensi, $status){
			$this->db->update('absensi', $status, "id_absensi = $id_absensi" );
		}
	}
?>