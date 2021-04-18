<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">EDIT KELAS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Edit Kelas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
		<form method="post" action="<?php echo base_url().'home/updatekelas'; ?>">
    <?php foreach ($kelas as $data) : ?>
        <div class="form-group">
        <input type="hidden" name="id_kelas" class="form-control" value="<?php echo $data->id_kelas;?>">
        </div>    
        <div class="form-group">
        <label for="">Kelas</label>
        <input type="text" name="nama_kelas" class="form-control" value="<?php echo $data->nama_kelas;?>">
        </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary" style="width:100%;">Simpan</button><br><br>
      </div>
        </form>

    </section>
</div>