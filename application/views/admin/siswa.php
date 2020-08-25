
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Data Siswa <i class="fa fa-graduation-cap"></i> </h3>
          </div>
        <div class="card-body">
          <table class="table" id="dataSiswa">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Kelas</th>
                <th>Prodi</th>
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
      url : "<?= base_url('admin/Siswa/sendData') ?>",
      type : 'ajax',
      dataType : 'json', 
      contentType : false ,
      async : false ,
        success : function(siswa){
          var data = [] ;
          var j = 1 ;
          for(var i = 0 ; i < siswa.length ; i++){
            data.push([ j , siswa[i].nama , siswa[i].nisn , siswa[i].kelas , siswa[i].prodi , 
             '<a target="_blank" href="<?= base_url('admin/Siswa/view/') ?>'+ siswa[i].nisn +'" class="mr-1 btn btn-info btn-xs">view</a>' +
             '<a href="javascript:del('+ siswa[i].id +')" class="btn btn-danger btn-xs">delete</a>'  ]);
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
            url : "<?= base_url('admin/Siswa/delete') ?>",
            method : "GET",
            data : "id="+ id ,
            success : function(response){
              /*  if(response == "Sukses"){
                  toastr.success("Data Berhasil Terhapus");
                  window.location.href="<?= base_url('admin/Siswa') ?>"
                } */
                alert(response);   
            }

          })
      }
    });
  }

    </script>