<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends CI_Controller {

	public function __construct()
		{
			parent::__construct();

			// $this->load->model('jadwal');
			// $data['jadwal'] = $this->jadwal->tampilJadwal();
			// $this->load->view('template/header');
			// $this->load->view('jadwal/jadwal_kuliah', $data);
			// $this->load->view('template/sidebar');
			// $this->load->view('template/footer');
		}
	public function editRuang(){
		$id_ruang = $this->input->post('id_ruang');
		$nama_ruang = $this->input->post('nama_ruang');
		$ip_address = $this->input->post('ip_address');

		$ruang = array('ip_address' => $ip_address, 'nama_ruang'=>$nama_ruang);

		$this->load->model('model_ruang');
		$this->model_ruang->editRuang($ruang, $id_ruang);

		redirect(base_url().'home/ruang');
	}

	public function tambahRuang(){
			$ruang = $this->input->post('nama_ruang');
			$ip_address = $this->input->post('ip_address');
			$data = array(
  		    	'nama_ruang' => $ruang,
        		'ip_address' => $ip_address
			);
			$this->db->insert('ruang', $data);
		}
} 

?>