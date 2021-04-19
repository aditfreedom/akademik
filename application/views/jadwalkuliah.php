<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">JADWAL KULIAH</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Jadwal Kuliah</li>
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
              <th scope="col">WAKTU KULIAH</th>
              <th scope="col">HARI KULIAH</th>
              <th scope="col">MATA KULIAH</th>
              <th scope="col">DOSEN</th>
              <th scope="col">KELAS</th>
              <th scope="col">RUANG</th>
              <th scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
          <?php $i = 1; 
	        foreach ($jadwal as $data) : ?>
		<tr class="nomor text-center">
            <th scope="row"><?php echo $i ;?></th>
            <td><?php echo $data->waktu_kuliah;?></td>
            <td><?php echo $data->hari_kuliah;?></td>
            <td><?php echo $data->nama_matakuliah;?></td>
            <td><?php echo $data->nama_lengkap;?></td>
            <td><?php echo $data->nama_kelas;?></td>
            <td><?php echo $data->nama_ruang;?></td>
            <td><?php echo anchor('home/editjadwal/'.$data->id_jadwal_kuliah,'<div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>')?> 
            <?php echo anchor('home/hapusjadwal/'.$data->id_jadwal_kuliah,'<div  onclick="return kotak_hapus()" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?> </td>	
            
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Mata Kuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'home/tambahjadwal'; ?>">
        <div class="form-group">
        <label for="">Waktu Kuliah</label>
        <input type="text" name="waktu_kuliah" class="form-control">
        </div>

        <div class="form-group">
        <label for="">Hari Kuliah</label>
            <select class="form-control" name="hari_kuliah">
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
        </select>
        </div>

        <div class="form-group">
        <label for="">Mata Kuliah</label>
            <select class="form-control selectpicker" data-live-search="true" name="id_matakuliah">
            <?php foreach ($jadwal3 as $data) : ?>
            <option value="<?php echo $data->id_matakuliah;?>"><?php echo $data->nama_matakuliah;?></option>
            <?php endforeach ;?>
        </select>
        </div>

        <div class="form-group">
        <label for="">Dosen</label>
            <select class="form-control selectpicker" data-live-search="true" name="id_dosen">
            <?php foreach ($jadwal2 as $data) : ?>
            <option value="<?php echo $data->id_dosen;?>"><?php echo $data->nama_lengkap;?></option>
            <?php endforeach ;?>
        </select>
        </div>

        <div class="form-group">
        <label for="">Kelas</label>
            <select class="form-control selectpicker" name="id_kelas" data-live-search="true">
            <?php foreach ($jadwal4 as $data) : ?>
            <option value="<?php echo $data->id_kelas;?>"><?php echo $data->nama_kelas;?></option>
            <?php endforeach ;?>
        </select>
        </div>
        
        <div class="form-group">
        <label for="">Ruangan</label>
            <select class="form-control selectpicker" data-live-search="true" name="id_ruang">
            <?php foreach ($jadwal5 as $data) : ?>
            <option value="<?php echo $data->id_ruang;?>"><?php echo $data->nama_ruang;?></option>
            <?php endforeach ;?>
        </select>
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


