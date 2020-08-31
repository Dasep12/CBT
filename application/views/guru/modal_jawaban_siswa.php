
<div class="row">
              <div class="card col-lg-5 ml-5">
                   <div class="card-body">  
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No Soal</th>
                            <th>Jawaban Siswa</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1 ; foreach($jawaban_siswa->result() as $siswa) : ?>
                            <tr>
                                 <td><?= $siswa->id_soal ?></td>                                                     
                                 <td><?= $siswa->jawaban ?></td>                                                     
                            </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                  </div>
                </div> 

              <div class="card col-lg-5 ml-5">
                   <div class="card-body">  
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No Soal</th>
                            <th>Kunci Jawaban</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1 ; foreach($kunci_jawaban->result() as $jawaban) : ?>
                            <tr>
                                 <td><?= $jawaban->id_soal ?></td>                                                     
                                 <td><?= $jawaban->jawaban ?></td>                                                     
                            </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                  </div>
              </div> 
<table>
  <tr>
    <td>Jawaban Benar</td>
    <td>:</td>
    <td><?= $benar ?></td>
  </tr>
  <tr>
    <td>Jawaban Salah</td>
    <td>:</td>
    <td><?= $salah ?></td>
  </tr>

</table>
</div>