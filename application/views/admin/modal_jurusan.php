
<form action="" method="post" id="updateJurusan">
	<div class="form-group">
		<label>Nama Jurusan / Prodi</label>
		<input type="hidden" name="id" value="<?= $jurusan->id ?>" >
		<input type="text" class="form-control" name="jurusan" id="jurusan" value="<?= $jurusan->jurusan ?>">
	</div>

	<div class="form-group">
		<label>Kode Jurusan</label>
		<input type="text" class="form-control" name="kode_jurusan" id="kode" value="<?= $jurusan->kode_jurusan ?>">
	</div>
	<button class="btn btn-danger btn-sm">Update Jurusan</button>
</form> 


<script>
	$(function(){
		$("#updateJurusan").submit(function(e){
			e.preventDefault();
				if(document.getElementById('jurusan').value == ""){
					swal({
						icon : "error" ,
						title : "Jurusan masih kosong " ,
						dangerMode : [true, "Ok"]
					})
				}else if(document.getElementById('kode').value == ""){
					swal({
						icon : "error" ,
						title : "Kode Jurusan masih kosong ",
						dangerMode : [true, "Ok"]
					})
				}else {
					$.ajax({
						url : "<?= base_url('admin/Jurusan/updateData') ?>",
						data : new FormData(this),
						method : "POST" ,
						cache : false ,
						contentType : false ,
						processData : false ,
						beforeSend : function(){
							$("#loading").show();
						},
						success : function(response){
							swal({
								icon : "success" ,
								title : response
							}).then(function(){
								window.location.href="<?= base_url('admin/Jurusan') ?>"
							})
						}
					})
				}
		})
	})
</script>