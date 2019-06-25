        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
          <div class="row">
            <div class="col-lg-6">
              <form action="<?= base_url('admin/lihattugasiswakelompok') ?>" method="post">
                <label>Kode Kelas</label>
                <select name="kode" id="kode" class="form-control form-control-lg">
                  <option value="0">Pilih Kode Kelas</option>
                  <?php foreach ($kelas as $ks) { ?>
                    <option value="<?= $ks['kode_kelas'] ?>"><?= $ks['kode_kelas']; ?>-<?= $ks['nama_mapel']?></option>
                  <?php } ?>
                </select>
                <div class="form-group">
                  <input type="hidden" class="form-control" name="tugas" value="2">
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Lihat Tugas</button>
              </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->