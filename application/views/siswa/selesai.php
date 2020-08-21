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
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab"><i class="fa fa-book"></i> Daftar Tugas Diserahkan</a></li>
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
                            <th>Judul Tugas</th>
                            <th>Nama Guru</th>
                            <th>Status</th>
                            <th>Waktu</th>
                            <th>Nilai</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1 ; foreach($tugas_selesai->result() as $tugas) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><a href='javascript:;' data-nisn="<?= $tugas->nisn ?>" data-kelas="<?= $tugas->kelas ?>" data-prodi="<?= $tugas->prodi  ?>" data-kode_tugas="<?= $tugas->kode_tugas ?>" data-toggle='modal' data-target='#lihat_tugas' class='btn btn-info btn-xs'><?= $tugas->mata_pelajaran ?></a></td>
                          <td><?= $tugas->judul_tugas ?></td>
                          <td><?= $tugas->nama_guru ?></td>
                          <td><?php 
                            if(empty($tugas->nilai)){
                              echo "<label class='badge badge-success'>Diserahkan</label>";
                            }else {
                              echo "<label class='badge badge-danger'>Di nilai</label>";
                            }
                           ?></td>
                          <td><?= $tugas->tgl_diserahkan . "/" . $tugas->jam_diserahkan ?></td>
                          <td><?= $tugas->nilai ?></td>
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

<!-- modal lihat tugas siswa yang sudah selesai dan nilai -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="lihat_tugas" class="modal fade">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
              <h6>Tugas  <b id="no_inv"></b></h6>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
             <div class="load" style="position: absolute;margin: 40px 240px;z-index: 99">
              <img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
             </div>
             <div class="modal-body" id="output_list">

             
             </div>
         </div>
     </div>
</div>
</div>
<!-- end of modal tugas siswa yang sudah selesai dan di nilai -->


  <script type="text/javascript">
  $(function(){
    $("#tugas").DataTable();


       //tampilkan list transaksi ke dalam modal
    $("#lihat_tugas").on('show.bs.modal',function(e){
        var div = $(e.relatedTarget);
        var modal = $(this);
        var nisn = div.data("nisn");
        var prodi = div.data("prodi");
        var kode_tugas = div.data("kode_tugas");
        var kelas = div.data("kelas");
          $.ajax({
            url : "<?= base_url("siswa/Selesai/viewTugasSelesai/") ?>" ,
            data :"nisn="+ nisn +"&kelas="+ kelas + "&prodi="+prodi+"&kode_tugas="+ kode_tugas   ,
            method : "get",
            success : function(response){
              document.getElementById('no_inv').innerHTML = kode_tugas ;
              $("#output_list").html(response);
            }

          })
    }) 

  })

  function file(file){
    window.open("<?= base_url('assets/tugas/') ?>" + file , "height=450px","width=450px","menubar=yes","resizeable=yes");
  }
  </script>