
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Data Pengajar <i class="fa fa-graduation-cap"></i> </h3>
          </div>
        <div class="card-body">
          <table class="table" id="dataSiswa">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIPN</th>
                <th>No Telpon</th>
                <th>Email</th>
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



    <script type="text/javascript">
$(function(){



  //tampilkan data siswa lewat ajax 
    $.ajax({
      url : "<?= base_url('admin/Pengajar/sendData') ?>",
      type : 'ajax',
      dataType : 'json', 
      contentType : false ,
      async : false ,
        success : function(guru){
          var data = [] ;
          var j = 1 ;
          for(var i = 0 ; i < guru.length ; i++){
            data.push([ j , guru[i].nama +" " +guru[i].gelar ,  guru[i].nipn  , guru[i].no_hp  , guru[i].email ,
            '<a target="_blank" href="<?= base_url('admin/Pengajar/view/') ?>'+ guru[i].nipn +'" class="mr-1 btn btn-info btn-xs">view</a>' +
             '<a href="javascript:del('+ guru[i].id +')" class="btn btn-danger btn-xs">delete</a>'    ]);
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
            url : "<?= base_url('admin/Pengajar/delete') ?>",
            method : "GET",
            data : "id="+ id ,
            success : function(response){
                if(response == "Sukses"){
                   swal({
                      icon : "success",
                      title : "Data di Hapus" ,
                    }).then(function(){
                      window.location.href="<?= base_url('admin/Pengajar/') ?>"
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