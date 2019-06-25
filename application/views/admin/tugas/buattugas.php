<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

    <div class="row">
        <div class="col-lg-8">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newTugasModal">Buat Tugas</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode_Kelas</th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Jenis Tugas</th>
                        <th scope="col">Batas Waktu</th>
                        <th scope="col">Download</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($alltugas as $at) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $at['id_kode_kelas']; ?></td>
                            <td><?= $at['nama_mapel']; ?></td>
                            <td><?= $at['nama_tugas']; ?></td>
                            <td><?= $at['date']; ?></td>
                            <td><a href="<?= base_url() . 'admin/download/' . $at['nama_dokumen']; ?>" class="btn btn-success btn-sm">Download</a></td>
                            <td>
                                <a href="" class="badge badge-success" data-toggle="modal" data-target="#editTugasModal<?= $i; ?>">edit</a>
                                <!--<a href="">hapus</a>-->
                            </td>
                        </tr>

                        <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- modal-->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="newTugasModal" tabindex="-1" role="dialog" aria-labelledby="newTugasModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newTugasModal">Tambah Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/buattugas'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <label for="examplekode">KodeKelas</label>
                    <select name="kode" class="form-control form-control-lg">
                        <option value="0">Pilih Kode Kelas</option>
                        <?php foreach ($kelas as $ks) { ?>
                            <option value="<?= $ks['kode_kelas'] ?>"><?= $ks['kode_kelas']; ?>-<?= $ks['nama_mapel']?></option>
                        <?php } ?>
                    </select>
                    <hr>
                    <select name="tugas" class="form-control form-control-lg">
                        <option value="0">Pilih Jenis Tugas</option>
                        <?php foreach ($tugas as $ts) { ?>
                            <option value="<?= $ts['id'] ?>"><?= $ts['nama_tugas']; ?></option>
                        <?php } ?>
                    </select>
                    <hr>
                    <label for="tanggal">Batas waktu</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg tanggal" name="tanggal">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Dokumen</label>
                        <label class="alert alert-danger">Ingat !! Hindari Data menggunakan Simbol dan Spasi</label>
                        <input type="file" name="doc" id="doc" class="form-control form-control-lg">
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
$i = 1;
?>
<!-- Modal -->
<?php foreach ($alltugas as $at) { ?>
    <div class="modal fade" id="editTugasModal<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="editTugasModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTugasModal">Edit Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/edittugas'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label>Kode Kelas</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="kode" value="<?= $at['id_kode_kelas']; ?>">
                        </div>
                        <input type="hidden" class="form-control" name="tugas" value="<?= $at['id_tugas']; ?>" readonly="readonly">
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $at['nama_tugas']; ?>" readonly="readonly">
                        </div>
                        <label for="tanggal">Batas waktu</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg tanggal" name="tanggal">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Dokumen</label>
                            <label class="alert alert-danger">Ingat !! Hindari Data menggunakan Simbol dan Spasi</label>
                            <input type="file" name="doc" id="doc" class="form-control form-control-lg">
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