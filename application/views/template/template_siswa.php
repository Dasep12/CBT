<?php $title = $this->db->get("judul")->row() ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>E-Learning <?= $title->nama_sekolah ?></title>

  <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url("assets") ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url("assets") ?>/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url("assets") ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= base_url("assets") ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url("assets") ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url("assets") ?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url("assets") ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?= base_url("assets") ?>/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url("assets") ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" type="text/css" href="<?= base_url("assets") ?>/pagination/smpPagination.css">
<!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url("assets") ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url("assets") ?>/plugins/toastr/toastr.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="<?= base_url("assets") ?>/plugins/ekko-lightbox/ekko-lightbox.css">
  <script src="<?= base_url("assets") ?>/plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url("assets") ?>/pagination/smpPagination.js"></script>
  <script src="<?= base_url("assets") ?>/sweetalert/sweetalert.min.js"></script>
  <!-- SweetAlert2 -->
<script src="<?= base_url("assets") ?>/sweetalert/sweetalert.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url("assets") ?>/plugins/toastr/toastr.min.js"></script>

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

<body  class="hold-transition layout-top-nav">
  <div class="Loading"></div>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="<?= base_url("assets") ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">SMKN 45 </span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->

        <?php if($this->uri->segment(2) == "Soal") { ?>

       <?php }else { ?>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="<?= base_url("siswa/Dashboard") ?>" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url("siswa/Settings") ?>" class="nav-link">Setting</a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url("siswa/Materi") ?>" class="nav-link">Materi</a>
            </li>

            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Ujian</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="<?= base_url("ujian/Form_ujian") ?>" class="dropdown-item">UTS</a></li>
                <li><a href="<?= base_url("ujian/Form_ujian") ?>" class="dropdown-item">UAS</a></li>
                <!-- End Level two -->
              </ul>          
            </li>
            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Tugas</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="<?= base_url("siswa/Selesai") ?>" class="dropdown-item">Selesai</a></li>
                <li><a href="<?= base_url("siswa/Daftar_tugas") ?>" class="dropdown-item">Daftar Tugas</a></li>
                <!-- End Level two -->
              </ul>          
            </li>
          </ul>

       <?php } ?>

      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        
        <li class="nav-item">
          <a class="nav-link"  href="<?= base_url('Logout') ?>" role="button">
          <button class="btn btn-default btn-sm"><i class="fa fa-lock"></i> Logout</button>   
          </a>
          <li>             
          </li>
        </li>

      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Aplikasi E-Learning SMKN45</h1>
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol> -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
       <!-- content -->
          <?= $contents ?>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    <?= $_SERVER['REMOTE_ADDR'] ?>
    </div>
    <!-- Default to the left -->
    <small>Copyright &copy 2020 </small>
    <small class="small">Depeloved by Dasep Depiyawan</small> 
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url("assets") ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url("assets") ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url("assets") ?>/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url("assets") ?>/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url("assets") ?>/plugins/moment/moment.min.js"></script>
<script src="<?= base_url("assets") ?>/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Ekko Lightbox -->
<script src="<?= base_url("assets") ?>/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url("assets") ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url("assets") ?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url("assets") ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url("assets") ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url("assets") ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url("assets") ?>/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    var Toast = Swal.mixin({
      toast: true,
      position: 'middle-end',
      showConfirmButton: false,
      timer: 1000
    });


  })

</script>





</body>
</html>
