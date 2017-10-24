<?php
require_once("../php/connection.php");

$respon = array();

if (isset($_GET['email']) && isset($_GET['password']) ) {
  $email = $_GET['email'];
  $pass = $_GET['password'];


  $hasil = mysqli_query($mysqli, "SELECT * FROM data_pasien WHERE email='$email' AND password=md5('$pass')")
        or die("Could not execute the select query.");

        $hasil2 = mysqli_query($mysqli, "SELECT * FROM data_dokter WHERE email='$email' AND password=md5('$pass')")
                    or die("Could not execute the select query.");

      $row = mysqli_fetch_assoc($hasil);
      $row2 = mysqli_fetch_assoc($hasil2);

    if(is_array($row) && !empty($row)) {
        $respon["data_pasien"] = array();
        $data_pasien = array();
        $data_pasien["id_pasien"] = $row["id_pasien"];
        $data_pasien["nama_pasien"] = $row["nama_pasien"];
        $data_pasien["email"] = $row["email"];
        $data_pasien["password"] = $row["password"];
        $data_pasien["device_id"] = $row["device_id"];
        $data_pasien["alamat"] = $row["alamat"];
        $data_pasien["jenis_kelamin"] = $row["jenis_kelamin"];
        $data_pasien["phone"] = $row["phone"];
        $data_pasien["emergency_phone"] = $row["emergency_phone"];
        $data_pasien["usia"] = $row["usia"];
        $data_pasien["id_dokter"] = $row["id_dokter"];

        array_push($respon["data_pasien"], $data_pasien);

        $respon["sukses"] = 1;
        $respon["pesan"] = "Pasien sukses login.";

        echo json_encode($respon);
    }else if(is_array($row2) && !empty($row2)) {
        $respon["data_dokter"] = array();
        $respon["data_dokter_pasien"] = array();
        $data_dokter = array();
        $data_dokter_pasien = array();
        $data_dokter["id_dokter"] = $row2["id_dokter"];
        $data_dokter["nama_dokter"] = $row2["nama_dokter"];
        $data_dokter["email"] = $row2["email"];
        $data_dokter["password"] = $row2["password"];
        $iddokterr = $row2["id_dokter"];

        array_push($respon["data_dokter"], $data_dokter);
        $datapasien = mysqli_query($mysqli, "SELECT * FROM data_pasien where id_dokter = '$iddokterr'")
              or die(mysqli_error($mysqli));
        while($res = mysqli_fetch_array($datapasien)) {
          $data_dokter_pasien["id_pasien"] = $res["id_pasien"];
          $data_dokter_pasien["nama_pasien"] = $res["nama_pasien"];
          $data_dokter_pasien["device_id_pasien"] = $res["device_id"];
          $data_dokter_pasien["alamat_pasien"] = $res["alamat"];
          $data_dokter_pasien["jenis_kelamin_pasien"] = $res["jenis_kelamin"];
          $data_dokter_pasien["phone_pasien"] = $res["phone"];
          $data_dokter_pasien["emergency_phone_pasien"] = $res["emergency_phone"];
          $data_dokter_pasien["usia_pasien"] = $res["usia"];

          array_push($respon["data_dokter_pasien"], $data_dokter_pasien);
        }

        $respon["sukses"] = 2;
        $respon["pesan"] = "Dokter sukses login.";

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
