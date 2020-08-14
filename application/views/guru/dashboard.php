
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa fa-home"></i> Dashboard</a></li>
                </ul>
              </div><!-- /.card-header -->
              <br>
             <div class="row col-lg-12">

                    <!-- Post -->
                        <div class="col-lg-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                          <div class="inner">
                              <img style="height: 150px; width: 350px;" class="img-thumbnail" src="<?= base_url('assets/dist/img/materi.png') ?>">
                          </div>
                          <a href="<?=  base_url('guru/Materi') ?>" class="small-box-footer">Materi <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>


                      <div class="col-lg-4  ">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                          <div class="inner">
                              <img  style="height: 150px; width: 350px;" class="img-thumbnail" src="<?= base_url('assets/dist/img/bank_soal.png') ?>">
                          </div>
                          <a href="<?= base_url('guru/Nilai_ujian') ?>"  class="small-box-footer">Nilai Ujian <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>

                       <!-- Post -->
                        <div class="col-lg-4">
                        <!-- small box -->
                        <div class="small-box bg-success">
                          <div class="inner">
                              <img style="height: 150px; width: 350px;" class="img-thumbnail" src="<?= base_url('assets/dist/img/tugas_siswa.png') ?>">
                          </div>
                          <a href="<?= base_url('guru/Daftar_tugas') ?>" class="small-box-footer">Tugas Siswa <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>

                       <!-- Post -->
                        <div class="col-lg-4">
                        <!-- small box -->
                        <div class="small-box bg-success">
                          <div class="inner">
                              <img style="height: 150px; width: 350px;" class="img-thumbnail" src="<?= base_url('assets/dist/img/tugas.png') ?>">
                          </div>
                          <a href="<?= base_url('guru/Posting_tugas') ?>" class="small-box-footer">Posting Tugas <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>


                      <div class="col-lg-4  ">
                        <!-- small box -->
                        <div class="small-box bg-primary text-white ">
                          <div class="inner">
                              <img style="height: 150px; width: 350px;" class="img-thumbnail" src="<?= base_url('assets/dist/img/info_nilai.png') ?>">
                          </div>
                          <a href="<?= base_url('guru/Soal_uas') ?>" class="small-box-footer">Soal UAS <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>

                      <div class="col-lg-4  ">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                          <div class="inner">
                              <img style="height: 150px; width: 350px;" class="img-thumbnail" src="<?= base_url('assets/dist/img/info_nilai.png') ?>">
                          </div>
                          <a href="<?= base_url('guru/Soal_uts') ?>" class="small-box-footer">Soal UTS<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>


                    <!-- /.post -->
                  </div>

              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->