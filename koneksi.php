<?php

$db=mysqli_connect("localhost","root","","db_yusnani");

if (!$db){
	echo"<font color='#FFFF66'><center><h1>Gagal Koneksi</h1></center></font>";

}

if (isset($_GET['getdatankk'])) {

	$NIK  = $_GET['getdatankk'];
	$result = [];

	$query = mysqli_query($db, "SELECT * FROM tb_penduduk WHERE nomor_kk = '$NIK'");
	
	while($row = mysqli_fetch_assoc($query)) {
		$result[] = $row;
	}

	echo json_encode(['status' => 'berhasil', 'data' => $result]);

}
?>

<?php
//$db=mysqli_connect("Localhost","fikommet_sesuai","Vanzheyon992206","fikommet_kesesuaian");
//if (!$db){
//	echo"<font color='#FFFF66'><center><h1>Gagal Koneksi</h1></center></font>";
//}
?>