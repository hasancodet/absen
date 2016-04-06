<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printt extends CI_Controller {

	public function __construct()
		{
			parent::__construct();

		}

	public function printLaporan($id_jadwal, $id_mata_kuliah){
		// $id_mata_kuliah = $this->input->post('id_mata_kuliah');
		// $id_jadwal = $this->input->post('id_jadwal');

		$this->load->model('model_jadwal');
		$this->load->model('model_absensi');

		$data['jadwal'] = $this->model_jadwal->detailJadwal($id_jadwal);
		$jadwalMahasiswa = $this->model_jadwal->detailJadwalMahasiswa($id_jadwal);

		$j = 0;
		$jadwalMahasiswa = $this->model_jadwal->detailJadwalMahasiswa($id_jadwal);
		foreach ($jadwalMahasiswa->result_array() as $row) {
			$k = 0;
			$nim = $row['nim'];
			$nama_mahasiswa = $row['nama_mahasiswa'];
			$statusBerangkat = $this->model_absensi->statusBerangkat($nim, $id_mata_kuliah);
			foreach ($statusBerangkat->result_array() as $row) {
				$tanggal[$k] = $row['tanggal'];
				$status[$k] = $row['status'];
				$k++;
			}
			$presensi = $this->model_absensi->hitungPresensi($nim,$id_mata_kuliah);
			foreach ($presensi->result_array() as $row) {
				$jumlah_presensi = $row['jumlah_presensi'];
			}
			$pertemuan = $this->model_absensi->hitungPertemuan($nim,$id_mata_kuliah);
			foreach ($pertemuan->result_array() as $row) {
				$jumlah_pertemuan = $row['jumlah_pertemuan'];
			}
			$presentasefloat = ($jumlah_presensi / $jumlah_pertemuan) * 100;
			$presentase = (int)$presentasefloat;
			$data['statusBerangkatMahasiswa'][$j] = array('nim' => $nim , 'nama_mahasiswa' => $nama_mahasiswa,"tanggal" => $tanggal, "status"=> $status, "jumlah_presensi"=>$jumlah_presensi, "jumlah_pertemuan"=>$jumlah_pertemuan,"presentase"=>$presentase );
			$j++;
		}
		$data['tanggal'] = $this->model_absensi->tanggalKuliah($id_mata_kuliah);
		
		$this->load->view('print/print_laporan', $data);
	}
} 

?>