<h1 class="h3 mb-4 text-center text-gray-800"><strong>Hasil Penilaian Beasiswa Prestasi metode SAW</strong></h1>
<div class="card m-3">
	<div class="card-body">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th rowspan="2" class="align-middle">Nama</th>
					<th colspan="3" class="text-center">BENEFIT</th>
					<th colspan="1" class="text-center">COST</th>
				</tr>
				<tr>
					<th colspan="" class="text-center">Bukti Dokumen</th>
					<th colspan="" class="text-center">Tanggungan Orang Tua</th>
					<th colspan="" class="text-center">Kelas</th>
					<th colspan="" class="text-center">Penghasilan Orang Tua</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($beasiswas as $i => $beasiswa) : ?>
					<tr>
						<td>
							<?= $beasiswa->name; ?> <br>
							NIS : <?= $beasiswa->nis; ?>
						</td>
						<td class="text-center">
							6
						</td>
						<td class="text-center">
							<?= $beasiswa->tg_ot; ?>
						</td>
						<td class="text-center">
							<?= $beasiswa->peringkat; ?>
						</td>
						<td class="text-center">
							<?= $beasiswa->pd_ot; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<div class="m-3" style="background-color: white;">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th colspan="5" class="text-center bg-primary text-white font-weight-bold">NORMALISASI</th>
			</tr>
			<tr>
				<th rowspan="2" class="align-middle">Nama</th>
				<th colspan="3" class="text-center">BENEFIT</th>
				<th colspan="1" class="text-center">COST</th>
			</tr>
			<tr>
				<th colspan="" class="text-center">Bukti Dokumen (40%)</th>
				<th colspan="" class="text-center">Tanggungan Orang Tua (20%)</th>
				<th colspan="" class="text-center">Kelas (10%)</th>
				<th colspan="" class="text-center">Penghasilan Orang Tua (30%)</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($beasiswas as $i => $beasiswa) :
				$bt = 6 / 6;
				$tg_ot = $beasiswa->tg_ot / $max_beasiswa->max_tg_ot;
				$peringkat = $beasiswa->peringkat / $max_beasiswa->max_peringkat;
				$pd_ot = $beasiswa->pd_ot / $max_beasiswa->max_pd_ot;
				$beasiswas[$i]->total = 		$bt + $tg_ot + $peringkat + $pd_ot;
			?>
				<tr>
					<td>
						<?= $beasiswa->name; ?> <br>
						NIS : <?= $beasiswa->nis; ?>
					</td>
					<td class="text-center">
						<?= $bt; ?>
					</td>
					<td class="text-center">
						<?= $tg_ot; ?>
					</td>
					<td class="text-center">
						<?= $peringkat ?>
					</td>
					<td class="text-center">
						<?= $pd_ot; ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<div class="m-3" style="background-color: white;">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th colspan="6" class="text-center bg-danger text-white font-weight-bold">PERANGKINAN</th>
			</tr>
			<tr>
				<th rowspan="2" class="align-middle">Nama</th>
				<th colspan="3" class="text-center">BENEFIT</th>
				<th colspan="1" class="text-center">COST</th>
				<th rowspan="2" class="text-center align-middle bg-success text-white">TOTAL</th>
			</tr>
			<tr>
				<th colspan="" class="text-center">Bukti Dokumen (40%)</th>
				<th colspan="" class="text-center">Tanggungan Orang Tua (20%)</th>
				<th colspan="" class="text-center">Kelas (10%)</th>
				<th colspan="" class="text-center">Penghasilan Orang Tua (30%)</th>
			</tr>
		</thead>
		<tbody>
			<?php usort($beasiswas, function ($a, $b) {
				return $a->total < $b->total;
			}); ?>
			<?php foreach ($beasiswas as $i => $beasiswa) : ?>
				<tr>
					<td>
						<?= $beasiswa->name; ?> <br>
						NIS : <?= $beasiswa->nis; ?>
					</td>
					<td class="text-center">
						<?= 6 / 6; ?>
					</td>
					<td class="text-center">
						<?= $beasiswa->tg_ot / $max_beasiswa->max_tg_ot; ?>
					</td>
					<td class="text-center">
						<?= $beasiswa->peringkat / $max_beasiswa->max_peringkat; ?>
					</td>
					<td class="text-center">
						<?= $beasiswa->pd_ot / $max_beasiswa->max_pd_ot; ?>
					</td>
					<td class="text-center bg-success text-white"><?= $beasiswa->total; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
