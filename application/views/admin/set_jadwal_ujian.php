
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Jadwal Ujian <i class="fa fa-book"></i> </h3>
          </div>
        <div class="card-body">
          <table class="table" id="dataMapel">
            <thead>
              <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>Kode Soal</th>
                <th>Guru B.Study</th>
                <th>Kelas</th>
                <th>Prodi / Jurusan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
              <tbody>
              </tbody>
            </thead>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->



<!-- modal lihat mata_pelajaran-->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="lihat_jadwal" class="modal fade">

     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
              <h6>Jadwal Ujian <b id="no_inv"></b></h6>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
             <div class="load" style="position: fixed;margin: 100px 200px;z-index: 99">
             <img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/dist/img/loading.gif") ?>">
             </div>
             <div class="modal-body" id="output_list">
              <!-- tampilkan data di sini lewat ajax -->
             </div>
         </div>
     </div>
</div>
<!-- end of lihat mata pelajaran -->





<script type="text/javascript">
$(function(){

  //tampilkan list jurusan ke dalam modal
    $("#lihat_jadwal").on('show.bs.modal',function(e){
        var div = $(e.relatedTarget);
        var modal = $(this);
        var id = div.data("id");
          $.ajax({
            url : "<?= base_url("admin/Jadwal_ujian/mapelJadwal") ?>" ,
            data :"id="+ id    ,
            method : "get",
            success : function(response){
              $("#output_list").html(response);
            }

          })
    }) 



  //tampilkan data ujian lewat ajax 
    $.ajax({
      url : "<?= base_url('admin/Jadwal_ujian/sendData') ?>",
      type : 'ajax',
      dataType : 'json', 
      contentType : false ,
      async : false ,
        success : function(jadwal){
          var data = [] ;
          var j = 1 ;
          for(var i = 0 ; i < jadwal.length ; i++){
            data.push([ j , jadwal[i].mata_pelajaran , jadwal[i].kode_soal  , jadwal[i].guru  ,jadwal[i].kelas , jadwal[i].prodi , jadwal[i].hari  ,  
             '<a href="javascript:;" data-id="'+ jadwal[i].id +'" data-toggle="modal" data-target="#lihat_jadwal" class="btn btn-info btn-xs">view</a>' +
             '<a href="javascript:del('+ jadwal[i].id +')" class="btn btn-danger btn-xs ml-2">delete</a>'  ]);
            j++ ;
          }
             $('#dataMapel').DataTable({
              data : data 
             });
        }
    })
})


function del(id){
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
            url : "<?= base_url('admin/Jadwal_ujian/delete') ?>",
            method : "GET",
            data : "id="+ id ,
            success : function(response){
                if(response == "Sukses"){
                   swal({
                      icon : "success",
                      title : "Data di Hapus" ,
                    }).then(function(){
                      window.location.href="<?= base_url('admin/Jadwal_ujian/') ?>"
                    })
                } else {
                  toastr.error("Data Tidak Terhapus");
                }
            }

          })
      }
    });
  }

    </script>