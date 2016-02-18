<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

	public function login()
		{

			$this->load->model('model_login');

			$username = $this->input->post('username');
			$password = $this->input->post('password');

				$this->model_login->cek_user($username, $password);
				$akun = $this->session->userdata('akun');

				if($akun['login']==TRUE){
					redirect(base_url().'home/index');
				}
				else{
					redirect(base_url().'home/login');
				}
			}
	public function logout()
	{
		$this->session->unset_userdata(array('username'=>'','login'=>FALSE));
    	$this->session->sess_destroy();
    	$this->load->view('login');
	}
} 

?>



