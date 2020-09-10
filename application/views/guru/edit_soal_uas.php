
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa fa-book"></i> Edit Soal UAS</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                   <table class="table" id="uts">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Soal</th>
                            <th>Pilihan A</th>
                            <th>Pilihan B</th>
                            <th>Pilihan C</th>
                            <th>Pilihan D</th>
                            <th>Jawaban</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 0 ; foreach($edit_soal as $soal) : ?>
                            <tr>
                              <td><?= $soal->id_soal ; ?></td>
                              <td><?= $soal->soal ; ?></td>
                              <td><?= $soal->a ; ?></td>
                              <td><?= $soal->b ; ?></td>
                              <td><?= $soal->c ; ?></td>
                              <td><?= $soal->d ; ?></td>
                              <td><?= $soal->jawaban ; ?></td>
                              <td>
                                <a href="<?= base_url('guru/Soal_uas/form_edit/'.$soal->id) ?>" class="btn btn-danger btn-xs">Edit Soal</a>
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

    $('#uts').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    $(".form-group").smpPagination(2) ; 

  })
</script>