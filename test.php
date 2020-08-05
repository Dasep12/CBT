<!DOCTYPE html>
<html>
<head>
	<title></title>
<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
</head>
<body>
<?php
$koneksi = mysqli_connect("localhost","root","","sekolahku");
$sql = mysqli_query($koneksi,"SELECT * FROM bank_soal where kode_soal = 'A001'");

while($item = mysqli_fetch_array($sql)){ ?>
<label><?= $item['id_soal'] . ". " . $item['soal'] ?></label><br>
<input type="radio" id="<?= $item['id_soal'] . $item['a'] ?>" value="<?= $item['a'] ?>" name="jawaban[<?= $item['id_soal'] ?>]" >A. <?= $item['a'] ?><br>
<input type="radio" name="jawaban[<?= $item['id_soal'] ?>]" >B. <?= $item['b'] ?><br>
<input type="radio" name="jawaban[<?= $item['id_soal'] ?>]" >C. <?= $item['c'] ?><br>
<input type="radio" name="jawaban[<?= $item['id_soal'] ?>]" >D. <?= $item['d'] ?><br>
<script type="text/javascript">
	$(document).ready(function(){
		$("#<?= $item['id_soal'] . $item['a'] ?>").click(function(){
			console.log("<?= $item['a']  ?>")
		})		
	})
</script>
<?php }

?>


</body>
</html>