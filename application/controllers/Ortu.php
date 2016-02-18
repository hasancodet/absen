<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ortu extends CI_Controller {

	public function index(){
		$this->load->view('ortu/input_ortu');
	}
	public function tampilAbsensi(){
		$nim = $this->input->post('nim');
		//$nim ="331";
		$this->load->model('model_ortu');
		$i=0;
		$jadwalMahasiswa = $this->model_ortu->tampilJadwal($nim);
		foreach ($jadwalMahasiswa->result_array() as $row) {
			$j = 0;
			$nama_mahasiswa = $row['nama_mahasiswa'];
			$id_mata_kuliah = $row['id_mata_kuliah'];
			$mata_kuliah = $row['mata_kuliah'];
			$statusAbsensi = $this->model_ortu->tampilAbsensi($nim, $id_mata_kuliah);
			foreach ($statusAbsensi->result_array() as $row) {
				$tanggal[$j] = $row['tanggal'];
				$status[$j] = $row['status'];
				$j++;
			}
			$data['absensiMahasiswa'][$i] = array('nama_mahasiswa'=>$nama_mahasiswa, 'id_mata_kuliah' => $id_mata_kuliah , 'mata_kuliah'=> $mata_kuliah,'tanggal'=> $tanggal, 'status'=>$status );
			$i++;
		}
		$this->load->view('ortu/ortu', $data);
	}
}
?>