<form action="" id="nilaiTugas" method="post">
<label>Jawaban Tugas</label>
<textarea class="form-control" disabled=""><?= $jawaban->jawaban ?></textarea>


<div class="form-group">
<?php if(!empty($jawaban->file_jawaban)) : ?>
<label>Lampiran Tugas</label><br>
<a href="javascript:file('<?= $jawaban->file_jawaban ?>')" class="btn btn-danger btn-sm">
	 <?php 
	 $path = base_url('assets/tugas/jawaban/'.$jawaban->file_jawaban);
	  $info = pathinfo($path, PATHINFO_EXTENSION);
	  	if($info == "jpg" || $info == "png" || $info == "jpeg" || $info == "PNG" || $info == "JPG" || $info == "JPEG"  ){
	  		echo "<img height='30px' width='30px' src='" . base_url('assets/dist/img/picture.png') . "'>";
	  	}else if($info == "docx"){
	  		echo "<img height='30px' width='30px' src='" . base_url('assets/dist/img/word.png') . "'>";
	  	}else if($info == "xlsx" || $info == "xls" || $info == "csv"){
	  		echo "<img height='30px' width='30px' src='" . base_url('assets/dist/img/excel.png') . "'>";
	  	}
    ?>
</a>
<?php endif ?>
</div>

<div class="form-group">
<label>Beri Nilai</label>
<input type="hidden" name="id" value="<?= $jawaban->id ?>">
<input type="text" name="nilai_tugas" value="<?= $jawaban->nilai ?>" class="form-control mb-2" id="nilai" placeholder="nilai tugas disini">
</div>
<button class="btn btn-sm btn-info" type="submit">Nilai Tugas</button>
</form>

<script type="text/javascript">
	$(function(){
		$("#nilaiTugas").on("submit",function(e){
			e.preventDefault();
			if(document.getElementById('nilai').value == ""){
				toastr.error("nilai belum di isi ");
			}else {
				$.ajax({
					url : "<?= base_url("guru/Daftar_tugas/berinilai") ?>",
					method  : "POST" ,
					data : new FormData(this),
					cache : false ,
					contentType : false ,
					processData : false ,
					beforeSend : function(){
						$(".Loading").show()
					},
					complete : function(){
						$(".Loading").hide()
					},
					success : function(e){
						toastr.info(e);
						window.location.href="<?= base_url('guru/Daftar_tugas/kumpulanTugas/'. $jawaban->kode_tugas) ?>"
					}
				})
			}
		})
	})

	function file(file){
		window.open("<?= base_url('assets/tugas/jawaban/') ?>"+file , "height=450px","width=450px","menubar=yes","resizeable=yes");
	}
</script>