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
	redirect(base_url().'index.php/home/index');
	}

	public function absenjajal(){
		redirect(base_url().'index.php/home/index');
	}


	
} 

?>

<?php
/*
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
*/
?>

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

	} -->