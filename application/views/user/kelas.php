        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?> </h1>
          <div class="row">
            <div class="col-lg-6">
              <form action="<?= base_url('user/masukkelas')?>" method="post">
              <label>Pilih Mapel</label>
                <select name="mapel" id="kode" class="form-control form-control-lg">
                    <option value="0">Pilih Mapel</option>
                    <?php foreach ($mapel as $ms) { ?>
                      <option value="<?= $ms['id'] ?>"><?= $ms['nama_mapel']; ?></option>
                    <?php } ?>
                  </select>
                <label>Pilih Kelas</label>
                  <select name="kelas" id="kode" class="form-control form-control-lg">
                    <option value="0">Pilih Kelas</option>
                    <?php foreach ($nama_kelas as $nk) { ?>
                      <option value="<?= $nk['id'] ?>"><?= $nk['nama_kelas']; ?></option>
                    <?php } ?>
                  </select>
                  <hr>
                  <button type="submit" class="btn btn-primary">Masukkan Nilai</button>
              </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


