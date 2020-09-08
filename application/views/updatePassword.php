<?php $title = $this->db->get("judul")->row() ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi <?= $title->nama_sekolah ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url("assets") ?>/plugins/toastr/toastr.min.css">
      <style type="text/css">
    .Loading {
      width: 100%;
      height: 100%;
      position: fixed; 
      text-indent: 100%;
      background: #e0e0e0 url('<?= base_url("assets/dist/img/loading.gif") ?>') no-repeat center ;
      z-index: 4;
      opacity: 0.7 ;
      background-size: 12%;
      display: none;
    }

    </style>
</head>
<body class="hold-transition login-page">
<div class="Loading"></div>
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>"><b>E-Learning <?= $title->nama_sekolah ?></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Perbarui Password </p>
      <form  id="login" method="post">
        <div class="input-group mb-3">
          <input type="hidden" name="token" value="<?= $token ?>">
          <input type="text" name="nisn" class="form-control" id="nisn" placeholder="masukan nisn ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" id="password" placeholder="masukan password baru">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group">
          <input type="password" name="newpassword" class="form-control" id="newpassword" placeholder="ketik ulang  password baru">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="mt-2 btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
          <!-- /.col -->
          <?php if($this->session->flashdata("error")){ ?>
          <div class="col-md-12 mt-2 alert alert-danger">
            <center>Anda Harus Login Dahulu ! ! !</center>
          </div>
          <?php } ?>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
  <!-- SweetAlert2 -->
<script src="<?= base_url("assets") ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url("assets") ?>/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    var Toast = Swal.mixin({
      toast: true,
      position: 'middle-end',
      showConfirmButton: false,
      timer: 1000
    });


    $("#login").on("submit",function(e){
      var password = document.getElementById("password").value ;
      e.preventDefault();
        if(document.getElementById('nisn').value == ""){
            toastr.error("harap masukan nisn");
        }else if(document.getElementById("password").value == ""){
             toastr.error("masukan password baru ");
        }else if(password.length < 6){
             toastr.error("password harus 6 digit atau lebih");
        }else if(document.getElementById("password").value != document.getElementById("newpassword").value){
             toastr.error("password harus sama");
        }else {
          $.ajax({
            url : "<?= base_url("Forgetpass/updatePass") ?>",
            data : new FormData(this),
            method : "POST" ,
            processData : false,
            contentType : false ,
            cache : false ,
            beforeSend : function(){
              $(".Loading").show();
            },
            complete : function(){
              $(".Loading").hide();
            },
            success  : function(psn){
                if(psn == "Berhasil"){
                  alert("Password di Perbarui");
                  window.location.href="<?= base_url('Login') ?>"
                }else {
                  toastr.error(psn);
                }
            }
          })
        }
    })
  })
</script>

</body>
</html>
