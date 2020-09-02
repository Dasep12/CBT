
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Edit Nama Sekolah <i class="fa fa-user-circle"></i> </h3>
          </div>
        <div class="card-body">
       <form id="editNama" method="post" >
        <input type="hidden" name="id" value="<?= $sekolah->id ?>">
        <table class="table">
          <tr>
            <th width="120px" >Nama Sekolah  *</th>
            <td>:</td>
            <td><input type="text" name="nama" class="form-control col-md-8" value="<?= $sekolah->nama_sekolah ?>" placeholder="Masukan Username" id="nama"></td>          
          </tr>

          <tr>
            <td></td>
            <td></td>
            <td><button type="submit" class="btn btn-danger btn-sm">Update Data</button></td>
          </tr>
        </table>
        </form>
            <div class="form-inline mb-2">
              <label class=""></label>
              
            </div>

            <div class="form-inline mb-2">
              <label class=""></label>
              
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    <script type="text/javascript">
      $(function(){
        $("#editNama").on("submit",function(e){
          e.preventDefault();
            if(document.getElementById('nama').value == ""){
              swal({
                icon : "error",
                title : "mata pelajaran masih kosong" ,
                dangerMode : [true,"Ok"]
              }).then(function(){
                $("#username").focus();
              })
            }else {
              $.ajax({
                url : "<?= base_url("admin/Setnama/update") ?>",
                data : new FormData(this),
                method : "post" ,
                contentType : false ,
                cache : false ,
                processData : false ,
                beforeSend : function(){
                  $(".Loading").show();
                },
                complete : function(){
                  $(".Loading").hide();
                },
                success : function(e){
                  if(e == "Berhasil update data"){
                    swal({
                      icon : "success",
                      title : e 
                    }).then(function(){
                      window.location.href="<?= base_url('admin/Setnama') ?>"
                    })
                  }else {
                    swal({
                      icon : "error",
                      title : e ,
                      dangerMode : [true,"Ok"]
                    })
                  }
                }
              })
            }

        })
      })
    </script>