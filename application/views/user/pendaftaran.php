<!-- Begin Page Content -->
<div class="container-fluid">
	<script type="text/javascript">
		$(window).on('load', function() {
			$('exampleModal').modal('show');
		});
	</script>

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-center text-gray-800"><strong><?= $title; ?></strong></h1>
	<?php if ($this->session->flashdata("message")) : ?>
		<div class="alert alert-success" role="alert"><?= $this->session->flashdata("message"); ?></div>
	<?php endif; ?>

	<div class="row">
		<div class="col-md-12">
			<form>
				<div class="panel panel-info"></div>
				<div class="panel-body">
					<table class="table table-condensed table-light text-black">
						<thead>
							<tr>
								<th scope="col">NO</th>
								<th scope="col">BEASISWA</th>
								<th scope="col">STATUS</th>
								<th scope="col">OPSI</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($beasiswas	 as $i_beasiswa => $beasiswa) : ?>
								<tr>
									<th><?= $i_beasiswa + 1; ?> </th>
									<th><?= $beasiswa->name; ?></th>
									<th>
										<div class="badge badge-success">AKTIF</div>
									</th>
									<th>
										<?php if ($beasiswa->kd_beasiswa == 1) : ?>
											<a href="<?= base_url("beasiswa/tambah/skm"); ?>" class="btn btn-primary btn-sm" data-bs-target="#staticBackdrop">Daftar</a>
										<?php else : ?>
											<a href="<?= base_url("beasiswa/tambah/prestasi"); ?>" class="btn btn-primary btn-sm" data-bs-target="#staticBackdrop">Daftar</a>
										<?php endif; ?>
									</th>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<br><br><br><br><br><br><br><br><br><br><br>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(window).on('load', function() {
		$('#exampleModal').modal('show');
	});
</script>
