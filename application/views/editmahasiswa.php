<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">EDIT DATA MAHASISWA</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Edit Data MAHASISWA</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
		<form method="post" action="<?php echo base_url().'home/updatemahasiswa'; ?>">
    <?php foreach ($datamahasiswa as $data) : ?>
        <div class="form-group">
        <input type="hidden" name="id_detail_user" class="form-control" value="<?php echo $data->id_detail_user;?>">
        </div>    
        <div class="form-group">
        <label for="">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $data->nama_lengkap;?>">
        </div>
        <div class="form-group">
        <label for="">NIM</label>
        <input type="text" name="nim" class="form-control" value="<?php echo $data->nim;?>">
        </div>
        <div class="form-group">
        <label for="">Alamat</label><br>
        <textarea name="alamat" id="" class="form-control" rows="2" style="width:100%;"><?php echo $data->alamat;?></textarea>
        </div>
        <div class="form-group">
        <label for="">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $data->tempat_lahir;?>">
        </div>
        <div class="form-group">
        <label for="">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $data->tanggal_lahir;?>">
        </div>
        <div class="form-group">
        <label for="">Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin">
            <option selected hidden value="<?php echo $data->jenis_kelamin;?>"><?php echo $data->jenis_kelamin;?></option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary" style="width:100%;">Simpan</button><br><br>
      </div>
        </form>

    </section>
</div>