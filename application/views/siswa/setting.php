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
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab"><i class="fa fa-cog"></i> Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                     <form method="post" id="update" class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName"  class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" readonly="" value="<?= $profile->nama ?>" name="nama" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-10">
                          <input type="text" disabled="" value="<?= $profile->nisn ?>" class="form-control" id="inputName" placeholder="NISN">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                          <input type="text" value="<?= $profile->tempat_lahir ?>"   name="tempat_lahir" class="form-control" id="inputTempatLahir" placeholder="Tempat Lahir">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2"  class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                          <input type="text" value="<?= $profile->tgl_lahir ?>"  name="tgl_lahir" class="form-control" id="inputTgllahir" placeholder="Name">
                        </div>
                      </div>



                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"><?= $profile->alamat ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" id="inputName2" placeholder="New Password">
                          <label class="small text-danger">*isi jika ingin melakukan pergantian password*</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Simpan Perubahan</button>
                        </div>
                      </div>
                    </form>
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->

  <script type="text/javascript">
    $(document).ready(function(){
        $("#update").on("submit",function(e){
          e.preventDefault();
            if(document.getElementById('inputName').value == ""){
              swal({
                icon : "error",
                dangerMode :[true,"Ok"],
                title : "nama kosong"
              })
            }else if(document.getElementById('inputTempatLahir').value == ""){
              swal({
                icon : "error",
                dangerMode :[true,"Ok"],
                title : "tempat lahir kosong"
              })
            }else if(document.getElementById('inputTgllahir').value == ""){
              swal({
                icon : "error",
                dangerMode :[true,"Ok"],
                title : "tanggal lahir kosong"
              })
            }else if(document.getElementById('alamat').value == ""){
              swal({
                icon : "error",
                dangerMode :[true,"Ok"],
                title : "alamat masih kosong"
              })
            }else {
              $.ajax({
                url : "<?= base_url("siswa/Settings/update") ?>",
                data : new FormData(this),
                method : "POST",
                cache : false ,
                processData : false ,
                contentType : false ,
                beforeSend : function(){
                  $(".Loading").show();
                },
                complete : function(){
                  $(".Loading").hide();
                },
                success : function(response){
                  toastr.success("Berhasil memperbarui data diri");
                  setTimeout(function(){
                    window.location.href = "<?= base_url('siswa/Settings') ?>"
                  },1000)
                }
              })
            }
        })
    })
  </script>