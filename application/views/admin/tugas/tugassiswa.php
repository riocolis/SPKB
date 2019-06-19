        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
          <div class="row">
            <div class="col-lg-6">
              <form action="<?= base_url('admin/lihattugasiswa') ?>" method="post">
                <label>Kode Kelas</label>
                <select name="kode" id="kode" class="form-control form-control-lg">
                  <option value="0">Pilih Kode Kelas</option>
                  <?php foreach ($kelas as $ks) { ?>
                    <option value="<?= $ks['kode_kelas'] ?>"><?= $ks['kode_kelas']; ?></option>
                  <?php } ?>
                </select>
                <hr>
                <label>Jenis Tugas</label>
                <select name="tugas" class="form-control form-control-lg">
                  <option value="0">Pilih Jenis Tugas</option>
                  <?php foreach ($tugas as $ts) { ?>
                    <option value="<?= $ts['id'] ?>"><?= $ts['nama_tugas']; ?></option>
                  <?php } ?>
                </select>
                <hr>
                <button type="submit" class="btn btn-primary">Lihat Tugas</button>
              </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->