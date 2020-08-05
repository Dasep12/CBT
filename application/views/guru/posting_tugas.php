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

                <h3 class="profile-username text-center"></h3>

                <p class="text-muted text-center"><?= $this->session->userdata("nama") ?></p>

                <table class="table">
                 <tr>
                    <td>NIPN</td>
                    <td>:</td>
                    <td><?= $this->session->userdata("nipn") ?></td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?= $this->session->userdata("status") ?></td>
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa fa-book"></i> Posting Tugas Siswa</a></li>
                 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <form action="" method="post" enctype="multipart/form-data" id="postTugas">
                     <div class="row">
                        <div class="form-group col-md-4 ">
                          <label>Kode Guru</label>
                          <input type="text" readonly="" value="<?= $this->session->userdata("nipn") ?>" name="kode_guru" class="form-control" placeholder="Enter Kode Guru">
                        </div>
                        <div class="form-group col-md-4 ">
                          <label>Nama Guru</label>
                          <input type="text" readonly="" value="<?= $this->session->userdata("nama") ?>" name="nama_guru" class="form-control" placeholder="Enter Nama Guru" >
                        </div>
                        <div class="form-group col-md-4 ">
                          <label>Kode Tugas</label>
                          <?php $data = range('0', '9') ?>
                          <input type="text" readonly="" value="<?=   date("Y") . rand($mapel2->kode_mapel,3 )     ?>" name="kode_tugas" class="form-control"  >
                        </div>
                        <div class="form-group col-md-4 ">
                          <label>Pilih Mata Pelajaran</label>
                         <select class="form-control" id="mata_pelajaran" name="mata_pelajaran">
                           <option value="">-</option>
                           <?php  foreach($mapel->result() as $pelajaran) : ?>
                            <option><?= $pelajaran->mata_pelajaran . " - " . $pelajaran->kode_mapel ?></option>
                           <?php endforeach ?>
                         </select>
                        </div>
                        <div class="form-group col-md-4 ">
                          <label>Pilih Kelas</label>
                         <select class="form-control" id="kelas" name="kelas">
                           <option value="">-</option>
                           <option>X</option>
                           <option>XI</option>
                           <option>XII</option>
                         </select>
                        </div>
                        <div class="form-group col-md-4 ">
                          <label>Pilih Prodi</label>
                         <select class="form-control" id="prodi" name="prodi">
                           <option value="">-</option>
                           <option>TKJ</option>
                           <option>AKP</option>
                           <option>TKR</option>
                         </select>
                        </div>
                        <div class="form-group col-md-12 ">
                          <label>Judul Tugas</label>
                          <input type="text" id="judul_tugas" name="judul_tugas" class="form-control"  placeholder="Enter Judul Tugas" >
                        </div>

                        <div class="form-group col-md-12 ">
                          <label>Keterangan / Instruksi Tugas</label>
                          <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                        </div>

                        <div class="form-group col-md-12 ">
                          <label>File Pendukung </label>
                          <input type="file" name="file_tugas" id="file_tugas" onchange="return tugasfile()" class="form-control">
                        </div>

                        <div class="footer">
                          <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Posting Tugas Siswa</button>
                        </div>


                      </div>
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
    $(function(){
      $("#postTugas").on('submit',function(e){
        e.preventDefault();
          if(document.getElementById('mata_pelajaran').value == ""){
            toastr.info("mata pelajaran belum di pilih");
          }else if(document.getElementById('kelas').value == ""){
            toastr.info("kelas belum di pilih");
          }else if(document.getElementById('prodi').value == ""){
            toastr.info("prodi belum di pilih");
          }else if(document.getElementById('judul_tugas').value == ""){
            toastr.info("judul tugas belum di isi");
          }else if(document.getElementById('keterangan').value == ""){
            toastr.info("keterangan dari tugas belum di isi");
          }else {
            $.ajax({
              url : "<?= base_url('guru/Posting_tugas/posting') ?>",
              data : new FormData(this),
              method : "POST" ,
              cache : false ,
              processData : false ,
              contentType : false ,
              beforeSend : function(){
                $(".Loading").show()
              },
              complete : function(){
                 $(".Loading").hide()
              },
              success : function(e){
                if(e == "Sukses"){
                  toastr.success("tugas berhasil di posting ")
                  window.location.href="<?= base_url('guru/Posting_tugas') ?>"
                }else {
                  swal({
                    icon : "warning",
                    title : e ,
                    text : "refresh halaman lalu upload tugas kembali"
                  }).then(function(){
                      window.location.href="<?= base_url('guru/Posting_tugas') ?>"
                  })
                }
              }
            })
          }
      })
    })
</script>