<div class="container-fluid">


	<div class="card-header text-center">
		<h3><strong>Detail Data Siswa</strong></h3>
	</div>
	<div class="card mb-3 col-lg-12">
		<div class="row no-gutters">
			<div class="col-md-3 mt-3 mb-3">
				<img src="<?= base_url('assets/img/profil/') . $beasiswa->image; ?>" class="card-img" height="270px" width="65px">
			</div>
			<div class="card-body">
				<p class="card-text">NIS : <?= $beasiswa->nis; ?></p>
				<p class="card-title">Nama Lengkap : <?= $beasiswa->name; ?></p>
				<p class="card-text">Tanggal Lahir : <?= $beasiswa->tanggal_lahir; ?></p>
				<p class="card-text">Jenis Kelamin : <?= $beasiswa->jenis_kelamin; ?></p>
				<p class="card-text">Alamat Email : <?= $beasiswa->email; ?></p>
				<p class="card-text">Alamat : <?= $beasiswa->alamat; ?></p>
				<p class="card-text">Nomor Telepon : <?= $beasiswa->no_tlp; ?></p>
				<p class="card-text"><small class="text-muted">Daftar akun sejak <?= date('d F Y', $beasiswa->date_created); ?></small></p>
				<div class="text-right">
					<?php if (in_array($beasiswa->status, [STATUS_DITOLAK, STATUS_DITINJAU, STATUS_BELUM_DITINJAU])) : ?>
						<a href="<?= base_url("beasiswa/terima/data/" . $beasiswa->id); ?>" class="btn btn-success ml-3 mr-2">Memenuhi Syarat</a>
						<a href="<?= base_url("beasiswa/tolak/data/" . $beasiswa->id); ?>" class="btn btn-danger mr-2">Tolak</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="card card-body ">
		<div class=" d-flex justify-content-center">
			<?php if ($beasiswa->dok_skm) : ?>
				<a class="btn btn-primary mr-2" href="<?= base_url("uploads/beasiswa_dok/" . $beasiswa->dok_skm); ?>">Dokument Surat SKM </a>
			<?php endif; ?>
			<?php if ($beasiswa->dok_kp) : ?>
				<a class="btn btn-primary mr-2" href="<?= base_url("uploads/beasiswa_dok/" . $beasiswa->dok_kp); ?>">Dokument Surat SKM </a>
			<?php endif; ?>
			<?php if ($beasiswa->dok_kk) : ?>
				<a class="btn btn-primary mr-2" href="<?= base_url("uploads/beasiswa_dok/" . $beasiswa->dok_kk); ?>">Dokument Surat SKM </a>
			<?php endif; ?>
			<?php if ($beasiswa->dok_rangking) : ?>
				<a class="btn btn-primary mr-2" href="<?= base_url("uploads/beasiswa_dok/" . $beasiswa->dok_rangking); ?>">Dokument Surat SKM </a>
			<?php endif; ?>
		</div>
	</div>
</div>
