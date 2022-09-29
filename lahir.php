<br>
<?php
$btsklm="style='box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.1);'";
if (!@$_SESSION['pswd']){
	$_SESSION["pswd"]="sembunyi";
	echo "<script>document.location='?page=lahir';</script>";
}
if (@$_GET['pswd']=='lihat'){
	$_SESSION["pswd"]=$_GET["pswd"];
	echo "<script>document.location='?page=lahir';</script>";
}
if (@$_GET['pswd']=='sembunyi'){
	$_SESSION["pswd"]=$_GET["pswd"];
	echo "<script>document.location='?page=lahir';</script>";
}
//echo @$_SESSION["pswd"];
//$urut=$urut+1;

if(@$_POST['cari']){
		echo"<script>document.location='?page=lahir&cari=".$_POST["cari"]."';</script>";	
}?>

<?php if (@$_GET['aksi']=='edit'){
	$query_edit=mysqli_query($db,"select * from tb_lahir where id_lahir='".$_GET['id_lahir']."'");
	$data_edit=mysqli_fetch_array($query_edit);
	$_SESSION["SD_nomor_kk"]=$data_edit["nomor_kk"];
	$_SESSION["SD_nama"]=$data_edit["nama"];
	$_SESSION["SD_jenis_kelamin"]=$data_edit["jenis_kelamin"];
	$_SESSION["SD_tempat_lahir"]=$data_edit["tempat_lahir"];
	$_SESSION["SD_tanggal_lahir"]=$data_edit["tanggal_lahir"];
	$_SESSION["SD_alamat"]=$data_edit["alamat"];
	$_SESSION["SD_agama"]=$data_edit["agama"];
?> 

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Edit Data Lahir
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=lahir<?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="?page=lahir&id_lahir=<?php  echo $_GET["id_lahir"]; ?><?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">			
			<tr>
			  <td valign="top">Nomor KK</td>
			  <td valign="top">:</td>
			  <td>
				<?php if(@$_GET["nomor_kk"]!=""){ ?>			  
					<input type="text" name="nomor_kk" id="nomor_kk" maxlength="30" value="<?php echo @$_GET["nomor_kk"]; ?>" readonly="readonly" required style="width:150px"/>
				<?php }else{ ?>
					<select name="nomor_kk" id="nomor_kk" required >
						<?php
						$query=mysqli_query($db,"select * from tb_kartu_keluarga");							
						echo '<option value="">-Pilih-</option>';							
						while ($row=mysqli_fetch_array($query)){?>
							<option value="<?php  echo $row['nomor_kk']; ?>" <?php if(@$_SESSION["SD_nomor_kk"]==$row['nomor_kk']){echo "selected";} ?>><?php echo $row['nomor_kk']." - ".$row['nama_kepala_keluarga']; ?></option>
						<?php } ?>
					</select>				
				<?php } ?>
			  </td>
			</tr>			
			<tr>
			  <td valign="top">Nama</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="nama" id="nama" maxlength="50" value="<?php echo @$_SESSION["SD_nama"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Jenis Kelamin</td>
			  <td valign="top">:</td>
			  <td>
				<select id="jenis_kelamin" name="jenis_kelamin"/>
					<option <?php if (@$_SESSION["SD_jenis_kelamin"]=="Laki-laki"){ echo "selected"; } ?>/>Laki-laki</option>
					<option <?php if (@$_SESSION["SD_jenis_kelamin"]=="Perempuan"){ echo "selected"; } ?>/>Perempuan</option>
				</select>
			  </td>
			</tr>
			<tr>
			  <td valign="top">Tempat Lahir</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="tempat_lahir" id="tempat_lahir" maxlength="30" value="<?php echo @$_SESSION["SD_tempat_lahir"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Tanggal Lahir</td>
			  <td valign="top">:</td>
			  <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" maxlength="12" value="<?php echo @$_SESSION["SD_tanggal_lahir"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Alamat</td>
			  <td valign="top">:</td>
			  <td><textarea name="alamat" id="alamat" required style="width:50%;height:50px;"><?php echo @$_SESSION["SD_alamat"]; ?></textarea></td>
			</tr>
			<tr>
			  <td valign="top">Agama</td>
			  <td valign="top">:</td>
			  <td>
				<select id="agama" name="agama"/>
					<option <?php if (@$_SESSION["SD_agama"]=="Islam"){ echo "selected"; } ?>/>Islam</option>
					<option <?php if (@$_SESSION["SD_agama"]=="Kristen Protestan"){ echo "selected"; } ?>/>Kristen Protestan</option>
					<option <?php if (@$_SESSION["SD_agama"]=="Khatolik"){ echo "selected"; } ?>/>Khatolik</option>
					<option <?php if (@$_SESSION["SD_agama"]=="Hindu"){ echo "selected"; } ?>/>Hindu</option>
					<option <?php if (@$_SESSION["SD_agama"]=="Budha"){ echo "selected"; } ?>/>Budha</option>
					<option <?php if (@$_SESSION["SD_agama"]=="Konghucu"){ echo "selected"; } ?>/>Konghucu</option>
				</select>
			  </td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="" align="left">
				<input type="submit" name="btnedit" id="btnedit" value="Edit" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
				<a href="?page=lahir&aksi=batal_ubah<?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				</td>
			</tr>
      </table>
    </td>
  </tr>
</table>
</form>

<?php }elseif (@$_GET['aksi']=='hapus'){
	$query_hapus=mysqli_query($db,"select * from tb_lahir where id_lahir='".$_GET['id_lahir']."'");
	$data_hapus=mysqli_fetch_array($query_hapus);
	$_SESSION["SD_nomor_kk"]=$data_hapus["nomor_kk"];
	$_SESSION["SD_nama"]=$data_hapus["nama"];
	$_SESSION["SD_jenis_kelamin"]=$data_hapus["jenis_kelamin"];
	$_SESSION["SD_tempat_lahir"]=$data_hapus["tempat_lahir"];
	$_SESSION["SD_tanggal_lahir"]=substr($data_hapus["tanggal_lahir"],8,2)."/".substr($data_hapus["tanggal_lahir"],5,2)."/".substr($data_hapus["tanggal_lahir"],0,4);
	$_SESSION["SD_alamat"]=$data_hapus["alamat"];
	$_SESSION["SD_agama"]=$data_hapus["agama"];
?> 

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Yakin ingin menghapus Data Lahir?
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=lahir<?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
			  <td width="100" valign="top">Nomor KK</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_nomor_kk"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Nama</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_nama"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Jenis Kelamin</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_jenis_kelamin"] ?></td>
			</tr>
			<tr>
			  <td valign="top">Tempat Lahir</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_tempat_lahir"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Tanggal Lahir</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_tanggal_lahir"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Alamat</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_alamat"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Agama</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_agama"]; ?></td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="" align="left">
				<a href="?page=lahir&aksi=hapus&id_lahir=<?php echo $_GET['id_lahir']; ?><?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>&pesan=ya"><input type="button" name="button2" id="button2" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				<a href="?page=lahir&aksi=batal_hapus<?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
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
	<td width="80%"  bgcolor="white" >Tambah Data Lahir
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=lahir<?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="?page=lahir<?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
			  <td valign="top">Nomor KK</td>
			  <td valign="top">:</td>
			  <td>
				<?php if(@$_GET["nomor_kk"]!=""){ ?>	  
					<input type="text" name="nomor_kk" id="nomor_kk" maxlength="30" value="<?php echo @$_GET["nomor_kk"]; ?>" readonly="readonly" required style="width:150px"/>
				<?php }else{ ?>
					<select name="nomor_kk" id="nomor_kk" onchange= required >
						<?php
						$query=mysqli_query($db,"select * from tb_kartu_keluarga");							
						echo '<option value="">-Pilih-</option>';							
						while ($row=mysqli_fetch_array($query)){?>
							<option value="<?php  echo $row['nomor_kk']; ?>"><?php echo $row['nomor_kk']." - ".$row['nama_kepala_keluarga']; ?></option>
						<?php } ?>
					</select>				
				<?php } ?>
			  </td>
			</tr>			
			<tr>
			  <td valign="top">Nama</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="nama" id="nama" maxlength="50" value="<?php echo @$_SESSION["SD_nama"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Jenis Kelamin</td>
			  <td valign="top">:</td>
			  <td>
				<select id="jenis_kelamin" name="jenis_kelamin"/>
					<option <?php if (@$_SESSION["SD_jenis_kelamin"]=="Laki-laki"){ echo "selected"; } ?>/>Laki-laki</option>
					<option <?php if (@$_SESSION["SD_jenis_kelamin"]=="Perempuan"){ echo "selected"; } ?>/>Perempuan</option>
				</select>
			  </td>
			</tr>
			<tr>
			  <td valign="top">Tempat Lahir</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="tempat_lahir" id="tempat_lahir" maxlength="30" value="<?php echo @$_SESSION["SD_tempat_lahir"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Tanggal Lahir</td>
			  <td valign="top">:</td>
			  <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" maxlength="12" value="<?php echo @$_SESSION["SD_tanggal_lahir"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Alamat</td>
			  <td valign="top">:</td>
			  <td><textarea name="alamat" id="alamat" required style="width:50%;height:50px;"><?php echo @$_SESSION["SD_alamat"]; ?></textarea></td>
			</tr>
			<tr>
			  <td valign="top">Agama</td>
			  <td valign="top">:</td>
			  <td>
				<select id="agama" name="agama"/>
					<option <?php if (@$_SESSION["SD_agama"]=="Islam"){ echo "selected"; } ?>/>Islam</option>
					<option <?php if (@$_SESSION["SD_agama"]=="Kristen Protestan"){ echo "selected"; } ?>/>Kristen Protestan</option>
					<option <?php if (@$_SESSION["SD_agama"]=="Khatolik"){ echo "selected"; } ?>/>Khatolik</option>
					<option <?php if (@$_SESSION["SD_agama"]=="Hindu"){ echo "selected"; } ?>/>Hindu</option>
					<option <?php if (@$_SESSION["SD_agama"]=="Budha"){ echo "selected"; } ?>/>Budha</option>
					<option <?php if (@$_SESSION["SD_agama"]=="Konghucu"){ echo "selected"; } ?>/>Konghucu</option>
				</select>
			  </td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="" align="left">
					<input type="submit" name="btnsimpan" id="btnsimpan" value="Simpan" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
					<a href="?page=lahir&aksi=batal_tambah"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				</td>
			</tr>
		</table>
    </td>
  </tr>
</table>
</form>
<?php 
}elseif(@$_GET["nomor_kk"]!=""){
?>

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Penduduk
		<a href="?page=lahir&aksi=tambah&nomor_kk=<?php echo @$_GET["nomor_kk"]; ?>"><input type="button" name="button" id="button2" value="+ Tambah" <?php echo "style='width:160px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
	</td>
  </tr>
</table>

<br>

<?php
$query=mysqli_query($db,"select * from tb_lahir where nomor_kk='".$_GET["nomor_kk"]."' order by id_lahir asc");	
	if (mysqli_num_rows($query)>0){
		?>
		<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 2px #6c6969">
          <tr>
            <td width="100%" bgcolor="#6c6969"  background="img/blk.jpg" align="center">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
              <tr>
                <th width="100" <?php echo $btsklm; ?>>id_lahir</th>
                <th width="100" <?php echo $btsklm; ?>>Nama</th>
                <th width="100" <?php echo $btsklm; ?>>Tempat Lahir</th>
                <th width="80" <?php echo $btsklm; ?>>Tanggal Lahir</th>
                <th width="80" <?php echo $btsklm; ?>>Hubungan Keluarga</th>
                <th width="140" <?php echo $btsklm; ?>>Aksi</th>
              </tr>
              <?php while ($data=mysqli_fetch_array($query)){ 
			  ?>
              <tr>
                <td height="1" bgcolor="#6c6969" colspan="10"></td>
              </tr>
              <tr>
                <td align="center">
					<?php if (@$_GET["id_lahir"]==$data['id_lahir']){
						echo "<font color='red'>".$data['id_lahir']."</font>";
					}else{
						echo $data['id_lahir'];
					} ?>
				</td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['nama']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['tempat_lahir']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo substr($data["tanggal_lahir"],8,2)."/".substr($data["tanggal_lahir"],5,2)."/".substr($data["tanggal_lahir"],0,4); ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['hubungan_keluarga']; ?></td>
                <td align="center" <?php echo $btsklm; ?>>
                <a href="?page=lahir&aksi=edit&id_lahir=<?php echo $data['id_lahir']; ?>&nomor_kk=<?php echo @$_GET["nomor_kk"]; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Ubah" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				<a href="?page=lahir&aksi=hapus&id_lahir=<?php echo $data['id_lahir']; ?>&nomor_kk=<?php echo @$_GET["nomor_kk"]; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
              </tr>
              <?php } ?>
              </table></td>
          </tr>
        </table>
            <?php 
	}else{
		echo "<font size='8' color='#F4DE64'><center>Data Tidak Tersedia</center></font>";	
	}	
}else{
?>

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="55%"  bgcolor="white" >Data Lahir
		<a href="?page=lahir&aksi=tambah"><input type="button" name="button" id="button2" value="+ Tambah" <?php echo "style='width:160px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
	</td>
	<td width="16%"  bgcolor="white" align="center">
		<form method="post"><input name="cari" type="text" placeholder="   Cari bayi... " style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:97%"/></form>
	</td>
	<td width="400" bgcolor="#e7e1e1" align="center">
		<form method="post">Tgl <input name="tanggal_awal" required type="date" value="<?php echo @$_SESSION["tanggal_awal"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/>S/D<input name="tanggal_akhir" required type="date" value="<?php echo @$_SESSION["tanggal_akhir"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/><input type="submit" name="tampil_tanggal" id="tampil_tanggal" value="Cetak Laporan" <?php echo "style='width:120px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></form>
		<?php if(@$_POST["tampil_tanggal"]){
			$_SESSION["tanggal_awal"]=$_POST["tanggal_awal"];
			$_SESSION["tanggal_akhir"]=$_POST["tanggal_akhir"];
			echo "<script>document.location='?page=laporan&kategori=lahir&tanggal_awal=".$_POST["tanggal_awal"]."&tanggal_akhir=".$_POST["tanggal_akhir"]."';</script>";
		} ?>
    </td>
  </tr>
</table>


<br>

<?php
$query=mysqli_query($db,"select * from tb_lahir order by id_lahir asc");	
if(@$_GET['cari']){
	if(@$_GET['cari']=="meid_lahirah" or @$_GET['cari']=="Meid_lahirah" or @$_GET['cari']=="id_lahirah" or @$_GET['cari']=="id_lahirah"){
		$cri="Meid_lahirah";
		$query =mysqli_query($db,"select * from tb_lahir where id_lahir like '%".$_GET['cari']."%' or nama like '%".$_GET['cari']."%' or nomor_kk like '%".$_GET['cari']."%' or status_perkawinan='".$cri."' order by id_lahir asc");
	}else{
		//Ubah proram ini jika ingin menambah kategori pencarian
		$query =mysqli_query($db,"select * from tb_lahir where nomor_kk like '%".$_GET['cari']."%' or jenis_kelamin like '%".$_GET['cari']."%' or nama like '%".$_GET['cari']."%' or agama like '%".$_GET['cari']."%' or nomor_kk like '%".$_GET['cari']."%' order by id_lahir asc");		
	}
}elseif(@$_GET['id_lahir']){
	$query =mysqli_query($db,"select * from tb_lahir where nomor_kk like '%".$_GET['id_lahir']."%' order by nomor_kk asc");
}elseif(@$_GET['tanggal_awal'] and @$_GET['tanggal_akhir']){
	$tgl1=$_GET["tanggal_awal"];
	$tgl2=$_GET["tanggal_akhir"];
	$query =mysqli_query($db,"select * from tb_lahir where (tanggal_lahir BETWEEN '$tgl1' AND '$tgl2') order by nomor_kk asc");
}else{
	$query=mysqli_query($db,"select * from tb_lahir order by nomor_kk asc");	
}
	if (mysqli_num_rows($query)>0){
		?>
		<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 2px #6c6969">
          <tr>
            <td width="100%" bgcolor="#6c6969"  background="img/blk.jpg" align="center">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
              <tr>
			  <th width="120" <?php echo $btsklm; ?>>Nomor KK</th>
                <th width="150" <?php echo $btsklm; ?>>Nama</th>
                <th width="120" <?php echo $btsklm; ?>>Jenis Kelamin</th>
                <th width="160" <?php echo $btsklm; ?>>Tanggal Lahir</th>
                <th width="80" <?php echo $btsklm; ?>>Agama</th>
                <th width="140" <?php echo $btsklm; ?>>Aksi</th>
              </tr>
              <?php while ($data=mysqli_fetch_array($query)){ 
			  ?>
              <tr>
                <td height="1" bgcolor="#6c6969" colspan="9"></td>
              </tr>
              <tr>
				<td align="center" <?php echo $btsklm; ?>><?php echo $data['nomor_kk']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['nama']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['jenis_kelamin']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo substr($data["tanggal_lahir"],8,2)."/".substr($data["tanggal_lahir"],5,2)."/".substr($data["tanggal_lahir"],0,4); ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['agama']; ?></td>
                <td align="center" <?php echo $btsklm; ?>>
                <a href="?page=lahir&aksi=edit&id_lahir=<?php echo $data['id_lahir']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Ubah" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				<a href="?page=lahir&aksi=hapus&id_lahir=<?php echo $data['id_lahir']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
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
	$_SESSION["SD_nama"]=$_POST["nama"];
	$_SESSION["SD_jenis_kelamin"]=$_POST["jenis_kelamin"];
	$_SESSION["SD_tempat_lahir"]=$_POST["tempat_lahir"];
	$tanggal = $_POST["tanggal_lahir"];
	$tgl_benar = $tanggal;
	$_SESSION["SD_tanggal_lahir"]=$_POST["tanggal_lahir"];
	$_SESSION["SD_alamat"]=$_POST["alamat"];
	$_SESSION["SD_agama"]=$_POST["agama"];
	$query=mysqli_query($db,"select * from tb_lahir where nomor_kk='".$_POST['nomor_kk']."' and nama='".$_POST['nama']."'");
	if (mysqli_num_rows($query)>0){
		if(@$_GET["nomor_kk"]!=""){
			echo "<script>alert('nama yang sama sudah ada');document.location='?page=lahir&nomor_kk=".$_GET["nomor_kk"]."';</script>";
		}else{
			echo "<script>alert('nama yang sama sudah ada');document.location='?page=lahir';</script>";
		}
	}else{
		mysqli_query($db,"insert into tb_lahir (nomor_kk,nama,jenis_kelamin,tempat_lahir,tanggal_lahir,alamat,agama) values ('". $_SESSION["SD_nomor_kk"] ."','". $_SESSION["SD_nama"] ."','". $_SESSION["SD_jenis_kelamin"] ."','". $_SESSION["SD_tempat_lahir"] ."','". $tgl_benar ."','". $_SESSION["SD_alamat"] ."','". $_SESSION["SD_agama"] ."')");
		$_SESSION["SD_nomor_kk"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_jenis_kelamin"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_agama"]="";
		if(@$_GET["nomor_kk"]!=""){
			echo "<script>alert('data tersimpan');document.location='?page=lahir&nomor_kk=".$_GET["nomor_kk"]."';</script>";
		}else{
			echo "<script>alert('data tersimpan');document.location='?page=lahir';</script>";
		}
	}
}elseif (@$_POST['btnedit']){
	$_SESSION["SD_nomor_kk"]=$_POST["nomor_kk"];
	$_SESSION["SD_nama"]=$_POST["nama"];
	$_SESSION["SD_jenis_kelamin"]=$_POST["jenis_kelamin"];
	$_SESSION["SD_tempat_lahir"]=$_POST["tempat_lahir"];

	$tanggal = $_POST["tanggal_lahir"];
	$tgl_benar = $tanggal;
	$_SESSION["SD_tanggal_lahir"]=$_POST["tanggal_lahir"];
	$_SESSION["SD_alamat"]=$_POST["alamat"];
	$_SESSION["SD_agama"]=$_POST["agama"];
	echo $_SESSION["SD_id_lahir"]."<br>";
	echo $_GET["id_lahir"]."<br>";
	$query666=mysqli_query($db,"select * from tb_lahir where nomor_kk='".$_POST['nomor_kk']."' and nama='".$_POST['nama']."' and id_lahir<>'".$_GET['id_lahir']."'");
	if (mysqli_num_rows($query666)>0){
		if(@$_GET["nomor_kk"]!=""){
			echo "<script>alert('nama yang sama sudah ada');document.location='?page=lahir&aksi=edit&id_lahir=".$_GET["id_lahir"]."&nomor_kk=".$_GET["nomor_kk"]."';</script>";
		}else{
			echo "<script>alert('nama yang sama sudah ada');document.location='?page=lahir&aksi=edit&id_lahir=".$_GET["id_lahir"]."';</script>";
		}
	}else{
		mysqli_query($db,"update tb_lahir set nomor_kk='". $_SESSION["SD_nomor_kk"] ."',nama='". $_SESSION["SD_nama"] ."',jenis_kelamin='". $_SESSION["SD_jenis_kelamin"] ."',tempat_lahir='". $_SESSION["SD_tempat_lahir"] ."',tanggal_lahir='". $tgl_benar ."',alamat='". $_SESSION["SD_alamat"] ."',agama='". $_SESSION["SD_agama"] ."' where id_lahir='".$_GET['id_lahir']."'");
		$_SESSION["SD_nomor_kk"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_agama"]="";
		if(@$_GET["nomor_kk"]!=""){
			echo "<script>alert('data telah diedit');document.location='?page=lahir&nomor_kk=".$_GET["nomor_kk"]."';</script>";
		}else{
			echo "<script>alert('data telah diedit');document.location='?page=lahir';</script>";
		}
	}
}elseif (@$_GET['aksi']=='hapus' && @$_GET["pesan"]=="ya"){
		mysqli_query($db,"delete from tb_lahir where id_lahir='".$_GET['id_lahir']."'");
		$_SESSION["SD_nomor_kk"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_hubungan_keluarga"]="";
		if(@$_GET["nomor_kk"]!=""){
			echo "<script>alert('data telah dihapus');document.location='?page=lahir&nomor_kk=".$_GET["nomor_kk"]."';</script>";
		}else{
			echo "<script>alert('data telah dihapus');document.location='?page=lahir';</script>";
		}
}elseif (@$_GET['aksi']=='batal_tambah'){
		$_SESSION["SD_nomor_kk"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_hubungan_keluarga"]="";
		if(@$_GET["nomor_kk"]!=""){
			echo "<script>document.location='?page=lahir&nomor_kk=".$_GET["nomor_kk"]."';</script>";
		}else{
			echo "<script>document.location='?page=lahir';</script>";
		}
}elseif (@$_GET['aksi']=='batal_ubah'){
		$_SESSION["SD_nomor_kk"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_status_perkawinan"]="";
		$_SESSION["SD_pekerjaan"]="";
		$_SESSION["SD_kewarganegaraan"]="Indonesia";
		$_SESSION["SD_telepon"]="";
		$_SESSION["SD_hubungan_keluarga"]="";
		if(@$_GET["nomor_kk"]!=""){
			echo "<script>document.location='?page=lahir&nomor_kk=".$_GET["nomor_kk"]."';</script>";
		}else{
			echo "<script>document.location='?page=lahir';</script>";
		}
}elseif (@$_GET['aksi']=='batal_hapus'){
		$_SESSION["SD_nomor_kk"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_hubungan_keluarga"]="";
		if(@$_GET["nomor_kk"]!=""){
			echo "<script>document.location='?page=lahir&nomor_kk=".$_GET["nomor_kk"]."';</script>";
		}else{
			echo "<script>document.location='?page=lahir';</script>";
		}
}
?>