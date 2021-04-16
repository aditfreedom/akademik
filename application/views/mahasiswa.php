<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">DATA MAHASISWA</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
    <p align="left">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
    <i class="fa fa-plus"></i> Tambah Data</button><br><br></p>

    <table class="table table table-hover" id="example">
          <thead class="text-center">
            <tr>
              <th scope="col">NO</th>
              <th scope="col">NAMA LENGKAP</th>
              <th scope="col">NIM</th>
              <th scope="col">ALAMAT</th>
              <th scope="col">TEMPAT LAHIR</th>
              <th scope="col">TANGGAL LAHIR</th>
              <th scope="col">JENIS KELAMIN</th>
              <th scope="col" >AKSI</th>
            </tr>
          </thead>
          <tbody>
          <?php $i = 1; 
	        foreach ($mahasiswa as $data) : ?>
		<tr class="nomor text-center">
            <th scope="row"><?php echo $i ;?></th>
            <td><?php echo $data->nama_lengkap;?></td>
            <td><?php echo $data->nim;?></td>
            <td><?php echo $data->alamat;?></td>
            <td><?php echo $data->tempat_lahir;?></td>
            <td><?php echo $data->tanggal_lahir;?></td>
            <td><?php echo $data->jenis_kelamin;?></td>
            <td><?php echo anchor('home/editmahasiswa/'.$data->id_detail_user,'<div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>')?> 
            <?php echo anchor('home/hapusmahasiswa/'.$data->id_detail_user,'<div  onclick="return kotak_hapus()" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?> </td>	


		</tr>
		<?php $i++; ?>
	<?php endforeach ;?>
          </tbody>
        </table>

    </div>
   
</div>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'home/tambahmahasiswa'; ?>">
        <div class="form-group">
        <label for="">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control">
        </div>
        <div class="form-group">
        <label for="">NIM</label>
        <input type="text" name="nim" class="form-control">
        </div>
        <div class="form-group">
        <label for="">Alamat</label><br>
        <textarea name="alamat" id="" rows="2" style="width:100%;"></textarea>
        </div>
        <div class="form-group">
        <label for="">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control">
        </div>
        <div class="form-group">
        <label for="">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control">
        </div>
        <div class="form-group">
        <label for="">Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin">
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        </div>
        <button type="submit" class="btn btn-primary" style="width:100%;">Simpan</button>
        </form>
        
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
function kotak_hapus() {
  return confirm('Yakin Menghapus Data?');
}
</script>