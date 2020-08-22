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
				<td id="countdown">1:30:00</td>
				<script type="text/javascript">
					/*const start = 90 ;
					let time = start * 60 ;

					const countdownEl = document.getElementById("countdown");

					setInterval(updateCountDown,1000) ;

					function updateCountDown(){
						const minutes = Math.floor(time / 60 );
						let seconds = time % 60 ;
						document.getElementById("countdown").innerHTML = minutes +":"+ seconds  ;
						time-- ; 
					}*/
					$(function(){
						setInterval(function(){
						const time = new Date();
						const jam = time.getHours();
						const menit = time.getMinutes();
						const detik = time.getSeconds();
						const mulai = jam +":"+ menit+":" + detik ;
						const akhir = 20 + ":" + '07' + ":" + '00' ;
						const  p = mulai.split(":")[0] + mulai.split(":")[1] + mulai.split(":")[2];
						const  q = akhir.split(":")[0] + akhir.split(":")[1] + akhir.split(":")[2];
						const selisih = q - p ; 
						const waktu = Math.floor(selisih  % (1000 * 60 * 60 * 24) /  (1000 * 60 * 60 )) ; 
						const waktu2 = Math.floor(selisih  % (1000 * 60 * 60 ) /  (1000 * 60  )) ; 
						console.log(waktu2);						

						},1000);
					/*setInterval(function(){
								const now = new Date().getTime();
								const selesai = new Date("Sat Aug 22 2020 20:00:00");
								const selisih = selesai - now ; 
								if(selisih > 0){
									const hari = Math.floor(selisih  / (1000 * 60 * 60 * 24)) ;
									const jam = Math.floor(selisih  % (1000 * 60 * 60 * 24) /  (1000 * 60 * 60 )) ;
									const menit = Math.floor(selisih  % (1000 * 60 * 60 ) /  (1000 * 60  )) ;
									const detik = Math.floor(selisih  % (1000 * 60 ) / 1000 );
										document.getElementById("countdown").innerHTML = jam  + ":"+ menit + ":" + detik ;
								}else {
										document.getElementById("countdown").innerHTML = "waktu habis" ;
										$("input[type=radio]").attr("disabled",true);
								}
							},1000);*/
					})


				</script>
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
						/*$(document).ready(function(){
							var id = document.getElementById('<?= $item->id . $item->a ?>').value ;
							console.log(id);

							$("#<?= $item->id . $item->a ?>").on("click",function(e){
								console.log("<?= $item->id ?>");
							})
						})*/
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
