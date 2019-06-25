<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
    <div class="row">
        <div class="col-md-8">
            <a href="<?= base_url('admin/kategorinilai') ?>" class="btn btn-danger mb-3">Kembali</a>
            <h1><?= $simple; ?></h1>
            </h1><?php foreach ($mapel as $mp) { ?>
                <h2><?= $mp['nama_mapel'] ?></h2>
            <?php } ?>
            <?php
            $i = 1;
            $iterasi = 1;
            $cek = 1;
            if ($this->admin_model->cekkodekelompok($simple) == true) {
                foreach ($test as $gt) {
                    if ($gt['kode_kelas'] == $simple && $gt['id_kelompok'] == $cek) {
                        $b = $this->admin_model->get_kelompoksiswanilai($simple, $cek); ?>
                        <h4>Kelompok <?= $cek; ?></h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Kelas</th>
                                    <th scope="col">Nama Mapel</th>
                                    <th scope="col">NIS</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Kelompok</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $t = 1;
                            foreach ($b as $print) {
                                ?>
                                <tbody>
                                    <tr>
                                        <th scope="row"><?= $t; ?></th>
                                        <td><?= $print['id_kode_kelas']; ?></td>
                                        <td><?= $print['nama_mapel']; ?></td>
                                        <td><?= $print['id_nis']; ?></td>
                                        <td><?= $print['nama_siswa']; ?></td>
                                        <td><?= $print['jenis_kelamin']; ?></td>
                                        <td><?= $print['id_kelompok']; ?></td>
                                        <td><?= $print['nilai']; ?></td>
                                        <td>
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editSiswaModal<?= $iterasi; ?>">Edit</a>
                                            <!--<a href="" data-toggle="modal" data-target="#HapusSiswaModal">Hapus</a>-->
                                        </td>
                                    </tr>
                                </tbody>
                                <?php $t++; $iterasi++;
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
    <!-- End of Main Content -->
</div>
<?php
$i = 1;

?>
<!-- Modal -->
<?php foreach ($siswa as $sw) { ?>
    <div class="modal fade" id="editSiswaModal<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="editSiswaModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSiswaModal">Edit Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/editnilaikelompok') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="kode1" value="<?= $simple; ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="tugas1" value="<?= $tugas; ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_siswa" value="<?= $sw['id_siswa']; ?>" readonly="readonly">
                        </div>
                        <label>NIS Siswa </label>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $sw['id_nis']; ?>" readonly="readonly">
                        </div>
                        <label>Siswa</label>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $sw['nama_siswa']; ?>" readonly="readonly">
                        </div>
                        <label>Nilai</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nilai" value="<?= $sw['nilai']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    $i++;
} ?>