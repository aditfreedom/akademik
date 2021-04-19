<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	// function __construct(){
    //     parent::__construct();
	// 	$role=$this->session->userdata('role');

	// 	$datauser = $this->session->userdata('login'); 
	// 	if (empty($datauser)){
	// 		redirect(base_url('hal/login'));
	// 	}
	// 	if ($role==1){
	// 		redirect(base_url('user'));
	// 	}
	// }

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('M_akademik');
		$sess_data = $this->session->userdata();
		// $data['pensd'] = $this->M_akademik->tampilpensd()->result();
		$data['tbl_dosen'] = $this->M_akademik->hitung_data_all('tbl_dosen');
		$data['tbl_mahasiswa'] = $this->M_akademik->hitung_data_all('tbl_mahasiswa');
		$data['tbl_kelas'] = $this->M_akademik->hitung_data_all('tbl_kelas');
		$data['tbl_ruangan'] = $this->M_akademik->hitung_data_all('tbl_ruangan');
		$data['tbl_matakuliah'] = $this->M_akademik->hitung_data_all('tbl_matakuliah');
		$data['tbl_user'] = $this->M_akademik->hitung_data_all('tbl_user');


		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('dashboard',$data);
		$this->load->view('template/footer');


	}

	// public function registrasi()
	// {
	// 	$this->load->view('registrasi');
	// }

	// public function login()
	// {
	// 	$this->load->model('M_akademik');
	// 	$this->load->view('login');	
	// }

	// public function dashboard()
	// {
	// 	$this->load->view('template/header');
	// 	$this->load->view('template/sidebar');
	// 	$this->load->view('dashboard');
	// 	$this->load->view('template/footer');
	// }
	
	public function dosen()
	{
		$data['dosen'] = $this->M_akademik->tampil_data_dosen()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$sess_data);
		$this->load->view('dosen',$data);
		$this->load->view('template/footer');
	}

	public function jadwal_kuliah()
	{
		$data['jadwal'] = $this->M_akademik->tampil_jadwal_mk()->result();
		$data['jadwal2'] = $this->M_akademik->tampil_data_dosen()->result();
		$data['jadwal3'] = $this->M_akademik->tampil_matakuliah()->result();
		$data['jadwal4'] = $this->M_akademik->tampil_kelas()->result();
		$data['jadwal5'] = $this->M_akademik->tampil_letak_id()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('jadwalkuliah',$data);
		$this->load->view('template/footer');
	}


	public function tambahdosen(){
		$nama_lengkap          = $this->input->post('nama_lengkap');
		$nip			       = $this->input->post('nip');
		$jabatan			   = $this->input->post('jabatan');
		$jenis_kelamin		   = $this->input->post('jenis_kelamin');
		$alamat				   = $this->input->post('alamat');


	   
		$data = array(
			'nama_lengkap' => $nama_lengkap,
			'nip' => $nip,
			'jabatan' => $jabatan,
			'jenis_kelamin' => $jenis_kelamin,
			'alamat' => $alamat


		);
	
		$this->M_akademik->tambahdosen($data,'tbl_dosen');
		redirect(base_url('home/dosen'));
	}

	public function hapusdosen($id){
		$id =    array ('id_dosen' => $id);
		$this->M_akademik->hapusdosen($id,'tbl_dosen');
		redirect(base_url('home/dosen'));
	}

	public function hapuskelas($id){
		$id =    array ('id_kelas' => $id);
		$this->M_akademik->hapuskelas($id,'tbl_kelas');
		redirect(base_url('home/kelas'));
	}

	public function hapusruangan($id){
		$id =    array ('id_ruang' => $id);
		$this->M_akademik->hapusruangan($id,'tbl_ruangan');
		redirect(base_url('home/ruangan'));
	}

	public function editdosen($id){
		$sess_data = $this->session->userdata();
		$id_dosen =    array ('id_dosen' => $id);
		$data['datadosen'] = $this->M_akademik->editdosen($id,'tbl_dosen')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('editdosen',$data);
		$this->load->view('template/footer');
	}

	public function editletakruangan($id){
		$sess_data = $this->session->userdata();
		$id_mahasiswa =    array ('id_letak_ruangan' => $id);
		$data['letakruangan'] = $this->M_akademik->editletakruangan($id,'tbl_letak_ruangan')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('editletakruangan',$data);
		$this->load->view('template/footer');
	}

	public function editkelas($id){
		$sess_data = $this->session->userdata();
		$id_kelas =    array ('id_kelas' => $id);
		$data['kelas'] = $this->M_akademik->editkelas($id,'tbl_kelas')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('editkelas',$data);
		$this->load->view('template/footer');
	}

	public function editruangan($id){
		$sess_data = $this->session->userdata();
		$id_ruangan =    array ('id_ruangan' => $id);
		$data['ruangan2'] = $this->M_akademik->tampil_letakruangan()->result();
		$data['ruangan'] = $this->M_akademik->editruangan($id,'tbl_ruangan')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('editruangan',$data);
		$this->load->view('template/footer');
	}

	public function editmatakuliah($id){
		$sess_data = $this->session->userdata();
		$id_mk =    array ('id_matakuliah' => $id);
		$data['datamatakuliah'] = $this->M_akademik->editmatakuliah($id,'tbl_matakuliah')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('editmatakuliah',$data);
		$this->load->view('template/footer');
	}

	public function editmahasiswa($id){
		$sess_data = $this->session->userdata();
		$id_mahasiswa =    array ('id_detail_user' => $id);
		$data['datamahasiswa'] = $this->M_akademik->editmahasiswa($id,'tbl_mahasiswa')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('editmahasiswa',$data);
		$this->load->view('template/footer');
	}

	public function updatedosen(){
		$id_dosen       = $this->input->post('id_dosen');
		$nama_lengkap          = $this->input->post('nama_lengkap');
		$nip			       = $this->input->post('nip');
		$jabatan			   = $this->input->post('jabatan');
		$jenis_kelamin		   = $this->input->post('jenis_kelamin');
		$alamat				   = $this->input->post('alamat');

	
		$data = array(
			'nama_lengkap' => $nama_lengkap,
			'nip' => $nip,
			'jabatan' => $jabatan,
			'jenis_kelamin' => $jenis_kelamin,
			'alamat' => $alamat
		);
	
		$where = array(
			'id_dosen' => $id_dosen
		);
	
		$this->M_akademik->updatedosen($where,$data,'tbl_dosen');
		$this->load->view('berhasil_ubah');
		$this->load->view('dosen');
	}

	public function mahasiswa()
	{
		$data['mahasiswa'] = $this->M_akademik->tampil_mahasiswa()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('mahasiswa',$data);
		$this->load->view('template/footer');
	}

	public function tambahmahasiswa(){
		$nama_lengkap          = $this->input->post('nama_lengkap');
		$nim			       = $this->input->post('nim');
		$alamat			   	   = $this->input->post('alamat');
		$tempat_lahir		   = $this->input->post('tempat_lahir');
		$tanggal_lahir		   = $this->input->post('tanggal_lahir');
		$jenis_kelamin		   = $this->input->post('jenis_kelamin');

	   
		$data = array(
			'nama_lengkap' => $nama_lengkap,
			'nim' => $nim,
			'alamat' => $alamat,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin
		);
	
		$this->M_akademik->tambahmahasiswa($data,'tbl_mahasiswa');
		redirect(base_url('home/mahasiswa'));
	}

	public function updatemahasiswa(){
		$id_detail_user			   = $this->input->post('id_detail_user');
		$nama_lengkap          = $this->input->post('nama_lengkap');
		$nim			       = $this->input->post('nim');
		$alamat			   	   = $this->input->post('alamat');
		$tempat_lahir		   = $this->input->post('tempat_lahir');
		$tanggal_lahir		   = $this->input->post('tanggal_lahir');
		$jenis_kelamin		   = $this->input->post('jenis_kelamin');
	
		$data = array(
			'nama_lengkap' => $nama_lengkap,
			'nim' => $nim,
			'alamat' => $alamat,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin
		);
	
		$where = array(
			'id_detail_user' => $id_detail_user
		);
	
		$this->M_akademik->updatemahasiswa($where,$data,'tbl_mahasiswa');
		$this->load->view('berhasil_ubah_mahasiswa');
		$this->load->view('mahasiswa');
	}

	public function hapusmahasiswa($id){
		$id =    array ('id_detail_user' => $id);
		$this->M_akademik->hapusmahasiswa($id,'tbl_mahasiswa');
		redirect(base_url('home/mahasiswa'));
	}


	public function tambahmatakuliah(){
		$nama_matakuliah          = $this->input->post('nama_matakuliah');
		$keterangan			      = $this->input->post('keterangan');
		
	   
		$data = array(
			'nama_matakuliah' => $nama_matakuliah,
			'keterangan' => $keterangan
		);
	
		$this->M_akademik->tambahmatakuliah($data,'tbl_matakuliah');
		redirect(base_url('home/matakuliah'));
	}

	public function updatematakuliah(){
		$id_matakuliah 	       = $this->input->post('id_matakuliah');
		$nama_matakuliah       = $this->input->post('nama_matakuliah');
		$keterangan			   = $this->input->post('keterangan');

	
		$data = array(
			'nama_matakuliah' => $nama_matakuliah,
			'keterangan' => $keterangan
		);
	
		$where = array(
			'id_matakuliah' => $id_matakuliah
		);
	
		$this->M_akademik->updatematakuliah($where,$data,'tbl_dosen');
		$this->load->view('berhasil_ubah_mk');
		$this->load->view('matakuliah');
	}

	public function hapusmatakuliah($id){
		$id =    array ('id_matakuliah' => $id);
		$this->M_akademik->hapusmatakuliah($id,'tbl_mahasiswa');
		redirect(base_url('home/matakuliah'));
	}

	public function updateletakruangan(){
		$id_letak_ruangan 	       = $this->input->post('id_letak_ruangan');
		$nama_letak_ruangan       = $this->input->post('nama_letak_ruangan');

	
		$data = array(
			'nama_letak_ruangan' => $nama_letak_ruangan,
		);
	
		$where = array(
			'id_letak_ruangan' => $id_letak_ruangan
		);
	
		$this->M_akademik->updateletakruangan($where,$data,'tbl_dosen');
		$this->load->view('berhasil_ubah_lt');
		$this->load->view('letakruangan');
	}

	public function updatekelas(){
		$id_kelas 	       = $this->input->post('id_kelas');
		$nama_kelas       = $this->input->post('nama_kelas');

	
		$data = array(
			'nama_kelas' => $nama_kelas,
		);
	
		$where = array(
			'id_kelas' => $id_kelas
		);
	
		$this->M_akademik->updatekelas($where,$data,'tbl_kelas');
		$this->load->view('berhasil_ubah_kl');
		$this->load->view('kelas');
	}

	public function updateruangan(){
		$id_ruang 	       = $this->input->post('id_ruang');
		$nama_ruang       = $this->input->post('nama_ruang');
		$id_letak_ruangan       = $this->input->post('id_letak_ruangan');


	
		$data = array(
			'nama_ruang' => $nama_ruang,
			'id_letak_ruangan' => $id_letak_ruangan,

		);
	
		$where = array(
			'id_ruang' => $id_ruang
		);
	
		$this->M_akademik->updateruangan($where,$data,'tbl_ruangan');
		$this->load->view('berhasil_ubah_rm');
		$this->load->view('ruangan');
	}

	public function ruangan()
	{
		$data['ruangan2'] = $this->M_akademik->tampil_letakruangan()->result();
		$data['ruangan'] = $this->M_akademik->tampil_letak_id()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('ruangan',$data);
		$this->load->view('template/footer');
	}

	public function cetak_kartu($id){
		$sess_data = $this->session->userdata();
		$id =    array ('id' => $id);
		$data['cetak_kartu'] = $this->M_akademik->tampilpengguna($id,'pengguna')->result();   
		$data2 = $this->M_akademik->tampilpengguna($id,'pengguna')->result();   

                $this->load->view('template/header');
                $this->load->view('template/sidebar',$sess_data);
                $this->load->view('cetak_kartu2',$data);
                $this->load->view('template/footer');

        }

	

	public function editapproval($id){
		$sess_data = $this->session->userdata();
		$id =    array ('id' => $id);
		$data['approval'] = $this->M_akademik->tampilpengguna($id,'pengguna')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$sess_data);
		$this->load->view('editapproval',$data);
		$this->load->view('template/footer');
	}

	public function updateapproval(){
		$id                = $this->input->post('id');
        $nama              = $this->input->post('nama');
        $tptlahir              = $this->input->post('tptlahir');
        $tgllahir              = $this->input->post('tgllahir');
        $jenis             = $this->input->post('jenis');
        $nisn              = $this->input->post('nisn');
        $alamat            = $this->input->post('alamat');
        $sekolah_asal      = $this->input->post('sekolah_asal');
        $namaayah              = $this->input->post('namaayah');
        $namaibu              = $this->input->post('namaibu');
        $no_wa              = $this->input->post('no_wa');
        $akte          = $this->input->post('akte');
        $no_hp             = $this->input->post('no_hp');
        $foto             = $this->input->post('foto');
        $bukti_tf          = $this->input->post('bukti_tf');
        $username          = $this->input->post('username');
        $password          = $this->input->post('password');
        $role              = $this->input->post('role');
        $approve_formulir       = $this->input->post('approve_formulir');
        $approve_lulus          = $this->input->post('approve_lulus');
        $approve_daftarulang    = $this->input->post('approve_daftarulang');


	
		$data = array(
			'nama_lengkap' => $nama,
            'tptlahir' => $tptlahir,
            'tgllahir' => $tgllahir,
            'namaayah' => $namaayah,
            'namaibu' => $namaibu,
            'no_wa' => $no_wa,
            'akte' => $akte,
            'jenis' => $jenis,
            'nisn' => $nisn,
            'alamat' =>$alamat,
            'sekolah_asal' =>$sekolah_asal,
            'no_hp' =>$no_hp,
            'foto' =>$foto,
            'bukti_tf' =>$bukti_tf,
            'username' =>$username,
            'password' =>$password,
            'role' =>$role,
            'approve_formulir' =>$approve_formulir,
            'approve_lulus' =>$approve_lulus,
            'approve_daftarulang' =>$approve_daftarulang
		);
	
		$where = array(
			'id' => $id
		);
		$this->M_akademik->updateformulir($where,$data,'pengguna');
		$this->load->view('berhasil_ubah_formulir');
		$this->load->view('approve_formulir');	}

		
		public function cetakformulir(){
			// membaca data dari form
			$jenis      	 = $this->input->post('jenis');
			$nama            = $this->input->post('nama');
			$nisn	         = $this->input->post('nisn');
			$alamat	         = $this->input->post('alamat');
			$sekolah_asal    = $this->input->post('sekolahasal');
			$no_hp           = $this->input->post('no_hp');
			
			// memanggil dan membaca template dokumen yang telah kita buat
			$document = file_get_contents("formulir_pendaftaran.rtf");
			
			// isi dokumen dinyatakan dalam bentuk string
			$document = str_replace("#JENIS", $jenis, $document);
			$document = str_replace("#NAMA", $nama, $document);
			$document = str_replace("#NISN", $nisn, $document);
			$document = str_replace("#ALAMAT", $alamat, $document);
			$document = str_replace("#SEKOLAHASAL", $sekolah_asal, $document);
			$document = str_replace("#NO_HP", $no_hp, $document);
			
			// header untuk membuka file output RTF dengan MS. Word
			
			header("Content-type: application/msword");
			header("Content-disposition: inline; filename=formulir_pendaftaran.doc");
			header("Content-length: ".strlen($document));
			echo $document;
 

		}

		public function matakuliah()
	{
		$data['matakuliah'] = $this->M_akademik->tampil_matakuliah()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('matakuliah',$data);
		$this->load->view('template/footer');
	}

	public function letakruangan()
	{
		$data['letakruangan'] = $this->M_akademik->tampil_letakruangan()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('letakruangan',$data);
		$this->load->view('template/footer');
	}

	public function kelas()
	{
		$data['kelas'] = $this->M_akademik->tampil_kelas()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('kelas',$data);
		$this->load->view('template/footer');
	}

	public function tambahletakruangan(){
		$nama_letak_ruangan          = $this->input->post('nama_letak_ruangan');
		
	   
		$data = array(
			'nama_letak_ruangan' => $nama_letak_ruangan
		);
	
		$this->M_akademik->tambahletakruangan($data,'tbl_letak_ruangan');
		redirect(base_url('home/letakruangan'));
	}


	public function tambahkelas(){
		$nama_kelas          = $this->input->post('nama_kelas');
		
	   
		$data = array(
			'nama_kelas' => $nama_kelas
		);
	
		$this->M_akademik->tambahkelas($data,'tbl_kelas');
		redirect(base_url('home/kelas'));
	}

	public function tambahruangan(){
		$nama_ruang          		= $this->input->post('nama_ruang');
		$id_letak_ruangan          	= $this->input->post('id_letak_ruangan');

		
	   
		$data = array(
			'nama_ruang' => $nama_ruang,
			'id_letak_ruangan' => $id_letak_ruangan

		);
	
		$this->M_akademik->tambahruangan($data,'tbl_ruangan');
		redirect(base_url('home/ruangan'));
	}

	public function tambahjadwal(){
		$waktu_kuliah       = $this->input->post('waktu_kuliah');
		$hari_kuliah        = $this->input->post('hari_kuliah');
		$id_matakuliah      = $this->input->post('id_matakuliah');
		$id_dosen          	= $this->input->post('id_dosen');
		$id_kelas          	= $this->input->post('id_kelas');
		$id_ruang          	= $this->input->post('id_ruang');


		
	   
		$data = array(
			'waktu_kuliah' => $waktu_kuliah,
			'hari_kuliah' => $hari_kuliah,
			'id_matakuliah' => $id_matakuliah,
			'id_dosen' => $id_dosen,
			'id_kelas' => $id_kelas,
			'id_ruang' => $id_ruang,
		);
	
		$this->M_akademik->tambahjadwal($data,'tbl_jadwal_matakuliah');
		redirect(base_url('home/jadwal_kuliah'));
	}


	public function editlulus($id){
		$sess_data = $this->session->userdata();
		$id =    array ('id' => $id);
		$data['lulus'] = $this->M_akademik->tampilpengguna($id,'pengguna')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$sess_data);
		$this->load->view('editlulus',$data);
		$this->load->view('template/footer');
	}

	public function updatelulus(){
		$id                = $this->input->post('id');
        $nama              = $this->input->post('nama');
        $tptlahir              = $this->input->post('tptlahir');
        $tgllahir              = $this->input->post('tgllahir');
        $jenis             = $this->input->post('jenis');
        $nisn              = $this->input->post('nisn');
        $alamat            = $this->input->post('alamat');
        $sekolah_asal      = $this->input->post('sekolah_asal');
        $namaayah              = $this->input->post('namaayah');
        $namaibu              = $this->input->post('namaibu');
        $no_wa              = $this->input->post('no_wa');
        $akte          = $this->input->post('akte');
        $no_hp             = $this->input->post('no_hp');
        $foto             = $this->input->post('foto');
        $bukti_tf          = $this->input->post('bukti_tf');
        $username          = $this->input->post('username');
        $password          = $this->input->post('password');
        $role              = $this->input->post('role');
        $approve_formulir       = $this->input->post('approve_formulir');
        $approve_lulus          = $this->input->post('approve_lulus');
        $approve_daftarulang    = $this->input->post('approve_daftarulang');


	
		$data = array(
			'nama_lengkap' => $nama,
            'tptlahir' => $tptlahir,
            'tgllahir' => $tgllahir,
            'namaayah' => $namaayah,
            'namaibu' => $namaibu,
            'no_wa' => $no_wa,
            'akte' => $akte,
            'jenis' => $jenis,
            'nisn' => $nisn,
            'alamat' =>$alamat,
            'sekolah_asal' =>$sekolah_asal,
            'no_hp' =>$no_hp,
            'foto' =>$foto,
            'bukti_tf' =>$bukti_tf,
            'username' =>$username,
            'password' =>$password,
            'role' =>$role,
            'approve_formulir' =>$approve_formulir,
            'approve_lulus' =>$approve_lulus,
            'approve_daftarulang' =>$approve_daftarulang
		);

		$where = array(
			'id' => $id
		);

		$data2 = array(
			'id' => $id, 'tingkat' => "", 'nama_lengkap' => "", 'nama_panggilan' => "", 'nisn' => "",
			'tpt_lahir' => "", 'tgl_lahir' => "",'agama' => "", 'suku' => "", 'jk' => "", 'goldar' => "",
			'anak_ke' => "", 'dari_saudara' => "", 'alamat' => "", 'jarak' => "", 'desa' => "", 'kecamatan' => "",
			'kabupaten' => "",'provinsi' => "",'nama_ayah' => "",'tptlahir_ayah' => "",'tgllahir_ayah' => "",
			'pendidikan_ayah' => "",'pekerjaan_ayah' => "", 'penghasilan_ayah' => "",'alamat_ayah' => "",
			'desa_ayah' => "",'kecamatan_ayah' => "",'kabupaten_ayah' => "",'provinsi_ayah' => "",'hp_ayah' => "",
			'nama_ibu' => "",'tptlahir_ibu' => "",'tgllahir_ibu' => "",
			'pendidikan_ibu' => "",'pekerjaan_ibu' => "", 'penghasilan_ibu' => "",'alamat_ibu' => "",
			'desa_ibu' => "",'kecamatan_ibu' => "",'kabupaten_ibu' => "",'provinsi_ibu' => "",'hp_ibu' => "",
			'sekolah_asal' => "",'npsn' => "", 'alamat_sekolah' => "", 'kabupaten_sekolah' => "", 'provinsi_sekolah' => "",
			'penyakit' => "",'olah_raga' => "", 'seni' => "",'tari' => "",'lukis' => "", 'drama' => "", 'sastra' => "",
			'organisasi' => "",'prestasi' => "",'alasan' => "",'tentang_sekolah' => ""
		); 
	


		if ($approve_lulus=="Lulus") {
			$hitungid= $this->M_akademik->hitungidlulus($id);
	
			if ($hitungid==0) {
				$this->M_akademik->tambahiddaftarulang($data2,'daftarulang');
			}		
		}
		
		$this->M_akademik->updatelulus($where,$data,'pengguna');
		$this->load->view('berhasil_ubah_lulus');
		$this->load->view('approve_lulus');

		
	
	}
	
		public function approve_daftarulang()
	{
		$data['daftarulang'] = $this->M_akademik->tampil_daftarulang()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$sess_data);
		$this->load->view('approve_daftarulang',$data);
		$this->load->view('template/footer');
	}

	public function editdaftarulang($id){
		$sess_data = $this->session->userdata();
		$id =    array ('id' => $id);
		$data['daftarulang'] = $this->M_akademik->editdaftarulang($id,'daftarulang')->result();
		$data2['approval_daftarulang'] = $this->M_akademik->tampilpengguna($id,'pengguna')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$sess_data);
		$this->load->view('editdaftarulang',$data);
		$this->load->view('konfirm_daftarulang',$data2);
		$this->load->view('template/footer');
	}

	public function updatedaftarulang(){
		$id              = $this->input->post('id');
		$nama            = $this->input->post('nama');
		$jenis      	 = $this->input->post('jenis');
		$nisn	         = $this->input->post('nisn');
		$alamat	         = $this->input->post('alamat');
		$sekolah_asal    = $this->input->post('sekolah_asal');
		$no_hp           = $this->input->post('no_hp');
		$foto            = $this->input->post('foto');
		$bukti_tf        = $this->input->post('bukti_tf');
		$username        = $this->input->post('username');
		$password        = $this->input->post('password');
		$role            = $this->input->post('role');
		$approve_formulir    = $this->input->post('approve_formulir');
		$approve_lulus       = $this->input->post('approve_lulus');
		$approve_daftarulang = $this->input->post('approve_daftarulang');


	
		$data = array(
			'nama_lengkap' => $nama,
			'jenis' => $jenis,
			'nisn' => $nisn,
			'alamat' =>$alamat,
			'sekolah_asal' => $sekolah_asal,
			'no_hp' => $no_hp,
			'foto' => $foto,
			'bukti_tf' => $bukti_tf,
			'username' => $username,
			'password' => $password,
			'role' => $role,
			'approve_formulir' => $approve_formulir,
			'approve_lulus' => $approve_lulus,
			'approve_daftarulang' => $approve_daftarulang
		);
	
		$where = array(
			'id' => $id
		);
		$this->M_akademik->updatedaftarulang($where,$data,'pengguna');
		$this->load->view('berhasil_ubah_daftarulang');
		$this->load->view('approve_daftarulang');	}
	
		public function datapengguna()
	{
		$data['pengguna'] = $this->M_akademik->tampildatapengguna()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('datapengguna',$data);
		$this->load->view('template/footer');
	}

	public function editpengguna($id)
	{
		$id =    array ('id' => $id);
		$data['editpengguna'] = $this->M_akademik->tampilpengguna($id)->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$sess_data);
		$this->load->view('editpengguna',$data);
		$this->load->view('template/footer');
	}

	public function updatedatapengguna(){
		$id              = $this->input->post('id');
		$nama            = $this->input->post('nama');
		$jenis      	 = $this->input->post('jenis');
		$nisn	         = $this->input->post('nisn');
		$alamat	         = $this->input->post('alamat');
		$sekolah_asal    = $this->input->post('sekolah_asal');
		$no_hp           = $this->input->post('no_hp');
		$foto            = $this->input->post('foto');
		$bukti_tf        = $this->input->post('bukti_tf');
		$username        = $this->input->post('username');
		$password        = $this->input->post('password');
		$role            = $this->input->post('role');
		$approve_formulir    = $this->input->post('approve_formulir');
		$approve_lulus       = $this->input->post('approve_lulus');
		$approve_daftarulang = $this->input->post('approve_daftarulang');


	
		$data = array(
			'nama_lengkap' => $nama,
			'jenis' => $jenis,
			'nisn' => $nisn,
			'alamat' =>$alamat,
			'sekolah_asal' => $sekolah_asal,
			'no_hp' => $no_hp,
			'foto' => $foto,
			'bukti_tf' => $bukti_tf,
			'username' => $username,
			'password' => $password,
			'role' => $role,
			'approve_formulir' => $approve_formulir,
			'approve_lulus' => $approve_lulus,
			'approve_daftarulang' => $approve_daftarulang
		);
	
		$where = array(
			'id' => $id
		);
		$this->M_akademik->updatedatapengguna($where,$data,'pengguna');
		$this->load->view('berhasil_ubah_password');
		$this->load->view('datapengguna');	}


	public function cetakformulirdaftarulang(){
			// membaca data dari form
			$nama_lengkap    = $this->input->post('nama_lengkap');
			$nama_panggilan  = $this->input->post('nama_panggilan');
			$tingkat		 = $this->input->post('tingkat');
			$nisn	         = $this->input->post('nisn');
			$goldar	         = $this->input->post('goldar');
			$anak_ke         = $this->input->post('anak_ke');
			$dari_saudara    = $this->input->post('dari_saudara');
			$jarak	         = $this->input->post('jarak');
			$tpt_lahir	     = $this->input->post('tpt_lahir');
			$tgl_lahir       = $this->input->post('tgl_lahir');
			$agama	         = $this->input->post('agama');
			$suku	         = $this->input->post('suku');
			$jk		         = $this->input->post('jk');
			$alamat	         = $this->input->post('alamat');
			$desa	         = $this->input->post('desa');
			$kabupaten       = $this->input->post('kabupaten');
			$provinsi        = $this->input->post('provinsi');
			$nama_ayah	     = $this->input->post('nama_ayah');
			$pendidikan_ayah	= $this->input->post('pendidikan_ayah');
			$penghasilan_ayah	= $this->input->post('penghasilan_ayah');
			$hp_ayah	        = $this->input->post('hp_ayah');
			$tptlahir_ayah      = $this->input->post('tptlahir_ayah');
			$tgllahir_ayah      = $this->input->post('tgllahir_ayah');
			$pekerjaan_ayah     = $this->input->post('pekerjaan_ayah');
			$alamatayah        = $this->input->post('alamat_ayah');
			$desa_ayah          = $this->input->post('desa_ayah');
			$kabupaten_ayah     = $this->input->post('kabupaten_ayah');
			$provinsi_ayah      = $this->input->post('provinsi_ayah');
			$nama_ibu	     = $this->input->post('nama_ibu');
			$pendidikan_ibu	= $this->input->post('pendidikan_ibu');
			$penghasilan_ibu	= $this->input->post('penghasilan_ibu');
			$hp_ibu	        = $this->input->post('hp_ibu');
			$tptlahir_ibu      = $this->input->post('tptlahir_ibu');
			$tgllahir_ibu      = $this->input->post('tgllahir_ibu');
			$pekerjaan_ibu     = $this->input->post('pekerjaan_ibu');
			$alamat_ibu        = $this->input->post('alamat_ibu');
			$desa_ibu          = $this->input->post('desa_ibu');
			$kabupaten_ibu     = $this->input->post('kabupaten_ibu');
			$provinsi_ibu      = $this->input->post('provinsi_ibu');
			$sekolah_asal	   = $this->input->post('sekolah_asal');
			$npsn		       = $this->input->post('npsn');
			$almt_sekolah    = $this->input->post('alamat_sekolah');
			$kabupaten_sekolah		= $this->input->post('kabupaten_sekolah');
			$provinsi_sekolah		= $this->input->post('provinsi_sekolah');
			$penyakit	         = $this->input->post('penyakit');
			$olah_raga	         = $this->input->post('olah_raga');
			$seni	         = $this->input->post('seni');
			$tari	         = $this->input->post('tari');
			$lukis	         = $this->input->post('lukis');
			$drama	         = $this->input->post('drama');
			$sastra	         = $this->input->post('sastra');
			$organisasi	         = $this->input->post('organisasi');
			$prestasi	         = $this->input->post('prestasi');
			$alasan	         = $this->input->post('alasan');
			$tentang_sekolah	         = $this->input->post('tentang_sekolah');



			
			// memanggil dan membaca template dokumen yang telah kita buat
			$document = file_get_contents("formulir_pendaftaran_ulang.rtf");
			
			// isi dokumen dinyatakan dalam bentuk string
			$document = str_replace("#NAMA_LENGKAP", $nama_lengkap, $document);
			$document = str_replace("#NAMA_PANGGILAN", $nama_panggilan, $document);
			$document = str_replace("#TINGKAT", $tingkat, $document);
			$document = str_replace("#NISN", $nisn, $document);
			$document = str_replace("#GOLDAR", $goldar, $document);
			$document = str_replace("#ANAK_KE", $anak_ke, $document);
			$document = str_replace("#DARI_SAUDARA", $dari_saudara, $document);
			$document = str_replace("#JARAK", $jarak, $document);
			$document = str_replace("#TPTLAHIR", $tpt_lahir, $document);
			$document = str_replace("#TGLLAHIR", $tgl_lahir, $document);
			$document = str_replace("#AGAMA", $agama, $document);
			$document = str_replace("#SUKU", $suku, $document);
			$document = str_replace("#JK", $jk, $document);
			$document = str_replace("#ALAMAT", $alamat, $document);
			$document = str_replace("#DESA", $desa, $document);
			$document = str_replace("#KABUPATEN", $kabupaten, $document);
			$document = str_replace("#PROVINSI", $provinsi, $document);
			$document = str_replace("#NAMA_AYAH", $nama_ayah, $document);
			$document = str_replace("#PENDIDIKAN_AYAH", $pendidikan_ayah, $document);
			$document = str_replace("#PENGHASILAN_AYAH", $penghasilan_ayah, $document);
			$document = str_replace("#NOTEL", $hp_ayah, $document);
			$document = str_replace("#TPT_AYAH", $tptlahir_ayah, $document);
			$document = str_replace("#TGL_AYAH", $tgllahir_ayah, $document);
			$document = str_replace("#PEKERJAAN", $pekerjaan_ayah, $document);
			$document = str_replace("#TPTTINGGAL_AYAH", $alamatayah, $document);
			$document = str_replace("#KEL", $desa_ayah, $document);
			$document = str_replace("#KAB", $kabupaten_ayah, $document);
			$document = str_replace("#KAU", $provinsi_ayah, $document);


			$document = str_replace("#MOTHER", $nama_ibu, $document);
			$document = str_replace("#KUG", $pendidikan_ibu, $document);
			$document = str_replace("#KEK", $penghasilan_ibu, $document);
			$document = str_replace("#HP", $hp_ibu, $document);
			$document = str_replace("#KUH", $tptlahir_ibu, $document);
			$document = str_replace("#KUK", $tgllahir_ibu, $document);
			$document = str_replace("#KUB", $pekerjaan_ibu, $document);
			$document = str_replace("#KEH", $alamat_ibu, $document);
			$document = str_replace("#KEF", $desa_ibu, $document);
			$document = str_replace("#KAF", $kabupaten_ibu, $document);
			$document = str_replace("#KAG", $provinsi_ibu, $document);
			$document = str_replace("#HH", $sekolah_asal, $document);
			$document = str_replace("#HK", $npsn, $document);
			$document = str_replace("#HN", $almt_sekolah, $document);
			$document = str_replace("#HJ", $kabupaten_sekolah, $document);
			$document = str_replace("#HY", $provinsi_sekolah, $document);
			$document = str_replace("#PENYAKIT", $penyakit, $document);
			$document = str_replace("#OLAH_RAGA", $olah_raga, $document);
			$document = str_replace("#SENI", $seni, $document);
			$document = str_replace("#TARI", $tari, $document);
			$document = str_replace("#LUKIS", $lukis, $document);
			$document = str_replace("#DRAMA", $drama, $document);
			$document = str_replace("#SASTRA", $sastra, $document);
			$document = str_replace("#ORGANISASI", $organisasi, $document);
			$document = str_replace("#PRESTASI", $prestasi, $document);
			$document = str_replace("#ALASAN", $alasan, $document);
			$document = str_replace("#TENTANG_SEKOLAH", $tentang_sekolah, $document);


			



			
			// header untuk membuka file output RTF dengan MS. Word
			
			header("Content-type: application/msword");
			header("Content-disposition: inline; filename=formulir_pendaftaran_ulang.doc");
			header("Content-length: ".strlen($document));
			echo $document;

		}

		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url('hal/login'));    
		}

}
