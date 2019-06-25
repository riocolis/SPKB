        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <h1 class="h2 mb-4"><?= $simple; ?>-<?php foreach($mapel as $ms) { ?><?= $ms['nama_mapel'];?><?php } ?></h1>
            <a href="<?= base_url('admin/kategorinilai') ?>" class="btn btn-danger mb-3" >Kembali</a>
            <div class="row">
                <div class="col-lg-8">  
                    <table class="table table-hover" id="tampil_table_siswa">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Kelas</th>
                                <th scope="col">NIS Siswa</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Aksi</th>
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
                                    <td>
                                        <a href="" class="badge badge-success" data-toggle="modal" data-target="#editSiswaModal<?=$i;?>">Edit</a>
                                        <!--<a href="" data-toggle="modal" data-target="#HapusSiswaModal">Hapus</a>-->
                                    </td>
                                </tr>
                            </tbody>
                            <?php $i++;
                        } ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
<?php
$i =1 ;
?>
<!-- Modal -->
<?php foreach($siswa as $sw) {?>
<div class="modal fade" id="editSiswaModal<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="editSiswaModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editSiswaModal">Edit Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/editnilai')?>" method="post">
        <div class="modal-body">
        <div class="form-group">
            <input type="hidden" class="form-control" name="kode1" value="<?= $simple;?>">
         </div>
         <div class="form-group">
            <input type="hidden" class="form-control" name="tugas1" value="<?= $tugas;?>">
         </div>
         <div class="form-group">
            <input type="hidden" class="form-control" name="id_siswa" value="<?= $sw['id_siswa'];?>">
         </div>
         <label>Siswa</label>
         <div class="form-group">
            <input type="text" class="form-control" name="siswa" value="<?= $sw['nama_siswa'];?>" readonly="readonly">
         </div>
         <label>Nilai</label> 
         <div class="form-group">
            <input type="text" class="form-control" name="nilai" value="<?= $sw['nilai'];?>">
         </div>       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" >Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php 
$i++;
}?>