<form action="#" method="post" id="updateAdmin">
	<div class="from-group">
		<label>Username</label>
		<input type="hidden" name="id" value="<?= $akun->id ?>">
		<input type="text" name="username" id="username" value="<?= $akun->username ?>" class="form-control">

		<label>NIPN</label>
		<input type="text" name="nipn" id="nisn" disabled="" value="<?= $akun->nisn ?>" class="form-control">

		<label>New Password</label>
		<input type="password" name="password" class="form-control" placeholder="Enter New Password">
	</div>

	<div class="from-group mt-2">
		<button type="submit" class="btn btn-info btn-sm">Update</button>
	</div>
</form>	

<script type="text/javascript">
$(document).ready(function(){
	$("#updateAdmin").on('submit',function(e){
		e.preventDefault();
			if(document.getElementById('username').value == ""){
				swal({
					icon : "error" ,
					title : "username masih kosong ",
					dangerMode : [true , "OK"]
				})
			}else {
				$.ajax({
					url : "<?= base_url('admin/Listadmin/updateData') ?>" ,
					data : new FormData(this) ,
					method : "POST" ,
					cache : false ,
					processData : false ,
					contentType : false ,
					beforeSend : function(){
						$("loading").show()
					},
					complete : function(){
						$("loading").hide()
					},
					success : function(response){
						swal({
							icon : "success",
							title : "Data Update"
						}).then(function(){
							window.location.href="<?= base_url('admin/Listadmin') ?>"
						})
					}
				})
			}
	})
})

</script>