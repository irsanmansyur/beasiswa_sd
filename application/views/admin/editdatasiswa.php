<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
<?php if($this->session->flashdata('message')) : ?>
    
        
          <?= $this->session->flashdata('message'); ?>
        
<?php endif; ?>
  <div class="card">
  <div class="card-header text-center">
   <H3><strong><?= $title; ?></strong></H3>
  </div>

  <div class="card-body">
     <?= form_open_multipart('admin/editdatasiswa'); ?>
            <div class="form-group row">
                <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nis" name="nis" value="<?= $user['nis']; ?>"readonly>
                    
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>                    
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
             <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $user['tanggal_lahir']; ?>">
                    <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
             <div class="form-group row">
                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <input type="button" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $user['jenis_kelamin']; ?>"readonly>
                    <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>
            </div>
             <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

             <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">No Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?= $user['no_tlp']; ?>">
                    <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" class="img-thumbnail" height="200px" width="140px">
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group mb-3"><input type="file" class="form-control" id="image" name="image"><label class="input-group-text" for="image">Pilih File</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="<?= base_url(); ?>admin/datasiswa" class="btn btn-success ml-3 mr-2">Kembali</a>

            </div>
         
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

  </div>
</div>

</div>
<!-- End of Main Content --> 
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

