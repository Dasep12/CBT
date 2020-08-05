<button class="btn btn-success btn-sm mb-2" onclick="exportTableToCSV('Nilai<?= $ujian . $mapel ?>.csv')">Export To CSV <i class="fa fa-file-excel"></i> </button>
          <div class="card">
                  <div class="card-header">
                    Nilai <?=  $ujian  . " " . $mapel ?> Kelas <?= $kelas . " " .  $prodi ?>
                  </div>
                   <div class="card-body">  
                      <table id="nilai" class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>Kelas</th>
                            <th>Prodi</th>
                            <th>Jawaban</th>
                            <th>Benar</th>
                            <th>Salah</th>
                            <th>Nilai Ujian</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1 ; foreach($daftar_siswa_ujian as $siswa) : ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $siswa->nama; ?></td>
                              <td><?= $siswa->nisn; ?></td>
                              <td><?= $siswa->kelas; ?></td>
                              <td><?= $siswa->prodi; ?></td>
                              <td><a href="javascript:;" data-nisn="<?= $siswa->nisn ?>" data-ujian="<?= $ujian ?>" data-mapel="<?= $mapel ?>" data-prodi="<?= $prodi ?>" data-kelas = "<?= $kelas ?>" data-toggle="modal" data-target="#lihat_transaksi" class="btn btn-info btn-xs">Lihat </a></td>
                              <td>
                                <?php 
                                $benar = 0 ;
                                $salah = 0 ;
                                  $where = array(
                                    'bentuk_ujian'  => $ujian ,
                                    'nisn'  => $siswa->nisn ,
                                    'kelas' => $kelas ,
                                    'prodi' => $prodi ,
                                    'mata_pelajaran'  => $mapel 
                                  );
                                  $jawaban = $this->db->get_where("jawaban",$where)->result();
                                  foreach($jawaban as $jawab) {
                                      $where = array(
                                        'bentuk_ujian'    => $ujian ,
                                        'kode_soal'       => $jawab->kode_soal,
                                        'id_soal'         => $jawab->id_soal ,
                                        'jawaban'         => $jawab->jawaban ,
                                        'mata_pelajaran'  => $mapel ,
                                        'kelas'           => $jawab->kelas ,
                                      );
                                      $cekjawaban = $this->db->get_where("bank_soal",$where)->num_rows();
                                      if($cekjawaban){
                                        $benar++ ;
                                      }else {
                                        $salah++ ;
                                      }
                                  }
                                      echo $benar;
                                ?>
                              </td> 
                              <td>
                                <?php
                                      echo $salah;
                                ?>
                              </td> 
                              <td>
                                <?= $benar / 50 ?>
                              </td>
                            </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                  </div>
              </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

<!-- modal lihat jawaban siswa -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="lihat_transaksi" class="modal fade">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
              <h6>Jawaban <b id="no_inv"></b></h6>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
             <div class="load" style="position: absolute;margin: 40px 240px;z-index: 99">
              <img style="display: none;" id="loading" height="90px" width ="100px" src="<?= base_url("assets/images/loading.gif") ?>">
             </div>
             <div class="modal-body" id="output_list">

             </div>

             <div class="modal-footer">
         </div>
             </div>
         </div>
     </div>
 </div>

<!-- end of modal jawaban siswa -->
<script type="text/javascript">
  $(document).ready(function(){

     $('#nilai').DataTable();

     //tampilkan list transaksi ke dalam modal
    $("#lihat_transaksi").on('show.bs.modal',function(e){
        var div = $(e.relatedTarget);
        var modal = $(this);
        var id = div.data("nisn");
        var ujian = div.data("ujian");
        var mapel = div.data("mapel");
        var kelas = div.data("kelas");
        var prodi = div.data("prodi");
          $.ajax({
            url : "<?= base_url("guru/Nilai_ujian/lihat_jawaban") ?>" ,
            data :"nisn="+ id +"&ujian="+ ujian+ "&mapel="+ mapel + "&prodi="+ prodi + "&kelas="+ kelas  ,
            method : "GET",
            success : function(response){
              document.getElementById('no_inv').innerHTML = id ;
              $("#output_list").html(response);
            }

          })
    }) 

  })

  //export data ujian kedalam excel 
  function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});
    // Download link
    downloadLink = document.createElement("a");
    // File name
    downloadLink.download = filename;
    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}

function exportTableToCSV(filename) {
    var csv = [];
  var rows = document.querySelectorAll("table tr");
  
    for (var i = 0; i < rows.length; i++) {
    var row = [], 
        cols = rows[i].querySelectorAll("td, th");
    
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
    csv.push(row.join(","));    
  }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}

</script>

