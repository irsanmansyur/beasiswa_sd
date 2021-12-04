<div class="container-fluid">
	<h2>Pilih Jenis Beasiswa</h2>
	<div class="d-flex my-5">
		<?php foreach ($jenis_beasiswa as $i_jns => $jns) : ?>
			<a href="<?= base_url("penilaian/beasiswa/jenis/" . $jns->kd_beasiswa); ?>" class="btn btn-primary mr-2"><?= $jns->name; ?></a>
		<?php endforeach; ?>
	</div>
</div>
