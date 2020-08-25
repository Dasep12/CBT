<form action="" method="POST" id="updateAkun">
<div  class="form-group">
	<label>Nama</label>
	<input type="hidden" name="id" value="<?= $akun->id ?>">
	<input type="text" name="nama" id="nama" class="form-control" value="<?= $akun->username ?>">
	<label>NISN</label>
	<input type="text"  name="nisn" id="nisn" class="form-control" value="<?= $akun->nisn ?>">
	<label>Level</label>
	<?php if($akun->role_id == 3){ ?>
		<select class="form-control">
			<option>Siswa</option>
		</select>
	<?php } ?>
	<label>New Password</label>
	<input type="password" name="password" id="password" class="form-control" placeholder="Enter New Password">
</div>

<div class="form-group">
	<button type="submit" class="btn btn-info">Update Akun</button>
</div>
</form>


<script type="text/javascript">
	$(function(){
		$("#updateAkun").submit(function(e){
			e.preventDefault();
			var password = document.getElementById('password').value  ;
			if(document.getElementById('nama').value == ""){
				swal({
					icon : "error",
					dangerMode : [true,"Ok"],
					title : "username masih kosong"
				})
			}else if(document.getElementById('nisn').value == ""){
				swal({
					icon : "error",
					dangerMode : [true,"Ok"],
					title : "nisn masih kosong"
				})
			}else {
				$.ajax({
					url : "<?= base_url('admin/Akun_siswa/updateAkun') ?>",
					data : new FormData(this),
					method : "POST" ,
					cache : false ,
					processData : false ,
					contentType : false ,
					success :function(e){
						swal({
							icon : "success",
							title : "Data Update"
						}).then(function(){
							window.location.href="<?= base_url('admin/Akun_siswa') ?>"
						})
					}
				})
			}
		})
	})
</script>