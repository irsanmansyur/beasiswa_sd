<div class="container-fluid">
	<br>
	<div class="row">
		<div class="col-md-12 mt-4">
			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger " role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>
			<div class="panel panel-info">
				<H3 class="text-center"> <strong>PESERTA BEASISWA</strong> </h3>
			</div><br>
			<?php $this->load->view("alert/alert"); ?>

			<div class="col-md-4">
				<?php if (empty($user)) : ?>
					<div class="alert alert-danger" role="alert">
						Data yang dicari tidak ada!
					</div>
				<?php endif; ?>
			</div>
			<form action="" method="post">
				<div class="input-group mb-3 mt-4 col-md-5">
					<input type="text" class="form-control" name="keyword" placeholder="Cari data siswa">
					<button class="btn btn-primary" type="submit">Cari</button>
				</div>
			</form>
			<!-- MODAL -->

			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">NIS</th>
							<th scope="col">Nama</th>
							<th scope="col">Beasiswa</th>
							<th scope="col">Status</th>
							<th scope="col">OPSI</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($beasiswas as $i => $beasiswa) : ?>
							<tr>
								<th scope="row"><?= $i + 1; ?></th>
								<td><?= $beasiswa->nis; ?></td>
								<td><?= $beasiswa->name; ?></td>
								<td><?= $beasiswa->nama_beasiswa; ?></td>
								<td class="text-center">
									<?php if ($beasiswa->status == STATUS_DITERIMA) : ?>
										<span class="badge badge-success">Diterima</span>
									<?php elseif ($beasiswa->status == STATUS_MEMENUHI_SYARAT) : ?>
										<span class="badge badge-primary">Memenuhi Syarat</span>
									<?php elseif ($beasiswa->status == STATUS_DITOLAK) : ?>
										<span class="badge badge-secondary">Ditolak</span>
									<?php elseif ($beasiswa->status == STATUS_DITINJAU) : ?>
										<span class="badge badge-warning">Di Tinjau</span>
									<?php else : ?>
										<span class="badge badge-danger">Berlum Di lihat</span>
									<?php endif; ?>
								</td>
								<td>
									<a class="badge badge-primary" href="<?= base_url("beasiswa/detail/data/" . $beasiswa->id); ?>">Lihat</a>
								</td>
							</tr>
							<?php $i++; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>




<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
