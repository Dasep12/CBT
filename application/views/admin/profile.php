
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Profile Administrator <i class="fa fa-user"></i> </h3>
          </div>
        <div class="card-body">
          <div class="row">
            <div class="card col-lg-4">
          <center>
              <form action="" method="post" id="updatePoto" enctype="multipart/form-data">
              <?php if(empty($profile->photo) && $profile->gender == "Laki-Laki"){ ?>
                <img class="mt-4 img img-thumbnail mb-2" src="<?= base_url('assets/dist/img/guru.jpg') ?>" height="150px" width="250px">
              <?php }if(empty($profile->photo) && $profile->gender == "Perempuan"){ ?>
                <img class="mt-4 img img-thumbnail mb-2" src="<?= base_url('assets/dist/img/guru2.png') ?>" height="150px" width="250px">
              <?php }elseif(!empty($profile->photo)) { ?>
                <img height="150px" width="250px" class="mt-4 img img-thumbnail" src="<?= base_url("assets/poto_pengajar/". $profile->photo) ?>">
              <?php } ?>
               <input type="file" class="mt-2 ml-5" name="photo" id="photo" onchange="return file()">
               <input type="hidden" name="id" value="<?= $profile->id  ?>">
               <input type="hidden" name="namePoto" value="<?= $profile->photo ?>">
               <button type="submit" class="btn btn-primary btn-sm mt-2 mb-2">Update Poto</button>
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
                      <td>
                        <input class="form-control"  type="hidden" name="nisn" id="nisn" value="<?= $profile->nipn ?>">
                        <input class="form-control"  type="text" name="nama" id="nama" value="<?= $profile->nama ?>">
                      </td>
                    </tr>
                    <tr>
                      <td>NIPN</td>
                      <td>:</td>
                      <td><input class="form-control"  type="text" name="nipn" id="nipn" value="<?= $profile->nipn ?>"></td>
                    </tr> 
                   
                    <tr>
                      <td>Gender</td>
                      <td>:</td>
                      <td>
                        <select name="gender" id="gender" class="form-control">
                          <?php if($profile->gender == "Laki-Laki"){ ?>
                            <option><?= $profile->gender ?></option>
                            <option>Perempuan</option>
                          <?php }elseif($profile->gender == "Perempuan"){ ?>
                            <option><?= $profile->gender ?></option>
                            <option>Laki-Laki</option>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>No Handphone</td>
                      <td>:</td>
                      <td><input class="form-control" type="text" name="no_hp" id="no_hp" value="<?= $profile->no_hp ?>"></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td><input class="form-control" type="text" name="email" id="email" value="<?= $profile->email ?>"></td>
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
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
<script type="text/javascript">
  $(document).ready(function(){
    //update poto profile pengajar
    $("#updatePoto").submit(function(e){
      e.preventDefault();
      //alert("hallo");
        if(document.getElementById('photo').value == ""){
          swal({
            icon : "error",
            dangerMode : [true,"Ok"],
            title : "File Upload Kosong"
          })
        }else {
          $.ajax({
            url : "<?= base_url('admin/Profile/updatePoto') ?>" ,
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
                window.location.href="<?= base_url('admin/Profile') ?>"
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
            }else if(document.getElementById('nipn').value == ""){
              swal({
                icon : "error",
                title : "nipn masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#nipn").focus();
              })
            }else if(document.getElementById('no_hp').value == ""){
              swal({
                icon : "error",
                title : "no telepon masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#no_hp").focus();
              })
            }else if(document.getElementById('email').value == ""){
              swal({
                icon : "error",
                title : "email masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#Email").focus();
              })
            }else {
                  $.ajax({
                  url : "<?= base_url('admin/Profile/updateData') ?>" ,
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
                      window.location.href="<?= base_url('admin/Profile') ?>"
                    })
                  }
                })
            }
    })
  })
</script>