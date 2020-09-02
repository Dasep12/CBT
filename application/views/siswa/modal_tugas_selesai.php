<div class="row">

	<div class="col-md-6">
		<label>Mata Pelajaran</label>
		<input type="text" class="form-control" value="<?= $tugas->mata_pelajaran ?>">
		<label>Judul Tugas</label>
		<input type="text" readonly="" class="form-control" value="<?= $tugas->judul_tugas ?>">
		<label>Keterangan</label>
		<textarea readonly="" class="form-control"><?= $tugas->keterangan ?></textarea>
		<label>Lampiran  Tugas</label><br>

		<?php if(empty($tugas->file_tugas)) { 
			echo "<small class='text-danger'>tidak ada lampiran</small>";
		}else { ?>
		<a href="javascript:openFile('<?= $tugas->file_tugas ?>')" class="btn btn-danger btn-sm">
		<?php
			$path = base_url("assets/tugas/soal/". $tugas->file_tugas);
			$info = pathinfo($path, PATHINFO_EXTENSION);
			if($info == "docx"){
				echo "<img height='30px' width='30px' src=". base_url('assets/dist/img/word.png') ."> " . $tugas->file_tugas   ;				
			}elseif($info == "pdf"){
				echo "<img height='30px' width='30px' src=". base_url('assets/dist/img/pdf.png') ."> " . $tugas->file_tugas ;				
			}elseif($info == "png" || $info == "jpg" || $info == "jpeg" ){
				echo "<img height='30px' width='30px' src=". base_url('assets/dist/img/picture.png') .">" . $tugas->file_tugas ;				
			}
		?>
		</a>
	<?php } ?>


	</div>

	<div class="col-md-6">
		<label>Komentar Tugas / Keterangan tugas</label>
		<form action="" method="post" id="updateLampiran">
		<textarea id="keterangan" name="jawaban" class="form-control mb-2"><?= $tugas->jawaban ?></textarea>
		<label>Lampiran Jawaban</label><br>
		<?php if(!empty($tugas->file_jawaban)) :  ?>
			<a href="javascript:openJawaban('<?= $tugas->file_jawaban ?>')" class="btn btn-danger btn-sm">
			<?php
				$path = base_url("assets/tugas/jawaban/". $tugas->file_jawaban);
				$info = pathinfo($path, PATHINFO_EXTENSION);
				if($info == "docx"){
					echo "<img height='30px' width='30px' src=". base_url('assets/dist/img/word.png') .">" . $tugas->file_jawaban;				
				}elseif($info == "pdf"){
					echo "<img height='30px' width='30px' src=". base_url('assets/dist/img/word.png') .">" . $tugas->file_jawaban ;				
				}elseif($info == "jpg"){
					echo "<img height='30px' width='30px' src=". base_url('assets/dist/img/picture.png') .">" . $tugas->file_jawaban ;				
				}elseif($info == "png"){
					echo "<img height='30px' width='30px' src=". base_url('assets/dist/img/picture.png') .">" . $tugas->file_jawaban ;				
				}
			?>
		</a>
	<?php endif ?>

	<?php if(!empty($tugas->file_jawaban) && $tugas->nilai == 0   ){ ?>
		<a onclick="return confirm('Hapus Lampiran')" href="javascript:remove('<?= $tugas->kode_tugas ?>')">(x remove)</a>
	<?php }	?>

	<!-- jika lampiran masih kosong maka munculkan form tambah lampiran -->
	<?php if(empty($tugas->file_jawaban) || $tugas->file_jawaban == "" ){ ?>
		
			<input type="hidden" name="kode_tugas" value="<?= $tugas->kode_tugas ?>">
			<input type="file" name="file_jawaban" class="small" id="file_jawaban" ><br>
			<button type="submit" class="btn btn-sm btn-info mt-1">Tambah Lampiran </button>
		</form>
	<?php } ?>



     <?php if(!empty($tugas->nilai) || $tugas->nilai != 0 ) : ?>
       <center>
		<h1>NILAI</h1>
		<h2><?= $tugas->nilai ?> /100</h2>
		</center>
	<?php endif; ?>
	</div>
</div>

</div>

             <div class="modal-footer">
    <!--        <?php if(empty($tugas->nilai) || $tugas->nilai == 0 ) : ?>
              <button type="button" class="btn btn-info btn-sm">Edit Tugas</button>
              </form>
          <?php endif; ?> -->
         </div>
<script type="text/javascript">
	function openFile(file){
		window.open("<?= base_url('assets/tugas/soal/') ?>"+file , "height=450px","width=450px","menubar=yes","resizeable=yes");
	}

	function openJawaban(file){
		window.open("<?= base_url('assets/tugas/jawaban/') ?>"+file , "height=450px","width=450px","menubar=yes","resizeable=yes");
	}

	$(function(){
		const nilai = "<?= $tugas->nilai ?>" ;
		if(nilai != 0 ){
//			$("#keterangan").innerHTML = nilai;
			$("#keterangan").attr("readonly",true);
		}else {
			$("#keterangan").attr("readonly",false);
		}

		$("#updateLampiran").on('submit',function(e){
			e.preventDefault();
			if(document.getElementById('file_jawaban').value == ""){
				swal({
					icon : "error" ,
					title : "Lampiran masih kosong "
				})
			}else {
				$.ajax({
					url : "<?= base_url('siswa/Selesai/updateLampiran') ?>",
					data : new FormData(this),
					method  : "POST" ,
					cache : false ,
					processData : false ,
					contentType : false ,
					success : function(e){
						swal({
							icon : "success" ,
							title : e ,
						}).then(function(){
							window.location.href='<?= base_url("siswa/Selesai") ?>';
						})
					}
				})
			}
		})
	})


	function remove(id){
		$.ajax({
			url : "<?= base_url('siswa/Selesai/hapusLampiran') ?>" ,
			data : 'kode=' + id ,
			method : "POST" ,
			success: function(e){
				swal({
					icon : "success" ,
					title : e ,
				}).then(function(){
					window.location.href='<?= base_url("siswa/Selesai") ?>';
				})
			}
		})
	}
</script>