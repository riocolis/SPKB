        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
            <div class="row">
                <div class="col-lg-6">
                    <a href="<?= base_url('user/nilai') ?>" class="btn btn-danger mb-3">Kembali</a>
                    <h1><?= $kode; ?></h1>
                    <?php $cek=1; $t=1;
                    foreach($siswa as $ty) {
                    if($ty['kode_kelas']==$kode && $ty['nama_siswa']==$this->session->userdata('nama')){
                    $b = $this->user_model->ceknilaikodekelompok($kode,$ty['id_kelompok']); ?>
                    <h4>Kelompok <?= $ty['id_kelompok']; ?></h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIS</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Kelompok</th>
                                <th scope="col">Nilai</th>
                            </tr>
                        </thead>
                        <?php $c=1;
                        foreach($b as $print){ ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?= $c; ?></th>
                                <td><?= $print['id_nis']; ?></td>
                                <td><?= $print['nama_siswa']; ?></td>
                                <td><?= $print['jenis_kelamin']; ?></td>
                                <td><?= $print['id_kelompok']; ?></td>
                                <td><?= $print['nilai'];?></td>
                            </tr>
                        </tbody>
                        <?php $c++;} } ?>
                    </table>
                    <?php $t++; }?>
                </div>

            </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->