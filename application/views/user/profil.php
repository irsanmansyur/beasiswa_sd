<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-center text-gray-800"><strong><?= $title; ?></strong></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3 col-lg-12">
        <div class="row no-gutters">
            <div class="col-md-3 mt-3 mb-3">
                <img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" class="card-img" height="270px" width="65px">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-text">NIS :  <?= $user['nis']; ?></p>
                    <p class="card-title">Nama Lengkap : <?= $user['name']; ?></p>
                    <p class="card-text">Tanggal Lahir :  <?= $user['tanggal_lahir']; ?></p>
                    <p class="card-text">Jenis Kelamin :  <?= $user['jenis_kelamin']; ?></p>
                    <p class="card-text">Alamat Email : <?= $user['email']; ?></p>
                    <p class="card-text">Alamat : <?= $user['alamat']; ?></p>
                    <p class="card-text">Nomor Telepon : <?= $user['no_tlp']; ?></p>
                    <p class="card-text"><small class="text-muted">Daftar akun sejak <?= date('d F Y', $user['date_created']); ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 