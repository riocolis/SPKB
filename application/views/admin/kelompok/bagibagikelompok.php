        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
            <div class="row">
                <div class="col-md-6">
                    <a href="<?= base_url('admin/kelompok') ?>" class="btn btn-danger mb-3">Kembali</a>
                    <h1><?= $simple; ?></h1>
                    </h1><?php foreach($mapel as $mp){?>
                    <h2><?= $mp['nama_mapel']?></h2>
                    <?php } ?>
                    <?php
                    $i = 1;
                    $cek = 1;
                    if ($this->admin_model->cekkodekelompok($simple) == true) {
                        foreach ($test as $gt) {
                            if ($gt['kode_kelas'] == $simple && $gt['id_kelompok'] == $cek) {
                                $b = $this->admin_model->get_kelompoksiswa($simple, $cek); ?>
                                <h4>Kelompok <?= $cek; ?></h4>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">NIS</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Jenis Kelamin</th>
                                            <th scope="col">Kelompok</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $t = 1;
                                    foreach ($b as $print) {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?= $t; ?></th>
                                                <td><?= $print['id_nis']; ?></td>
                                                <td><?= $print['nama_siswa']; ?></td>
                                                <td><?= $print['jenis_kelamin']; ?></td>
                                                <td><?= $print['id_kelompok']; ?></td>
                                            </tr>
                                        </tbody>
                                        <?php $t++;
                                    }
                                    ?>
                                </table>
                                <?php $cek++;
                            }
                            $i++;
                        }
                    } else { ?>
                        <h2>Kelompok Kelas Belum dibuat </h2>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-5 float-right">
                <h1>Nilai</h1>
                <table class="table table-hover" id="tampil_table_siswa">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Kelas</th>
                                <th scope="col">NIS Siswa</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Nilai</th>
                            </tr>
                        </thead>
                        <?php
                        $i = 1;
                        foreach ($siswa as $sw) { ?>
                            <tbody>
                                <tr>
                                    <th scope="row" value=<?= $i;?>><?= $i; ?></th>
                                    <td><?= $sw['kode_kelas']; ?></td>
                                    <td><?= $sw['id_nis']; ?></td>
                                    <td><?= $sw['nama_siswa']; ?></td>
                                    <td><?= $sw['jenis_kelamin']; ?></td>
                                    <td><?= $sw['nilai'];?></td>
                                </tr>
                            </tbody>
                            <?php $i++;
                        } ?>
                    </table>
                </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->