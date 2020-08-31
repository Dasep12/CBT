  <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">

                  <?php if(empty($profile->photo)) { ?> 
                  <img class="profile-user-img img-fluid img-circle"   src="<?= base_url("assets/dist/img/siswa.png") ?>">
                  <?php }else { ?>
                  <img class="profile-user-img img-fluid img-circle"   src="<?= base_url("assets/poto_siswa/" . $profile->photo) ?>">
                  <?php } ?>
                </div>

                <h3 class="profile-username text-center"><?= $profile->nama ?></h3>

                <p class="text-muted text-center">Tahun ajaran 2019/2020</p>

                <table class="table">
                  <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td><?= $profile->nisn ?></td>
                  </tr>
                  <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><?= $profile->kelas ?></td>
                  </tr>
                  <tr>
                    <td>Prodi</td>
                    <td>:</td>
                    <td><?= $profile->prodi ?></td>
                  </tr>
                </table>

<!--                 <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab"><i class="fa fa-book"></i> Daftar Tugas</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <table id="tugas" class="table ">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>Nama Guru</th>
                            <th>Lampiran</th>
                            <th>Di kirim pada</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1 ; foreach($daftar_tugas->result() as $tugas) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $tugas->mata_pelajaran ?></td>
                          <td><?= $tugas->nama_guru ?></td>
                          <td>
                            <?php if(empty($tugas->file_tugas)){
                              echo "<small>tidak ada lampiran</small>";
                            }else {
                              $path = base_url('assets/dist/tugas/'.$tugas->file_tugas);
                              $info = pathinfo($path, PATHINFO_EXTENSION);
                                if($info == "docx"){?>
                                  <a href="javascript:file('<?= $tugas->file_tugas ?>')"><img class="img img-thumbnail" height="30px" width="30px" src="<?= base_url('assets/dist/img/word.png') ?>"></a>
                                <?php }elseif($info == "pdf" ) { ?>
                                  <a href="javascript:file('<?= $tugas->file_tugas ?>')"><img class="img img-thumbnail" height="30px" width="30px" src="<?= base_url('assets/dist/img/pdf.png') ?>"></a>
                                <?php }elseif($info == "jpg" || $info == "jpeg" ||  $info == "png" || $info == "JPG" ) { ?>
                                  <a href="javascript:file('<?= $tugas->file_tugas ?>')"><img class="img img-thumbnail" height="30px" width="30px" src="<?= base_url('assets/dist/img/picture.png') ?>"></a>
                                <?php }
                              } ?>
                          </td>
                          <td><?= $tugas->tanggal . " / " . $tugas->jam ?></td>
                          <td><a target="_blank" href="<?= base_url('siswa/Lihat_tugas/view/'. $tugas->id) ?>" class="btn btn-info btn-sm">lihat</a></td>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                  <!-- /.tab-pane -->       
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

  <script type="text/javascript">
  $(function(){
    $("#tugas").DataTable();
  })

  function file(file){
    window.open("<?= base_url('assets/tugas/soal/') ?>" + file , "height=450px","width=450px","menubar=yes","resizeable=yes");
  }
  </script>