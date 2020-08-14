<div class="form-gruop">
	<label>Judul Tugas</label>
	<input type="text" name="judul_tugas" class="form-control" value="<?= $tugas->judul_tugas ?>">

	<label>Keterangan Tugas</label>
	<textarea rows="5" class="form-control mb-3" ><?= $tugas->keterangan ?></textarea>

	<a href="javascript:file('<?= $tugas->file_tugas ?>')" class="mt-3">
		<img height="60px" class="img img-thumbnail" width="60px" src="<?= base_url('assets/dist/img/tugas_view.png') ?>">
	</a>
</div>
<small class="text-danger">*klik di icon folder untuk lihat lampiran*</small>

<script type="text/javascript">
	function file(file){
		window.open("<?= base_url('assets/tugas/soal/') ?>" + file , "menubar=yes" , "resizable=yes" , "height=450px" , "width=450px");
	}
</script>