<div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                        src="<?= base_url("assets/poto_pengajar/". $profile->photo) ?>">
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
            <button class="btn btn-success mb-2" data-toggle="modal" data-target="#lihat_tugas"><i class="fa fa-plus"></i> Posting Materi</button>
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa fa-book"></i> Materi Siswa</a></li>
                 
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
                            <th>Judul Materi</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas / Prodi</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                          <tbody>
                           <?php $no = 1 ; foreach($mapel as $materi) : ?>
                           <tr>
                             <td><?= $no++ ?></td>
                             <td><?= $materi->judul_materi ?></td>
                             <td><?= $materi->mata_pelajaran ?></td>
                             <td><?= $materi->kelas . " / " . $materi->prodi ?></td>
                             <td><?= $materi->keterangan_materi ?></td>
                             <td>
                               <a href="javascript:;"  data-id="<?= $materi->id ?>" data-kode="<?= $materi->kode_materi ?>" data-toggle="modal" data-target="#lihat_materi" class="mr-1 btn btn-info btn-xs">view</a>
                               <a href="javascript:del('<?= $materi->id ?>')" class="btn btn-danger btn-xs">delete</a>
                             </td>
                           </tr>
                         <?php endforeach ; ?>
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

<!-- modal upload materi siswa -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="lihat_tugas" class="modal fade">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
              <h6>Posting Materi Siswa <b id="no_inv"></b></h6>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
             <div class="load" style="position: absolute;margin: 40px 240px;z-index: 99">
              <img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
             </div>

             <div class="modal-body" id="output_list">
             <form enctype="multipart/form-data" action="" method="post" id="uploadMateri">
              <label>Judul Materi</label>
              <?php
              function token($length){
                      //generate kode materi yang di posting 
                      $token = "";
                      $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                      $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
                      $codeAlphabet.= "0123456789";
                      $max = strlen($codeAlphabet); // edited
                        
                      for ($i=0; $i < $length; $i++) {
                       $token .= $codeAlphabet[random_int(0, $max-1)];
                      }
                      return $token ;
              } ?>
              <input type="hidden" name="kode_materi" value="<?= token(6) ?>">
              <input class="form-control" id="judul_materi" type="text" name="judul_materi">

              <label>Keterangan</label>
              <textarea name="keterangan" id="keterangan" class="form-control"></textarea>

              <label>Mata Pelajaran</label>
              <select class="form-control" name="kode_mapel">
                <?php foreach($mapel2 as $r) : ?>
                  <option  value="<?= $r->kode_mapel ?>"><?= $r->mata_pelajaran . " - " . $r->kode_mapel ?></option>
                <?php endforeach ?>
              </select>
              <label>Tambah Lampiran</label><br>
              <input type="file" multiple="" name="file_materi[]" >
             </div>
          <div class="form-group ml-3">
           <label>Keterangan</label><br>
            <?php foreach($mapel2 as $mtr) : ?>
              <small><?= $mtr->mata_pelajaran ." - " . $mtr->kode_mapel  .' => ' . $mtr->kelas . " " . $mtr->prodi ?></small><br>
            <?php endforeach ?>
          </div>

             <div class="modal-footer">
              <button type="submit" class="btn btn-success ">Post Materi</button>
         </div>
       </form>
             </div>
         </div>
     </div>
 </div>

<!-- end of modal tugas siswa -->

<!-- modal lihat materi siswa -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="lihat_materi" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
              <h6>Materi Siswa <b id="no_inv"></b></h6>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
             <div class="load" style="position: absolute;margin: 40px 240px;z-index: 99">
              <img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
             </div>
             <div class="modal-body" id="materi">

             </div>

             <div class="modal-footer">
         </div>
             </div>
         </div>
     </div>

<!-- end of modal tugas siswa -->


  <script type="text/javascript"> 
  $(document).ready(function(){
      $('#tugas').DataTable();

        $("#uploadMateri").on("submit",function(e){
          e.preventDefault();
            //upload materi lewat ajax
            if(document.getElementById("judul_materi").value == ""){
              toastr.info("judul materi masih kosong");
              $("#judul_materi").focus();
            }else if(document.getElementById("keterangan").value == "") {
              toastr.info("keterangan masih kosong");
              $("#keterangan").focus();
            }else {
                $.ajax({
                  url : "<?= base_url('guru/Materi/upload') ?>",
                  data : new FormData(this),
                  cache : false ,
                  method : "POST",
                  contentType : false ,
                  processData : false ,
                  beforeSend : function(){
                    $(".Loading").show();
                  },
                  complete : function(){
                    $(".Loading").hide();
                  },
                  success : function(e){
                    swal({
                      icon : "success",
                      title : "Berhasil Posting Materi"
                    }).then(function(){
                      window.location.href="<?= base_url('guru/Materi/') ?>"
                    })
                  }
                })
              }
      })

  //tampilkan list materi ke dalam modal
    $("#lihat_materi").on('show.bs.modal',function(e){
        var div = $(e.relatedTarget);
        var modal = $(this);
        var id = div.data("id");
        var kode = div.data("kode");
          $.ajax({
            url : "<?= base_url("guru/Materi/viewMateri") ?>" ,
            data :"id="+ id + "&kode=" + kode  ,
            method : "GET",
            success : function(response){
              document.getElementById('no_inv').innerHTML = id ;
              $("#materi").html(response);
            }
          })
    })
  })


//hapus materi siswa
function del(kode){
    swal({
      title: "Hapus data ?",
      text: "data yang di hapus tidak bisa di kembalikan",
      icon: "warning",
      buttons: [true,"Tetap Hapus"],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax({
            url : "<?= base_url('guru/Materi/deleteMateri') ?>",
            method : "GET",
            data : "kode="+kode ,
            success : function(response){
                if(response == "Ok"){
                  toastr.success("Materi Berhasil Terhapus");
                  window.location.href="<?= base_url('guru/Materi') ?>"
                }             
            }

          })
      }
    });
  } 
</script>