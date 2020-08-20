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

                <h3 class="profile-username text-center"><?= $profile->nama ?></h3>

                <p class="text-muted text-center">Tahun ajaran 2019/2020</p>

                <table class="table">
                  <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td><?= $profile->nisn ?></td>
                  </tr>
                  <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><?= $profile->kelas ?></td>
                  </tr>
                  <tr>
                    <td>Prodi</td>
                    <td>:</td>
                    <td><?= $profile->prodi ?></td>
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
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-title">
                 Mata Pelajaran
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <?php foreach($mata_pelajaran as $mapel) : ?>
                  <div class="col-sm-2">
                    <a class="btn btn-default btn-xs col-lg-12" href="<?= base_url("siswa/Materi/list/".$mapel->kode_mapel) ?>" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                      <?= $mapel->mata_pelajaran ?>
                    </a>
                  </div>
                <?php endforeach ?>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
              

  <script type="text/javascript">
  $(function(){
    $("#tugas").DataTable();
  })

  </script>