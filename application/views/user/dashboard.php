 <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
          <marquee class="badge badge-primary badge-md">   Selamat Datang <?= $user['name']; ?> </marquee>
            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profil/') . $user['image']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                                 <i class="fas fa-fw fa-sign-out-alt"></i>
                                 <span>Logout</span></a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar --> 
<!-- Begin Page Content -->

<div class="container-fluid">

    <h1 class="h3 mb-4 text-center text-gray-800"><strong><?= $title; ?></strong></h1>
  

<div class="card border-0 mb-3 bg-light text-black" style="max-width: 860px;" style="max-height: 100px;">
  <div class="row g-0">
    <div class="col-md-4 mt-4">
      <img src="<?php echo base_url(); ?>assets/img/Basis.png" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      	
        <h4 class="card-title overflow-auto"><strong>Beasiswa Anggaran 2022</strong></h4>
        <h6 class="card-text text-justify"><small> Bagi kamu siswa/i SDN Pondok Aren 01 yang membutuhkan bantuan biaya sekolah, saat ini kami sedang membuka pendaftaran beasiswa 2022 yang terbagi atas beasiswa untuk siswa yang tidak mampu dan beasiswa untuk siswa berprestasi. Program ini diselenggarakan oleh para guru serta para donatur untuk membantu meringankan ekonomi para murid.</small></h6>
        <p class="card-text"><mark> Ketentuan Khusus</mark></p>
        <p class="card-text"><small>1. Beasiswa BSKM<br>
        ~ Beasiswa Bantuan Siswa Kurang Mampu (BSKM) merupakan bantuan biaya pendidikan bagi murid yang dari keluarga kurang mampu.<br>
   		~ Melampirkan foto Kartu pelajar, Kartu Keluarga, dan Surat Keterangan Tidak Mampu (SKTM) dari RT/RW atau kelurahan setempat</small></p>
   		<p class="card-text"><small>2. Beasiswa Prestasi<br>
   		~ Beasiswa Prestasi merupakan bantuan biaya pendidikan bagi murid berprestasi disekolah<br>
   		~ Melampirkan foto Kartu Pelajar, Kartu Keluarga dan Hasil rangking rapot terakhir</small></p>
        <a href="pendaftaran" class="btn btn-primary">Daftar Sekarang</a>
      </div>
    </div>
  </div>
</div>

<div class="card border-0 mb-3 bg-light text-black" style="max-width: 860px;">
  <div class="row g-0">
    <div class="col-md-4 mt-4">
      <img src="<?php echo base_url(); ?>assets/img/Basis2.png" class="img-fluid rounded-start" alt="100px">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Pengumuman Hasil Seleksi</h5><br>
        <p class="card-text">Pengumuman dari hasil seleksi Beasiswa SKM dan Prestasi sudah dapat dilihat di halaman hasil seleksi pada tanggal yang sudah ditetapkan.</p><br><br><br><br><br><br><br><br>
        <a href="seleksi" class="btn btn-primary">Cek Hasil Seleksi</a>
     </div>
    </div>
  </div>
</div>
    <!-- Page Heading -->
    </div>
<!-- End of Main Content --> 
