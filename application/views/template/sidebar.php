 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url()?>logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b style="font-size:18px;">AKADEMIK</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()?>asset/dist/img/adit.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Halo, Admin!</a> 
          <!-- <?php echo $username ?> -->
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 text-sm">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">      
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


        <li class="nav-item ">
            <a href="<?=base_url('home');?>" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          <li class="nav-item ">
            <a href="<?=base_url('home/dosen');?>" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Dosen
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="<?=base_url('home/mahasiswa');?>" class="nav-link">
              <i class="nav-icon fa fa-user-alt"></i>
              <p>
                Mahasiswa
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="<?=base_url('home/kelas');?>" class="nav-link">
              <i class="nav-icon fa fa-door-open"></i>
              <p>
                Kelas
              </p>
            </a>
          </li>


          <li class="nav-item ">
            <a href="<?=base_url('home/matakuliah');?>" class="nav-link">
              <i class="nav-icon fa fa-book-open"></i>
              <p>
                Mata Kuliah
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?=base_url('home/ruangan');?>" class="nav-link">
              <i class="nav-icon fa fa-building"></i>
              <p>
                Ruangan
              </p>
            </a>
          </li>

         
          <li class="nav-item ">
            <a href="<?=base_url('home/letakruangan');?>" class="nav-link">
              <i class="nav-icon fa fa-arrows-alt"></i>
              <p>
                Letak Ruangan
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="<?=base_url('home/jadwal_kuliah');?>" class="nav-link">
              <i class="nav-icon fa fa-clock"></i>
              <p>
                Jadwal Kuliah
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?=base_url('home/datapengguna');?>" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                Data Pengguna
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('home/logout')?>" class="nav-link bg-danger">
              <i class="nav-icon fa fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

         


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>