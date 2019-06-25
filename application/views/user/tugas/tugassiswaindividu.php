        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
            <h1><?= $kode; ?></h1><?php foreach($mapel as $mp){?>
                <h2><?= $mp['nama_mapel']?></h2>
            <?php } ?>
            <h2>Silahkan download tugas di bawah ini : </h2>
            <?php foreach($download as $dw) {?>
            <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#downloadtugas">Download</a>
            <?php } ?>
            <hr>
            <?php if($this->user_model->cekuploadsiswa($kode,$this->session->userdata('id'))==false){?>
            <div class="row">
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#uploadtugas">Upload Tugas</a>
            </div>
            <?php }
            else
            {?>
            <div class="row">
                <h1>Anda Sudah Upload Tugas </h1>
            </div>
            <?php } ?>
        </div>
        <!-- /.container-fluid -->

        </div>
        <div class="modal fade" id="uploadtugas" tabindex="-1" role="dialog" aria-labelledby="uploadtugas" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadtugas">Upload Tugas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('user/cektugassiswaindividu'); ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <label for="examplekode">KodeKelas</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="kode" value="<?= $kode; ?>" readonly="readonly">
                            </div>
                            <hr>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="idsiswa" value="<?= $this->session->userdata('id'); ?>" readonly="readonly">
                            </div>
                            <label for="tanggal">Tanggal Upload</label>
                            <div class="form-group">
                                <input type="text" class="form-control" readonly="readonly" value="<?= date('l, d-m-y'); ?>" name="tanggal">
                            </div>
                            <hr>
                            <label>Upload TUGAS !! </label>
                            <div class="form-group">
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

        <div class="modal fade" id="downloadtugas" tabindex="-1" role="dialog" aria-labelledby="downloadtugas" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="downloadtugas">Download Tugas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <label for="examplekode">KodeKelas</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="kode" value="<?= $kode; ?>" readonly="readonly">
                            </div>
                            <hr>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="idsiswa" value="<?= $this->session->userdata('id'); ?>" readonly="readonly">
                            </div>
                            <label for="tanggal">Batas waktu</label>
                            <div class="form-group">
                                <input type="text" class="form-control" readonly="readonly" value="<?= date('l, d-m-y'); ?>" name="tanggal">
                            </div>
                            <hr>
                            <label>TUGAS !! </label>
                            <div class="form-group">
                                <?php
                                foreach ($download as $dw) { ?>
                                    <a href="<?= base_url() . 'user/download/' . $dw['nama_dokumen']; ?>" class="btn btn-success btn-lg">Download</a>
                                <?php }
                            ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>