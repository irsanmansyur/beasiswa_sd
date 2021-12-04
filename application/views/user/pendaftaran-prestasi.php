<h1 class="h3 mb-4 text-center text-gray-800"><strong>pendaftaran beasiswa Prestasi</strong></h1>
<div class="card m-3">
	<div class="card-body">
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="kd_beasiswa" value="1">
			<div class="row">
				<div class="col-sm-4 mt-2">
					<h6><strong>NIS</strong></h6>
				</div>
				<div class="col-sm-8 mb-2 mt-0"><input type="text" class="form-control" id="nis" name="nis" value="<?= $user['nis']; ?>" readonly></div>
			</div>
			<div class="row">
				<div class="col-sm-4 mt-2">
					<h6><strong>NAMA</strong></h6>
				</div>
				<div class="col-sm-8 mb-2 mt-0"><input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" readonly></div>
			</div>
			<div class="row">
				<div class="col-sm-4 mt-2">
					<h6><strong>RANKING</strong></h6>
				</div>
				<div class="form-group col-sm-8 mb-2 mt-0 ">
					<select name="peringkat" class="form-control" id="">
						<option selected disabled>----Pilihan----</option>
						<option value="1">PERINGKAT 1</option>
						<option value="2">PERINGKAT 2</option>
						<option value="3">PERINGKAT 3 - 4</option>
						<option value="4">PERINGKAT 5 - 10 </option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 mt-2">
					<h6><strong>PENGHASILAN ORANG TUA</strong></h6>
				</div>
				<div class="form-group col-sm-8 mb-2 mt-0 ">
					<select name="pd_ot" class="form-control" id="">
						<option selected disabled>----Pilihan----</option>
						<option value="1">
							<= 1.000.000</option>
						<option value="2">600.000 - 1.500.000</option>
						<option value="3">1.600.000 - 2.500.000</option>
						<option value="4">>= 2.600.000 </option>
					</select>
					<?= form_error("pd_ot", "<small class='text-danger'>", "</small>"); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 mt-2">
					<h6><strong>TANGGUNGAN ORANG TUA</strong></h6>
				</div>
				<div class="form-group col-sm-8 mb-2 mt-0 ">
					<select name="tg_ot" class="form-control" id="">
						<option selected disabled>----Pilihan----</option>
						<option value="1">1 ORANG ANAK</option>
						<option value="2">2 ORANG ANAK</option>
						<option value="3">3 ORANG ANAK</option>
						<option value="4">>= 4 ORANG ANAK </option>
					</select>
					<?= form_error("tg_ot", "<small class='text-danger'>", "</small>"); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 mt-2">
					<h6><strong>KELAS</strong></h6>
				</div>
				<div class="form-group col-sm-8 mb-2 mt-0 ">
					<select name="kelas" class="form-control" id="">
						<option selected disabled>----Pilihan----</option>
						<option value="1">1 - 2</option>
						<option value="2">3 - 4</option>
						<option value="3">5</option>
						<option value="4">6</option>
					</select>
					<?= form_error("kelas", "<small class='text-danger'>", "</small>"); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 mt-1"><small>
						<h6><strong>DOK SURAT RANGKING</strong></h6>
					</small></div>
				<div class="col-sm-8 mb-2 mt-0">
					<div class="input-group mb-3">
						<label for="formFileMultiple"></label>
						<input class="form-control" type="file" id="formFileMultiple" name="dok_rangking">
					</div>
					<?= form_error("dok_rangking", "<small class='text-danger'>", "</small>"); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 mt-1"><small>
						<h6><strong>DOK KARTU PELAJAR</strong></h6>
					</small></div>
				<div class="col-sm-8 mb-2 mt-0">
					<div class="input-group mb-3">
						<label for="formFileMultiple"></label>
						<input class="form-control" type="file" id="formFileMultiple" name="dok_kp">
					</div>
					<?= form_error("dok_kp", "<small class='text-danger'>", "</small>"); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 mt-2"><small>
						<h6><strong>DOK KARTU KELUARGA</strong></h6>
					</small></div>
				<div class="col-sm-8 mb-2 mt-0">
					<div class="input-group mb-3">
						<label for="formFileMultiple"></label>
						<input class="form-control" type="file" id="formFileMultiple" name="dok_kk">
					</div>
					<?= form_error("dok_kk", "<small class='text-danger'>", "</small>"); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-4 mt-1"></div>
					<div class="col-sm-8 mb-2 mt-0">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
