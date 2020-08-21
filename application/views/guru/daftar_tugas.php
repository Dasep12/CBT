
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa fa-book"></i> Daftar Tugas</a></li>
                 
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
                            <th>Judul Tugas</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas / Prodi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                          <tbody>
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
        var id = div.data("id");
          $.ajax({
            url : "<?= base_url("guru/Daftar_tugas/viewTugas") ?>" ,
            data :"id="+ id  ,
            method : "GET",
            success : function(response){
              document.getElementById('no_inv').innerHTML = id ;
              $("#output_list").html(response);
            }

          })
    }) 



    $.ajax({
      url : "<?= base_url('guru/Daftar_tugas/sendData') ?>",
      type : 'ajax',
      dataType : 'json', 
      contentType : false ,
      async : false ,
      success : function(response){
        var data = [] ;
        var j = 1 ;
        for(var i = 0 ; i < response.length ; i++){
          data.push([ j , response[i].kode_tugas , response[i].judul_tugas , response[i].mata_pelajaran , response[i].kelas +" / "+ response[i].prodi , response[i].tanggal +"/"+ response[i].jam   , 
            "<a href='javascript:;' data-id="+ response[i].id + "  data-toggle='modal' data-target='#lihat_tugas' class='mr-1 btn btn-info btn-xs'>Lihat Tugas</a>"+
            '<a href="javascript:hapusTugas('+ response[i].id + ')" class="btn btn-danger btn-xs">delete</a> '+
            "<a class='btn btn-primary btn-xs target='new' href='<?= base_url("guru/Daftar_tugas/kumpulanTugas/")?>"+response[i].kode_tugas+"'>Jawaban Siswa</a>" ])
        j++ ;
        }
           $('#tugas').DataTable({
            data : data 
           });
      }
    })
  })

      //hapus data tugas siswa
function hapusTugas(kode){
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
            url : "<?= base_url('guru/Daftar_tugas/delete') ?>",
            method : "GET",
            data : "id="+kode ,
            success : function(response){
                if(response == "Sukses"){
                  toastr.success("Data Berhasil Terhapus");
                  window.location.href="<?= base_url('guru/Daftar_tugas') ?>"
                }             
            }

          })
      }
    });
  } 
</script>