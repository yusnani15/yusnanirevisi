<script>
	$(document).ready(function(){
	$("#tanggal").datepicker({
	})
	})
</script>

<br>
<?php
$btsklm="style='box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.1);'";
if (!@$_SESSION['pswd']){
	$_SESSION["pswd"]="sembunyi";
	echo "<script>document.location='?page=realisasi';</script>";
}
if (@$_GET['pswd']=='lihat'){
	$_SESSION["pswd"]=$_GET["pswd"];
	echo "<script>document.location='?page=realisasi';</script>";
}
if (@$_GET['pswd']=='sembunyi'){
	$_SESSION["pswd"]=$_GET["pswd"];
	echo "<script>document.location='?page=realisasi';</script>";
}
//echo @$_SESSION["pswd"];
?>

<?php
$query_urut=mysqli_query($db,"select * from tb_realisasi order by kode_realisasi desc");
$urut=0;
if (mysqli_num_rows($query_urut)>0){
	$data=mysqli_fetch_array($query_urut);
	$urut=substr($data["kode_realisasi"],1,2);
}
$urut=$urut+1;
if ($urut>9){
	$kdurut="P".$urut;
}else{
	$kdurut="P0".$urut;
}

if(@$_POST['cari']){
		echo"<script>document.location='?page=realisasi&cari=".$_POST["cari"]."';</script>";	
}?>

<?php if (@$_GET['aksi']=='edit'){
	$query_edit=mysqli_query($db,"select * from tb_realisasi where kode_realisasi='".$_GET['kode_realisasi']."'");
	$data_edit=mysqli_fetch_array($query_edit);
	$_SESSION["SD_kode_realisasi"]=$data_edit["kode_realisasi"];
	$_SESSION["SD_tanggal"]=substr($data_edit["tanggal"],8,2)."/".substr($data_edit["tanggal"],5,2)."/".substr($data_edit["tanggal"],0,4);
	$_SESSION["SD_uraian"]=$data_edit["uraian"];
	$_SESSION["SD_jumlah"]=$data_edit["jumlah"];
	$_SESSION["SD_nik"]=$data_edit["nik"];
?> 

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Edit Realisasi Anggaran
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=realisasi"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
			  <td width="190">Kode Realisasi</td>
			  <td width="1">:</td>
			  <td width="auto"><input type="text" name="kode_realisasi" id="kode_realisasi" maxlength="20" value="<?php echo @$_SESSION["SD_kode_realisasi"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Tanggal</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="tanggal" id="tanggal" maxlength="12" value="<?php echo @$_SESSION["SD_tanggal"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Uraian</td>
			  <td valign="top">:</td>
			  <td><textarea name="uraian" id="uraian" required style="width:50%;height:50px;"><?php echo @$_SESSION["SD_uraian"]; ?></textarea></td></td>
			</tr>
			<tr>
			  <td valign="top">Jumlah</td>
			  <td valign="top">:</td>
			  <td><input type="number" name="jumlah" id="jumlah" maxlength="13" value="<?php echo @$_SESSION["SD_jumlah"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="#ffffcc" align="left">
				<input type="submit" name="btnedit" id="btnedit" value="Edit" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
				<a href="?page=realisasi&aksi=batal_ubah"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				</td>
			</tr>
      </table>
    </td>
  </tr>
</table>
</form>

<?php }elseif (@$_GET['aksi']=='hapus'){
	$query_hapus=mysqli_query($db,"select * from tb_realisasi where kode_realisasi='".$_GET['kode_realisasi']."'");
	$data_hapus=mysqli_fetch_array($query_hapus);
	$_SESSION["SD_kode_realisasi"]=$data_hapus["kode_realisasi"];
	$_SESSION["SD_tanggal"]=substr($data_hapus["tanggal"],8,2)."/".substr($data_hapus["tanggal"],5,2)."/".substr($data_hapus["tanggal"],0,4);
	$_SESSION["SD_uraian"]=$data_hapus["uraian"];
	$_SESSION["SD_jumlah"]=$data_hapus["jumlah"];
?> 

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Yakin ingin menghapus data Realisasi Anggaran berikut?
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=realisasi"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
			  <td width="190">Kode Realisasi</td>
			  <td width="1">:</td>
			  <td width="auto"><?php echo @$_SESSION["SD_kode_realisasi"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Tanggal</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_tanggal"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Uraian</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_uraian"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Jumlah</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_jumlah"]; ?></td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="#ffffcc" align="left">
				<a href="?page=realisasi&aksi=hapus&kode_realisasi=<?php echo $_GET['kode_realisasi']; ?>&pesan=ya"><input type="button" name="button2" id="button2" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				<a href="?page=realisasi&aksi=batal_hapus"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
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
	<td width="80%"  bgcolor="white" >Tambah Realisasi Anggaran
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=realisasi"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
			  <td width="190">Kode Realisasi</td>
			  <td width="1">:</td>
			  <td width="auto"><input type="text" name="kode_realisasi" id="kode_realisasi" maxlength="20" value="<?php echo @$_SESSION["SD_kode_realisasi"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Tanggal</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="tanggal" id="tanggal" maxlength="12" value="<?php echo @$_SESSION["SD_tanggal"]; ?>" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Uraian</td>
			  <td valign="top">:</td>
			  <td><textarea name="uraian" id="uraian" required style="width:50%;height:50px;"><?php echo @$_SESSION["SD_uraian"]; ?></textarea></td>
			</tr>
			<tr>
			  <td valign="top">Jumlah</td>
			  <td valign="top">:</td>
			  <td><input type="number" name="jumlah" id="jumlah" maxlength="13" value="<?php echo @$_SESSION["SD_jumlah"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="" align="left">
					<input type="submit" name="btnsimpan" id="btnsimpan" value="Simpan" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
					<a href="?page=realisasi&aksi=batal_tambah"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
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
	<td width="80%"  bgcolor="white" >Realisasi Anggaran
		<a href="?page=realisasi&aksi=tambah"><input type="button" name="button" id="button2" value="+ Tambah" <?php echo "style='width:160px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
	</td>
	<td width="20"  bgcolor="white">
		<form method="post"><input name="cari" type="text" placeholder="   Cari realisasi anggaran... " style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:97%"/></form>
    </td>
  </tr>
</table>

<br>

<?php
$query=mysqli_query($db,"select * from tb_realisasi order by kode_realisasi asc");	
if(@$_GET['cari']){
	$query =mysqli_query($db,"select * from tb_realisasi where kode_realisasi like '%".$_GET['cari']."%' or nama like '%".$_GET['cari']."%' order by kode_realisasi asc");
}elseif(@$_GET['kode_realisasi']){
	$query =mysqli_query($db,"select * from tb_realisasi where kode_realisasi like '%".$_GET['kode_realisasi']."%' order by kode_realisasi asc");
}else{
	$query=mysqli_query($db,"select * from tb_realisasi order by kode_realisasi asc");	
}
	if (mysqli_num_rows($query)>0){
		?>
		<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 2px #6c6969">
          <tr>
            <td width="100%" bgcolor="#6c6969"  background="img/blk.jpg" align="center">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
              <tr>
                <th width="100" <?php echo $btsklm; ?>>Kode Realisasi</th>
                <th width="80" <?php echo $btsklm; ?>>Tanggal</th>
                <th width="80" <?php echo $btsklm; ?>>Uraian</th>
                <th width="80" <?php echo $btsklm; ?>>Jumlah</th>
                <th width="140" <?php echo $btsklm; ?>>Aksi</th>
              </tr>
              <?php while ($data=mysqli_fetch_array($query)){ 
			  ?>
              <tr>
                <td height="1" bgcolor="#6c6969" colspan="9"></td>
              </tr>
              <tr>
                <td align="center">
					<?php if (@$_GET["kode_realisasi"]==$data['kode_realisasi']){
						echo "<font color='red'>".$data['kode_realisasi']."</font>";
					}else{
						echo $data['kode_realisasi'];
					} ?>
				</td>
                <td align="center" <?php echo $btsklm; ?>><?php echo substr($data["tanggal"],8,2)."/".substr($data["tanggal"],5,2)."/".substr($data["tanggal"],0,4); ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['uraian']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['jumlah']; ?></td>
                <td align="center" <?php echo $btsklm; ?>>
                <a href="?page=realisasi&aksi=edit&kode_realisasi=<?php echo $data['kode_realisasi']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Ubah" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				<a href="?page=realisasi&aksi=hapus&kode_realisasi=<?php echo $data['kode_realisasi']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
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
	$_SESSION["SD_kode_realisasi"]=$_POST["kode_realisasi"];	
	$tanggal = $_POST["tanggal"];
	function ubahTanggal($tanggal){
		$pisah = explode('/',$tanggal);
		$array = array($pisah[2],$pisah[0],$pisah[1]);
		$satukan = implode('-',$array);
		return $satukan;
	}
	$tgl_benar = ubahTanggal($tanggal).date(" H:s");
	$_SESSION["SD_tanggal"]=$tgl_benar;	

	$_SESSION["SD_uraian"]=$_POST["uraian"];
	$_SESSION["SD_jumlah"]=$_POST["jumlah"];
	$query=mysqli_query($db,"select * from tb_realisasi where kode_realisasi='".$_POST['kode_realisasi']."'");
	if (mysqli_num_rows($query)>0){
		echo"<script>alert('kode_realisasi yang sama sudah ada');document.location='?page=realisasi';</script>";
	}else{
		mysqli_query($db,"insert into tb_realisasi (kode_realisasi,tanggal,uraian,jumlah,nik) values ('". $_SESSION["SD_kode_realisasi"] ."','". $_SESSION["SD_tanggal"] ."','". $_SESSION["SD_uraian"] ."','". $_SESSION["SD_jumlah"] ."','". $_SESSION["jujur_nama_pengguna"] ."')");
		$_SESSION["SD_kode_realisasi"]="";
		$_SESSION["SD_tanggal"]="";
		$_SESSION["SD_uraian"]="";
		$_SESSION["SD_jumlah"]="";
		echo "<script>alert('data tersimpan');document.location='?page=realisasi';</script>";
	}
}elseif (@$_POST['btnedit']){
	$_SESSION["SD_kode_realisasi"]=$_POST["kode_realisasi"];

	$tanggal = $_POST["tanggal"];
	function ubahTanggal($tanggal){
		$pisah = explode('/',$tanggal);
		$array = array($pisah[2],$pisah[0],$pisah[1]);
		$satukan = implode('-',$array);
		return $satukan;
	}
	$tgl_benar = ubahTanggal($tanggal).date(" H:s");
	
	$_SESSION["SD_tanggal"]=$tgl_benar;
	$_SESSION["SD_uraian"]=$_POST["uraian"];
	$_SESSION["SD_jumlah"]=$_POST["jumlah"];
	$query=mysqli_query($db,"select * from tb_realisasi where kode_realisasi='".$_POST['kode_realisasi']."' and kode_realisasi<>'".$_GET['kode_realisasi']."'");
	if (mysqli_num_rows($query)>0){
		echo"<script>alert('Kode realisasi  yang sama sudah ada');document.location='?page=realisasi';</script>";
	}else{
		mysqli_query($db,"update tb_realisasi set kode_realisasi='". $_SESSION["SD_kode_realisasi"] ."',tanggal='". $_SESSION["SD_tanggal"] ."',uraian='". $_SESSION["SD_uraian"] ."',jumlah='". $_SESSION["SD_jumlah"] ."',nik='". $_SESSION["jujur_nama_pengguna"] ."' where kode_realisasi='".$_GET['kode_realisasi']."'");

		$_SESSION["SD_kode_realisasi"]="";
		$_SESSION["SD_tanggal"]="";
		$_SESSION["SD_uraian"]="";
		$_SESSION["SD_jumlah"]="";
		echo "<script>alert('data diedit');document.location='?page=realisasi'</script>";
	}
}elseif (@$_GET['aksi']=='hapus' && @$_GET["pesan"]=="ya"){
		mysqli_query($db,"delete from tb_realisasi where kode_realisasi='".$_GET['kode_realisasi']."'");
		$_SESSION["SD_kode_realisasi"]="";
		$_SESSION["SD_tanggal"]="";
		$_SESSION["SD_uraian"]="";
		$_SESSION["SD_jumlah"]="";
		echo "<script>alert('data telah dihapus');document.location='?page=realisasi';</script>";
}elseif (@$_GET['aksi']=='batal_tambah'){
		$_SESSION["SD_kode_realisasi"]="";
		$_SESSION["SD_tanggal"]="";
		$_SESSION["SD_uraian"]="";
		$_SESSION["SD_jumlah"]="";
		echo "<script>document.location='?page=realisasi&aksi=tambah';</script>";
}elseif (@$_GET['aksi']=='batal_ubah'){
		$_SESSION["SD_kode_realisasi"]="";
		$_SESSION["SD_tanggal"]="";
		$_SESSION["SD_uraian"]="";
		$_SESSION["SD_jumlah"]="";
		echo "<script>document.location='?page=realisasi';</script>";
}elseif (@$_GET['aksi']=='batal_hapus'){
		$_SESSION["SD_kode_realisasi"]="";
		$_SESSION["SD_tanggal"]="";
		$_SESSION["SD_uraian"]="";
		$_SESSION["SD_jumlah"]="";
		echo "<script>document.location='?page=realisasi';</script>";
}
?>