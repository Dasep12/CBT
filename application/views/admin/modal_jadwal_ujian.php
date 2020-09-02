<form action="" method="post" id="updateJadwal">
	<label>Mata Pelajaran</label> 
	<input type="text" name="mata_pelajaran" class="form-control" value="<?= $jadwal->mata_pelajaran ?>">

	<label>Guru B.Sutdy</label> 
	<input type="text" name="guru" class="form-control" value="<?= $jadwal->guru ?>">


	<label>Kode Soal</label> 
	<input type="text" name="kode_soal" class="form-control" value="<?= $jadwal->kode_soal ?>">

	<label>Kelas</label> 
	<input type="text" name="kelas" class="form-control" value="<?= $jadwal->kelas ?>">

	<label>Prodi</label> 
	<input type="text" name="prodi" class="form-control" value="<?= $jadwal->prodi ?>">

	<label>Tanggal Ujian</label> 
	<input type="text" name="hari" class="form-control" value="<?= $jadwal->hari ?>">

	<label>Waktu Ujian</label>
	<div class="form-inline">
		<input type="text" name="hari" class="form-control col-md-5" value="<?= $jadwal->jam_mulai ?>">
		<label class="ml-2">:</label>
		<input type="text" name="hari" class="form-control col-md-5 ml-2 " value="<?= $jadwal->jam_selesai ?>">
	</div>
</form>