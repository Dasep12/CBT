<?php if($this->session->flashdata("error")) { ?>
<div class="alert alert-danger">
	Gagal Input ada data yang sama ( <?= $this->session->flashdata("error") ?> )
</div>
<?php }elseif($this->session->flashdata("success"))  { ?>
<div class="alert alert-success">
	Berhasil , <?= $this->session->flashdata("success") ?>
</div>
<?php } ?>
<div class="form-group">
		<form enctype="multipart/form-data" name="upload" action="<?= base_url('admin/Upload_siswa') ?>" method="post">
			<label>Upload Data Siswa</label>
			<input onchange="return validasi()" class="form-control mb-1"  type="file" name="file" id="file">
			<button type="submit" class="mt-2 ml-1 btn btn-sm btn-primary" name="submit">Preview</button>
			<a href="<?= base_url('assets/upload/format_upload.xlsx') ?>" class="mt-2 ml-1  btn btn-info btn-sm">Download Template</a>
		</form>
</div>

<?php 
if(isset($_POST['submit'])){ ?>
<form action="<?= base_url('admin/Upload_siswa/upload') ?>" method="post" id="postSiswa">
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
                <th>Tempat, Tanggal Lahir</th>
                <th>Gender</th>
                <th>Kelas</th>
                <th>Kode Prodi</th>
                <th>Prodi</th>
              </tr>
              <tbody>
              	<?php $no = 1 ; foreach($sheet as $siswa) : ?>
              	<tr>
              		<td><?= $no++ ?></td>
              		<td><?= $siswa['B'] ?></td>
              		<td><?= $siswa['C'] ?></td>
              		<td><?= $siswa['D'] . "," . $siswa['E'] ?></td>
              		<td><?= $siswa['F'] ?></td>
              		<td><?= $siswa['H'] ?></td>
              		<td><?= $siswa['I'] ?></td>
              		<td><?= $siswa['J'] ?></td>
              	</tr>
              <?php endforeach; ?>
              </tbody>
            </thead>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <button type="submit" class="btn btn-danger mb-2">Posting Data Siswa</button>
</form>
<?php } ?>



<script type="text/javascript">
	//validasi file yang hanya bisa di upload

	function  validasi(){
		var file = document.getElementById('file');
		var path = file.value ;
		var exe = /(\.xlsx)$/i;
		if(!exe.exec(path)){
			swal({
				icon : "warning" ,
				dangerMode : [true,"Ok"],
				title : "File Salah" ,
				text : "Upload File Dengan Ekstensi .xlsx"
			});
			file.value = "";
			return ;
		}
	}


	$(function(){
		/*$("#postSiswa").on('submit',function(e){
			e.preventDefault();
			$.ajax({
				url : "<?= base_url('admin/Upload_siswa/upload') ?>" ,
				method : "POST" ,
				beforeSend : function(){
                  $(".Loading").show();
                },
                complete : function(){
                  $(".Loading").hide();
                },
				success : function(e){
					if(e == "Berhasil"){
						swal({
							icon : "success",
							title : "Berhasil Posting"
						}).then(function(){
							window.location.href="<?= base_url('admin/Upload_siswa') ?>"
						})
					}else {
						swal({
							icon : "error" ,
							title : "Perhatian" ,
							dangerMode : [true,"Ok"],
							text : e 
						})
					}
				}
			})
		})*/
	})
</script>
