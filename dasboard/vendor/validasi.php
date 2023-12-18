<?php
//untuk memvalidasi inputan pada web dengan field yang ada pada tabel database
session_start(); //memulai sesion

include "konek.php";

$user = $_POST['emaildiweb'];
$pass = $_POST['passworddiweb'];
// echo $user." ". $pass;
//tahap memanggil semua data tabel nama tabel di database yang mana disamakan dengan $user dan $pass

if (empty($user)) { //kondisi untk username kosong
	$_SESSION['info'] = 'Username dan Password tidak boleh kosong';
	header("location: ../login.php");
    exit(); // mengakhiri sesion
} else{
	if (empty($pass)) {  //kondisi untuk password kosong

		$_SESSION['info'] = 'Username dan Password tidak boleh kosong';
	 	header("location: ../login.php");
    	exit();
	} else{//kondisi sukses
		$sql = "SELECT * FROM tb_akun WHERE email LIKE '$user' AND password LIKE '$pass'";
		//mengoneksikan database dengan apa yang di panggil

		$cek = mysqli_query($kon, $sql);

		//memanggil data pada baris

		$row = mysqli_fetch_assoc($cek);

		//id_akun / nama_akun / email / username / password / foto/ hak_akses
		//1 / FADJAR / nurilfajar17@gmail.com / kipli / SMKBM/ Aaku.jpg / administrator

		if($row['email'] === $user && $row['password'] === $pass){
			$_SESSION['login'] = true;

    	    header("location: ../index.php");
		}else{

			$_SESSION['info'] = 'username atau password salah';
   	 	   header("location: ../login.php");

		}

		if (isset($_SESSION['login'])) {
			header("location: ../index.php");
		}else{
			header("location: ../login.php");
			exit();
		}

	}
}


?>