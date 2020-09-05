
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Administrator <i class="fa fa-user-circle"></i> </h3>
          </div>
        <div class="card-body">
          <table class="table" id="dataAdmin">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>NIPN</th>
                <th>Level</th>
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
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="lihat_akun" class="modal fade">

     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
              <h6>Administrator <b id="no_inv"></b></h6>
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




<script type="text/javascript">
$(function(){

  //tampilkan list akun ke dalam modal
    $("#lihat_akun").on('show.bs.modal',function(e){
        var div = $(e.relatedTarget);
        var modal = $(this);
        var id = div.data("id");
          $.ajax({
            url : "<?= base_url("admin/Listadmin/akunModal") ?>" ,
            data :"id="+ id    ,
            method : "get",
            success : function(response){
              $("#output_list").html(response);
            }

          })
    }) 


  //tampilkan data akun lewat ajax 
    $.ajax({
      url : "<?= base_url('admin/Listadmin/sendData') ?>",
      dataType : 'json', 
      contentType : false ,
      async : false ,
        success : function(admin){
          var data = [] ;
          var j = 1 ;
          for(var i = 0 ; i < admin.length ; i++){
            data.push([ j , admin[i].username , admin[i].nisn, "Administrator" ,
             '<a href="javascript:;" data-id="'+ admin[i].id +'" data-toggle="modal" data-target="#lihat_akun" class="btn btn-info btn-xs">view</a>' +
             '<a href="javascript:del('+ admin[i].id +')" class="btn btn-danger btn-xs ml-2">delete</a>'  ]);
            j++ ;
          }
             $('#dataAdmin').DataTable({
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
            url : "<?= base_url('admin/Listadmin/delete') ?>",
            method : "GET",
            data : "id="+ id ,
            success : function(response){
                if(response == "Sukses"){
                   swal({
                      icon : "success",
                      title : "Data di Hapus" ,
                    }).then(function(){
                      window.location.href="<?= base_url('admin/Listadmin/') ?>"
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