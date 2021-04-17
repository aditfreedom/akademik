<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">DATA MATA KULIAH</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Mata Kuliah</li>
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

    <table class="table table-bordered table-stripped table-hover" id="example">
          <thead class="text-center">
            <tr>
              <th scope="col">NO</th>
              <th scope="col">NAMA MATA KULIAH</th>
              <th scope="col">KETERANGAN</th>
              <th scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
          <?php $i = 1; 
	        foreach ($matakuliah as $data) : ?>
		<tr class="nomor text-center">
            <th scope="row"><?php echo $i ;?></th>
            <td><?php echo $data->nama_matakuliah;?></td>
            <td><?php echo $data->keterangan;?></td>
            <td><?php echo anchor('home/editmatakuliah/'.$data->id_matakuliah,'<div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>')?> 
            <?php echo anchor('home/hapusmatakuliah/'.$data->id_matakuliah,'<div  onclick="return kotak_hapus()" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?> </td>	
            
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Kuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'home/tambahmatakuliah'; ?>">
        <div class="form-group">
        <label for="">Nama Mata Kuliah</label>
        <input type="text" name="nama_matakuliah" class="form-control">
        </div>
        <div class="form-group">
        <label for="">Keterangan</label><br>
        <textarea name="keterangan" id="" rows="4" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" style="width:100%;">Simpan</button>
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