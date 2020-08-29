
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
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa fa-book"></i> Daftar Nilai Ujian</a></li>
                 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                     <form  method="post" action="#" id="formNilai">
                      <div class="row">
                      <div class="form-group col-md-3">
                        <select class="form-control" id="tipe_ujian" name="tipe_ujian">
                          <option value="">Pilih Tipe Ujian</option>
                          <option>UTS</option>
                          <option>UAS</option>
                        </select>
                      </div>

                      <div class="form-group col-md-3">
                        <select class="form-control" id="kelas" name="kelas">
                          <option value="">Pilih Kelas</option>
                          <option>X</option>
                          <option>XI</option>
                          <option>XII</option>
                        </select>
                      </div>
                      

                      <div class="form-group col-md-3">
                        <select class="form-control" id="prodi" name="prodi">
                          <option>Pilih Prodi</option>
                          <option>TKJ</option>
                          <option>AKP</option>
                          <option>TKR</option>
                        </select>
                      </div>
                       <div class="form-group col-md-3">
                        <select class="form-control" name="mata_pelajaran" id="mata_pelajaran">
                          <option value="">Mata Pelajaran</option>
                          <?php foreach($mata_pelajaran->result() as $mapel ) : ?>
                            <option value="<?= $mapel->mata_pelajaran ?>"><?= $mapel->mata_pelajaran . " - " .  $mapel->kode_mapel?></option>
                          <?php endforeach ?>
                        </select>
                      </div>

                    </div>
                         <button type="submit" class="btn btn-primary btn-sm">Preview Report</button>
                    <!-- /.post -->
                </form>
                  </div>
                  </div>
                 </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
  
              <div id="show-up">
                
              </div>

           
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

<!-- modal lihat jawaban siswa -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="lihat_transaksi" class="modal fade">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
              <h6>Jawaban <b id="no_inv"></b></h6>
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

<!-- end of modal jawaban siswa -->
<script type="text/javascript">
  $(document).ready(function(){

      //ketika tombol  preview report  di click akan request untuk memunculkan daftar ujian siswa
      $("#formNilai").on("submit",function(e){
          e.preventDefault();
            if(document.getElementById("tipe_ujian").value == ""){
              toastr.info("tipe ujian belum di pilih");
              $("#tipe_ujian").focus();
            }else if(document.getElementById("kelas").value == ""){
              toastr.info("kelas belum di pilih");
              $("#kelas").focus();
            } else if(document.getElementById("prodi").value == ""){
              toastr.info("prodi belum di pilih");
              $("#prodi").focus();
            } else if(document.getElementById("mata_pelajaran").value == ""){
              toastr.info("mata pelajaran belum di pilih");
              $("#mata_pelajaran").focus();
            }else {
                $.ajax({
                  url : "<?= base_url('guru/Nilai_ujian/view') ?>",
                  method  : "POST" ,
                  data : new FormData(this),
                  cache : false ,
                  contentType : false ,
                  processData : false ,
                  beforeSend : function(){
                    $(".Loading").show()
                  },
                  complete : function(){
                    $(".Loading").hide();
                  },
                  success  : function(e){
                    $("#show-up").html(e);
                  }
                })                            
            }
        })



     $('#uas').DataTable();

     //tampilkan jawaban ujian siswa dan kunci jawaban  ke dalam modal
    $("#lihat_transaksi").on('show.bs.modal',function(e){
        var div = $(e.relatedTarget);
        var modal = $(this);
        var id = div.data("nisn");
        var kelas = div.data("kelas");
        var id = div.data("nisn");
          $.ajax({
            url : "<?= base_url("guru/Nilai_ujian/lihat_jawaban") ?>" ,
            data :"nisn="+ id + "&kelas="+kelas ,
            method : "GET",
            success : function(response){
              document.getElementById('no_inv').innerHTML = id ;
              $("#output_list").html(response);
            }

          })
    }) 

  })

</script>

