
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Tambah Administrator <i class="fa fa-user-circle"></i> </h3>
          </div>
        <div class="card-body">
       <form id="tambahAdmin" method="post" >
        <table class="table">
          <tr>
            <th width="120px" >Username *</th>
            <td>:</td>
            <td><input type="text" name="username" class="form-control col-md-8" placeholder="Masukan Username" id="username"></td>          
          </tr>
          <tr>
            <th>NIPN / NISN / NIK *</th>
            <td>:</td>
            <td><input type="text" name="nipn" placeholder="Masukan NIPN / NISN / NIK" class="form-control col-md-8" id="nipn"></td>          
          </tr>
          <tr>
            <th>Gender</th>
            <td>:</td>
            <td>
              <select name="gender" class="form-control col-md-8" id="gender">
                <option>Laki-Laki</option>
                <option>Perempuan</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Role Level *</th>
            <td>:</td>
            <td>
              <select class="form-control col-md-8" disabled="" name="role_id">
                <option>1</option>
              </select>
            </td>          
          </tr>
          <tr>
            <th>Password *</th>
            <td>:</td>
            <td><input type="text" name="password" placeholder="Masukan Password" class="form-control col-md-8" id="password"></td>          
          </tr>
          <tr>
            <th>Photo *</th>
            <td>:</td>
            <td><input type="file" onchange="return validasi()" name="photo" class="form-control col-md-8" id="photo"></td>          
          </tr>

          <tr>
            <td></td>
            <td></td>
            <td><button type="submit" class="btn btn-danger btn-sm">Tambah Data</button></td>
          </tr>
        </table>
        </form>
            <div class="form-inline mb-2">
              <label class=""></label>
              
            </div>

            <div class="form-inline mb-2">
              <label class=""></label>
              
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    <script type="text/javascript">
//validasi file yang boleh di upload
      function validasi(){
        var file = document.getElementById('photo');
        var path = file.value ;
        var exe = /(\.jpg|\.png|\.jpeg|\.gif)$/i;
          if(!exe.exec(path)){
            swal({
              icon : "error",
              dangerMode : [true,"Ok"],
              title : "file tidak di ijinkan di upload"
            })
            file.value = "" ;
            return ;
          }
      }
      $(function(){
        $("#tambahAdmin").on("submit",function(e){
          e.preventDefault();
            if(document.getElementById('username').value == ""){
              swal({
                icon : "error",
                title : "mata pelajaran masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#username").focus();
              })
            }else if(document.getElementById('nipn').value == ""){
              swal({
                icon : "error",
                title : "NIPN / NISN / NIK  masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#nipn").focus();
              })
            }else if(document.getElementById('password').value == ""){
              swal({
                icon : "error",
                title : "password masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#password").focus();
              })
            }else {
              $.ajax({
                url : "<?= base_url("admin/Tambahadmin/input") ?>",
                data : new FormData(this),
                method : "post" ,
                contentType : false ,
                cache : false ,
                processData : false ,
                beforeSend : function(){
                  $(".Loading").show();
                },
                complete : function(){
                  $(".Loading").hide();
                },
                success : function(e){
                  if(e == "Berhasil tambah data"){
                    swal({
                      icon : "success",
                      title : e 
                    }).then(function(){
                      window.location.href="<?= base_url('admin/Tambahadmin') ?>"
                    })
                  }else {
                    swal({
                      icon : "error",
                      title : e ,
                      dangerMode : [true,"Ok"]
                    })
                  }
                }
              })
            }

        })
      })
    </script>