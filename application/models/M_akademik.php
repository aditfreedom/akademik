<?php

class M_akademik extends CI_Model{
    public function tampil_data_dosen(){
        return $this->db->get('tbl_dosen');
     }

     public function tampildatapengguna(){
        return $this->db->query("SELECT * FROM tbl_user LEFT JOIN tbl_mahasiswa ON tbl_user.id_detail_user = tbl_mahasiswa.id_detail_user 
        LEFT JOIN tbl_dosen ON tbl_user.id_detail_user = tbl_dosen.id_dosen WHERE level=1");
     }

     public function tampildatapengguna1($username){
        $result = $this->db->query("SELECT * FROM pengguna WHERE username='$username'");
        return $result->num_rows();

     }

     public function tampil_letak_id(){
        $result = $this->db->query("SELECT * FROM tbl_ruangan LEFT JOIN tbl_letak_ruangan ON tbl_ruangan.id_letak_ruangan = tbl_letak_ruangan.id_letak_ruangan");
        return $result;
     }

     public function tampil_jadwal_mk(){
        $result = $this->db->query("SELECT * FROM tbl_jadwal_matakuliah LEFT JOIN tbl_matakuliah ON tbl_jadwal_matakuliah.id_matakuliah = tbl_matakuliah.id_matakuliah LEFT JOIN tbl_dosen ON tbl_jadwal_matakuliah.id_dosen = tbl_dosen.id_dosen
        LEFT JOIN tbl_kelas ON tbl_jadwal_matakuliah.id_kelas = tbl_kelas.id_kelas LEFT JOIN tbl_ruangan ON tbl_jadwal_matakuliah.id_ruang = tbl_ruangan.id_ruang");
        return $result;
     }


     public function tampiljadwal_id($id){
        $result = $this->db->query("SELECT * FROM tbl_jadwal_matakuliah LEFT JOIN tbl_matakuliah ON tbl_jadwal_matakuliah.id_matakuliah = tbl_matakuliah.id_matakuliah LEFT JOIN tbl_dosen ON tbl_jadwal_matakuliah.id_dosen = tbl_dosen.id_dosen
        LEFT JOIN tbl_kelas ON tbl_jadwal_matakuliah.id_kelas = tbl_kelas.id_kelas LEFT JOIN tbl_ruangan ON tbl_jadwal_matakuliah.id_ruang = tbl_ruangan.id_ruang WHERE tbl_jadwal_matakuliah.id_jadwal_kuliah = $id");
        return $result;
     }

    public function tambahdosen($data)
    {
        $this->db->insert('tbl_dosen',$data);
    }

    public function tambahjadwal($data)
    {
        $this->db->insert('tbl_jadwal_matakuliah',$data);
    }

    public function tambahletakruangan($data)
    {
        $this->db->insert('tbl_letak_ruangan',$data);
    }

    public function tambahkelas($data)
    {
        $this->db->insert('tbl_kelas',$data);
    }

    public function tambahruangan($data)
    {
        $this->db->insert('tbl_ruangan',$data);
    }

    public function tambahmahasiswa($data)
    {
        $this->db->insert('tbl_mahasiswa',$data);
    }

    public function tambahmatakuliah($data)
    {
        $this->db->insert('tbl_matakuliah',$data);
    }

    public function hapusdosen($id)
    {   
        $this->db->delete('tbl_dosen',$id);  
    }

    public function hapusmahasiswa($id)
    {   
        $this->db->delete('tbl_mahasiswa',$id);  
    }

    public function hapuskelas($id)
    {   
        $this->db->delete('tbl_kelas',$id);  
    }

    public function hapusruangan($id)
    {   
        $this->db->delete('tbl_ruangan',$id);  
    }

    public function hapusmatakuliah($id)
    {   
        $this->db->delete('tbl_matakuliah',$id);  
    }

    public function editdosen($id)
    {
        $query = $this->db->query("SELECT * from tbl_dosen where id_dosen=$id");
        return $query;    
    }

    public function editruangan($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_ruangan LEFT JOIN tbl_letak_ruangan ON tbl_ruangan.id_letak_ruangan = tbl_letak_ruangan.id_letak_ruangan WHERE tbl_ruangan.id_ruang=$id");
        return $query;    
    }

    public function editletakruangan($id)
    {
        $query = $this->db->query("SELECT * from tbl_letak_ruangan where id_letak_ruangan=$id");
        return $query;    
    }

    public function editkelas($id)
    {
        $query = $this->db->query("SELECT * from tbl_kelas where id_kelas=$id");
        return $query;    
    }

    public function editmatakuliah($id)
    {
        $query = $this->db->query("SELECT * from tbl_matakuliah where id_matakuliah=$id");
        return $query;    
    }

    public function editmahasiswa($id)
    {
        $query = $this->db->query("SELECT * from tbl_mahasiswa where id_detail_user=$id");
        return $query;    
    }

    public function updatedosen($where,$data)
    {   $this->db->where($where);
        $this->db->update('tbl_dosen',$data); 
    }

    public function updatekelas($where,$data)
    {   $this->db->where($where);
        $this->db->update('tbl_kelas',$data); 
    }

    public function updateruangan($where,$data)
    {   $this->db->where($where);
        $this->db->update('tbl_ruangan',$data); 
    }

    public function updateletakruangan($where,$data)
    {   $this->db->where($where);
        $this->db->update('tbl_letak_ruangan',$data); 
    }

    public function updatemahasiswa($where,$data)
    {   $this->db->where($where);
        $this->db->update('tbl_mahasiswa',$data); 
    }

    public function updatematakuliah($where,$data)
    {   $this->db->where($where);
        $this->db->update('tbl_matakuliah',$data); 
    }

    public function updatedatapengguna($where,$data)
    {   $this->db->where($where);
        $this->db->update('pengguna',$data); 
    }

    public function updateformuliruser($where,$data)
    {   $this->db->where($where);
        $this->db->update('pengguna',$data); 
    }

    public function tambahuser($data)
    {
        $this->db->insert('pengguna', $data);
    }

    public function tampil_mahasiswa(){
        $query = $this->db->query("SELECT * from tbl_mahasiswa");
        return $query;
    }

    public function tampil_letakruangan(){
        $query = $this->db->query("SELECT * from tbl_letak_ruangan");
        return $query;
    }

    public function tampil_kelas(){
        $query = $this->db->query("SELECT * from tbl_kelas");
        return $query;
    }

    public function tampilinfolulus(){
        $query = $this->db->query("SELECT * from pengguna where approve_lulus = 'Lulus'");
        return $query;
    }

    public function tampil_matakuliah(){
        $query = $this->db->query("SELECT * from tbl_matakuliah");
        return $query;
    }

    public function tampilapprovalformulir($id){
        $query = $this->db->query("SELECT approve_formulir from pengguna where id = '$id' ");
        return $query;
    }

    public function tampilpengguna($id)
    {
        return $this->db->get_where('pengguna',$id);  
    }


    public function tampiliddaftarulang($id)
    {
        return $this->db->get_where('daftarulang',$id);  
    }

    public function hitungidlulus($where){
        $result = $this->db->query("SELECT*FROM daftarulang where id='$where'");
        return $result->num_rows();
    }

    public function tampilpensd(){
        $query = $this->db->query("SELECT kuota FROM kuota WHERE jenis='Peserta Didik Baru SD' ");
        return $query;
    }

    public function jumlahdosen(){
        $result = $this->db->query("SELECT*FROM tbl_dosen");
        return $result->num_rows();
    }

    public function hitung_data_all($table){
        $result = $this->db->get($table);
        return $result->num_rows();
   }

    public function tampilpensma(){
        $query = $this->db->query("SELECT kuota FROM kuota WHERE jenis='Peserta Didik Baru SMA' ");
        return $query;
    }

    public function tampilpindsd(){
        $query = $this->db->query("SELECT kuota FROM kuota WHERE jenis='Pindahan SD' ");
        return $query;
    }

    public function tampilpindsmp(){
        $query = $this->db->query("SELECT kuota FROM kuota WHERE jenis='Pindahan SMP' ");
        return $query;
    }

    public function tampilpindsma(){
        $query = $this->db->query("SELECT kuota FROM kuota WHERE jenis='Pindahan SMA' ");
        return $query;
    }
    
    public function hitunguser(){
        $result = $this->db->query("SELECT*FROM pengguna");
        return $result->num_rows();
    }

    public function hitungsdformulir(){
        $result = $this->db->query("SELECT*FROM pengguna WHERE jenis='Peserta Didik Baru SD' AND approve_formulir='Diterima'");
        return $result->num_rows();
    }
    
    public function hitungsmpformulir(){
        $result = $this->db->query("SELECT*FROM pengguna WHERE jenis='Peserta Didik Baru SMP' AND approve_formulir='Diterima'");
        return $result->num_rows();
    }

    public function hitungsmaformulir(){
        $result = $this->db->query("SELECT*FROM pengguna WHERE jenis='Peserta Didik Baru SMA' AND approve_formulir='Diterima'");
        return $result->num_rows();
    }

    public function hitungpindsdformulir(){
        $result = $this->db->query("SELECT*FROM pengguna WHERE jenis='Pindahan SD' AND approve_formulir='Diterima'");
        return $result->num_rows();
    }

    public function hitungpindsmpformulir(){
        $result = $this->db->query("SELECT*FROM pengguna WHERE jenis='Pindahan SMP' AND approve_formulir='Diterima'");
        return $result->num_rows();
    }

    public function hitungpindsmaformulir(){
        $result = $this->db->query("SELECT*FROM pengguna WHERE jenis='Pindahan SMA' AND approve_formulir='Diterima'");
        return $result->num_rows();
    }

    public function hitungpdlulus(){
        $result = $this->db->query("SELECT*FROM pengguna WHERE approve_lulus='Lulus'");
        return $result->num_rows();
    }

    public function hitungpdtidaklulus(){
        $result = $this->db->query("SELECT*FROM pengguna WHERE approve_lulus='Tidak Lulus'");
        return $result->num_rows();
    }

    public function hitungpddaftarulang(){
        $result = $this->db->query("SELECT*FROM pengguna WHERE approve_daftarulang='Diterima'");
        return $result->num_rows();
    }

    public function hitungpdtidakdaftarulang(){
        $result = $this->db->query("SELECT*FROM pengguna WHERE approve_lulus='Ditolak'");
        return $result->num_rows();
    }

    public function hitungformulir(){
        $result = $this->db->query("SELECT*FROM pengguna WHERE (jenis='Peserta Didik Baru SD' OR jenis='Peserta Didik Baru SMP' OR jenis='Peserta Didik Baru SMA') AND approve_formulir='Diterima'");
        return $result->num_rows();
    }

    public function hitungformulirpindahan(){
        $result = $this->db->query("SELECT*FROM pengguna WHERE (jenis='Pindahan SD' OR jenis='Pindahan SMP' OR jenis='Pindahan SMA') AND approve_formulir='Diterima'");
        return $result->num_rows();
    }
   
    public function updateformulir($where,$data)
    {   $this->db->where($where);
        $this->db->update('pengguna',$data); 
    }

    public function updatelulus($where,$data)
    {   $this->db->where($where);
        $this->db->update('pengguna',$data); 
    }

    public function updatedaftarulanguser($where,$data)
    {   $this->db->where($where);
        $this->db->update('daftarulang',$data); 
    }

    public function updatedaftarulang($where,$data)
    {   $this->db->where($where);
        $this->db->update('pengguna',$data); 
    }
    
    public function tambahiddaftarulang($data)
    {
        $this->db->insert('daftarulang', $data);
    }

    public function tampil_daftarulang(){
        $query = $this->db->query("SELECT * from pengguna where (approve_daftarulang = 'Antrian' OR approve_daftarulang = 'Diterima' OR approve_daftarulang = 'Ditolak') AND approve_lulus = 'Lulus' ");
        return $query;
    }

    public function editdaftarulang($id)
    {
        return $this->db->get_where('daftarulang',$id);  
    }


    function cek_login($where){
        return $this->db->get_where('pengguna',$where);
    }
   

}
?>