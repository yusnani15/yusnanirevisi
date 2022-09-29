<br>
<?php
$btsklm="style='box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.1);'";
if (!@$_SESSION['pswd']){
	$_SESSION["pswd"]="sembunyi";
	echo "<script>document.location='?page=kartu_keluarga';</script>";
}
if (@$_GET['pswd']=='lihat'){
	$_SESSION["pswd"]=$_GET["pswd"];
	echo "<script>document.location='?page=kartu_keluarga';</script>";
}
if (@$_GET['pswd']=='sembunyi'){
	$_SESSION["pswd"]=$_GET["pswd"];
	echo "<script>document.location='?page=kartu_keluarga';</script>";
}
//echo @$_SESSION["pswd"];
?>

<?php
if(@$_POST['cari']){
		echo"<script>document.location='?page=kartu_keluarga&cari=".$_POST["cari"]."';</script>";	
}?>

<?php if (@$_GET['aksi']=='edit'){
	$query_edit=mysqli_query($db,"select * from tb_kartu_keluarga where nomor_kk='".$_GET['nomor_kk']."'");
	$data_edit=mysqli_fetch_array($query_edit);
	$_SESSION["SD_nomor_kk"]=$data_edit["nomor_kk"];
	$_SESSION["SD_nama_kepala_keluarga"]=$data_edit["nama_kepala_keluarga"];
?> 

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Edit Kartu Keluarga
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=kartu_keluarga"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
			  <td width="190">Nomor KK</td>
			  <td width="1">:</td>
			  <td width="auto"><input type="text" name="nomor_kk" id="nomor_kk" maxlength="20" value="<?php echo @$_SESSION["SD_nomor_kk"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Nama Kepala Keluarga</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga" maxlength="50" value="<?php echo @$_SESSION["SD_nama_kepala_keluarga"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="" align="left">
				<input type="submit" name="btnedit" id="btnedit" value="Edit" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
				<a href="?page=kartu_keluarga&aksi=batal_ubah"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				</td>
			</tr>
      </table>
    </td>
  </tr>
</table>
</form>

<?php }elseif (@$_GET['aksi']=='hapus'){
	$query_hapus=mysqli_query($db,"select * from tb_kartu_keluarga where nomor_kk='".$_GET['nomor_kk']."'");
	$data_hapus=mysqli_fetch_array($query_hapus);
	$_SESSION["SD_nomor_kk"]=$data_hapus["nomor_kk"];
	$_SESSION["SD_nama_kepala_keluarga"]=$data_hapus["nama_kepala_keluarga"];
?> 

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Yakin ingin menghapus data kartu keluarga berikut?
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=kartu_keluarga"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
			  <td width="190">Nomor KK</td>
			  <td width="1">:</td>
			  <td width="auto"><?php echo @$_SESSION["SD_nomor_kk"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Nama Kepala Keluarga</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_nama_kepala_keluarga"]; ?></td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="" align="left">
				<a href="?page=kartu_keluarga&aksi=hapus&nomor_kk=<?php echo $_GET['nomor_kk']; ?>&pesan=ya"><input type="button" name="button2" id="button2" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				<a href="?page=kartu_keluarga&aksi=batal_hapus"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				</td>
			</tr>
      </table>
    </td>
  </tr>
</table>
</form>

<?php }elseif(@$_GET['aksi']=='tambah'){
?>

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Tambah Kartu Keluarga
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=kartu_keluarga"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
			  <td width="190">Nomor KK</td>
			  <td width="1">:</td>
			  <td width="auto"><input type="text" name="nomor_kk" id="nomor_kk" maxlength="20" value="<?php echo @$_SESSION["SD_nomor_kk"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Nama Kepala Keluarga</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga" maxlength="50" value="<?php echo @$_SESSION["SD_nama_kepala_keluarga"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="" align="left">
					<input type="submit" name="btnsimpan" id="btnsimpan" value="Simpan" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
					<a href="?page=kartu_keluarga&aksi=batal_tambah"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				</td>
			</tr>
		</table>
    </td>
  </tr>
</table>
</form>
<?php 
}else{
?>

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Kartu Keluarga
		<a href="?page=kartu_keluarga&aksi=tambah"><input type="button" name="button" id="button2" value="+ Tambah" <?php echo "style='width:160px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
	</td>
	<td width="20"  bgcolor="white">
		<form method="post"><input name="cari" type="text" placeholder="   Masukan Nomor KK/Nama Kepala Keluarga... " style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:97%"/></form>
    </td>
  </tr>
</table>

<br>

<?php
$query=mysqli_query($db,"select * from tb_kartu_keluarga order by nomor_kk asc");	
if(@$_GET['cari']){
	$query =mysqli_query($db,"select * from tb_kartu_keluarga where nomor_kk like '%".$_GET['cari']."%' or nama_kepala_keluarga like '%".$_GET['cari']."%' order by nomor_kk asc");
}elseif(@$_GET['nomor_kk']){
	$query =mysqli_query($db,"select * from tb_kartu_keluarga where nomor_kk like '%".$_GET['nomor_kk']."%' order by nomor_kk asc");
}else{
	$query=mysqli_query($db,"select * from tb_kartu_keluarga order by nomor_kk asc");	
}
	if (mysqli_num_rows($query)>0){
		?>
		<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 2px #6c6969">
          <tr>
            <td width="100%" bgcolor="#6c6969"  background="img/blk.jpg" align="center">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
              <tr>
                <th width="100" <?php echo $btsklm; ?>>Nomor KK</th>
                <th width="100" <?php echo $btsklm; ?>>Nama Kepala Keluarga</th>
                <th width="140" <?php echo $btsklm; ?>>Aksi</th>
              </tr>
              <?php while ($data=mysqli_fetch_array($query)){ 
			  ?>
              <tr>
                <td height="1" bgcolor="#6c6969" colspan="9"></td>
              </tr>
              <tr>
                <td align="center">
					<?php if (@$_GET["nomor_kk"]==$data['nomor_kk']){
						echo "<font color='red'>".$data['nomor_kk']."</font>";
					}else{
						echo $data['nomor_kk'];
					} ?>
				</td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['nama_kepala_keluarga']; ?></td>
                <td align="center" <?php echo $btsklm; ?>>
                <a href="?page=penduduk&nomor_kk=<?php echo $data['nomor_kk']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Anggota Keluarga" <?php echo "style='width:140px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
                <a href="?page=kartu_keluarga&aksi=edit&nomor_kk=<?php echo $data['nomor_kk']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Ubah" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				<a href="?page=kartu_keluarga&aksi=hapus&nomor_kk=<?php echo $data['nomor_kk']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
              </tr>
              <?php } ?>
              </table></td>
          </tr>
        </table>
            <?php 
	}else{
		echo "<font size='8' color='#F4DE64'><center>Data Tidak Tersedia</center></font>";	
	}
}
?>

<?php 
if (@$_POST['btnsimpan']){
	$_SESSION["SD_nomor_kk"]=$_POST["nomor_kk"];
	$_SESSION["SD_nama_kepala_keluarga"]=$_POST["nama_kepala_keluarga"];
	$query=mysqli_query($db,"select * from tb_kartu_keluarga where nomor_kk='".$_POST['nomor_kk']."'");
	if (mysqli_num_rows($query)>0){
		echo"<script>alert('nomor_kk yang sama sudah ada');document.location='?page=kartu_keluarga';</script>";
	}else{
		mysqli_query($db,"insert into tb_kartu_keluarga (nomor_kk,nama_kepala_keluarga) values ('". $_SESSION["SD_nomor_kk"] ."','". $_SESSION["SD_nama_kepala_keluarga"] ."')");
		$_SESSION["SD_nomor_kk"]="";
		$_SESSION["SD_nama_kepala_keluarga"]="";
		echo "<script>alert('data tersimpan');document.location='?page=kartu_keluarga';</script>";
	}
}elseif (@$_POST['btnedit']){
	$_SESSION["SD_nomor_kk"]=$_POST["nomor_kk"];
	$_SESSION["SD_nama_kepala_keluarga"]=$_POST["nama_kepala_keluarga"];
	$query=mysqli_query($db,"select * from tb_kartu_keluarga where nomor_kk='".$_POST['nomor_kk']."' and nomor_kk<>'".$_GET['nomor_kk']."'");
	if (mysqli_num_rows($query)>0){
		echo"<script>alert('nomor_kk yang sama sudah ada');document.location='?page=kartu_keluarga';</script>";
	}else{
		mysqli_query($db,"update tb_kartu_keluarga set nomor_kk='". $_SESSION["SD_nomor_kk"] ."',nama_kepala_keluarga='". $_SESSION["SD_nama_kepala_keluarga"] ."' where nomor_kk='".$_GET['nomor_kk']."'");

		$_SESSION["SD_nomor_kk"]="";
		$_SESSION["SD_nama_kepala_keluarga"]="";
		echo "<script>alert('data diedit');document.location='?page=kartu_keluarga'</script>";
	}
}elseif (@$_GET['aksi']=='hapus' && @$_GET["pesan"]=="ya"){
		mysqli_query($db,"delete from tb_kartu_keluarga where nomor_kk='".$_GET['nomor_kk']."'");
		$_SESSION["SD_nomor_kk"]="";
		$_SESSION["SD_nama_kepala_keluarga"]="";
		echo "<script>alert('data telah dihapus');document.location='?page=kartu_keluarga';</script>";
}elseif (@$_GET['aksi']=='batal_tambah'){
		$_SESSION["SD_nomor_kk"]="";
		$_SESSION["SD_nama_kepala_keluarga"]="";
		echo "<script>document.location='?page=kartu_keluarga';</script>";
}elseif (@$_GET['aksi']=='batal_ubah'){
		$_SESSION["SD_nomor_kk"]="";
		$_SESSION["SD_nama_kepala_keluarga"]="";
		echo "<script>document.location='?page=kartu_keluarga';</script>";
}elseif (@$_GET['aksi']=='batal_hapus'){
		$_SESSION["SD_nomor_kk"]="";
		$_SESSION["SD_nama_kepala_keluarga"]="";
		echo "<script>document.location='?page=kartu_keluarga';</script>";
}
?>