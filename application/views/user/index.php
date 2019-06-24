        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?> </h1>
          <h2 class="h4 mb-4 ">Selamat Datang di Sistem Pembagian Kelompok Belajar !!! </h2>
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-3">
                  <img src="" class="card-img" alt="">
              </div>
              <div class="col-md-9">
                <div class="card-body">
                  <h3 class="card-title">Nis  : <?= $user['id_nis'];?></h3>
                  <h3 class="card-title">Nama : <?= $user['nama_siswa'];?></h3>
                  <h3 class="card-title">Kelas : <?= $kelas['nama_kelas']?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


