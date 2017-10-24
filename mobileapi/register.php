<?php
require_once("../php/connection.php");

$respon = array();

if (isset($_GET['nama_pasien']) && isset($_GET['email']) && isset($_GET['password']) && isset($_GET['device_id']) && isset($_GET['alamat']) && isset($_GET['jenis_kelamin']) && isset($_GET['id_dokter']) ) {
  $namapasien = $_GET['nama_pasien'];
  $email = $_GET['email'];
  $pass = $_GET['password'];
  $deviceid = $_GET['device_id'];
    $alamat = $_GET['alamat'];
  $jeniskelamin = $_GET['jenis_kelamin'];
  $telfon = $_GET['phone'];
  $telfonemergency = $_GET['emergency_phone'];
  $usia = $_GET['usia'];

  $dokter = $_GET['id_dokter'];

  if ($jeniskelamin == 1){

    $jenis_kelamin = "Laki-laki";
  }
  else if ($jeniskelamin == 2){

    $jenis_kelamin = "Perempuan";
  }



  $hasil = mysqli_query($mysqli, "INSERT INTO data_pasien(nama_pasien, email, password, device_id , alamat , jenis_kelamin ,phone , emergency_phone ,usia,  id_dokter) VALUES('$namapasien', '$email', md5('$pass'),'$deviceid','$alamat','$jenis_kelamin','$telfon','$telfonemergency','$usia','$dokter')")
    or die(mysqli_error($mysqli));

    if ($hasil) {

        $respon["sukses"] = 1;
        $respon["pesan"] = "Akun telah berhasil di daftarkan";


        echo json_encode($respon);
    } else {

        $respon["sukses"] = 3;
        $respon["pesan"] = "Terjadi error.";


        echo json_encode($respon);
    }

}else {

    $respon["sukses"] = 0;
    $respon["pesan"] = "Field requestnya kosong";


    echo json_encode($respon);
}



?>
