<div class="container-fluid">

	
  <div class="card-header text-center">
    <h3><strong>Detail Data Siswa</strong></h3>
  </div>
  <div class="card mb-3 col-lg-12">
        <div class="row no-gutters">
            <div class="col-md-3 mt-3 mb-3">
                <img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" class="card-img" height="270px" width="65px">
            </div>
            
                <div class="card-body">
                    <p class="card-text">NIS :  <?= $user['nis']; ?></p>
                    <p class="card-title">Nama Lengkap : <?= $user['name']; ?></p>
                    <p class="card-text">Tanggal Lahir :  <?= $user['tanggal_lahir']; ?></p>
                    <p class="card-text">Jenis Kelamin :  <?= $user['jenis_kelamin']; ?></p>
                    <p class="card-text">Alamat Email : <?= $user['email']; ?></p>
                    <p class="card-text">Alamat : <?= $user['alamat']; ?></p>
                    <p class="card-text">Nomor Telepon : <?= $user['no_tlp']; ?></p>
                    <p class="card-text"><small class="text-muted">Daftar akun sejak <?= date('d F Y', $user['date_created']); ?></small></p>
                     <a href="<?= base_url(); ?>admin/datasiswa" class="btn btn-success ml-3 mr-2 float-right">Kembali</a>
            </div>
        </div>
    </div>
</div>
