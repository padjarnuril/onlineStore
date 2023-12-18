<?php
//ang didalam kurung (server,username,password,dan nama database)

$server = "localhost";
$username = "root";
$pass = "";
$nameDb = "db_pajar";
$kon = mysqli_connect($server,$username,$pass,$nameDb);
// if($kon){
//     echo "koneksi berhasil";
// }else{
//     echo "koneksi gagal";
// }