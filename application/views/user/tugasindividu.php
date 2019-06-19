        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
          <div class="row">
            <div class="col-lg-6">
              <form action="<?= base_url('user/tugassiswaindividu') ?>" method="post">
                <label>Kode Kelas</label>
                <select name="kode" id="kode" class="form-control form-control-lg">
                  <option value="0">Pilih Kode Kelas</option>
                  <?php foreach ($kelas as $ks) { ?>
                    <option value="<?= $ks['id_kode_kelas'] ?>"><?= $ks['id_kode_kelas']; ?> - <?=$ks['nama_mapel']?></option>
                  <?php } ?>
                </select>
                <hr>
                <button type="submit" class="btn btn-primary">Upload Tugas</button>
              </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        