<?php if($materi_siswa == FALSE) { ?>
	<!-- jika materi tidak dilengkapi file pendukung jalankan fungsi di bawah -->
	<div class="form-group">
	<h3><?= $materi_kosong->mata_pelajaran ?></h3>
	<label><?= $materi_kosong->keterangan_materi ?>
		<h3><?= $materi_kosong->judul_materi ?></h3>
	</label>
</div>
<?php }else { ?>
	<!-- materi lengkap dengan file pendukung -->
<div class="form-group">
	<h3><?= $materi->mata_pelajaran ?></h3>
	<label><?= $materi->keterangan_materi ?>
		<h3><?= $materi->judul_materi ?></h3>
	</label>

</div>
<div class="form-group">
	<?php  ; foreach($materi_siswa as $materi2) : ?>
		<?php $path = base_url("assets/materi/". $materi2->file);
			$info = pathinfo($path, PATHINFO_EXTENSION);
				if($info == "xlsx" || $info == "csv" || $info == "xls" ){ ?>
					<a href="javascript:open<?= $materi2->id ?>('<?= $materi2->file ?>')" class="col-lg-12 btn btn-default mb-2"><img class="img img-thumbnail" height="30px" width="30px" src="<?= base_url("assets/dist/img/excel.png") ?>"> <?= $materi2->file ?> </a><br>
				<?php }else if($info == "png" || $info == "jpeg" || $info == "jpg"){ ?>
					<a href="javascript:open<?= $materi2->id ?>('<?= $materi2->file ?>')" class="col-lg-12 btn btn-default mb-2"><img class="img img-thumbnail" height="30px" width="30px" src="<?= base_url("assets/dist/img/picture.png") ?>"> <?= $materi2->file ?> </a><br>
				<?php } else if($info == "pdf" || $info == "PDF" ){ ?>
					<a href="javascript:open<?= $materi2->id ?>('<?= $materi2->file ?>')" class="col-lg-12 btn btn-default mb-2"><img class="img img-thumbnail" height="30px" width="30px" src="<?= base_url("assets/dist/img/pdf.png") ?>"> <?= $materi2->file ?> </a><br>
				<?php }else if($info == "docx"  ){ ?>
					<a href="javascript:open<?= $materi2->id ?>('<?= $materi2->file ?>')" class="col-lg-12 btn btn-default mb-2"><img class="img img-thumbnail" height="30px" width="30px" src="<?= base_url("assets/dist/img/word.png") ?>"> <?= $materi2->file ?> </a><br>
				<?php }
		?>
<script type="text/javascript">
	function open<?= $materi2->id ?>(file){
		window.open("<?= base_url('assets/materi/') ?>"+file , "height=450px","width=450px","menubar=yes","resizeable=yes");
	//	alert(file);
	}
</script>
	<?php endforeach ?>
</div>
<?php } ?>

