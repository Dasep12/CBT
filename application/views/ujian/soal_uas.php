<div class="row">
	<div class="card col-lg-4 mr-2">
		<div class="card-body">
			<table class="">
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>Risma Nurazizah</td>
			</tr>

			<tr>
				<td>NISN</td>
				<td>:</td>
				<td>191010</td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td>XII TKJ</td>
			</tr>
			<tr>
				<td>Jumlah Soal</td>
				<td>:</td>
				<td>5</td>
			</tr>
			<tr>
				<td>Soal sudah terjawab</td>
				<td>:</td>
				<td>5</td>
			</tr>
			<tr>
				<td>Soal belum terjawab</td>
				<td>:</td>
				<td>0</td>
			</tr>
			<tr>
				<td>Waktu</td>
				<td>:</td>
				<td>90 menit</td>
			</tr>
			<tr>
				<td>Timer</td>
				<td>:</td>
				<td>90 menit</td>
			</tr>

			</table>
		</div>
	</div>

	<div class="card col-lg-7">
		<div class="card-body">
			<p>Pilih jawaban yang menurut anda benar ! Selamat Mengerjakan</p>
			<form  class="pagination-block" action="<?= base_url("ujian/ujian/kumpulkanJawaban") ?>" method="post" name="soalPG">
				<input type="hidden" name="jumlah" value="<?= $jumlah ?>">
				<input type="hidden" id="terjawab" value="0" >
				<?php foreach($soal as $item) : ?>
				<div class="form-group">
					<input value="<?= $item->id_soal ?>" type="hidden" name="id_soal[]"  >
					<p><?= $item->id_soal . ". " . $item->soal ?> </p>
					<input class="mr-2" type="radio" id="<?= $item->id_soal?>" value="A" name="jawaban[<?= $item->id_soal ?>]"><?= "A." . $item->a ?><br>
					<input class="mr-2" type="radio" id="<?= $item->id_soal ?>[]" value="B" name="jawaban[<?= $item->id_soal ?>]"><?= "B." . $item->b ?><br>
					<input class="mr-2" type="radio" id="<?= $item->id_soal ?>[]" value="C" name="jawaban[<?= $item->id_soal ?>]"><?= "C." . $item->c ?><br>
					<input class="mr-2" type="radio" id="<?= $item->id_soal ?>[]" value="D" name="jawaban[<?= $item->id_soal ?>]"><?= "D." . $item->d ?><br>
				</div>
				<?php endforeach ?>
				<hr>
				<button type="submit" onclick="return confirm('Yakin jawaban sudah benar')" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Jawaban </button>
			</form>
		</div>
	</div>
</div>


</div>


<script type="text/javascript">
	var jumlah = "<?= $jumlah ?>" ;
	$(".form-group").smpPagination(1) ;

	
</script>
