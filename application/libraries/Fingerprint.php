<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fingerprint {

        public function __construct()
        {
                // Do something with $params
        }
        public function tarikDataa($ip_address){
                $xml = simplexml_load_file("http://$ip_address:8080/fp/daftar_absen.xml");
                // $xml = simplexml_load_file("http://$ip_address:8080/fp/daftar_absen.xml");
                // $this->load->view('jajal/jajal', $xml);
                // die();
                $list = $xml->xpath('row');
                if ($list->num_rows ==0){
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
                                        $data = array(  'status' =>'hadir' ,
                                                        'jam'=>$waktu );
                                $this->db->update('absensi', $data,"id_absensi='$id_absensi'");
                                }
                        // array_push(array, var)
                        $ii =(integer) $id;
                        array_push($link, $ii);
                        // $link = $link."id[]=".$id."&";
                        }
                        $this->delete($link, $ip_address);
                        // print_r($link);
                }       
                        // if ($tes == 'relod') {
                
                        // }
                        // elseif($tes=='tes'){
                        //      redirect(base_url().'Absensi/reload');
                        // }
                // redirect(base_url().'Absensi/tarikData');
        }
        public function delete($link, $ip_address){
        	// echo "absensi->tarikdata->fingerprint->delete <br>";
        	// print_r($link);
                // echo "<br>";
        	// echo ($link[2]);
        	// end();
        	$curl = curl_init();
        	curl_setopt($curl, CURLOPT_URL,"http://$ip_address:8080/fp/delete.php");
                // curl_setopt($curl, CURLOPT_URL,"http://localhost/fp/delete.php");
                curl_setopt($curl, CURLOPT_POST, true); 
                curl_setopt($curl, CURLOPT_POSTFIELDS, $link);
        	curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        	$result = curl_exec($curl);
        	curl_close($curl);
        	echo $result;
        	// header("location:http://localhost/fp/delete.php?.'$link'");
        	// $this->load->view('jajal/jajal',$link)
        	// redirect('http://localhost/fp/delete.php?'.$link);
        	// require('c:\xampp\htdocs\fp\delete.php?'.$link);
        	
        }
}