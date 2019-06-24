<body class="bg-gradient-primary">
  <title>Registrasi Siswa</title>
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Akun Siswa</h1>
              </div>
              <?= $this->session->flashdata('message1');?>
              <form class="user" method="post" action="<?= base_url('authsiswa/registration');?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="id_nis" placeholder="Masukkan No. Induk">
                  <?= form_error('id_nis','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="nama" placeholder="Masukkan Nama Lengkap">
                  <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                <label>Pilih Jenis Kelamin</label>
                <select name ="kelamin" id="kelamin" class="form-control form-control-lg">
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </select>
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
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                    <?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Daftar !
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('authsiswa'); ?>">Sudah Punya Akun ? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
