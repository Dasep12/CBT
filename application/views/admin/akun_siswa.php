<button class="btn btn-danger mb-2"><i class="fa fa-user-plus"></i> Tambah User </button>
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Akun Siswa <i class="fa fa-user"></i> </h3>
          </div>
        <div class="card-body">
          <table class="table" id="akunSiswa">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NISN</th>
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


<!-- modal data akun -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="lihat_akun" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
              <h6>Akun  <b id="no_inv"></b></h6>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
             <div class="load" style="position: absolute;margin: 40px 240px;z-index: 99">
              <img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
             </div>
             <div class="modal-body" id="output_list">             
             </div>
         </div>
     </div>
</div>
<!-- end of modal akun siswa-->


<script>
//hapus data akun siswa
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
            url : "<?= base_url('admin/Akun_siswa/delete') ?>",
            method : "GET",
            data : "id="+ id ,
            success : function(response){
                if(response == "Sukses"){
                   swal({
                      icon : "success",
                      title : "Data di Hapus" ,
                    }).then(function(){
                      window.location.href="<?= base_url('admin/Akun_siswa/') ?>"
                    })
                } else {
                  toastr.error("Data Tidak Terhapus");
                }
            }

          })
      }
    });
  }


  $(function(){

    //tampilkan data akun siswa ke dalam table lewat dataTable 
    $.ajax({
      url : "<?=  base_url('admin/Akun_siswa/sendData') ?>",
      type : 'ajax' ,
      dataType : 'json' ,
      contentType : false ,
      async : false ,
      success :function(response){
        var data = [] ;
        var j = 1  ;
        for(var i = 0  ; i < response.length ; i++){
          data.push([j , response[i].username , response[i].nisn ,'<a href="javascript:del('+ response[i].id +')" class="btn btn-danger ml-2 btn-xs">delete</a>' +
          '<a href="javascript:;" data-id="'+ response[i].id +'"  data-toggle="modal" data-target="#lihat_akun" class="ml-2 btn btn-info btn-xs">view</a>' ]);
          j++ ;        
        }
        $("#akunSiswa").DataTable({
          data : data 
        })
      }
    })


    //tampilkan data akun siswa ke dalam modal
    $("#lihat_akun").on('show.bs.modal',function(e){
        var div = $(e.relatedTarget);
        var modal = $(this);
        var id = div.data("id");
          $.ajax({
            url : "<?= base_url("admin/Akun_siswa/viewAkun/") ?>" ,
            data :"id="+ id  ,
            method : "get",
            success : function(response){
              $("#output_list").html(response);
            }

          })
    }) 
  })
</script>