<?php date_default_timezone_set("Asia/Jakarta"); ?>

<div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pilih Mata Pelajaran</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="biodata" method="post" >
                <div class="card-body">
                  <div class="form-group">
                 <?php 
                 echo $hari  . ", " . date("d M Y");
                 ?>
                  <table class="table">
                  <?php foreach($jadwal as $jdwl) : ?>
                  <tr>
                  <td>
                    <input type="radio" id="matpel" value="<?= $jdwl->kode_soal ?>" name="matkul"> <?= $jdwl->mata_pelajaran ?>
                  </td>
                <?php endforeach; ?>
                </tr>
                  </table>
                  </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
         <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">isi biodata diri</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" readonly="" name="name" value="<?= $profile->nama ?>" class="form-control">
  
                    <label>NISN</label>
                    <input type="text" readonly="" name="nisn" value="<?= $profile->nisn ?>" class="form-control">
     
                    <label>Kode Soal</label>
                    <input type="text" name="kode_soal" id="kode_soal" placeholder="masukan kode soal" class="form-control">

                    <label>Tanggal Ujian</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tanggal" placeholder="Tanggal Ujian" id="tanggal_ujian" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>

                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Mulai Ujian</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
  </div>
  </div>
</div>
<script type="text/javascript">
    //disable tombol kembali setelah soal sudah di tampilkan
    window.history.forward();
    function noBack() { window.history.forward(); }

</script>
<script type="text/javascript">

  $(document).ready(function(){
    $("#biodata").on("submit",function(e){
      e.preventDefault();
          if (document.getElementById("kode_soal").value == ""){
              swal({
                  icon : "error",
                  title : "Perhatian",
                  text : "Kode Soal masih kosong",
                  dangerMode : [true,"Ok"]
                });
          }else if(document.getElementById('tanggal_ujian').value == ""){
              swal({
                  icon : "error",
                  title : "Perhatian",
                  text : "Tanggal Ujian masih kosong",
                  dangerMode : [true,"Ok"]
                });
          }else {
            $.ajax({
              url : "<?= base_url('ujian/Form_ujian/cekBiodata') ?>",
              data : new FormData(this),
              method : "POST",
              cache : false ,
              processData : false ,
              contentType : false ,
              success : function(msg){
                //alert(msg)
                 if(msg == "anda sudah ujian"){
                    swal({
                      icon : "warning",
                      title : "Perhatian",
                      text : "Anda Sudah Pernah Ikut Ujian"
                    });
                    return false ;
                  } else if(msg == "Jadwal Tidak Ada"){
                    swal({
                      icon : "error",
                      title : "Perhatian",
                      text : "Kode Soal salah atau tidak sesuai jadwal"
                    });
                    return false ;
                  } else  {
                     swal({
                      icon : "warning",
                      title : "Ayo Mulai Ujian",
                      buttons : "Mulai"
                    }).then(function(){
                      window.location.href="<?= base_url('ujian/Soal/PG/') ?>" + msg
                   })
                  }
              }
            })
          }
    })
  })
</script>