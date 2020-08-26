
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Tambah Data Guru <i class="fa fa-user-plus"></i> </h3>
          </div>
        <div class="card-body">
       <form id="tambahGuru" enctype="multipart/form-data" method="post" >
        <table class="table">
          <tr>
            <th width="120px" >Nama Pengajar *</th>
            <td>:</td>
            <td><input type="text" name="nama" class="form-control col-md-8" placeholder="Masukan Nama" id="nama"></td>          
          </tr>
          <tr>
            <th>NIPN *</th>
            <td>:</td>
            <td><input type="text" name="nipn" placeholder="Masukan NIPN" class="form-control col-md-8" id="nipn"></td>          
          </tr>
          <tr>
            <th>Gelar *</th>
            <td>:</td>
            <td>
              <input type="text" name="gelar" id="gelar" class="form-control col-md-8" placeholder="Enter Gelar">
            </td>          
          </tr>
          <tr>
            <th>Tanggal Lahir *</th>
            <td>:</td>
            <td>
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text"  name="tgl_lahir" placeholder="Masukan Tanggal Lahir" id="tgl_lahir" class="col-md-7 form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
              </td>          
          </tr>
          <tr>
            <th>Tempat Lahir *</th>
            <td>:</td>
            <td><input type="text" placeholder="Masukan Tempat Lahir" name="tempat_lahir" class="form-control col-md-8" id="tempat_lahir"></td>          
          </tr>
                     <tr>
            <th>Gender *</th>
            <td>:</td>
            <td>
              <select class="form-control col-md-8" id="gender" name="gender">
                <option value="">-Pilih Gender-</option>
                <option>Laki-Laki</option>
                <option>Perempuan</option>
              </select>
            </td>          
          </tr>
          <tr>
            <th>Status *</th>
            <td>:</td>
            <td>
              <select class="form-control col-md-8" id="status" name="status">
                <option value="">-Pilih Status-</option>
                <option>Pengajar</option>
                <option>Staf</option>
              </select>
            </td>          
          </tr>

          <tr>
            <th>No Telphone *</th>
            <td>:</td>
            <td>
              <input type="text" name="no_hp" id="no_hp" class="form-control col-md-8" placeholder="Enter Phone">
            </td>          
          </tr>

          <tr>
            <th>Email *</th>
            <td>:</td>
            <td>
              <input type="text" name="email" id="email" class="form-control col-md-8" placeholder="Enter Email">
            </td>          
          </tr>

          <tr>
            <th>Alamat *</th>
            <td>:</td>
            <td><textarea placeholder="Masukan Alamat" class="form-control col-md-8" name="alamat" id="alamat"></textarea></td>          
          </tr>

          <tr>
            <th>Photo *</th>
            <td>:</td>
            <td><input type="file" onchange="return validasi()" name="photo" class="form-control col-md-8" id="photo"></td>          
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-save"></i> Simpan Data</button></td>
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
        $("#tambahGuru").on("submit",function(e){
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
            }else if(document.getElementById('gelar').value == ""){
              swal({
                icon : "error",
                title : "gelar masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#gelar").focus();
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
            }else if(document.getElementById('gender').value == ""){
              swal({
                icon : "error",
                title : "gender masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#gender").focus();
              })
            }else if(document.getElementById('status').value == ""){
              swal({
                icon : "error",
                title : "status masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#status").focus();
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
                $("#email").focus();
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
                url : "<?= base_url("admin/Tambahguru/input") ?>",
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
                      window.location.href="<?= base_url('admin/Tambahguru') ?>"
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