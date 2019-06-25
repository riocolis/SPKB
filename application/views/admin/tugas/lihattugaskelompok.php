        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title;?> </h1>
          <a href="<?= base_url('admin/tugas') ?>" class="btn btn-danger mb-3" >Kembali</a>
        
              <div class="col-lg-6">  
                    <table class="table table-hover" id="tampil_table_siswa">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Kelas</th>
                                <th scope="col">Kelompok</th>
                                <th scope="col">Jawaban</th>
                            </tr>
                        </thead>
                        <?php
                        $i = 1;
                        foreach ($siswa as $sw) { 
                            if($sw['id_kelompok']==$i) {?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $sw['kode_kelas']; ?></td>
                                    <td>Kelompok <?= $sw['id_kelompok']; ?></td>
                                    <td><a href="<?= base_url() . 'admin/downloadtugassiswakelompok/'.$sw['nama_dokumen']; ?>" class="btn btn-success btn-sm">Download</a></td>
                                </tr>
                            </tbody>
                            <?php } $i++;
                        } ?>
                    </table>
                    </form>
                </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


