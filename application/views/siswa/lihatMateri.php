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
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab"><i class="fa fa-book"></i> Lihat Materi</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <h2><?= $materi->judul_materi ?></h2>
                      <h4><?= $materi->keterangan_materi ?></h4>
                      <h6>posted on <?= $materi->tgl_post ." / ". $materi->jam_post ?></h6>
                      
                      <div class="form-group mt-4">
                        <?php foreach($file_materi as $filemtr) : ?>
                          <?php                          
                              $path = base_url("assets/materi/". $filemtr->file);
                              $info = pathinfo($path, PATHINFO_EXTENSION);
                              if($info == "xlsx" || $info == "csv" || $info == "xls" ){ ?>
                              <a href="javascript:open<?= $filemtr->id ?>('<?= $filemtr->file ?>')" class="col-lg-12 btn btn-danger mb-2"><img class="img img-thumbnail" height="30px" width="30px" src="<?= base_url("assets/dist/img/excel.png") ?>"> <?= $filemtr->file ?> </a><br>
                            <?php }else if($info == "png" || $info == "jpeg" || $info == "jpg"){ ?>
                              <a href="javascript:open<?= $filemtr->id ?>('<?= $filemtr->file ?>')" class="col-lg-12 btn btn-danger mb-2"><img class="img img-thumbnail" height="30px" width="30px" src="<?= base_url("assets/dist/img/picture.png") ?>"> <?= $filemtr->file ?> </a><br>
                            <?php } else if($info == "pdf" || $info == "PDF" ){ ?>
                              <a href="javascript:open<?= $filemtr->id ?>('<?= $filemtr->file ?>')" class="col-lg-12 btn btn-danger mb-2"><img class="img img-thumbnail" height="30px" width="30px" src="<?= base_url("assets/dist/img/pdf.png") ?>"> <?= $filemtr->file ?> </a><br>
                            <?php }else if($info == "docx"  ){ ?>
                              <a href="javascript:open<?= $filemtr->id ?>('<?= $filemtr->file ?>')" class="col-lg-12 btn btn-danger mb-2"><img class="img img-thumbnail" height="30px" width="30px" src="<?= base_url("assets/dist/img/word.png") ?>"> <?= $filemtr->file ?> </a><br>
                            <?php }
                           ?>
                           <script type="text/javascript">
                              function open<?= $filemtr->id ?>(file){
                                window.open("<?= base_url('assets/materi/') ?>"+file , "height=450px","width=450px","menubar=yes","resizeable=yes");
                              //  alert(file);
                              }
                          </script>
                        <?php endforeach ?>
                      </div>
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

