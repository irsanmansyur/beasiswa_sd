<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg ">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                            <div class="form-group">
                                <input type="numric" class="form-control" id="nis" name="nis" placeholder="Nomer Induk Siswa" value="<?= set_value('nis'); ?>">
                                <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>


                             <div class="form-group">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>">
                                <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                             <div class="form-group ">
                            <select id="jenis_kelamin"name="jenis_kelamin"  class="form-control " value="<?= set_value('jenis_kelamin'); ?> ">
                                <option selected>Jenis Kelamin</option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                              </select>
                            </div>

                            <div class="form-group">                                
                                <input type="text" class="form-control " id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Isi Alamat" value="<?= set_value('alamat'); ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="No telepon" value="<?= set_value('no_tlp'); ?>">
                                <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                             <div class="form-group row">
                                <div class="col-sm-6 mb-0 mb-sm-2">
                                 <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control " id="password2" name="password2" placeholder="Ulangi Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Daftar Akun
                            </button>
                        </form>
                        <hr>
                        
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>">Sudah memiliki Akun? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> 