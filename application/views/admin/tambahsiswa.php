<a href="<?= base_url('admin/Upload_siswa') ?>" target="_blank" class="mb-2 btn btn-info"><i class="fa fa-file-excel"></i> Upload File CSV</a>
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Tambah Data Siswa <i class="fa fa-user-plus"></i> </h3>
          </div>
        <div class="card-body">
       <form id="tambahSiswa" enctype="multipart/form-data" method="post" >
        <table class="table">
          <tr>
            <th width="120px" >Nama Siswa *</th>
            <td>:</td>
            <td><input type="text" name="nama" class="form-control col-md-8" placeholder="Ex : Johny Deep " id="nama"></td>          
          </tr>
          <tr>
            <th>NISN *</th>
            <td>:</td>
            <td><input type="text" name="nisn" placeholder="Ex : 191001" class="form-control col-md-8" id="nisn"></td>          
          </tr>
          <tr>
            <th>Prodi / Jurusan *</th>
            <td>:</td>
            <td>
              <select class="form-control col-md-8" id="prodi" name="prodi">
                <option value="">-Pilih Prodi-</option>
                <?php foreach($jurusan->result() as $jrs) : ?>
                  <option value="<?= $jrs->kode_jurusan ?>"><?= $jrs->jurusan ?></option>
                <?php endforeach ?>
              </select>
            </td>          
          </tr>
           <tr>
            <th>Kelas *</th>
            <td>:</td>
            <td>
              <select class="form-control col-md-8" id="kelas" name="kelas">
                <option value="">-Pilih Kelas-</option>
                <option>X</option>
                <option>XI</option>
                <option>XII</option>
              </select>
            </td>          
          </tr>
          <tr>
            <th>Tanggal Lahir *</th>
            <td>:</td>
            <td>
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text"  name="tgl_lahir" placeholder="Ex : 1999-04-13" id="tgl_lahir" class="col-md-7 form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
              </td>          
          </tr>

          <tr>
            <th>Jenis Kelamin</th>
            <td>:</td>
            <td>
              <select name="gender" id="gender" class="form-control col-md-8">
                <option value="">-Pilih Jenis Kelamin-</option>
                <option>Laki-Laki</option>
                <option>Perempuan</option>
              </select>
            </td>
          </tr>

          <tr>
            <th>Tempat Lahir *</th>
            <td>:</td>
            <td><input type="text" placeholder="Ex : Bandung" name="tempat_lahir" class="form-control col-md-8" id="tempat_lahir"></td>          
          </tr>

          <tr>
            <th>Tahun Ajaran *</th>
            <td>:</td>
            <td><input type="text" placeholder="Ex : 2020/2021" name="tahun_ajaran" class="form-control col-md-8" id="tahun_ajaran"></td>         
          </tr>

          <tr>
            <th>Angkatan ke -  *</th>
            <td>:</td>
            <td><input type="text" placeholder="Ex : V" name="angkatan" class="form-control col-md-8" id="angakatan"></td>          
          </tr>

          <tr>
            <th>Status  *</th>
            <td>:</td>
            <td>
              <select name="status" id="status" class="form-control col-md-8">
                <option value="">-Pilih Status Siswa-</option>
                <option>Aktif</option>
                <option>Non-Aktif</option>
              </select>
            </td>          
          </tr>

          <tr>
            <th>Alamat *</th>
            <td>:</td>
            <td><textarea placeholder="Ex : Jakarta Utara Kota Administrasi" class="form-control col-md-8" name="alamat" id="alamat"></textarea></td>          
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
        $("#tambahSiswa").on("submit",function(e){
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
            }else if(document.getElementById('gender').value == ""){
              swal({
                icon : "error",
                title : "jenis kelamin masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#gender").focus();
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
                url : "<?= base_url("admin/Tambahsiswa/input") ?>",
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
                      window.location.href="<?= base_url('admin/Tambahsiswa') ?>"
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