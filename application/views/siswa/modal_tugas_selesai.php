<div class="row">

	<div class="col-md-5">
		<label>Mata Pelajaran</label>
		<input type="text" class="form-control" value="<?= $tugas->mata_pelajaran ?>">
		<label>Judul Tugas</label>
		<input type="text" class="form-control" value="<?= $tugas->judul_tugas ?>">
		<label>Keterangan</label>
		<textarea class="form-control"><?= $tugas->keterangan ?></textarea>
		<label>Lampiran</label>
		<?php
			$path = base_url("assets/tugas/". $tugas->file_tugas);
			$info = pathinfo($path, PATHINFO_EXTENSION);
			if($info == "docx"){
				echo "<a  href=". base_url('assets/tugas/soal/') . $tugas->file_tugas  ." class='btn btn-info btn-sm'><img height='30px' width='30px' src=". base_url('assets/dist/img/word.png') .">" . $tugas->file_tugas .  "</a>";				
			}elseif($info == "pdf"){
				echo "<a href=". base_url('assets/tugas/soal/') . $tugas->file_tugas  ." class='btn btn-info btn-sm'><img height='30px' width='30px' src=". base_url('assets/dist/img/pdf.png') .">" . $tugas->file_tugas .  "</a>";				
			}
		?>


	</div>

	<div class="col-md-2">
		<h1>NILAI</h1>
		<h2>80/100</h2>
	</div>

	<div class="col-md-5">
		<label>Komentar Tugas / Keterangan tugas</label>
		<textarea class="form-control mb-2"><?= $tugas->jawaban ?></textarea>
		<label>Lampiran Jawaban</label><br>
		<?php
			$path = base_url("assets/tugas/jawaban/". $tugas->file_jawaban);
			$info = pathinfo($path, PATHINFO_EXTENSION);
			if($info == "docx"){
				echo "<a  href=". base_url('assets/tugas/jawaban/') . $tugas->file_jawaban  ." class='btn btn-info btn-sm'><img height='30px' width='30px' src=". base_url('assets/dist/img/word.png') .">" . $tugas->file_jawaban .  "</a>";				
			}elseif($info == "pdf"){
				echo "<a  href=". base_url('assets/tugas/jawaban/') . $tugas->file_jawaban  ." class='btn btn-info btn-sm'><img height='30px' width='30px' src=". base_url('assets/dist/img/word.png') .">" . $tugas->file_jawaban .  "</a>";				
			}elseif($info == "jpg"){
				echo "<a  href=". base_url('assets/tugas/jawaban/') . $tugas->file_jawaban  ." class='btn btn-info btn-sm'><img height='30px' width='30px' src=". base_url('assets/dist/img/picture.png') .">" . $tugas->file_jawaban .  "</a>";				
			}elseif($info == "png"){
				echo "<a  href=". base_url('assets/tugas/jawaban/') . $tugas->file_jawaban  ." class='btn btn-default btn-sm'><img height='30px' width='30px' src=". base_url('assets/dist/img/picture.png') .">" . $tugas->file_jawaban .  "</a>";				
			}
		?>
	</div>


</div>