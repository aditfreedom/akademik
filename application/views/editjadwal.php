<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">EDIT JADWAL KULIAH</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akademik</a></li>
              <li class="breadcrumb-item active">Edit Jadwal Kuliah</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
		<form method="post" action="<?php echo base_url().'home/updatejadwalkuliah'; ?>">
    <?php foreach ($jadwal as $data) : ?>
        <div class="form-group">
        <input type="hidden" name="id_jadwal_kuliah" class="form-control" value="<?php echo $data->id_jadwal_kuliah;?>">
        </div>    

        <div class="form-group">
        <label for="">Waktu Kuliah</label>
        <input type="text" name="waktu_kuliah" class="form-control" value="<?php echo $data->waktu_kuliah;?>">
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
        <?php endforeach; ?>

        <div class="form-group">
        <label for="">Mata Kuliah</label>
            <select class="form-control selectpicker" data-live-search="true" name="id_matakuliah">
            <option selected disabled value="<?php echo $data->id_matakuliah;?>"><?php echo $data->nama_matakuliah;?></option>
            <?php foreach ($jadwal3 as $data) : ?>
            <option value="<?php echo $data->id_matakuliah;?>"><?php echo $data->nama_matakuliah;?></option>
            <?php endforeach ;?>
        </select>
        </div>

        <div class="form-group">
        <label for="">Dosen</label>
            <select class="form-control selectpicker" data-live-search="true" name="id_dosen">
            <?php foreach ($jadwal as $data) : ?>
              <option selected disabled value="<?php echo $data->id_dosen;?>"><?php echo $data->nama_lengkap;?></option>
              <?php endforeach; ?>
            <?php foreach ($jadwal2 as $data) : ?>
            <option value="<?php echo $data->id_dosen;?>"><?php echo $data->nama_lengkap;?></option>
            <?php endforeach ;?>
        </select>
        </div>

        <div class="form-group">
        <label for="">Kelas</label>
            <select class="form-control selectpicker" name="id_kelas" data-live-search="true">
            <?php foreach ($jadwal as $data) : ?>
              <option selected disabled value="<?php echo $data->id_kelas;?>"><?php echo $data->nama_kelas;?></option>
              <?php endforeach; ?>
            <?php foreach ($jadwal4 as $data) : ?>
            <option value="<?php echo $data->id_kelas;?>"><?php echo $data->nama_kelas;?></option>
            <?php endforeach ;?>
        </select>
        </div>

        <div class="form-group">
        <label for="">Ruangan</label>
            <select class="form-control selectpicker" data-live-search="true" name="id_ruang">
            <?php foreach ($jadwal as $data) : ?>
              <option selected disabled value="<?php echo $data->id_ruang;?>"><?php echo $data->nama_ruang;?></option>
              <?php endforeach; ?>
            <?php foreach ($jadwal5 as $data) : ?>
            <option value="<?php echo $data->id_ruang;?>"><?php echo $data->nama_ruang;?></option>
            <?php endforeach ;?>
        </select>
        </div>
        <button type="submit" class="btn btn-primary" style="width:100%;">Simpan</button><br><br>
      </div>
        </form>

    </section>
</div>