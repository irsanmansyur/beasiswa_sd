<div class="container-fluid">
  <br>
<div class="row">
	<div class="col-md-12 mt-4">
         <?php if (validation_errors()) : ?>
            <div class="alert alert-danger " role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
	    <div class="panel panel-info"> <H3 class="text-center"> <strong>DATA SISWA SDN 01 PONDOK AREN</strong> </h3></div><br>
		<div class="col-md-4">
            <?php if (empty($user)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data yang dicari tidak ada!
                </div>
            <?php endif;?>
            </div>
	    	<form action="" method="post">
	    	<div class="input-group mb-3 mt-4 col-md-5">
	    		<input type="text" class="form-control" name="keyword" placeholder="Cari data siswa"  >
 				<button class="btn btn-primary" type="submit" >Cari</button>
 				</div>
			</form>
			<!-- MODAL -->

	        <div class="panel-body">
	            <table class="table table-condensed">
	                <thead>
	                    <tr>
	                        <th scope="col">#</th>
	                        <th scope="col">NIS</th>
							<th scope="col">Nama</th>
	                        <th scope="col">OPSI</th>
	                    </tr>	                    
	                </thead>
	                <tbody>
	                <?php $i = 1; ?>
                    <?php foreach ($user as $u) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $u['nis']; ?></td>
                        <td><?= $u['name']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/detail/<?=  $u['nis']; ?>" class="badge badge-primary">detail</a>
                            <a href="<?= base_url(); ?>admin/editdatasiswa/<?=  $u['nis']; ?>" class="badge badge-success">ubah</a>
                            <a href="<?= base_url(); ?>admin/hapus/<?= $u['nis']; ?>" class="badge badge-danger" onclick="return confirm('yakin untuk menghapus data siswa?');">hapus</a>
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

           