<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-center text-gray-800"><strong><?= $title; ?></strong></h1>
	<div class="my-3">
		<?php foreach ($beasiswas as $i_beasiswa => $beasiswa) : ?>
			<form action="" method="get" class="d-inline">
				<input type="text" hidden name="kd_beasiswa" value="<?= $beasiswa->kd_beasiswa; ?>">
				<button type="submit" class="btn <?= $this->input->get_post('kd_beasiswa') == $beasiswa->kd_beasiswa ? "btn-primary" : " btn-secondary"; ?>  btn-sm"><?= $beasiswa->name; ?></button>
			</form>
		<?php endforeach; ?>
	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nama Siswa</th>
				<th>Jenis Beasiswa</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pendaftarans as $i_b => $b) : ?>
				<tr>
					<td>
						<?= $b->nama_siswa; ?>
					</td>
					<td>
						<?= $b->nama_beasiswa; ?>
					</td>
					<td>
						<button class="btn btn-primary">DITERIMA</button>
					</td>
				</tr>
			<?php endforeach; ?>
			<?php if (count($pendaftarans) < 1) : ?>
				<tr>
					<td colspan="999" class="text-center">Data Kosong</td>
				</tr>

			<?php endif; ?>
		</tbody>
	</table>
</div>
