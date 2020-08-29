
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Tambah Mata Pelajaran <i class="fa fa-file"></i> </h3>
          </div>
        <div class="card-body">
       <form id="tambahMapel" method="post" >
        <table class="table">
          <tr>
            <th width="120px" >Mata Pelajaran *</th>
            <td>:</td>
            <td><input type="text" name="mata_pelajaran" class="form-control col-md-8" placeholder="Masukan Mata Pelajaran" id="mapel"></td>          
          </tr>
          <tr>
            <th>Kode Mata Pelajaran *</th>
            <td>:</td>
            <td><input type="text" name="kode_mapel" placeholder="Masukan Kode Mata Pelajaran" class="form-control col-md-8" id="kode"></td>          
          </tr>
          <tr>
            <th>Pengajar *</th>
            <td>:</td>
            <td>
              <select name="pengajar" class="form-control col-md-8" id="pengajar">
                <option value="">Pilih Pengajar</option>
                <?php foreach($pengajar as $guru) : ?>
                  <option value="<?= $guru->nipn ?>"><?= $guru->nama . " " . $guru->gelar ?></option>
                <?php endforeach ?>
              </select>
            </td>          
          </tr>
          <tr>
            <th>Kelas *</th>
            <td>:</td>
            <td>
              <select class="form-control col-md-8" id="kelas" name="kelas">
                <option value="">Pilih Kelas</option>
                <option>X</option>
                <option>XI</option>
                <option>XII</option>
              </select>
            </td>          
          </tr>
         <tr>
            <th>Prodi *</th>
            <td>:</td>
            <td>
              <select name="prodi" class="form-control col-md-8" id="prodi">
                <option value="">Pilih Prodi / Jurusan</option>
                <?php foreach($jurusan as $prodi) : ?>
                  <option value="<?= $prodi->kode_jurusan ?>"><?= $prodi->jurusan ?></option>
                <?php endforeach ?>
              </select>
            </td>          
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

      $(function(){
        $("#tambahMapel").on("submit",function(e){
          e.preventDefault();
            if(document.getElementById('mapel').value == ""){
              swal({
                icon : "error",
                title : "mata pelajaran masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#mapel").focus();
              })
            }else if(document.getElementById('kode').value == ""){
              swal({
                icon : "error",
                title : "kode mata pelajaran  masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#kode").focus();
              })
            }else if(document.getElementById('pengajar').value == ""){
              swal({
                icon : "error",
                title : "pengajar masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#pengajar").focus();
              })
            }else if(document.getElementById('kelas').value == ""){
              swal({
                icon : "error",
                title : "kelas masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#kelas").focus();
              })
            }else if(document.getElementById('prodi').value == ""){
              swal({
                icon : "error",
                title : "prodi / jurusan masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#prodi").focus();
              })
            }else {
              $.ajax({
                url : "<?= base_url("admin/Tambahmapel/input") ?>",
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
                      window.location.href="<?= base_url('admin/Tambahmapel') ?>"
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