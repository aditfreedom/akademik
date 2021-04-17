<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">EDIT LETAK RUANGAN</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Edit Letak Ruangan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
		<form method="post" action="<?php echo base_url().'home/updateletakruangan'; ?>">
    <?php foreach ($letakruangan as $data) : ?>
        <div class="form-group">
        <input type="hidden" name="id_letak_ruangan" class="form-control" value="<?php echo $data->id_letak_ruangan;?>">
        </div>    
        <div class="form-group">
        <label for="">Letak Ruangan</label>
        <input type="text" name="nama_letak_ruangan" class="form-control" value="<?php echo $data->nama_letak_ruangan;?>">
        </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary" style="width:100%;">Simpan</button><br><br>
      </div>
        </form>

    </section>
</div>