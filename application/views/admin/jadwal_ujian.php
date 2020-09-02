
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Tambah Jadwal Ujian <i class="fa fa-file"></i> </h3>
          </div>
        <div class="card-body">
       <form id="tambahJadwal" method="post" >
        <table class="table">
          <tr>
            <th width="120px" >Mata Pelajaran*</th>
            <td>:</td>
            <td>
               <select name="mapel" class="form-control col-md-8" id="mapel">
                <option value="">Pilih Mata Pelajaran</option>
                <?php foreach($mata_pelajaran->result() as $mapel) : ?>
                  <option value="<?= $mapel->id ?>"><?= $mapel->mata_pelajaran . "-" . $mapel->kode_mapel  ?></option>
                <?php endforeach ?>
              </select>
            </td>          
          </tr>
          <tr>
            <th>Kode Soal*</th>
            <td>:</td>
            <td><input type="text" name="kode_soal" placeholder="Masukan Kode Soal Ujian" class="form-control col-md-8" id="kode"></td>          
          </tr>
          <tr>
            <th>Pengajar *</th>
            <td>:</td>
            <td>
              <select name="pengajar" class="form-control col-md-8" id="pengajar">
                <option value="">Pilih Pengajar</option>
                <?php foreach($pengajar->result() as $guru) : ?>
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
                <?php foreach($jurusan->result() as $prodi) : ?>
                  <option value="<?= $prodi->id ?>"><?= $prodi->jurusan ?></option>
                <?php endforeach ?>
              </select>
            </td>          
          </tr>
          <tr>
            <th>Tanggal Ujian</th>
            <td>:</td>
            <td>
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text"  name="hari" placeholder="Masukan Tanggal Ujian" id="hari" class="col-md-7 form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
            </td>
          </tr>

          <tr>
            <th>Jam Mulai</th>
            <td>:</td>
            <td>
               <div class="form-inline">
              <select name="jamMulai"  class="col-md-1 form-control">
                          <?php for($i = 0 ; $i < 24 ; $i++)  : 
                            if($i == 0){
                             echo ' <option>00</option>' ;
                            }elseif($i == 1 || $i == 2 || $i == 3 || $i == 4 || $i == 5 || $i == 6 || $i == 7  || $i == 8 || $i == 9  ){
                             echo ' <option>0'. $i .'</option>' ;
                            }else {
                             echo ' <option>'. $i .'</option>' ;
                            } endfor ; ?>
                        </select>
                        <label> : </label>
                        <select name="menitMulai"  class="col-md-1 form-control">
                          <?php for($i = 0 ; $i < 60 ; $i++)  : 
                            if($i == 0){
                             echo ' <option>00</option>' ;
                            }elseif($i == 1 || $i == 2 || $i == 3 || $i == 4 || $i == 5 || $i == 6 || $i == 7  || $i == 8 || $i == 9  ){
                             echo ' <option>0'. $i .'</option>' ;
                            }else {
                             echo ' <option>'. $i .'</option>' ;
                            } endfor ; ?>
                        </select>
                      </div>
            </td>
          </tr>

          <tr>
            <th>Jam Selesai</th>
            <td>:</td>
            <td>
              <div class="form-inline">
              <select name="jamSelesai"  class="col-md-1 form-control">
                          <?php for($i = 0 ; $i < 24 ; $i++)  : 
                            if($i == 0){
                             echo ' <option>00</option>' ;
                            }elseif($i == 1 || $i == 2 || $i == 3 || $i == 4 || $i == 5 || $i == 6 || $i == 7  || $i == 8 || $i == 9  ){
                             echo ' <option>0'. $i .'</option>' ;
                            }else {
                             echo ' <option>'. $i .'</option>' ;
                            } endfor ; ?>
                        </select>
                        <label> : </label>
                        <select name="menitSelesai"  class="col-md-1 form-control">
                          <?php for($i = 0 ; $i < 60 ; $i++)  : 
                            if($i == 0){
                             echo ' <option>00</option>' ;
                            }elseif($i == 1 || $i == 2 || $i == 3 || $i == 4 || $i == 5 || $i == 6 || $i == 7  || $i == 8 || $i == 9  ){
                             echo ' <option>0'. $i .'</option>' ;
                            }else {
                             echo ' <option>'. $i .'</option>' ;
                            } endfor ; ?>
                        </select>
                 </div>
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
        $("#tambahJadwal").on("submit",function(e){
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
                title : "kode soal  masih kosong" ,
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
            }else if(document.getElementById('hari').value == ""){
              swal({
                icon : "error",
                title : "tanggal ujian masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#hari").focus();
              })
            }else {
              $.ajax({
                url : "<?= base_url("admin/SettJadwal/input") ?>",
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
                      window.location.href="<?= base_url('admin/SettJadwal') ?>"
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