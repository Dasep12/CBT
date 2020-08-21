<?php

?>
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa fa-book"></i> Jawaban Tugas</a></li>
                 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <table class="table" id="tugas">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Kode Tugas</th>
                            <th>Mata Pelajaran</th>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>Kelas / Prodi</th>
                            <th>Diserahkan</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                          <tbody>
                            <?php $no = 1 ; foreach($join_tugas as $result ) : ?>
                              <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $result->kode_tugas ?></td>
                                <td><?= $result->mata_pelajaran ?></td>
                                <td><?= $result->nama_siswa ?></td>
                                <td><?= $result->nisn ?></td>
                                <td><?= $result->kelas . " / " . $result->prodi ?></td>
                                <td><?= $result->tgl_diserahkan . "/" . $result->jam_diserahkan ?></td>
                                <td>
                                  <?php if($result->nilai == 0  || $result->nilai == null){ ?>
                                    <a href="javascript:;" data-id="<?= $result->id ?>"  data-kode_tugas="<?= $result->kode_tugas  ?>" data-nisn ="<?= $result->nisn ?>"   data-toggle="modal" data-target="#lihat_tugas" class="btn btn-info btn-xs">Belum di nilai</a>
                              <?php    }else { ?>
                                  <a href="javascript:;" data-id="<?= $result->id ?>"  data-kode_tugas="<?= $result->kode_tugas  ?>" data-nisn ="<?= $result->nisn ?>"   data-toggle="modal" data-target="#lihat_tugas" class="btn btn-danger btn-xs">Telah di nilai</a>
                               <?php   } ?>
                                </td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                      </table>
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

<!-- modal lihat tugas siswa -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="lihat_tugas" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
              <h6>Tugas Siswa <b id="no_inv"></b></h6>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
             <div class="load" style="position: absolute;margin: 40px 240px;z-index: 99">
              <img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
             </div>
             <div class="modal-body" id="output_list">

             </div>

             <div class="modal-footer">
         </div>
             </div>
         </div>
     </div>
 </div>

<!-- end of modal tugas siswa -->

  <script type="text/javascript"> 
  $(document).ready(function(){
       //tampilkan list transaksi ke dalam modal
      $("#lihat_tugas").on('show.bs.modal',function(e){
          var div = $(e.relatedTarget);
          var modal = $(this);
          var nisn = div.data("nisn");
          var id = div.data("id");
          var kode_tugas = div.data("kode_tugas");
            $.ajax({
              url : "<?= base_url("guru/Daftar_tugas/nilai_tugas") ?>" ,
              data :"id="+ id + "&nisn=" + nisn + "&kode_tugas=" + kode_tugas ,
              method : "GET",
              success : function(response){
                document.getElementById('no_inv').innerHTML = id ;
                $("#output_list").html(response);
              }

            })
      })

      $('#tugas').DataTable();
  })
</script>