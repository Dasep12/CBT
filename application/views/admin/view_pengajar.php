
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Profile Siswa <i class="fa fa-graduation-cap"></i> </h3>
          </div>
        <div class="card-body">
          <div class="row">

            <div class="card col-lg-4">
          <center>
              <form action="" method="post" id="updatePoto" enctype="multipart/form-data">
              <?php if(empty($profile->photo)){ ?>
                <img src="#" height="50px" width="60px">
              <?php }else { ?>
                <img height="150px" width="250px" class="mt-4 img img-thumbnail" src="<?= base_url("assets/poto_siswa/". $profile->photo) ?>">
              <?php } ?>
               <input type="file" class="mt-2 ml-5" name="photo" id="photo" onchange="return file()">
               <input type="hidden" name="id" value="<?= $profile->id ?>">
               <input type="hidden" name="namePoto" value="<?= $profile->photo ?>">
               <button type="submit" class="btn btn-primary btn-sm mt-2">Update Poto</button>
            </form>
          </center>
            </div>
            <div class="col-lg-8">
              <form action="" method="post" id="updateData" name="updateData">
                <input type="hidden" name="id" value="<?= $profile->id ?>">
                <table class="table">
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td><input class="form-control"  type="text" name="nama" id="nama" value="<?= $profile->nama ?>"></td>
                    </tr>
                    <tr>
                      <td>NIPN</td>
                      <td>:</td>
                      <td><input class="form-control"  type="text" name="nipn" id="nipn" value="<?= $profile->nipn ?>"></td>
                    </tr> 
                     <tr>
                      <td>Tempat Lahir</td>
                      <td>:</td>
                      <td><input class="form-control"  type="text" name="tempat_lahir" id="tempat_lahir" value="<?= $profile->tempat_lahir ?>"></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir</td>
                      <td>:</td>
                      <td>
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text"  name="tgl_lahir" value="<?= $profile->tgl_lahir ?>" placeholder="Masukan Tanggal Lahir" id="tgl_lahir" class="col-md-7 form-control datetimepicker-input" data-target="#reservationdate"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                      </td>
                    </tr>                    
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                        <button type="submit" class="btn btn-info btn-sm">Update Data</button>
                      </td>
                    </tr>                    
                </table>
              </form>
            </div>

          </div>

        </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
<script type="text/javascript">
  $(document).ready(function(){
    //update poto profile siswa 
    $("#updatePoto").submit(function(e){
      e.preventDefault();
        if(document.getElementById('photo').value == ""){
          swal({
            icon : "error",
            dangerMode : [true,"Ok"],
            title : "File Upload Kosong"
          })
        }else {
          $.ajax({
            url : "<?= base_url('admin/Siswa/updatePoto') ?>" ,
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
              swal({
                icon : "success",
                title : e ,
              }).then(function(){
                window.location.href="<?= base_url('admin/Siswa/view/'. $profile->nisn) ?>"
              })
            }
          })
        }
    })


    //update data siswa
    $("#updateData").on('submit',function(e){
      e.preventDefault();
        if(document.getElementById('nama').value == ""){
              swal({
                icon : "error",
                title : "nama masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#nama").focus();
              })
            }else if(document.getElementById('nisn').value == ""){
              swal({
                icon : "error",
                title : "nisn masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#nisn").focus();
              })
            }else if(document.getElementById('prodi').value == ""){
              swal({
                icon : "error",
                title : "prodi masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#prodi").focus();
              })
            }else if(document.getElementById('kelas').value == ""){
              swal({
                icon : "error",
                title : "kelas masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#kelas").focus();
              })
            }else if(document.getElementById('tgl_lahir').value == ""){
              swal({
                icon : "error",
                title : "tanggal lahir masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#tgl_lahir").focus();
              })
            }else if(document.getElementById('tempat_lahir').value == ""){
              swal({
                icon : "error",
                title : "tempat lahir masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#tempat_lahir").focus();
              })
            }else if(document.getElementById('alamat').value == ""){
              swal({
                icon : "error",
                title : "alamat masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#alamat").focus();
              })
            }else {
                  $.ajax({
                  url : "<?= base_url('admin/Siswa/updateData') ?>" ,
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
                    swal({
                      icon : "success",
                      title : e ,
                    }).then(function(){
                      window.location.href="<?= base_url('admin/Siswa/view/'. $profile->nisn) ?>"
                    })
                  }
                })
            }
    })
  })
</script>