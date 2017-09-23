<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			date_default_timezone_set('Asia/Jakarta');
		}

	public function reload(){
		header('Refresh:10');
		$hasil = $this->db->query("SELECT DISTINCT ip_address
									FROM absensi, ruang
									WHERE absensi.id_ruang = ruang.id_ruang
									AND absensi.status_kelas = 'buka'");
		if($hasil->num_rows() == 0){
			$this->load->view('jajal/jajal', $ini);

		}else{
			$this->load->library('fingerprint');
			foreach ($hasil->result_array() as $row){
				$ip_address = $row['ip_address'];
				//$this->fingerprint->tarikDataa($ip_address);
					$xml = simplexml_load_file("http://$ip_address:8080/fp/daftar_absen.xml");	 
					// $xml = simplexml_load_file('http://localhost/fp/daftar_absen.xml');
					// $this->load->view('jajal/jajal', $xml);
					$list = $xml->xpath('row');
					if (count($list)==0){
						// echo count($list);
						// print_r($xml);

						// $this->load->view('jajal/jajal');
						// redirect('absensi/tarikData');
					}else{
						$link=array();

						foreach($xml->children() as $child){  
							$id = $child->id;
							$nim = $child->PIN;
							$waktu = $child->waktu;
							$tanggal = $child->tanggal;
							$query = $this->db->query("SELECT id_absensi FROM absensi, jadwal_mahasiswa WHERE jadwal_mahasiswa.id_jadwal_mahasiswa = absensi.id_jadwal_mahasiswa AND jadwal_mahasiswa.nim = $nim  AND absensi.jam is null AND status_kelas='buka'");
					    	foreach ($query->result_array() as $row) {
					    		$id_absensi = $row['id_absensi'];
					    		$data = array(	'status' =>'hadir' ,
					    						'jam'=>$waktu );
					    		$this->db->update('absensi', $data,"id_absensi='$id_absensi'");
					    	}
					    	// array_push(array, var)
					    	$ii =(integer) $id;
					    	array_push($link, $ii);
					    	// $link = $link."id[]=".$id."&";
						}
						// require('http://localhost/fp/delete.php?'.$link);
					    // require_once(APPPATH.'libraries/fingerprint.php');
						$this->fingerprint->delete($link, $ip_address);
						// print_r($link);
					}
			}
		}
	}
	public function tarikData(){
		header('Refresh:5');
		$this->load->library('fingerprint');
		$xml = simplexml_load_file("http://192.168.101.11:8080/fp/daftar_absen.xml");	 
		// $xml = simplexml_load_file('http://localhost/fp/daftar_absen.xml');
		// $this->load->view('jajal/jajal', $xml);
		$list = $xml->xpath('row');
		if (count($list)==0){
			// echo count($list);
			// print_r($xml);

			$this->load->view('jajal/jajal');
			// redirect('absensi/tarikData');
		}else{
			$link=array();

			foreach($xml->children() as $child){  
				$id = $child->id;
				$nim = $child->PIN;
				$waktu = $child->waktu;
				$tanggal = $child->tanggal;
				$query = $this->db->query("SELECT id_absensi FROM absensi, jadwal_mahasiswa WHERE jadwal_mahasiswa.id_jadwal_mahasiswa = absensi.id_jadwal_mahasiswa AND jadwal_mahasiswa.nim = $nim  AND absensi.jam is null AND status_kelas='buka'");
		    	foreach ($query->result_array() as $row) {
		    		$id_absensi = $row['id_absensi'];
		    		$data = array(	'status' =>'hadir' ,
		    						'jam'=>$waktu );
		    		$this->db->update('absensi', $data,"id_absensi='$id_absensi'");
		    	}
		    	// array_push(array, var)
		    	$ii =(integer) $id;
		    	array_push($link, $ii);
		    	// $link = $link."id[]=".$id."&";
			}
			// require('http://localhost/fp/delete.php?'.$link);
		    // require_once(APPPATH.'libraries/fingerprint.php');
			$this->fingerprint->delete($link, $ip_address);
			// print_r($link);
		}	
			// if ($tes == 'relod') {
		
			// }
			// elseif($tes=='tes'){
			// 	redirect(base_url().'Absensi/reload');
			// }
		// redirect(base_url().'Absensi/tarikData');
	}
	public function hapusData($id_array, $ip_address){
		$link = "";
		foreach ($id_array as $data_hapus) {
			$link = $link."id[]=".$data_hapus."&";
		}
		// redirect('http://'.$ip_address.":8080/fp/delete.php?".$link);
		redirect('http://'.$ip_address.':8080/fp/delete.php?'.$link);
		// redirect(base_url().'Absensi/tarikData');
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
		date_default_timezone_set('Asia/Jakarta');
		$id_jadwal = $this->input->post('id_jadwal');
		$id_ruang = $this->input->post('id_ruang');
		
		$this->db->where('id_ruang', $id_ruang);
		$this->db->where('status_kelas', 'buka');
		$hasil =$this->db->get('absensi');
		if ($hasil->num_rows()>0) {
			$this->session->set_flashdata('message_name', "<p style='color:white' class='alert alert-danger alert-dismissable'>Ruang masih dipakai<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button></p>");
		}else{

			$this->load->model('model_absensi');
			$jadwal = $this->model_absensi->lihatJadwal($id_jadwal);
			$tanggal = date('Y-n-j');
			foreach ($jadwal->result_array() as $row) {
				$data = array(
							'id_absensi' => '',
							'tanggal' => $tanggal, 
							'id_jadwal_mahasiswa' => $row['id_jadwal_mahasiswa'],
							'id_ruang' => $id_ruang,
							'status' => 'tidak hadir',
							'jam'=> null,
							'status_kelas'=>'buka'
					);
				$this->db->insert('absensi', $data);
			}
		}
		redirect(base_url().'home/jadwalHariIni');
	}
	public function tutupKelas(){
		date_default_timezone_set('Asia/Jakarta');
		$id_jadwal = $this->input->post('id_jadwal');
		$id_ruang = $this->input->post('id_ruang');

 		$this->load->model('model_absensi');
		$jadwal = $this->model_absensi->lihatJadwalTutup($id_jadwal);
		$data = array('status_kelas' =>'tutup');
		foreach ($jadwal->result_array() as $row) {
			$this->db->where('id_absensi', $row['id_absensi']);
			$this->db->update('absensi',$data); 
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
	public function jajal()
	{
		// header('Refresh:2');
		// if(1==1){
		// $this->tarikData();
		// $this->load->view('jajal/jajal');
$this->load->view('template/header');
			// $this->load->view('template/footer');
			
		// }else{

		// }
	}
// public function tarikData(){
	// 	$IP  ="192.168.1.201";
	// 	$id  = "All";
	// 	$key = 0;
	// 	$Connect = fsockopen($IP, "80", $errno, $errstr, 1);
	// 	if($Connect){
	// 		$soap_request="<GetAttLog><ArgComKey xsi:type=\'xsd:integer\'>".$Key."</ArgComKey><Arg><PIN xsi:type=\'xsd:integer\'>".$id."</PIN></Arg></GetAttLog>";
	// 		$newLine="\r\n";
	// 		fputs($Connect, "POST /iWsService HTTP/1.0".$newLine);
	// 	    fputs($Connect, "Content-Type: text/xml".$newLine);
	// 	    fputs($Connect, "Content-Length: ".strlen($soap_request).$newLine.$newLine);
	// 	    fputs($Connect, $soap_request.$newLine);
	// 		$buffer="";
	// 		while($Response=fgets($Connect, 1024)){
	// 			$buffer=$buffer.$Response;
	// 		}
	// 	}else echo "Koneksi Gagal";

	// 	include(" parse.php");
	// 	$buffer=Parse_Data($buffer,"<GetAttLogResponse>","</GetAttLogResponse>");
	// 	$buffer=explode("\r\n",$buffer);
	// 	for($a=0;$a<count($buffer);$a++){
	// 		$data=Parse_Data($buffer[$a],"<Row>","</Row>");
	// 		$PIN=Parse_Data($data,"<PIN>","</PIN>");
	// 		$DateTime=Parse_Data($data,"<DateTime>","</DateTime>");
	// 		$Verified=Parse_Data($data,"<Verified>","</Verified>");
	// 		$Status=Parse_Data($data,"<Status>","</Status>");
	// 		$info[$a] = array('PIN'=>$PIN , 'DateTime'=> $DateTime, 'Verified'=>$Verified, 'Status'=>$Status );
	// 	}
	// } 
	
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
