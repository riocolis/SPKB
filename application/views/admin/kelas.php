        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?> </h1>
          <?= validation_errors();?>
          <div class="row">
              <div class="col-lg-6">
              <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKelasModal" >Buat Kelas</a>
              <table class="table table-hover">
               <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">KodeKelas</th>
                    <th scope="col">Mata Pelajaran</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Guru</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $i =1; ?>
                  <?php foreach($menu as $m ) :?>
                    <tr>
                    <th scope="row"><?= $i;?></th>
                    <td><?= $m['kode_kelas'];?></td>
                    <td><?= $m['nama_mapel'];?></td>
                    <td><?= $m['nama_kelas'];?></td>
                    <td><?= $m['nama_guru'];?></td>
                    <td>
                     <!-- <a href="" class="badge badge-success" data-toggle="modal" data-target="#editKelasModal<?=$i;?>">edit</a>-->
                      <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusKelasModal<?=$i;?>">hapus</a>
                    </td>
                    </tr>
                    <?php $i++ ?>
                  <?php endforeach; ?>
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

<!-- Modal buat kelas-->
<div class="modal fade" id="newKelasModal" tabindex="-1" role="dialog" aria-labelledby="newKelasModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newKelasModal">Tambah Kelas Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/kelas');?>" method="post">
        <div class="modal-body">
        <div class="form-group">  
            <label>Kode Kelas</label>
            <input type="text" class="form-control" name="kode" value="<?= $kode;?>" readonly="readonly">
            <small id="emailHelp" class="form-text text-muted">Kode Kelas tidak diubah</small>
         </div>
        <select name ="mapel" class="form-control form-control-lg">
          <option value="0">Pilih Mata Pelajaran</option>
          <?php foreach($mapel as $mp){?>
            <option  value="<?= $mp['id']?>"><?= $mp['nama_mapel']?></option>
          <?php }?>
        </select>
        <hr>
        <select name ="kelas" class="form-control form-control-lg">
          <option value="0">Pilih kelas</option>
          <?php foreach($kelas as $ks){?>
            <option  value="<?= $ks['id']?>"><?= $ks['nama_kelas']?></option>
          <?php }?>
        </select>
        <hr>
        <select name ="guru" class="form-control form-control-lg">
          <option value="0">Pilih guru</option>
          <?php foreach($guru as $gr){?>
            <option value="<?= $gr['id']?>"><?= $gr['nama_guru']?></option>
          <?php }?>
        </select>
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
$i =1 ;
?>
<!-- Modal -->
<?php foreach($menu as $m) {?>
<div class="modal fade" id="editKelasModal<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="editKelasModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKelasModal">Tambah Kelas Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/editnilai')?>" method="post">
        <div class="modal-body">
          <label>Kode Kelas</label>
          <div class="form-group">
              <input type="text" class="form-control" name="kode" value="<?= $m['kode_kelas'];?>">
          </div>
          <label>Nama Mapel</label>
          <div class="form-group">
              <input type="text" class="form-control" name="mapel" value="<?= $m['nama_mapel'];?>">
          </div>
          <label>Nama Kelas</label>
          <div class="form-group">
              <input type="text" class="form-control" name="kelas" value="<?= $m['nama_kelas'];?>">
          </div>
          <label>Nama Guru</label>
          <div class="form-group">
              <input type="text" class="form-control" name="guru" value="<?= $m['nama_guru'];?>">
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
<?php
$i =1 ;
?>
<!-- Modal -->
<?php foreach($menu as $m) {?>
<div class="modal fade" id="hapusKelasModal<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="hapusKelasModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusKelasModal">Hapus Kelas Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/hapuskelas')?>" method="post">
        <div class="modal-body">
        <h4>Anda Yakin Hapus Kelas ini ??? </h4>
        <div class="form-group">
              <input type="hidden" class="form-control" name="kode" value="<?= $m['kode_kelas'];?>">
          </div>
          <div class="form-group">
              <input type="hidden" class="form-control" name="mapel" value="<?= $m['id_mapel'];?>">
          </div>
          <div class="form-group">
              <input type="hidden" class="form-control" name="kelas" value="<?= $m['id_kelas'];?>">
          </div>
          <div class="form-group">
              <input type="hidden" class="form-control" name="guru" value="<?= $m['id_guru'];?>">
          </div>      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger" >Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php 
$i++;
}?>