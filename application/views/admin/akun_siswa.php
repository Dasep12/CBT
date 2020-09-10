<button href="javascript:;" data-id="'+ response[i].id +'"  data-toggle="modal" data-target="#tambah_akun" class="btn btn-danger mb-2"><i class="fa fa-user-plus"></i> Tambah User </button>
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

<!-- modal tambah akun siswa-->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah_akun" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
              <h6>Tambah Akun  <b id="no_inv"></b></h6>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
             <div class="load" style="position: absolute;margin: 40px 240px;z-index: 99">
              <img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
             </div>
             <div class="modal-body" id="output_list">  
             <form action="" id="addAkun" method="post">    
              <div class="form-group">
                  <label>Pilih NISN</label>
                  <select  id="nisn" name="nisn" class="form-control select2" style="width: 100%;">
                    <option value="">Cari NISN</option>
                  </select>

                  <label>Password</label>
                  <input type="password" name="password" class="form-control" id="pwd">

                  <button class="mt-2 btn btn-success btn-sm">Tambah Data</button>
                </div>
             </form>      
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
            url : "<?php echo base_url('admin/Akun_siswa/delete') ?>",
            method : "GET",
            data : "id="+ id ,
            success : function(response){
                if(response == "Sukses"){
                   swal({
                      icon : "success",
                      title : "Data di Hapus" ,
                    }).then(function(){
                      window.location.href="<?php echo base_url('admin/Akun_siswa/') ?>"
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

//tambah akun  siswa
    $("#addAkun").on('submit',function(e){
      e.preventDefault();
        if(document.getElementById('nisn').value == ""){
          toastr.info("nisn masih kosong")
        }else if(document.getElementById("pwd").value == ""){
          toastr.info("password masih kosong")
        }else {
          $.ajax({
            url : "<?php echo base_url('admin/Akun_siswa/addAkun') ?>" ,
            method : "POST" ,
            data : new FormData(this),
            processData : false ,
            contentType : false ,
            cache  : false, 
            success : function(e){
              if(e == "Sukses"){
                swal({
                  icon : "success" ,
                  title : "Berhasil" ,
                  text : e ,
                }).then(function(){
                  window.location.href="<?php echo base_url('admin/Akun_siswa')?>" ;
                })  
              }else {
                swal({
                  icon : "error" ,
                  title : "Perhatian" ,
                  text : e ,
                  dangerMode  : [true,"Ok"]
                })
              }
            }
          })
        }
    })


    //tampilkan data akun siswa ke dalam table lewat dataTable 
    $.ajax({
      url : "<?php echo  base_url('admin/Akun_siswa/sendData') ?>",
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
            url : "<?php echo base_url("admin/Akun_siswa/viewAkun/") ?>" ,
            data :"id="+ id  ,
            method : "get",
            success : function(response){
              $("#output_list").html(response);
            }

          })
    }) 


    //load data siswa dan kirim ke select
     $(".select2").select2({
        ajax: { 
             url: "<?php echo base_url("admin/Akun_siswa/sendSelect") ?>",
             dataType: "json",
             delay : 250 ,
             data : function(params){
                return {
                 nisn : params.term
                };
             },
             processResults : function(data){
                  var results = [] ;
                  $.each(data,function(index,item){
                      results.push({
                        id : item.nisn,
                        text : item.nisn +"-"+ item.nama
                      })
                  });


                  return {
                    results : results
                  };
             }
       }
      
      });
  })
</script>