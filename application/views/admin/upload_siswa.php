<?php if($this->session->flashdata("error")) { ?>
<div class="alert alert-danger">
	Gagal Input ada data yang sama ( <?php echo $this->session->flashdata("error") ?> )
</div>
<?php }elseif($this->session->flashdata("success"))  { ?>
<div class="alert alert-success">
	Berhasil , <?php echo $this->session->flashdata("success") ?>
</div>
<?php } ?>
<div class="form-group">
		<form onsubmit="return cek()" enctype="multipart/form-data" name="upload" action="<?php echo base_url('admin/Upload_siswa') ?>" method="post">
			<label>Upload Data Siswa</label>
			<input  accept="xlsx,xls" onchange="return validasi()" class="form-control mb-1"  type="file" name="file" id="file">
			<button type="submit" class="mt-2 ml-1 btn btn-sm btn-primary" name="submit">Preview</button>
			<a href="<?php echo base_url('assets/upload/format_upload.xlsx') ?>" class="mt-2 ml-1  btn btn-info btn-sm">Download Template</a>
		</form>
</div>

<?php 
if(isset($_POST['submit'])){ ?>
<form action="<?php echo base_url('admin/Upload_siswa/upload') ?>" method="post" id="postSiswa">
 <!-- Default box -->
      <div class="card">
          <!-- form tambah data siswa -->
          <div class="card-header">
            <h3 class="">Data Siswa <i class="fa fa-graduation-cap"></i> </h3>
          </div>
        <div class="card-body">
          <table class="table" id="dataSiswa">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Gender</th>
                <th>Kelas</th>
                <th>Kode Prodi</th>
                <th>Prodi</th>
              </tr>
              <tbody>
              	<?php $no = 1 ; foreach($sheet as $siswa) : ?>
              	<tr>
              		<td><?php echo $no++ ?></td>
              		<td><?php echo $siswa['B'] ?></td>
              		<td><?php echo $siswa['C'] ?></td>
              		<td><?php echo $siswa['D'] . "," . $siswa['E'] ?></td>
              		<td><?php echo $siswa['F'] ?></td>
              		<td><?php echo $siswa['H'] ?></td>
              		<td><?php echo $siswa['I'] ?></td>
              		<td><?php echo $siswa['J'] ?></td>
              	</tr>
              <?php endforeach; ?>
              </tbody>
            </thead>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <button type="submit" class="btn btn-danger mb-2">Posting Data Siswa</button>
</form>
<?php } ?>



<script type="text/javascript">

	//validasi jika file kosong 
	function cek(){
		if(document.getElementById("file").value == ""){
			alert('Data Kosong');
			return false ;
		}
		return ;
	}

	//validasi file yang hanya bisa di upload
	function  validasi(){
		var file = document.getElementById('file');
		var path = file.value ;
		var exe = /(\.xlsx)$/i;
		if(!exe.exec(path)){
			swal({
				icon : "warning" ,
				dangerMode : [true,"Ok"],
				title : "File Salah" ,
				text : "Upload File Dengan Ekstensi .xlsx"
			});
			file.value = "";
			return ;
		}
	}


	$(function(){
	
	})
</script>
