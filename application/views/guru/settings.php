
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa fa-user"></i> Update Profile</a></li>
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
                          <input type="hidden" name="nipn" value="<?= $profile->nipn ?>">
                          <input type="text" value="<?= $profile->nama ?>" name="nama" class="form-control" id="nama" placeholder="Name">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName"  class="col-sm-2 col-form-label">Gelar</label>
                        <div class="col-sm-10">
                          <input type="text" value="<?= $profile->gelar ?>" name="gelar" class="form-control" id="gelar" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName"  class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="input-group date col-sm-10" id="reservationdate" data-target-input="nearest">
                            <input type="text" name="tgl_lahir" value="<?= $profile->tgl_lahir ?>"  id="tgl_lahir" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName"  class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea name="alamat" id="alamat" class="form-control"><?= $profile->alamat ?></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName"  class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" value="<?= $profile->email ?>" name="email" class="form-control" id="email">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName"  class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password"  name="password" class="form-control" >
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Simpan Perubahan</button>
                        </div>
                      </div>
                    </form>
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->

<script>
  $(function(){
    $("#update").on("submit",function(e){
      e.preventDefault();
        if(document.getElementById('nama').value == ""){
          toastr.info("nama tidak boleh kosong");
        }else if(document.getElementById("tgl_lahir").value == ""){
          toastr.info("tanggal lahir tidak boleh kosong")
        }else if(document.getElementById("alamat").value == ""){
          toastr.info("alamat tidak boleh kosong")
        }else if(document.getElementById("email").value == ""){
          toastr.info("email tidak boleh kosong")
        }else {
          $.ajax({
            url : "<?= base_url('guru/Settings/update/') ?>",
            data : new FormData(this),
            method : "POST" ,
            processData : false ,
            cache : false ,
            contentType : false ,
            beforeSend : function(){
              $(".Loading").show();
            },
            complete : function(){
              $(".Loading").hide();
            },
            success : function(e){
              toastr.success("Data Berhasil Update");
              window.location.href="<?= base_url('guru/Settings') ?>"
            }
          })
        }
    })
  })
</script>