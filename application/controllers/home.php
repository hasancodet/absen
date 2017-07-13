<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	

	//menampilkan presensi mahasiswa secara realtime
	public function index()
	{
		header('Refresh: 10.2');
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url());
		}
		else
		{
			$this->load->model('model_absensi');

			$data['absen'] = $this->model_absensi->absenRealTime();
			
			$this->load->view('template/header', $akun);
			$this->load->view('absen_real_time', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/footer');
		}
	}
	
	//menampilkan daftar jadwal hari ini
	public function JadwalHariIni(){
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url());
		}
		else
		{
			$this->load->model('model_jadwal');
			$this->load->model('model_ruang');
			
			$data['jadwal'] = $this->model_jadwal->tampilJadwalHariIni();
			$data['ruang'] = $this->model_ruang->ruang();
			
			$this->load->view('template/header', $akun);
			$this->load->view('jadwal/jadwal_hari_ini',$data);
			$this->load->view('template/sidebar');
			$this->load->view('template/footer');
		}
	}

	//menampilkan jadwal keseluruhan
	public function jadwal(){
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url());
		}
		else
		{
			$this->load->model('model_jadwal');
			
			$data['jadwal'] = $this->model_jadwal->tampilJadwal();
			
			$this->load->view('template/header', $akun);
			$this->load->view('jadwal/jadwal_kuliah', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/footer');	
		}
	}

	
	
	public function laporan(){
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url());
		}
		else
		{
			$this->load->model('model_jadwal');
			
			$data['jadwal'] = $this->model_jadwal->tampilJadwal();
			
			$this->load->view('template/header', $akun);
			$this->load->view('laporan/laporan', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/footer');	
		}
	}

	
	//menampilkan jadwal kelas beserta daftar mahasiswa yang mengambil mata kuliah tsb
	public function jadwalKelas($id_jadwal, $id_mata_kuliah){
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url());
		}
		else
		{
			$this->load->model('model_jadwal');
			$this->load->model('model_absensi');
			

			$data['jadwal'] = $this->model_jadwal->detailJadwal($id_jadwal);
			$jadwalMahasiswa = $this->model_jadwal->detailJadwalMahasiswa($id_jadwal);
			
			$i = 0;
			foreach ($jadwalMahasiswa->result_array() as $row) {
				$nim = $row['nim'];
				$nama_mahasiswa = $row['nama_mahasiswa'];
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
				$data['presensi'][$i] = array("nim" => $nim, "nama_mahasiswa"=>$nama_mahasiswa,"jumlah_presensi"=> $jumlah_presensi,"jumlah_pertemuan"=> $jumlah_pertemuan, "presentase" => $presentase);
				$i++;

			}
			$this->load->view('template/header', $akun);
			$this->load->view('jadwal/detail_jadwal_kuliah',$data);
			$this->load->view('template/sidebar');
			$this->load->view('template/footer');
		}
	}

	public function absenKelas(){
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url());
		}
		else
		{
			$id_mata_kuliah = $this->input->post('id_mata_kuliah');
			$id_jadwal = $this->input->post('id_jadwal');

			$this->load->model('model_jadwal');
			$this->load->model('model_absensi');
			
			$j = 0;
			$jadwalMahasiswa = $this->model_jadwal->detailJadwalMahasiswa($id_jadwal);
			foreach ($jadwalMahasiswa->result_array() as $row) {
				$i = 0;
				$nim = $row['nim'];
				$nama_mahasiswa = $row['nama_mahasiswa'];
				$statusBerangkat = $this->model_absensi->statusBerangkat($nim, $id_mata_kuliah);
				foreach ($statusBerangkat->result_array() as $row) {
					$tanggal[$i] = $row['tanggal'];
					$status[$i] = $row['status'];
					$i++;
				}
				$data['statusBerangkatMahasiswa'][$j] = array('nim' => $nim , 'nama_mahasiswa' => $nama_mahasiswa,"tanggal" => $tanggal, "status"=> $status );
				$j++;
			}
			$data['tanggal'] = $this->model_absensi->tanggalKuliah($id_mata_kuliah);
			$data['jadwal'] = $this->model_jadwal->detailJadwal($id_jadwal);
			$this->load->view('template/header', $akun);
			$this->load->view('absensi/absensi_kelas', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/footer');

			// print_r($data['statusBerangkatMahasiswa']);
			// die();		
		}
	}
	

	public function laporanKelas($id_mata_kuliah, $id_jadwal){
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url());
		}
		else
		{
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
			
			$this->load->view('template/header', $akun);
			$this->load->view('laporan/laporan_kelas', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/footer');
		}	
	}

	public function ruang(){
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url());
		}
		else
		{
			$this->load->model('model_ruang');
			
			$data['ruang'] = $this->model_ruang->ruang();

			$this->load->view('template/header');
			$this->load->view('ruang/ruang',$data);
			$this->load->view('template/sidebar');
			$this->load->view('template/footer');
		}
	}

	public function login(){
		$this->load->view('login');
	}

	//fungsi coba-coba
	public function jajal()
	{
		

		$this->load->model('model_jajal');
		$data['jajal'] = $this->model_jajal->jajal();
		foreach ($data['jajal']->result_array() as $row) {
			$jajall = $row['id_absensi']." ";
			print_r($jajall);
		}
		die();
		$this->load->view('jajal/jajal',$data);	
	}

}
?>
<!--
	//belum terpakai
	/*
	public function kelas()
	{
		$this->load->view('template/header');
		$this->load->view('datakelas');
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');	
	}
	
	public function detailAbsensi()
	{
		$this->load->model('model_absensi');
		$data = $this->model_absensi->absenkelas();
		$this->load->view('template/header');
		$this->load->view('absensi/absensi_kelas');
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');
	}
	
	public function detailalpro()
	{
		$this->load->view('template/header');
		$this->load->view('jadwal/detail_jadwal_kuliah');
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');	
	}

	public function tambahalat()
	{
		$this->load->view('template/header');
		$this->load->view('pengaturan/tambahalat');
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');	
	}

	public function fingerprint()
	{
		$this->load->view('template/header');
		$this->load->view('fingerprint/listfingerprint');
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');	
	}
	*/



//fungsi yang tidak jadi dipakai
//menampilkan jadwal kuliah , kebutuhannya untuk diedit absensi mahasiswa
	public function jadwalEdit()
	{
		$this->load->model('model_jadwal');
		
		$data['jadwal'] = $this->model_jadwal->tampilJadwal();
		
		$this->load->view('template/header');
		$this->load->view('jadwal/jadwal_edit', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');
	}

	public function absenKelasEdit($id_jadwal, $id_mata_kuliah)
	{

		$this->load->model('model_jadwal');
		$this->load->model('model_absensi');
		
		$i = 0;
		$jadwalMahasiswa = $this->model_jadwal->detailJadwalMahasiswa($id_jadwal);
		foreach ($jadwalMahasiswa->result_array() as $row) {
			$j = 0;
			$nim = $row['nim'];
			$nama_mahasiswa = $row['nama_mahasiswa'];
			$statusBerangkat = $this->model_absensi->statusBerangkat($nim, $id_mata_kuliah);
			foreach ($statusBerangkat->result_array() as $row) {
				$id_absensi[$j] = $row['id_absensi'];
				$tanggal[$j] = $row['tanggal'];
				$status[$j] = $row['status'];
				$j++;
			}
			$data['statusBerangkatMahasiswa'][$i] = array('nim' => $nim , 'nama_mahasiswa' => $nama_mahasiswa,"tanggal" => $tanggal,"id_absensi"=>$id_absensi, "status"=> $status, 'id_mata_kuliah'=>$id_mata_kuliah, 'id_jadwal'=>$id_jadwal );
			$i++;
		}
		$data['tanggal'] = $this->model_absensi->tanggalKuliah($id_mata_kuliah);
		$data['jadwal'] = $this->model_jadwal->detailJadwal($id_jadwal);
				
		$this->load->view('template/header');
		$this->load->view('absensi/absensi_edit', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/footer');

		// print_r($data['statusBerangkatMahasiswa']);
		// die();		
	}
-->