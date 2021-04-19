<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">DATA PENGGUNA</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Data Pengguna</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
    <p align="left">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
    <i class="fa fa-plus"></i> Tambah Data</button></p>

    <table class="table table-hover" id="example">
          <thead class="text-center">
            <tr>
              <th scope="col">NO</th>
              <th scope="col">USERNAME</th>
              <th scope="col">PASSWORD</th>
              <th scope="col">LEVEL</th>
              <th scope="col">NAMA USER</th>
              <th scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
          <?php $i = 1; 
	        foreach ($pengguna as $data) : 
            if ($data->level == 2) {
              $level = "Mahasiswa";
            } elseif($data->level == 1){
              $level = "Dosen";
            }else{
              $level = "Admin";
            }
          ?>
		<tr class="nomor text-center">
            <th scope="row"><?php echo $i ;?></th>
            <td><?php echo $data->username;?></td>
            <td><?php echo $data->password;?></td>
            <td><?php echo $level;?></td>
            <td>
                  <?php
                      if ($level == "Mahasiswa") {
                          $page = "detilmahasiswa/$data->id_detail_user";
                      }elseif($level == "Dosen"){
                        $page = "detildosen/$data->id_dosen";
                      }
                  ?>
                  
            <a class ="btn btn-primary" href="<?php echo base_url('home/'.$page);?>"</a><?php echo $data->nama_lengkap;?>
              </td>
            <td><?php echo anchor('home/editpengguna/'.$data->id_user,'<div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>')?> 
            <?php echo anchor('home/hapuspengguna/'.$data->id_user,'<div  onclick="return kotak_hapus()" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?> </td>	
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kuota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'home/tambahkuota'; ?>">
      <div class="form-group">
        <label for="">Jenis Penerimaan</label>
        <select class="form-control form-control" name="jenis">
          <option>Peserta Didik Baru SD</option>
          <option>Peserta Didik Baru SMP</option>
          <option>Peserta Didik Baru SMA</option>
          <option>Pindahan SD</option>
          <option>Pindahan SMP</option>
          <option>Pindahan SMA</option>
          </select>
      </div>
        <div class="form-group">
        <label for="">Kuota Penerimaan</label>
        <input type="text" name="kuota" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
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