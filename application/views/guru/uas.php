
<div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                        src="<?= base_url("assets/poto_pengajar/". $profile->photo) ?>">
                </div>

                <h3 class="profile-username text-center"></h3>

                <p class="text-muted text-center"><?= $this->session->userdata("nama") ?></p>

                <table class="table">
                  <tr>
                    <td>NIPN</td>
                    <td>:</td>
                    <td><?= $this->session->userdata("nipn") ?></td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?= $this->session->userdata("status") ?></td>
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa fa-book"></i> Daftar Soal</a></li>
                 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <a href="<?= base_url('guru/Upload_soal') ?>" class="btn btn-danger btn-sm mb-2"><i class="fa fa-upload"></i> Upload Soal UAS</a>
                      <table class="table" id="uas">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Kode Soal</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                           <?php $no = 0 ; foreach($uas as $soal) : ?>
                            <tr>
                              <td><?= ++$no ; ?></td>
                              <td><?= $soal->kode_soal ; ?></td>
                              <td><?= $soal->mata_pelajaran ; ?></td>
                              <td><?= $soal->kelas ; ?></td>
                              <td>
                                <a href="<?= base_url('guru/Soal_uts/view_uts/'.$soal->kode_soal) ?>" class="btn btn-success btn-xs">lihat</a>
                                <a href="<?= base_url('guru/Soal_uts/edit_soal/'.$soal->kode_soal) ?>" class="btn btn-info btn-xs">edit</a>
                                <a href="javascript:del('<?= $soal->kode_soal ?>')" class="btn btn-danger btn-xs">Delete</a>
                              </td>
                            </tr>
                          <?php endforeach ?>
                          
                        </tbody>
                      </table>
                    </div>
                    <!-- /.post -->
                  </div>
                  </div>
                 </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->


  <script type="text/javascript">
  $(document).ready(function(){

     $('#uas').DataTable();
  })

</script>

