<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function __construct()
		{
			parent::__construct();

			$this->load->model('jadwal');
			$data['jadwal'] = $this->jadwal->tampilJadwal();
			$this->load->view('template/header');
			$this->load->view('jadwal/jadwal_kuliah', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/footer');
		}
} 

?>