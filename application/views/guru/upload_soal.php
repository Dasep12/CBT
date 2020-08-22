
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa fa-book"></i> Upload Soal</a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                     <form action="<?= base_url('guru/Upload_soal/') ?>" onsubmit="return cek()" id="file_upload" method="post" enctype="multipart/form-data">
                       <label>Upload Soal disini</label>
                        <div class="form-group">
                          <input onchange="return cekExe()" id="file"  name="file" class=" form-control" type="file" >
                          <label class="small text-danger">*hanya file .xlsx yang boleh di upload*</label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa fa-upload"></i>  Preview  </button>
                        <a class="btn btn-success btn-sm" href="<?= base_url('assets/soal/format_soal.xlsx') ?>"><i class="fa fa-file-excel"></i> Template Soal </a>
                     </form>

                     <?php if(isset($_POST['submit'])){ ?>
                      <!-- form preview soal dan upload soal -->
                     <form action="" method="post" id="postingSoal">
                      <hr>
                    <div class="row col-lg-12">
                      <div class="form-group col-lg-3">
                        <label>Tipe Ujian</label>
                        <select class="form-control" id="bentuk_ujian" name="bentuk_ujian">
                          <option value="">Pilih Tipe Ujian</option>
                          <option>UTS</option>
                          <option>UAS</option>
                        </select>
                      </div>

                      <div class="form-group col-lg-3">
                        <label>Mata Pelajaran </label>
                        <select class="form-control" id="mata_pelajaran" name="mata_pelajaran">
                            <option value="">Pilih Mata Pelajaran</option>
                            <?php foreach($mapel as $g)  : ?> 
                            <option value="<?= $g->mata_pelajaran ?>"><?= $g->mata_pelajaran  . " - " . $g->kode_mapel ?></option>
                        <?php endforeach ; ?>
                        </select>
                      </div>

                      <div class="form-group col-lg-3">
                        <label>Guru B.Study </label>
                        <select class="form-control" id="nama_guru" name="nama_guru">
                          <option value="">Pilih Guru</option>
                          <?php foreach($guru as $g)  : ?> 
                            <option value="<?= $g->nama ?>" ><?= $g->nama . " " . $g->gelar  ?></option>
                        <?php endforeach ; ?>
                        </select>
                      </div>



                      <!-- <div class="form-group col-lg-3">
                        <label>Kode Guru</label>
                        <input type="text" class="form-control" name="kode_guru" readonly="">
                      </div> -->

                       <div class="form-group col-lg-3">
                        <label>Pilih Kelas</label>
                        <select class="form-control" id="kelas"  name="kelas">
                          <option value="">Pilih Kelas</option>
                          <option>X</option>
                          <option>XI</option>
                          <option>XII</option>
                        </select>
                      </div>

                      <div class="form-group col-lg-3">
                        <label>Kode Soal</label>
                        <input type="text" class="form-control" id="kode_soal" name="kode_soal" placeholder="masukan kode soal">
                      </div>

                      <div class="form-group col-lg-3">
                        <label>Tanggal Ujian</label>
                        <div class="input-group date col-sm-12" id="reservationdate" data-target-input="nearest">
                            <input type="text" name="tanggal" id="tanggal" class="form-control datetimepicker-input" data-target="#tanggal"/>
                            <div class="input-group-append" data-target="#tanggal" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                      </div>

                      <div class="form-group col-lg-3">
                        <label>Jam mulai</label>
                        <input type="text" class="form-control" id="mulai" name="mulai" placeholder="masukan jam mulai">
                      </div>

                      <div class="form-group col-lg-3">
                        <label>Jam selesai</label>
                        <input type="text" class="form-control" id="selesai" name="selesai" placeholder="masukan jam selesai">
                      </div>



                    </div>
                     <table class="table" id="uts">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Soal</th>
                            <th>Pilihan A</th>
                            <th>Pilihan B</th>
                            <th>Pilihan C</th>
                            <th>Pilihan D</th>
                            <th>Jawaban</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 0 ; foreach($sheet as $row) : ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $row['B'] ?></td>
                              <td><?= $row['C'] ?></td>
                              <td><?= $row['D'] ?></td>
                              <td><?= $row['E'] ?></td>
                              <td><?= $row['F'] ?></td>
                              <td><?= $row['G'] ?></td>
                            </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                      <button type="submit" class="btn-sm btn-info btn">Posting Soal</button>
                    </form>
                      <!-- end form -->
                     <?php } ?>

                     

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
      </div><!-- /.container-fluid -->


  <script type="text/javascript">
  $(document).ready(function(){

     $('#uts').DataTable({
      pageLength : 5 
     });


     //posting soal lewat ajax ke database 
     $("#postingSoal").on("submit",function(e){
      e.preventDefault();
        if(document.getElementById('bentuk_ujian').value == ""){
          toastr.warning("Tipe Ujian Harus di Isi");
          $("#bentuk_ujian").focus();
        }else if(document.getElementById('mata_pelajaran').value == ""){
          toastr.warning("Mata Pelajaran Harus di Isi");
          $("#mata_pelajaran").focus();
        }else if(document.getElementById('nama_guru').value == ""){
          toastr.warning("Guru Bidang Study Harus di Isi");
          $("#nama_guru").focus();
        }else if(document.getElementById('kelas').value == ""){
          toastr.warning("Kelas Harus di Isi");
          $("#kelas").focus();
        }else if(document.getElementById('kode_soal').value == ""){
          toastr.warning("Kode Soal Harus di Isi");
          $("#kode_soal").focus();
        }else {
          $.ajax({
            url : "<?= base_url('guru/Upload_soal/upload') ?>",
            data : new FormData(this),
            method : "POST" ,
            contentType : false ,
            cache : false ,
            processData : false ,
            beforeSend : function(){
              $(".Loading").show()
            },
            complete : function(){
              $(".Loading").hide();
            },
            success : function(e){
              if(e == "Sukses1"){
                toastr.success("Soal Berhasil di Posting");
                window.location.href="<?= base_url('guru/Soal_uts') ?>"
              }else if(e == "Sukses2"){
                toastr.success("Soal Berhasil di Posting");
                window.location.href="<?= base_url('guru/Soal_uas') ?>"
              }else if (e == "Gagal"){
                toastr.error("kode soal sudah di gunakan , gunakan kode soal lain")
              }
            }
          })
        }
     })


  })
     //cek jika file yang di upload kosong
     function cek(){
         if(document.getElementById('file').value == ""){
          toastr.error("tidak ada file yang di upload");
          return false ;
        }
     }

     //cek file yang di upload apakah xlsx atau bukan
      function cekExe(){
        var file = document.getElementById("file");
        var path = file.value ;
        var exe = /(\.xlsx)$/i;
          if(!exe.exec(path)){
            toastr.error("file yang di upload tidak di tolak")
            file.value = "" ;
            return false ;
          }
      }
</script>