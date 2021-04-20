<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">EDIT MATA KULIAH</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Edit Mata Kuliah</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
		<form method="post" action="<?php echo base_url().'home/updatematakuliah'; ?>">
    <?php foreach ($datamatakuliah as $data) : ?>
        <div class="form-group">
        <input type="hidden" name="id_matakuliah" class="form-control" value="<?php echo $data->id_matakuliah;?>">
        </div>    
        <div class="form-group">
        <label for="">Nama Mata Kuliah</label>
        <input type="text" name="nama_matakuliah" class="form-control" value="<?php echo $data->nama_matakuliah;?>">
        </div>
        <div class="form-group">
        <label for="">Keterangan</label><br>
        <textarea name="keterangan" rows="5" style="width:100%;" class="form-control"><?php echo $data->keterangan;?></textarea>
        </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary" style="width:100%;">Simpan</button><br><br>
      </div>
        </form>

    </section>
</div>