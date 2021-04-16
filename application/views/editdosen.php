<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">EDIT DATA DOSEN</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Edit Data Dosen</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
		<form method="post" action="<?php echo base_url().'home/updatedosen'; ?>">
    <?php foreach ($datadosen as $data) : ?>
        <div class="form-group">
        <input type="hidden" name="id_dosen" class="form-control" value="<?php echo $data->id_dosen;?>">
        </div>    
        <div class="form-group">
        <label for="">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $data->nama_lengkap;?>">
        </div>
        <div class="form-group">
        <label for="">NIP</label>
        <input type="text" name="nip" class="form-control" value="<?php echo $data->nip;?>">
        </div>
        <div class="form-group">
        <label for="">Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="<?php echo $data->jabatan;?>">
        </div>
        <div class="form-group">
        <label for="">Jenis Kelamin</label>
        <input type="text" name="jenis_kelamin" class="form-control" value="<?php echo $data->jenis_kelamin;?>">
        </div>
        <div class="form-group">
        <label for="">Alamat</label><br>
        <textarea name="alamat" rows="5" style="width:100%;" class="form-control"><?php echo $data->alamat;?></textarea>
        </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary" style="width:100%;">Simpan</button><br><br>
      </div>
        </form>

    </section>
</div>