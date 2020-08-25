
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Profile Siswa <i class="fa fa-graduation-cap"></i> </h3>
          </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4">
              <form action="" enctype="multipart/form-data">
              <?php if(empty($profile->photo)){ ?>
                <img src="#" height="50px" width="60px">
              <?php }else { ?>
                <img class="img img-thumbnail img-circle" src="<?= base_url("assets/poto_siswa/". $profile->photo) ?>">
              <?php } ?>
            </div>
            <div class="col-lg-8">
                <table class="table">
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td><input class="form-control"  type="text" name="nama" id="nama" value="<?= $profile->nama ?>"></td>
                    </tr>
                    <tr>
                      <td>NISN</td>
                      <td>:</td>
                      <td><input class="form-control"  type="text" name="nisn" id="nisn" value="<?= $profile->nisn ?>"></td>
                    </tr>  
                    <tr>
                      <td>Kelas</td>
                      <td>:</td>
                      <td>
                        <select  class="form-control" name="kelas">
                          <option><?= $profile->kelas ?></option>
                          <option>TKJ</option>
                          <option>AKP</option>
                          <option>TKR</option>
                        </select>
                      </td>
                    </tr>                    
                </table>
            </div>

          </div>
          <div class="">
               <button type="submit" class="btn btn-primary btn-sm mt-2">Perbarui Profile</button>
        </div>
        </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
<script type="text/javascript">


</script>