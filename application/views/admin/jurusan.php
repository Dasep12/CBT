
<button data-toggle="modal" data-target="#tambah_jurusan" class="btn btn-info mb-2"><i class="fa fa-plus"></i> Tambah Data</button>
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Prodi / Jurusan <i class="fa fa-book"></i> </h3>
          </div>
        <div class="card-body">
          <table class="table" id="dataSiswa">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Jurusan</th>
                <th>Kode Jurusan</th>
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
<!-- modal lihat jurusan -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="lihat_jurusan" class="modal fade">

     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
              <h6>Jurusan / Prodi <b id="no_inv"></b></h6>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
             <div class="load" style="position: fixed;margin: 100px 200px;z-index: 99">
             <img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/dist/img/loading.gif") ?>">
             </div>
             <div class="modal-body" id="output_list">

             
             </div>
         </div>
     </div>
</div>
<!-- end of lihat jurusan-->

<!-- modal tambah jurusan -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah_jurusan" class="modal fade">

     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
              <h6>Tambah Jurusan / Prodi <b id="no_inv"></b></h6>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
             <div class="load" style="position: fixed;margin: 40px 240px;z-index: 99">
              <img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/dist/img/loading.gif") ?>">
             </div>
             <div class="modal-body" id="output_list">
                <form action="" method="post" id="tambah">
                  <div class="form-group">
                    <label>Nama Jurusan / Prodi</label>
                    <input type="text" class="form-control" name="jurusan" id="jurusan" >
                  </div>

                  <div class="form-group">
                    <label>Kode Jurusan</label>
                    <input type="text" class="form-control" name="kode_jurusan" id="kode" >
                  </div>
                  <button class="btn btn-danger btn-sm">Tambah Jurusan</button>
                </form> 
             </div>
         </div>
     </div>
</div>
<!-- end of tambah jurusan--> 



<script type="text/javascript">
$(function(){

  //tampilkan list jurusan ke dalam modal
    $("#lihat_jurusan").on('show.bs.modal',function(e){
        var div = $(e.relatedTarget);
        var modal = $(this);
        var id = div.data("id");
          $.ajax({
            url : "<?= base_url("admin/Jurusan/jurusanModal") ?>" ,
            data :"id="+ id    ,
            method : "get",
            success : function(response){
              $("#output_list").html(response);
            }

          })
    }) 


//tambah data jurusan baru
$("#tambah").submit(function(e){
      e.preventDefault();
        if(document.getElementById('jurusan').value == ""){
          swal({
            icon : "error" ,
            title : "Jurusan masih kosong " ,
            dangerMode : [true, "Ok"]
          })
        }else if(document.getElementById('kode').value == ""){
          swal({
            icon : "error" ,
            title : "Kode Jurusan masih kosong ",
            dangerMode : [true, "Ok"]
          })
        }else {
          $.ajax({
            url : "<?= base_url('admin/Jurusan/input') ?>",
            data : new FormData(this),
            method : "POST" ,
            cache : false ,
            contentType : false ,
            processData : false ,
            beforeSend : function(){
              $("#loading").show();
            },
            success : function(response){
              if(response == "0"){
                swal({
                  icon : "error" ,
                  title : "kode jurusan sudah di gunakan" ,
                  dangerMode : [true , "Ok"]
                })
              }else {
                swal({
                  icon : "success" ,
                  title : response
                }).then(function(){
                  window.location.href="<?= base_url('admin/Jurusan') ?>"
                })
              }
            }
          })
        }
    })


  //tampilkan data siswa lewat ajax 
    $.ajax({
      url : "<?= base_url('admin/Jurusan/sendData') ?>",
      dataType : 'json', 
      contentType : false ,
      async : false ,
        success : function(jurusan){
          var data = [] ;
          var j = 1 ;
          for(var i = 0 ; i < jurusan.length ; i++){
            data.push([ j , jurusan[i].jurusan , jurusan[i].kode_jurusan , 
             '<a href="javascript:;" data-id="'+ jurusan[i].id +'" data-toggle="modal" data-target="#lihat_jurusan" class="btn btn-info btn-xs">view</a>' +
             '<a href="javascript:del('+ jurusan[i].id +')" class="btn btn-danger btn-xs ml-2">delete</a>'  ]);
            j++ ;
          }
             $('#dataSiswa').DataTable({
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
            url : "<?= base_url('admin/Jurusan/delete') ?>",
            method : "GET",
            data : "id="+ id ,
            success : function(response){
                if(response == "Sukses"){
                   swal({
                      icon : "success",
                      title : "Data di Hapus" ,
                    }).then(function(){
                      window.location.href="<?= base_url('admin/Jurusan/') ?>"
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