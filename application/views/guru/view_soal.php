
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa fa-book"></i> Preview Soal UTS</a></li>
                   <li class="nav-item ml-2"><a class="nav-link " href="#" ><i class="fa fa-arrow-left"></i> Kembali</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <p>Pilih jawaban yang menurut anda benar ! Selamat Mengerjakan</p>
                          <form  class="pagination-block" action="<?= base_url("ujian/Soal/kumpulkanJawabanPG") ?>" method="post" name="soalPG">
                            <?php $i = 0  ;  foreach($soal as $item) : ?>
                            <div class="form-group">        
                              <p><?= $item->id_soal . ". " . $item->soal ?> </p>
                              <input class="mr-2" type="radio" id="<?= $item->id . $item->a ?>" value="A" name="jawaban[<?= $item->id_soal ?>]"><?= "A." . $item->a ?><br>
                              <input class="mr-2" type="radio" id="<?= $item->b ?>" value="B" name="jawaban[<?= $item->id_soal ?>]"><?= "B." . $item->b ?><br>
                              <input class="mr-2" type="radio" id="<?= $item->c ?>" value="C" name="jawaban[<?= $item->id_soal ?>]"><?= "C." . $item->c ?><br>
                              <input class="mr-2" type="radio" value="D" name="jawaban[<?= $item->id_soal ?>]"><?= "D." . $item->d ?><br>
                            </div>
                            <?php endforeach ?>
                            <hr>
                        </form>

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

    $(".form-group").smpPagination(2) ; 
    
  })
</script>