
<form action="" method="post" id="updateMapel">
	<div class="form-group">
		<label>Mata Pelajaran</label>
		<input type="hidden" name="id" value="<?= $mapel->id ?>" >
		<input type="text" class="form-control" name="mata_pelajaran" id="mata_pelajaran" value="<?= $mapel->mata_pelajaran ?>">
	</div>

	<div class="form-group">
		<label>Kode Mapel</label>
		<input type="text" class="form-control" name="kode_mapel" id="kode" value="<?= $mapel->kode_mapel ?>">
	</div>

	<div class="form-group">
		<label>Pengajar</label>
		<select name="pengajar" id="pengajar" class="form-control">
			<option value="<?= $mapel->kode_pengajar ?>"><?= $mapel->pengajar ?></option>
			<?php foreach($pengajar as $result) : ?>
				<option value="<?= $result->nipn ?>"><?= $result->nama ." " . $result->gelar ?></option>
			<?php endforeach ?>
		</select>
	</div>

	<div class="form-group">
		<label>Kelas</label>
		<select name="kelas" id="kelas" class="form-control">
			<option><?= $mapel->kelas ?></option>
			<option>X</option>
			<option>XI</option>
			<option>XII</option>
		</select>
	</div>

	<div class="form-group">
		<label>Prodi</label>
		<select name="prodi" class="form-control">
			<option><?= $mapel->prodi ?></option>
			<?php foreach($jurusan as $result) : ?>
				<option ><?= $result->jurusan ?></option>
			<?php endforeach ?>
		</select>
	</div>


	<button class="btn btn-danger btn-sm">Update Mata Pelajaran</button>
</form> 


<script>
	$(function(){
		$("#updateMapel").submit(function(e){
			e.preventDefault();
				if(document.getElementById('mata_pelajaran').value == ""){
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
						url : "<?= base_url('admin/Mata_pelajaran/updateData') ?>",
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
								window.location.href="<?= base_url('admin/Mata_pelajaran') ?>"
							})
						}
					})
				}
		})
	})
</script>