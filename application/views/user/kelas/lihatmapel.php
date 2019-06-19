        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <a href="<?= base_url('user/kelas') ?>" class="btn btn-danger mb-3" >Kembali</a>
            <?php 
            ?>
            <div class="row">
                <div class="col-lg-6">
                    <table class="table table-hover" id="tampil_table_siswa">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Kelas</th>
                                <th scope="col">Mapel</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Guru</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $i = 1;
                        $j=1;
                        foreach ($kelas as $ks) { ?>
                            <tbody>
                                <tr>
                                    <th scope="row" value=<?= $i;?>><?= $i; ?></th>
                                    <td><?= $ks['kode_kelas']; ?></td>
                                    <td><?= $ks['nama_mapel']; ?></td>
                                    <td><?= $ks['nama_kelas']; ?></td>
                                    <td><?= $ks['nama_guru']; ?></td>
                                    <?php
                                      if($this->user_model->ceksiswakelas($ks['kode_kelas'],$j,$this->session->userdata('id'))==false)
                                      { 
                                    ?>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#kelasMasuk<?=$i;?>">Gabung</a>
                                    </td>
                                    <?php
                                      }
                                      else
                                      {?>
                                      
                                    <td>
                                        Status Masuk
                                    </td>
                                     <?php }
                                    ?>
                                </tr>
                            </tbody>
                            <?php
                            $i++;
                        } ?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
<?php
$i =1 ;
$id = $this->session->userdata('id');
?>
<!-- Modal -->
<?php foreach($kelas as $ni) {?>
<div class="modal fade" id="kelasMasuk<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="kelasMasuk" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kelasMasuk">Gabung Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="<?= base_url('user/addsiswamasuk')?>" method="post">
        <div class="modal-body">
        <h4>Anda Yakin Gabung Kelas ini ??? </h4>
        <div class="form-group">
            <input type="hidden" class="form-control" name="mapel" value="<?= $ni['id_mapel'];?>" readonly="readonly">
        </div> 
        <div class="form-group">
            <input type="hidden" class="form-control" name="kelas" value="<?= $ni['id_kelas'];?>" readonly="readonly">
         </div> 
        <div class="form-group">
            <input type="hidden" class="form-control" name="kode1" value="<?= $ni['kode_kelas'];?>" readonly="readonly">
         </div>
         <label></label>
         <div class="form-group">
            <input type="hidden" class="form-control" name="jenis" value="<?= $j=1;?>" readonly="readonly">
         </div>
         <label></label>
         <div class="form-group">
            <input type="hidden" class="form-control" name="siswa" value="<?= $id; ?>" readonly="readonly">
        </div>
         <div class="form-group">
            <input type="hidden" class="form-control" name="nilai" value="<?= $k=0;?>" readonly="readonly">
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