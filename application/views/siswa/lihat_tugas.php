
<div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url("assets") ?>/dist/profile/avatar4.png">
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa fa-home"></i>Tugas</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                  <form action="" method="POST" enctype="multipart/form-data" id="kumpulkan_tugas">
                    <label>Judul Tugas</label>
                    <input type="text" name="judul_tugas" class="form-control mb-2" value="<?= $tugas->judul_tugas ?>">

                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control"><?= $tugas->keterangan ?></textarea>

                    <div class="form-group">
                    <label class="mb-2">Lampiran</label>
                  </div>
                     <?php if(empty($tugas->file_tugas)){
                              echo "<small>tidak ada lampiran</small>";
                            }else {
                              $path = base_url('assets/dist/tugas/'.$tugas->file_tugas);
                              $info = pathinfo($path, PATHINFO_EXTENSION);
                                if($info == "docx"){?>
                                  <a class="btn-primary btn-sm btn" href="javascript:file('<?= $tugas->file_tugas ?>')"><img class="img img-thumbnail" height="30px" width="30px" src="<?= base_url('assets/dist/img/word.png') ?>"></a>
                                <?php }elseif($info == "pdf" ) { ?>
                                  <a class="btn-primary btn-sm btn" href="javascript:file('<?= $tugas->file_tugas ?>')"><img class="img img-thumbnail" height="30px" width="30px" src="<?= base_url('assets/dist/img/pdf.png') ?>"></a>
                                <?php }elseif($info == "jpg" || $info == "jpeg" || $info == "png" ) { ?>
                                  <a class="btn-primary btn-sm btn" href="javascript:file('<?= $tugas->file_tugas ?>')"><img class="img img-thumbnail" height="30px" width="30px" src="<?= base_url('assets/dist/img/picture.png') ?>"></a>
                                <?php }
                              } ?><br>
                   <small class="text-danger"><i>*klik di icon folder untuk lihat lampiran*</i></small>

                   <hr>
                   <!-- jawaban dari siswa -->
                   <label>Jawaban</label>
                   <textarea class="form-control" name="jawaban" id="jawaban" placeholder="masukan jawaban anda disini"></textarea>

                   <label>Tambahkan Lampiran</label>
                   <input type="hidden" name="kode_tugas" value="<?= $tugas->kode_tugas ?>">
                   <input type="file" class="form-control mb-2" name="file_jawaban" class="mb-4" id="file_jawaban">
                   <!-- end -->

                   <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-share"></i> Serahkan Tugas</button>
                  </form>
                  </div>       
                    <!-- /.post -->
              
                  </div>
                  </div>
                 </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

<script type="text/javascript">
  function file(file){
    window.open("<?= base_url('assets/tugas/soal/') ?>" + file , "menubar=yes" , "resizable=yes" , "height=450px" , "width=450px");
  }

  $(function(){
    $("#kumpulkan_tugas").on('submit',function(e){
      e.preventDefault();
        if(document.getElementById('jawaban').value == "" && document.getElementById("file_jawaban").value == ""){
          toastr.info("Jawaban masih  tidak lengkap isi jawaban / lampirkan tugas ");
        }else {
          $.ajax({
            url : "<?= base_url('siswa/Lihat_tugas/kumpulkan') ?>",
            data : new FormData(this),
            method : "POST",
            cache : false ,
            processData : false ,
            contentType : false ,
            beforeSend : function(){
              $(".Loading").show();
            },
            complete : function(){
              $(".Loading").hide()
            },
            success: function(msg){
              swal({
                icon : "success",
                title : msg 
              }).then(function(){
                window.location.href="<?= base_url('siswa/Daftar_tugas') ?>"
              })
            }
          })
        }
    })
  })
</script>