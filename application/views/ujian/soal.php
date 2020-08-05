<div class="row">
	<div class="card col-lg-4 mr-2">
		<div class="card-body">
			<table class="">
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?= $profile->nama ?></td>
			</tr>

			<tr>
				<td>NISN</td>
				<td>:</td>
				<td><?= $profile->nisn ?></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td><?= $profile->kelas . "-" . $profile->prodi  ?> </td>
			</tr>
			<tr>
				<td>Mata Pelajaran</td>
				<td>:</td>
				<td><?= $info->mata_pelajaran ?> </td>
			</tr>
			<tr>
				<td>Jenis Ujian</td>
				<td>:</td>
				<td><?= $info->bentuk_ujian ?> </td>
			</tr>
			<tr>
				<td>Jumlah Soal</td>
				<td>:</td>
				<td><?= $jumlah ?></td>
			</tr>
			<tr>
				<td>Waktu Ujian</td>
				<td>:</td>
				<td>90 menit</td>
			</tr>
			<tr>
				<td>Timer</td>
				<td>:</td>
				<td>90 menit</td>
			</tr>
			</table>

		<div class="soal">

		</div>
		</div>
	</div>

	<div class="card col-lg-7">
		<div class="card-body">
			<p>Pilih jawaban yang menurut anda benar ! Selamat Mengerjakan</p>
			<form  class="pagination-block" action="<?= base_url("ujian/Soal/kumpulkanJawabanPG") ?>" method="post" name="soalPG">
				<input type="hidden" name="jumlah" value="<?= $jumlah ?>">
				<input type="hidden" name="nama" value="<?= $profile->nama ?>">
				<input type="hidden" name="nisn" value="<?= $profile->nisn ?>">
				<input type="hidden" name="kelas" value="<?= $profile->kelas ?>">
				<input type="hidden" name="prodi" value="<?= $profile->prodi ?>">
				<?php $i = 0  ;  foreach($soal as $item) : ?>
				<div class="form-group">
					<input value="<?= $item->id_soal ?>" type="hidden" name="id_soal[]"  >					
					<input value="<?= $item->kode_soal ?>" type="hidden" name="kode_soal"  >					
					<input value="<?= $item->bentuk_ujian ?>" type="hidden" name="bentuk_ujian"  >					
					<input value="<?= $item->mata_pelajaran ?>" type="hidden" name="mata_pelajaran"  >					
					<p><?= $item->id_soal . ". " . $item->soal ?> </p>
					<input class="mr-2" type="radio" id="<?= $item->id . $item->a ?>" value="A" name="jawaban[<?= $item->id_soal ?>]"><?= "A." . $item->a ?><br>
					<input class="mr-2" type="radio" id="<?= $item->b ?>" value="B" name="jawaban[<?= $item->id_soal ?>]"><?= "B." . $item->b ?><br>
					<input class="mr-2" type="radio" id="<?= $item->c ?>" value="C" name="jawaban[<?= $item->id_soal ?>]"><?= "C." . $item->c ?><br>
					<input class="mr-2" type="radio" value="D" name="jawaban[<?= $item->id_soal ?>]"><?= "D." . $item->d ?><br>
				</div>
					<script type="text/javascript">
						$(document).ready(function(){
							var id = document.getElementById('<?= $item->id . $item->a ?>').value ;
							console.log(id);

							$("#<?= $item->id . $item->a ?>").on("click",function(e){
								console.log("<?= $item->id ?>");
							})
						})
					</script>
				<?php endforeach ?>
				<hr>
				<button type="submit" onclick="return confirm('Yakin jawaban sudah benar')" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Jawaban </button>
			</form>
		</div>
	</div>
</div>


</div>
<script type="text/javascript">
    //disable tombol kembali setelah soal sudah di tampilkan
    window.history.forward();
    function noBack() { window.history.forward(); }

</script>
<script type="text/javascript">
    //pagination soal yang di tampilkan per halaman
	$(".form-group").smpPagination(2) ;	


</script>
