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
            <button class="btn btn-success mb-2" data-toggle="modal" data-target="#lihat_tugas"><i class="fa fa-plus"></i> Posting Materi</button>
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa fa-book"></i> Materi Siswa</a></li>
                 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <table class="table" id="tugas">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Kode Materi</th>
                            <th>Judul Materi</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas / Prodi</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                          <tbody>
                           
                          </tbody>
                      </table>
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

<!-- modal lihat tugas siswa -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="lihat_tugas" class="modal fade">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
              <h6>Posting Materi Siswa <b id="no_inv"></b></h6>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
             <div class="load" style="position: absolute;margin: 40px 240px;z-index: 99">
              <img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
             </div>

             <div class="modal-body" id="output_list">
             <form enctype="multipart/form-data" action="" method="post" id="uploadMateri">
              <label>Judul Materi</label>
              <input class="form-control" type="text" name="judul_materi">

              <label>Keterangan</label>
              <textarea name="keterangan" class="form-control"></textarea>

              <label>Mata Pelajaran</label>
              <select class="form-control" name="mata_pelajaran">
                <?php foreach($mapel as $r) : ?>
                  <option value="<?= $r->mata_pelajaran ?>"><?= $r->mata_pelajaran . " - " . $r->kode_mapel ?></option>
                <?php endforeach ?>
              </select>
              <label>Kelas</label> 
              <select name="kelas" class="form-control">
                <option>X</option>
                <option>XI</option>
                <option>XII</option>
              </select>

              <label>Prodi</label>
              <select name="prodi" class="form-control">
                <option>TKJ</option>
                <option>AKP</option>
                <option>TKR</option>
              </select>
              <label>Tambah Lampiran</label><br>
              <input type="file" multiple="" name="file_materi[]" >
             </div>

             <div class="modal-footer">
              <button type="submit" class="btn btn-success ">Post Materi</button>
         </div>
       </form>
             </div>
         </div>
     </div>
 </div>

<!-- end of modal tugas siswa -->

  <script type="text/javascript"> 
  $(document).ready(function(){
      $('#tugas').DataTable();

        $("#uploadMateri").on("submit",function(e){
          e.preventDefault();
            //upload materi lewata ajax
            $.ajax({
              url : "<?= base_url('guru/Materi/upload') ?>",
              data : new FormData(this),
              cache : false ,
              method : "POST",
              contentType : false ,
              processData : false ,
              success : function(e){
                alert(e);
              }
            })
      })
  })
</script>