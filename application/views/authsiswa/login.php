  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                  <title>Login Siswa</title>
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang Siswa!</h1>
                  </div>
                  <?= $this->session->flashdata('message');?>
                  <form class="user" method="post" action="<?= base_url('authsiswa')?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan NIS Anda"
                      value="<?= set_value('nama');?>">
                      <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                      <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label>Pilih Kelas</label>
                        <select name="kelas" id="kode" class="form-control form-control-lg">
                          <option value=" ">Pilih Kelas</option>
                          <?php foreach ($nama_kelas as $nk) { ?>
                            <option value="<?= $nk['id'] ?>"><?= $nk['nama_kelas']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="btn btn-success btn-lg" href="<?= base_url('authsiswa/registration'); ?>">Buat Akun</a>
                  </div>
                  <a href="<?= base_url('auth');?>" class="btn btn-danger btn-lg" >Kembali</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

