<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
		}

	public function isiAbsensi(){
		$tanggal = date('Y-n-j');
		$this->load->model('model_absensi');
		$dataabsensi = $this->model_absensi->ambilJadwalAbsensi();
		
		foreach ($dataabsensi->result_array() as $row) {
			$data = array(
	       				'id_absensi' => '',
				        'id_jadwal_mahasiswa' => $row['id_jadwal_mahasiswa'],
				        'tanggal' => $tanggal,
				        'jam' => '',
				        'status' => 'tidak hadir'
				        );

			$this->db->insert('absensi', $data);
		}
	redirect(base_url().'home/index');
	}

	public function bukaKelas(){
		$id_jadwal = $this->input->post('id_jadwal');
		$id_ruang = $this->input->post('id_ruang');
		
		$this->load->model('model_absensi');
		$jadwal = $this->model_absensi->lihatJadwal($id_jadwal);
		$tanggal = date('Y-n-j');
		foreach ($jadwal->result_array() as $row) {
			$data = array(
						'id_absensi' => '',
						'tanggal' => $tanggal, 
						'id_jadwal_mahasiswa' => $row['id_jadwal_mahasiswa'],
						'id_ruang' => $id_ruang,
						'status' => 'tidak hadir'
				);
			$this->db->insert('absensi', $data);
		}
		redirect(base_url().'home/jadwalHariIni');
	}
	public function tutupKelas(){
		$id_jadwal = $this->input->post('id_jadwal');
		//$id_ruang = $this->input->post('id_ruang');

		$this->load->model('model_absensi');
		$jadwal = $this->model_absensi->lihatJadwal($id_jadwal);
		foreach ($jadwal->result_array() as $row) {
			$this->db->delete('jadwal_hari_ini', array('id_jadwal_mahasiswa' => $row['id_jadwal_mahasiswa'])); 
		}
		redirect(base_url().'home/jadwalHariIni');
	}

	public function absenMahasiswa(){
		$nim = $this->input->post('nim');
		$id_ruang = $this->input->post('id_ruang');

		$this->load->model('model_absensi');
		$absen = $this->model_absensi->absenMahasiswa($nim , $id_ruang);

		foreach ($absen->result_array() as $row) {
			$data = array(
						// 'id_jadwal_hari_ini' => '',
						// 'id_jadwal_mahasiswa' => $row['id_jadwal_mahasiswa'],
						// 'id_ruang' => $id_ruang,
						'status' => '1' 
						);
			// $this->db->update('absensi', $status, "id_absensi = $id_absensi" );
			$id_jadwal_mahasiswa = $row['id_jadwal_mahasiswa'];
			$this->db->update('jadwal_hari_ini', $data , "id_jadwal_mahasiswa = $id_jadwal_mahasiswa");
		}
		redirect(base_url().'ortu/absensiMahasiswa');
	}
} 

?>


<!--
fungsi yang tidak jadi dipakai
public function editAbsensi(){
		$id_absensi = $this->input->post('id_absensi');
		$id_jadwal = $this->input->post('id_jadwal');
		$id_mata_kuliah = $this->input->post('id_mata_kuliah');
		$statusi = $this->input->post('status');
		$status  = array('status' => $statusi );
		$this->load->model('model_absensi');
		$this->model_absensi->editAbsensi($id_absensi,$status);

		redirect(base_url().'home/absenKelasEdit/'.$id_jadwal.'/'.$id_mata_kuliah);
	}
-->

<!-- 
public function isiAbsensiAkeh()
	{
		$tanggal = date('Y-n-j',strtotime('2015-7-10'));


		$this->load->model('model_absensi');
		$dataabsensi = $this->model_absensi->ambilJadwalAbsensiAkeh($tanggal);
		foreach ($dataabsensi->result() as $row) {
			$data = array(
	       				'id_absensi' => '',
				        'id_jadwal_mahasiswa' => $row->id_jadwal_mahasiswa,
				        'tanggal' => $tanggal,
				        'jam' => '',
				        'status' => 'alfa'
				        );
		$this->db->insert('absensi', $data);
		}

		$tanggal = date('Y-n-j', strtotime($tanggal.'+1 week'));
		$this->load->model('model_absensi');
		$dataabsensi = $this->model_absensi->ambilJadwalAbsensiAkeh($tanggal);
		foreach ($dataabsensi->result() as $row) {
			$data = array(
	       				'id_absensi' => '',
				        'id_jadwal_mahasiswa' => $row->id_jadwal_mahasiswa,
				        'tanggal' => $tanggal,
				        'jam' => '',
				        'status' => 'alfa'
				        );
		$this->db->insert('absensi', $data);
		}

		$tanggal = date('Y-n-j', strtotime($tanggal.'+1 week'));
		$this->load->model('model_absensi');
		$dataabsensi = $this->model_absensi->ambilJadwalAbsensiAkeh($tanggal);
		foreach ($dataabsensi->result() as $row) {
			$data = array(
	       				'id_absensi' => '',
				        'id_jadwal_mahasiswa' => $row->id_jadwal_mahasiswa,
				        'tanggal' => $tanggal,
				        'jam' => '',
				        'status' => 'alfa'
				        );
		$this->db->insert('absensi', $data);
		}
		$tanggal = date('Y-n-j', strtotime($tanggal.'+1 week'));
		$this->load->model('model_absensi');
		$dataabsensi = $this->model_absensi->ambilJadwalAbsensiAkeh($tanggal);
		foreach ($dataabsensi->result() as $row) {
			$data = array(
	       				'id_absensi' => '',
				        'id_jadwal_mahasiswa' => $row->id_jadwal_mahasiswa,
				        'tanggal' => $tanggal,
				        'jam' => '',
				        'status' => 'alfa'
				        );
		$this->db->insert('absensi', $data);
		}
		$tanggal = date('Y-n-j', strtotime($tanggal.'+1 week'));
		$this->load->model('model_absensi');
		$dataabsensi = $this->model_absensi->ambilJadwalAbsensiAkeh($tanggal);
		foreach ($dataabsensi->result() as $row) {
			$data = array(
	       				'id_absensi' => '',
				        'id_jadwal_mahasiswa' => $row->id_jadwal_mahasiswa,
				        'tanggal' => $tanggal,
				        'jam' => '',
				        'status' => 'alfa'
				        );
		$this->db->insert('absensi', $data);
		}
		$tanggal = date('Y-n-j', strtotime($tanggal.'+1 week'));
		$this->load->model('model_absensi');
		$dataabsensi = $this->model_absensi->ambilJadwalAbsensiAkeh($tanggal);
		foreach ($dataabsensi->result() as $row) {
			$data = array(
	       				'id_absensi' => '',
				        'id_jadwal_mahasiswa' => $row->id_jadwal_mahasiswa,
				        'tanggal' => $tanggal,
				        'jam' => '',
				        'status' => 'alfa'
				        );
		$this->db->insert('absensi', $data);
		}
		$tanggal = date('Y-n-j', strtotime($tanggal.'+1 week'));
		$this->load->model('model_absensi');
		$dataabsensi = $this->model_absensi->ambilJadwalAbsensiAkeh($tanggal);
		foreach ($dataabsensi->result() as $row) {
			$data = array(
	       				'id_absensi' => '',
				        'id_jadwal_mahasiswa' => $row->id_jadwal_mahasiswa,
				        'tanggal' => $tanggal,
				        'jam' => '',
				        'status' => 'alfa'
				        );
		$this->db->insert('absensi', $data);
		}
		$tanggal = date('Y-n-j', strtotime($tanggal.'+1 week'));
		$this->load->model('model_absensi');
		$dataabsensi = $this->model_absensi->ambilJadwalAbsensiAkeh($tanggal);
		foreach ($dataabsensi->result() as $row) {
			$data = array(
	       				'id_absensi' => '',
				        'id_jadwal_mahasiswa' => $row->id_jadwal_mahasiswa,
				        'tanggal' => $tanggal,
				        'jam' => '',
				        'status' => 'alfa'
				        );
		$this->db->insert('absensi', $data);
		}
		$tanggal = date('Y-n-j', strtotime($tanggal.'+1 week'));
		$this->load->model('model_absensi');
		$dataabsensi = $this->model_absensi->ambilJadwalAbsensiAkeh($tanggal);
		foreach ($dataabsensi->result() as $row) {
			$data = array(
	       				'id_absensi' => '',
				        'id_jadwal_mahasiswa' => $row->id_jadwal_mahasiswa,
				        'tanggal' => $tanggal,
				        'jam' => '',
				        'status' => 'alfa'
				        );
		$this->db->insert('absensi', $data);
		}
		$tanggal = date('Y-n-j', strtotime($tanggal.'+1 week'));
		$this->load->model('model_absensi');
		$dataabsensi = $this->model_absensi->ambilJadwalAbsensiAkeh($tanggal);
		foreach ($dataabsensi->result() as $row) {
			$data = array(
	       				'id_absensi' => '',
				        'id_jadwal_mahasiswa' => $row->id_jadwal_mahasiswa,
				        'tanggal' => $tanggal,
				        'jam' => '',
				        'status' => 'alfa'
				        );
		$this->db->insert('absensi', $data);
		}
		$tanggal = date('Y-n-j', strtotime($tanggal.'+1 week'));
		$this->load->model('model_absensi');
		$dataabsensi = $this->model_absensi->ambilJadwalAbsensiAkeh($tanggal);
		foreach ($dataabsensi->result() as $row) {
			$data = array(
	       				'id_absensi' => '',
				        'id_jadwal_mahasiswa' => $row->id_jadwal_mahasiswa,
				        'tanggal' => $tanggal,
				        'jam' => '',
				        'status' => 'alfa'
				        );
		$this->db->insert('absensi', $data);
		}
		$tanggal = date('Y-n-j', strtotime($tanggal.'+1 week'));
		$this->load->model('model_absensi');
		$dataabsensi = $this->model_absensi->ambilJadwalAbsensiAkeh($tanggal);
		foreach ($dataabsensi->result() as $row) {
			$data = array(
	       				'id_absensi' => '',
				        'id_jadwal_mahasiswa' => $row->id_jadwal_mahasiswa,
				        'tanggal' => $tanggal,
				        'jam' => '',
				        'status' => 'alfa'
				        );
		$this->db->insert('absensi', $data);
		}

	} 
-->