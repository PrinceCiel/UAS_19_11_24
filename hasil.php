<?php 
if(isset($_POST['proses'])){
    $no = $_POST['no'];
    $nama = $_POST['nama'];
    $unit = $_POST['unit'];
    $tgl = $_POST['tgl'];
    $jabatan = $_POST['jabatan'];
    $lamakerja = $_POST['lamakerja'];
    $status = $_POST['status'];
    $bpjs =(isset($_POST['bpjs']) ? $_POST['bpjs'] : null);
    $pinjaman =(isset($_POST['pinjaman']) ? $_POST['pinjaman'] : null);
    $cicilan =(isset($_POST['cicilan']) ? $_POST['cicilan'] : null);
    $infaq =(isset($_POST['infaq']) ? $_POST['infaq'] : null);
    
    
    if($bpjs == null){
        $bpjs = 0;
    }
    if($pinjaman == null){
        $pinjaman = 0;
    }
    if($cicilan == null){
        $cicilan = 0;
    }
    if($infaq == null){
        $infaq = 0;
    }
    
    if($jabatan == "Kepala Sekolah"){
        $gaji = 10000000;
    }elseif($jabatan == "Wakasek"){
        $gaji = 7000000;
    }elseif($jabatan == "Guru"){
        $gaji = 5000000;
    }elseif($jabatan == "OB"){
        $gaji = 2500000;
    }else{
        $gaji = 0;
    }
    
    if($status == "Tetap"){
        $bonus = 1000000;
    } else {
        $bonus = 0;
    }
    
    class gaji{
        public $gajibersih;

        public function data($no, $nama, $unit, $tgl, $jabatan, $gaji, $lamakerja, $status){
            echo "<tr>";
            echo "<td>No</td>";
            echo "<td>:</td>";
            echo "<td>$no</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Nama</td>";
            echo "<td>:</td>";
            echo "<td>$nama</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Unit Pendidikan</td>";
            echo "<td>:</td>";
            echo "<td>$unit</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Tanggal Gaji</td>";
            echo "<td>:</td>";
            echo "<td>$tgl</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Jabatan</td>";
            echo "<td>:</td>";
            echo "<td>$jabatan</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Gaji</td>";
            echo "<td>:</td>";
            echo "<td>$gaji</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Lama Kerja</td>";
            echo "<td>:</td>";
            echo "<td>$lamakerja</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Status Kerja</td>";
            echo "<td>:</td>";
            echo "<td>$status</td>";
            echo "</tr>";
        }
        public function gajibersih($gaji, $bonus, $bpjs, $pinjaman, $cicilan, $infaq){
            $this->gajibersih = ($gaji + $bonus) - ($bpjs + $pinjaman + $cicilan + $infaq);
            $this->gajibersih = number_format($this->gajibersih, 0, ',', '.');
            echo $this->gajibersih;
        }
    }
    
    
    $print = new gaji();
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halo Dunia :></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <center>
        <div class="container pt-5">
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 30rem;">
                        <div class="card-header">
                            <?php echo $nama;?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col mb-2">
                                    <h5 class="card-title text-primary">STRUK GAJI</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <table class="text-primary">
                                        <?php echo $print->data($no, $nama, $unit, $tgl, $jabatan,$gaji, $lamakerja, $status);?>
                                        <tr>
                                            <td>Bonus</td>
                                            <td>:</td>
                                            <td><?php echo "Rp.$bonus";?></td>
                                        </tr>
                                        <tr>
                                            <td>BPJS</td>
                                            <td>:</td>
                                            <td><?php echo "Rp.$bpjs";?></td>
                                        </tr>
                                        <tr>
                                            <td>Pinjaman</td>
                                            <td>:</td>
                                            <td><?php echo "Rp.$pinjaman";?></td>
                                        </tr>
                                        <tr>
                                            <td>Cicilan</td>
                                            <td>:</td>
                                            <td><?php echo "Rp.$cicilan";?></td>
                                        </tr>
                                        <tr>
                                            <td>Infaq</td>
                                            <td>:</td>
                                            <td><?php echo "Rp.$infaq";?></td>
                                        </tr>
                                        <tr>
                                            <td>Gaji Bersih</td>
                                            <td>:</td>
                                            <td>Rp.<?php echo $print->gajibersih($gaji, $bonus, $bpjs, $pinjaman, $cicilan, $infaq);?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>
</html>
<?php
} else {
    ?>
    <script>
        alert("Isi Terlebih Dahulu!");
        window.location.href = "latihan5.html";
    </script><?php
}