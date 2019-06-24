<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
    <div class="row">
            <div class="col-lg-8">
            <a href="<?= base_url('admin/kelompok') ?>" class="btn btn-danger mb-3" >Kembali</a>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newBagiKelompok" >Buat Kelompok</a>
            <form action="<?= base_url('admin/lihatkelompok') ?>" method="post">
              <input type="hidden" class="form-control" name="kode1" value="<?= $simple;?>">
              <input type="hidden" class="form-control" name="tugas1" value="<?= $tugas;?>">
            <button type="submit" class="btn btn-success mb-3" >Lihat Kelompok</button>
            </form>
            <h1><?= $simple; ?></h1>
                    </h1><?php foreach($mapel as $mp){?>
                    <h2><?= $mp['nama_mapel']?></h2>
                    <?php } ?>
                <table class="table table-hover" id="tampil_table_siswa">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Kelas</th>
                            <th scope="col">Nama Mapel</th>
                            <th scope="col">NIS Siswa</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($siswa as $sw) { ?>
                            <tr>
                                <th scope="row" value=<?= $i; ?>><?= $i; ?></th>
                                <td><?= $sw['kode_kelas']; ?></td>
                                <td><?= $sw['nama_mapel']; ?></td>
                                <td><?= $sw['id_nis']; ?></td>
                                <td><?= $sw['nama_siswa']; ?></td>
                                <td><?= $sw['jenis_kelamin']; ?></td>
                                <td><?= $sw['nilai']; ?></td>
                            </tr>
                            <?php $i++;
                        } ?>
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
<div class="modal fade" id="newBagiKelompok" tabindex="-1" role="dialog" aria-labelledby="newBagiKelompok" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newBagiKelompok">Tambah Bagi Kelompok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/bagibagikelompok') ?>" method="post">
        <div class="modal-body">
        <div class="form-group">
            <input type="hidden" class="form-control" name="kode1" value="<?= $simple;?>">
         </div>
         <div class="form-group">
            <input type="hidden" class="form-control" name="tugas1" value="<?= $tugas;?>">
         </div>
                    <label>Bagi Kelompok</label>
                    <select name="jmlkelompok" class="form-control form-control-lg">
                        <option value="0">Pilih Bagi Kelompok</option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                        <option value=4>4</option>                        
                        <option value=5>5</option>                        
                        <option value=6>6</option>                        
                        <option value=7>7</option>                        
                    </select>
                    <hr>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" >Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
