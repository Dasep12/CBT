
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa fa-book"></i> Edit Soal UTS</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                   	<div class="post">
                   		<form action="" id="updateSoal" method="post" >
                   			<div class="form-group">
                   				<label>Soal No. <?= $soal->id_soal ?></label>
                          <input type="text" name="kode_soal" value="<?= $soal->kode_soal ?>">
                   				<input type="hidden" name="id" value="<?= $soal->id ?>">
                   				<textarea id="soal" name="soal" class="form-control"><?= $soal->soal ?></textarea>
                   			</div>

                   			<div class="form-group">
                   				<label>Pilihan A</label>
                   				<input type="text" id="a" class="form-control" name="a" value="<?= $soal->a ?>">
                   			</div>

                   			<div class="form-group">
                   				<label>Pilihan B</label>
                   				<input type="text" id="b" class="form-control" name="b" value="<?= $soal->b ?>">
                   			</div>

                   			<div class="form-group">
                   				<label>Pilihan C</label>
                   				<input type="text" id="c" class="form-control" name="c" value="<?= $soal->c ?>">
                   			</div>

                   			<div class="form-group">
                   				<label>Pilihan D</label>
                   				<input type="text" id="d" class="form-control" name="d" value="<?= $soal->d ?>">
                   			</div>

                   			<div class="form-group">
                   				<label>Jawaban</label>
                   				<input type="text" id="jawaban" class="form-control" name="jawaban" value="<?= $soal->jawaban ?>">
                   			</div>

                   			<button class="btn btn-primary "><i class="fa fa-save"></i> Update Soal</button>
                   			<a href="" class="btn btn-success" >Kembali</a>

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
  	$("#updateSoal").on("submit",function(e){
  		e.preventDefault();
  			if(document.getElementById('soal').value == ""){
  				toastr.error("perhatian soal tidak boleh kosong");
  			}else if(document.getElementById('a').value == ""){
  				toastr.error("perhatian pilihan A tidak boleh kosong");
  			}else if(document.getElementById('b').value == ""){
  				toastr.error("perhatian pilihan B tidak boleh kosong");
  			}else if(document.getElementById('c').value == ""){
  				toastr.error("perhatian pilihan C tidak boleh kosong");
  			}else if(document.getElementById('d').value == ""){
  				toastr.error("perhatian pilihan D tidak boleh kosong");
  			}else if(document.getElementById('jawaban').value == ""){
  				toastr.error("perhatian jawaban dari soal tidak boleh kosong");
  			}else {
  				$.ajax({
  					url : "<?= base_url('guru/Soal_uts/update') ?>",
  					method : "POST" ,
  					cache : false ,
  					processData : false ,
  					contentType : false ,
  					data : new FormData(this),
  					beforeSend : function(){
  						$(".Loading").show();
  					},
  					complete: function(){
  						$(".Loading").hide();
  					},
  					success : function(msg){
  						if(msg == "Sukses"){
  							toastr.success("Soal Berhasil di Perbaharui");
  							window.location.href="<?= base_url("guru/Soal_uts/edit_soal/".$kode) ?>"
  						}else {
  							toastr.error("perhatian jawaban dari soal tidak boleh kosong");
  						}
  					} 
  				})
  			}
  	})
  })
</script>