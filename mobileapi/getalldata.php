<?php
require_once("../php/connection.php");

$respon = array();

if (isset($_GET['data_pasien']) ) {

  $hasil = mysqli_query($mysqli, "SELECT * FROM data_pasien")
        or die(mysqli_error($mysqli));
  $respon["data_pasien"] = array();
  while($res = mysqli_fetch_array($hasil)) {
    $data_pasien = array();
    $data_pasien["id_pasien"] = $res["id_pasien"];
    $data_pasien["nama_pasien"] = $res["nama_pasien"];
    $data_pasien["email"] = $res["email"];
    $data_pasien["password"] = $res["password"];
    $data_pasien["device_id"] = $res["device_id"];
    $data_pasien["alamat"] = $res["alamat"];
    $data_pasien["jenis_kelamin"] = $res["jenis_kelamin"];
    $data_pasien["phone"] = $res["phone"];
    $data_pasien["emergency_phone"] = $res["emergency_phone"];
    $data_pasien["usia"] = $res["usia"];
    $data_pasien["id_dokter"] = $res["id_dokter"];

    array_push($respon["data_pasien"], $data_pasien);
  }
  $respon["sukses"] = 1;
  $respon["pesan"] = "Semua data pasien telah ditampilkan";

  echo json_encode($respon);


}else if (isset($_GET['data_dokter']) ) {

  $hasil = mysqli_query($mysqli, "SELECT * FROM data_dokter")
        or die(mysqli_error($mysqli));
  $respon["data_dokter"] = array();
  while($res = mysqli_fetch_array($hasil)) {
    $data_dokter = array();
    $data_dokter["id_dokter"] = $res["id_dokter"];
    $data_dokter["nama_dokter"] = $res["nama_dokter"];
    $data_dokter["email"] = $res["email"];
    $data_dokter["password"] = $res["password"];
    array_push($respon["data_dokter"], $data_dokter);
  }
  $respon["sukses"] = 2;
  $respon["pesan"] = "Semua data dokter telah ditampilkan";

  echo json_encode($respon);

}else {

    $respon["sukses"] = 0;
    $respon["pesan"] = "Field requestnya kosong";


    echo json_encode($respon);
}

?>
