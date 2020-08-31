  <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                 <?php if(empty($profile->photo)) { ?> 
                  <img class="profile-user-img img-fluid img-circle"   src="<?= base_url("assets/dist/img/siswa.png") ?>">
                  <?php }else { ?>
                  <img class="profile-user-img img-fluid img-circle"   src="<?= base_url("assets/poto_siswa/" . $profile->photo) ?>">
                  <?php } ?>
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
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab"><i class="fa fa-book"></i> Daftar Materi</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <table  class="table ">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Judul Materi</th>
                            <th>Keterangan Materi</th>
                            <th>Posted on</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                     	<?php $no = 1 ; foreach($materi_siswa as $materi) : ?>
                     	<tr>
                     		<td><?= $no++ ?></td>
                     		<td><?= $materi->judul_materi ?></td>
                     		<td><?= $materi->keterangan_materi ?></td>
                     		<td><?= $materi->tgl_post . " / " .  $materi->jam_post ?></td>
                     		<td><a target="_blank" href="<?= base_url('siswa/Materi/lihatMateri/'.$materi->kode_materi) ?>"  class="btn btn-primary btn-sm" >lihat materi</a></td>
                     	</tr>
                     	<?php endforeach ?>
                        </tbody>
                      </table>
                      
                    </div>
                    
                  </div>
                  <!-- /.tab-pane -->       
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

