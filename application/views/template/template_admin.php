<?php date_default_timezone_set('Asia/Jakarta') ;
$title = $this->db->get("judul")->row()?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin E-Learning <?= $title->nama_sekolah ?></title>
   <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/pagination/smpPagination.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/toastr/toastr.min.css">
   <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets') ?>/pagination/smpPagination.js"></script>
  <script src="<?= base_url('assets') ?>/sweetalert/sweetalert.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url('assets') ?>/sweetalert/sweetalert.min.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url('assets') ?>/plugins/toastr/toastr.min.js"></script>

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
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="Loading"></div>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-black">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('assets') ?>/index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
     
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar  sidebar-dark-primary sidebar-nav-small-text elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
      <img src="<?= base_url('assets') ?>/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?= $title->nama_sekolah ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets') ?>/dist/img/admin2.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata("nama"); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item ">
            <a href="<?= base_url("admin/Dashboard") ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($url == "Tambahsiswa" || $url == "Siswa" || $url == "Akun_siswa"){ echo "menu-open" ; } ?> ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Siswa 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url("admin/Siswa") ?>" class="nav-link  <?php if($url == "Siswa"){ echo "active" ; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/Tambahsiswa') ?>" class="nav-link  <?php if($url == "Tambahsiswa"){ echo "active" ; } ?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/Akun_siswa') ?>" class="nav-link <?php if($url == "Akun_siswa"){ echo "active" ; } ?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Akun Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if($url == "Pengajar" || $url == "Akun_pengajar" || $url == "Tambahguru"  ){ echo "menu-open" ; } ?>">
            <a href="#" class="nav-link nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Guru
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/Pengajar') ?>" class="nav-link <?php if($url == "Pengajar"){ echo "active" ; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Pengajar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/Akun_pengajar') ?>" class="nav-link <?php if($url == "Akun_pengajar"){ echo "active" ; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Akun Pengajar</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('admin/Tambahguru') ?>" class="nav-link <?php if($url == "Tambahguru"){ echo "active" ; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Pengajar</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview  <?php if($url == "Jurusan" ){ echo "menu-open" ; } ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Jurusan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/Jurusan') ?>" class="nav-link <?php if($url == "Jurusan"){ echo "active" ; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prodi / Jurusan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if($url == "Mata_pelajaran" || $url == "Tambahmapel"){ echo "menu-open" ; } ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
              Mata Pelajaran
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/Tambahmapel') ?>" class="nav-link <?php if($url == "Tambahmapel"){ echo "active" ; } ?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Mata Pelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/Mata_pelajaran') ?>" class="nav-link <?php if($url == "Mata_pelajaran"){ echo "active" ; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Mata Pelajaran</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview  <?php if($url == "Tambahadmin" || $url == "Listadmin" || $url == "Profile"){ echo  "menu-open"; } ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/Profile') ?>" class="nav-link <?php if($url == "Profile" ){ echo "active" ; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/Tambahadmin') ?>" class="nav-link <?php if($url == "Tambahadmin"){ echo "active" ; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/Listadmin') ?>" class="nav-link <?php if($url == "Listadmin"){ echo "active" ; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Admin</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if($url == "SettJadwal"  || $url == "Jadwal_ujian"){ echo  "menu-open"; } ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Jadwal Ujian
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/Jadwal_ujian') ?>" class="nav-link <?php if($url == "Jadwal_ujian"){ echo "active" ; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Setting Jadwal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/SettJadwal') ?>" class="nav-link <?php if($url == "SettJadwal"){ echo "active" ; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Jadwal Ujian</p>
                </a>
              </li>
             <!--  <li class="nav-item">
                <a href="../tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li> -->
            </ul>
          </li>

            <li class="nav-item ">
            <a href="<?= base_url("admin/Setnama") ?>" class="nav-link <?php if($url == "Setnama"){ echo "active" ; } ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               Setting Nama Sekolah
              </p>
            </a>
          </li>

           <li class="nav-item ">
            <a href="<?= base_url("Logout") ?>" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

          
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><label class="small"><?= $hari ?><label id="output"></label></label></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

     <?= $contents ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-light">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- ChartJS -->
<script src="<?= base_url('assets') ?>plugins/chart.js/Chart.min.js"></script>
<!-- file tempat ajax dilakukan -->
<script src="<?= base_url('assets') ?>/js/ajax.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets') ?>/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url('assets') ?>/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url('assets') ?>/plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url('assets') ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url('assets') ?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url('assets') ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets') ?>/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets') ?>/dist/js/pages/dashboard.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets') ?>/plugins/sparklines/sparkline.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets') ?>/plugins/moment/moment.min.js"></script>
<script type="text/javascript">
$(function(){
        //Date range picker
      $('#reservationdate').datetimepicker({
          format: 'YYYY-MM-DD',
      });

      $('#tanggal').datetimepicker({
          format: 'MM DD YYYY',
      });
})
  


    //tampilkan waktu javascript 
     setTimeout("waktu()",1000);
      function waktu(){
        var date = new Date();
        var arrbulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        var tanggal = date.getDate();
        var bulan = date.getMonth();
        var tahun = date.getFullYear();
        setTimeout("waktu()",1000);
        document.getElementById('output').innerHTML  =  tanggal + " " + arrbulan[bulan] +  " " + tahun  + " / " + date.getHours()+":"+date.getMinutes()+":"+date.getSeconds();
      }
</script>
</body>
</html>
