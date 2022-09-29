<script>
	$(document).ready(function(){
	$("#tanggal_lahir").datepicker({
	})
	})
</script>

<br>
<?php
$btsklm="style='box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.1);'";
if (!@$_SESSION['pswd']){
	$_SESSION["pswd"]="sembunyi";
	echo "<script>document.location='?page=bendahara';</script>";
}
if (@$_GET['pswd']=='lihat'){
	$_SESSION["pswd"]=$_GET["pswd"];
	echo "<script>document.location='?page=bendahara';</script>";
}
if (@$_GET['pswd']=='sembunyi'){
	$_SESSION["pswd"]=$_GET["pswd"];
	echo "<script>document.location='?page=bendahara';</script>";
}
//echo @$_SESSION["pswd"];
?>

<?php
$query_urut=mysqli_query($db,"select * from tb_bendahara order by nik desc");
$urut=0;
if (mysqli_num_rows($query_urut)>0){
	$data=mysqli_fetch_array($query_urut);
	$urut=substr($data["nik"],1,2);
}
$urut=$urut+1;
if ($urut>9){
	$kdurut="P".$urut;
}else{
	$kdurut="P0".$urut;
}

if(@$_POST['cari']){
		echo"<script>document.location='?page=bendahara&cari=".$_POST["cari"]."';</script>";	
}?>

<?php if (@$_GET['aksi']=='edit'){
	$query_edit=mysqli_query($db,"select * from tb_bendahara where nik='".$_GET['nik']."'");
	$data_edit=mysqli_fetch_array($query_edit);
	$_SESSION["SD_nik"]=$data_edit["nik"];
	$_SESSION["SD_nama"]=$data_edit["nama"];
	$_SESSION["SD_tempat_lahir"]=$data_edit["tempat_lahir"];
	$_SESSION["SD_tanggal_lahir"]=substr($data_edit["tanggal_lahir"],5,2)."/".substr($data_edit["tanggal_lahir"],8,2)."/".substr($data_edit["tanggal_lahir"],0,4);
	$_SESSION["SD_alamat"]=$data_edit["alamat"];
	$_SESSION["SD_kode_pos"]=$data_edit["kode_pos"];
	$_SESSION["SD_rt_rw"]=$data_edit["rt_rw"];
	$_SESSION["SD_kelurahan"]=$data_edit["kelurahan"];
	$_SESSION["SD_kecamatan"]=$data_edit["kecamatan"];
	$_SESSION["SD_kabupaten"]=$data_edit["kabupaten"];
	$_SESSION["SD_provinsi"]=$data_edit["provinsi"];
	$_SESSION["SD_agama"]=$data_edit["agama"];
	$_SESSION["SD_status_perkawinan"]=$data_edit["status_perkawinan"];
	$_SESSION["SD_kewarganegaraan"]=$data_edit["kewarganegaraan"];
	$_SESSION["SD_telepon"]=$data_edit["telepon"];
	$_SESSION["SD_status"]=$data_edit["status"];
	$_SESSION["SD_kata_sandi"]=$data_edit["kata_sandi"];
?> 

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Edit Bendahara
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=sekretaris_desa_bendahara"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
			  <td width="190">NIK</td>
			  <td width="1">:</td>
			  <td width="auto"><input type="text" name="nik" id="nik" maxlength="20" value="<?php echo @$_SESSION["SD_nik"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Nama</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="nama" id="nama" maxlength="30" value="<?php echo @$_SESSION["SD_nama"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Tempat Lahir</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="tempat_lahir" id="tempat_lahir" maxlength="30" value="<?php echo @$_SESSION["SD_tempat_lahir"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Tanggal Lahir</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="tanggal_lahir" id="tanggal_lahir" maxlength="12" value="<?php echo @$_SESSION["SD_tanggal_lahir"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Alamat</td>
			  <td valign="top">:</td>
			  <td><textarea name="alamat" id="alamat" required style="width:50%;height:50px;"><?php echo @$_SESSION["SD_alamat"]; ?></textarea></td>
			</tr>
			<tr>
			  <td valign="top">Kode Pos</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="kode_pos" id="kode_pos" maxlength="30" value="<?php echo @$_SESSION["SD_kode_pos"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">RT/RW</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="rt_rw" id="rt_rw" maxlength="30" value="<?php echo @$_SESSION["SD_rt_rw"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Kelurahan</td>
			  <td valign="top">:</td>
			  <td>
				<select id="kelurahan" name="kelurahan"/>
					<option <?php if (@$_SESSION["SD_kelurahan"]=="Perasmian"){ echo "selected"; } ?>/>Perasmain</option>
				</select>
			  </td>
			</tr>
			<tr>
			  <td valign="top">Kecamatan</td>
			  <td valign="top">:</td>
			  <td>
				<select id="kecamatan" name="kecamatan"/>
					<option <?php if (@$_SESSION["SD_kecamatan"]=="Dolok Silau"){ echo "selected"; } ?>/>Dolok Silau</option>
				</select>
			  </td>
			</tr>
			<tr>
			  <td valign="top">Simalungun</td>
			  <td valign="top">:</td>
			  <td>
				<select id="kabupaten" name="kabupaten"/>
					<option <?php if (@$_SESSION["SD_kabupaten"]=="Simalungun"){ echo "selected"; } ?>/>Simalungun</option>
				</select>
			  </td>
			</tr>
			<tr>
			  <td valign="top">Provinsi</td>
			  <td valign="top">:</td>
			  <td>
				<select id="provinsi" name="provinsi"/>
					<option <?php if (@$_SESSION["SD_provinsi"]=="Sumatera Utara"){ echo "selected"; } ?>/>Sumatera Utara</option>
				</select>
			  </td>
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
			  <td valign="top">Status Perkawinan</td>
			  <td valign="top">:</td>
			  <td>
				<select id="status_perkawinan" name="status_perkawinan"/>
					<option <?php if (@$_SESSION["SD_status_perkawinan"]=="Belum Menikah"){ echo "selected"; } ?>/>Belum Menikah</option>
					<option <?php if (@$_SESSION["SD_status_perkawinan"]=="Menikah"){ echo "selected"; } ?>/>Menikah</option>
				</select>
			  </td>
			</tr>
			<tr>
			  <td valign="top">Kewarganegaraan</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="kewarganegaraan" id="kewarganegaraan" maxlength="30" value="Indonesia" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Telepon</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="telepon" id="telepon" maxlength="13" value="<?php echo @$_SESSION["SD_telepon"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Status</td>
			  <td valign="top">:</td>
			  <td>
				<select id="status" name="status"/>
					<option <?php if (@$_SESSION["SD_status"]=="Aktif"){ echo "selected"; } ?>/>Aktif</option>
					<option <?php if (@$_SESSION["SD_status"]=="Tidak Aktif"){ echo "selected"; } ?>/>Tidak Aktif</option>
				</select>
			  </td>
			</tr>
			<tr>
			  <td valign="top">Kata Sandi</td>
			  <td valign="top">:</td>
			  <td><input type="password" name="kata_sandi" id="kata_sandi" maxlength="20" value="<?php echo @$_SESSION["SD_kata_sandi"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="#ffffcc" align="left">
				<input type="submit" name="btnedit" id="btnedit" value="Edit" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
				<a href="?page=bendahara&aksi=batal_ubah"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				</td>
			</tr>
      </table>
    </td>
  </tr>
</table>
</form>

<?php }elseif (@$_GET['aksi']=='hapus'){
	$query_hapus=mysqli_query($db,"select * from tb_bendahara where nik='".$_GET['nik']."'");
	$data_hapus=mysqli_fetch_array($query_hapus);
	$_SESSION["SD_nik"]=$data_hapus["nik"];
	$_SESSION["SD_nama"]=$data_hapus["nama"];
	$_SESSION["SD_tempat_lahir"]=$data_hapus["tempat_lahir"];
	$_SESSION["SD_tanggal_lahir"]=substr($data_hapus["tanggal_lahir"],8,2)."/".substr($data_hapus["tanggal_lahir"],5,2)."/".substr($data_hapus["tanggal_lahir"],0,4);
	$_SESSION["SD_alamat"]=$data_hapus["alamat"];
	$_SESSION["SD_kode_pos"]=$data_hapus["kode_pos"];
	$_SESSION["SD_rt_rw"]=$data_hapus["rt_rw"];
	$_SESSION["SD_kelurahan"]=$data_hapus["kelurahan"];
	$_SESSION["SD_kecamatan"]=$data_hapus["kecamatan"];
	$_SESSION["SD_kabupaten"]=$data_hapus["kabupaten"];
	$_SESSION["SD_provinsi"]=$data_hapus["provinsi"];
	$_SESSION["SD_agama"]=$data_hapus["agama"];
	$_SESSION["SD_status_perkawinan"]=$data_hapus["status_perkawinan"];
	$_SESSION["SD_kewarganegaraan"]=$data_hapus["kewarganegaraan"];
	$_SESSION["SD_telepon"]=$data_hapus["telepon"];
	$_SESSION["SD_status"]=$data_hapus["status"];
	$_SESSION["SD_kata_sandi"]=$data_hapus["kata_sandi"];
?> 

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Yakin ingin menghapus data Bendahara berikut?
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=sekretaris_desa_bendahara"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
			  <td width="190">NIK</td>
			  <td width="1">:</td>
			  <td width="auto"><?php echo @$_SESSION["SD_nik"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Nama</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_nama"]; ?></td>
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
			  <td valign="top">Kode Pos</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_kode_pos"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">RT/RW</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_rt_rw"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Kelurahan</td>
			  <td valign="top">:</td>
			  <td> <?php echo @$_SESSION["SD_kelurahan"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Kecamatan</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_kecamatan"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Kabupaten</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_kabupaten"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Provinsi</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_provinsi"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Agama</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_agama"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Status Perkawinan</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_status_perkawinan"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Kewarganegaraan</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_kewarganegaraan"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Telepon</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_telepon"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Status</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_status"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Kata Sandi</td>
			  <td valign="top">:</td>
			  <td>*******************</td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="#ffffcc" align="left">
				<a href="?page=bendahara&aksi=hapus&nik=<?php echo $_GET['nik']; ?>&pesan=ya"><input type="button" name="button2" id="button2" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				<a href="?page=bendahara&aksi=batal_hapus"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
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
	<td width="80%"  bgcolor="white" >Tambah Bendahara
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=sekretaris_desa_bendahara"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
			  <td width="190">NIK</td>
			  <td width="1">:</td>
			  <td width="auto"><input type="text" name="nik" id="nik" maxlength="20" value="<?php echo @$_SESSION["SD_nik"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Nama</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="nama" id="nama" maxlength="30" value="<?php echo @$_SESSION["SD_nama"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Tempat Lahir</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="tempat_lahir" id="tempat_lahir" maxlength="30" value="<?php echo @$_SESSION["SD_tempat_lahir"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Tanggal Lahir</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="tanggal_lahir" id="tanggal_lahir" maxlength="12" value="<?php echo @$_SESSION["SD_tanggal_lahir"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Alamat</td>
			  <td valign="top">:</td>
			  <td><textarea name="alamat" id="alamat" required style="width:50%;height:50px;"><?php echo @$_SESSION["SD_alamat"]; ?></textarea></td>
			</tr>
			<tr>
			  <td valign="top">Kode Pos</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="kode_pos" id="kode_pos" maxlength="30" value="<?php echo @$_SESSION["SD_kode_pos"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">RT/RW</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="rt_rw" id="rt_rw" maxlength="30" value="<?php echo @$_SESSION["SD_rt_rw"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Kelurahan</td>
			  <td valign="top">:</td>
			  <td>
				<select id="kelurahan" name="kelurahan"/>
					<option <?php if (@$_SESSION["SD_kelurahan"]=="Dahana Tugala Oyo"){ echo "selected"; } ?>/>Dahana Tugala Oyo</option>
				</select>
			  </td>
			</tr>
			<tr>
			  <td valign="top">Kecamatan</td>
			  <td valign="top">:</td>
			  <td>
				<select id="kecamatan" name="kecamatan"/>
					<option <?php if (@$_SESSION["SD_kecamatan"]=="Alasa"){ echo "selected"; } ?>/>Alasa</option>
				</select>
			  </td>
			</tr>
			<tr>
			  <td valign="top">Kabupaten</td>
			  <td valign="top">:</td>
			  <td>
				<select id="kabupaten" name="kabupaten"/>
					<option <?php if (@$_SESSION["SD_kabupaten"]=="Nias Utara"){ echo "selected"; } ?>/>Nias Utara</option>
				</select>
			  </td>
			</tr>
			<tr>
			  <td valign="top">Provinsi</td>
			  <td valign="top">:</td>
			  <td>
				<select id="provinsi" name="provinsi"/>
					<option <?php if (@$_SESSION["SD_provinsi"]=="Sumatera Utara"){ echo "selected"; } ?>/>Sumatera Utara</option>
				</select>
			  </td>
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
			  <td valign="top">Status Perkawinan</td>
			  <td valign="top">:</td>
			  <td>
				<select id="status_perkawinan" name="status_perkawinan"/>
					<option <?php if (@$_SESSION["SD_status_perkawinan"]=="Belum Menikah"){ echo "selected"; } ?>/>Belum Menikah</option>
					<option <?php if (@$_SESSION["SD_status_perkawinan"]=="Menikah"){ echo "selected"; } ?>/>Menikah</option>
				</select>
			  </td>
			</tr>
			<tr>
			  <td valign="top">Kewarganegaraan</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="kewarganegaraan" id="kewarganegaraan" maxlength="30" value="Indonesia" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Telepon</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="telepon" id="telepon" maxlength="13" value="<?php echo @$_SESSION["SD_telepon"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Status</td>
			  <td valign="top">:</td>
			  <td>
				<select id="status" name="status"/>
					<option <?php if (@$_SESSION["SD_status"]=="Aktif"){ echo "selected"; } ?>/>Aktif</option>
					<option <?php if (@$_SESSION["SD_status"]=="Tidak Aktif"){ echo "selected"; } ?>/>Tidak Aktif</option>
				</select>
			  </td>
			</tr>
			<tr>
			  <td valign="top">Kata Sandi</td>
			  <td valign="top">:</td>
			  <td><input type="password" name="kata_sandi" id="kata_sandi" maxlength="20" value="<?php echo @$_SESSION["SD_kata_sandi"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="" align="left">
					<input type="submit" name="btnsimpan" id="btnsimpan" value="Simpan" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
					<a href="?page=bendahara&aksi=batal_tambah"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
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
	<td width="80%"  bgcolor="white" >Bendahara
	<?php $query_row=mysqli_query($db,"select * from tb_bendahara order by nik asc");
		if (mysqli_num_rows($query_row)<=0){
	?>
		<a href="?page=bendahara&aksi=tambah"><input type="button" name="button" id="button2" value="+ Tambah" <?php echo "style='width:160px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
	<?php } ?>		
	</td>
  </tr>
</table>

<br>

<?php
$query=mysqli_query($db,"select * from tb_bendahara order by nik asc");	
if(@$_GET['cari']){
	$query =mysqli_query($db,"select * from tb_bendahara where nik like '%".$_GET['cari']."%' or nama like '%".$_GET['cari']."%' order by nik asc");
}elseif(@$_GET['nik']){
	$query =mysqli_query($db,"select * from tb_bendahara where nik like '%".$_GET['nik']."%' order by nik asc");
}else{
	$query=mysqli_query($db,"select * from tb_bendahara order by nik asc");	
}
	if (mysqli_num_rows($query)>0){
		?>
		<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 2px #6c6969">
          <tr>
            <td width="100%" bgcolor="#6c6969"  background="img/blk.jpg" align="center">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
              <tr>
                <th width="100" <?php echo $btsklm; ?>>NIK</th>
                <th width="100" <?php echo $btsklm; ?>>Nama</th>
                <th width="100" <?php echo $btsklm; ?>>Tempat Lahir</th>
                <th width="80" <?php echo $btsklm; ?>>Tanggal Lahir</th>
                <th width="80" <?php echo $btsklm; ?>>Agama</th>
                <th width="80" <?php echo $btsklm; ?>>Status Perkawinan</th>
                <th width="80" <?php echo $btsklm; ?>>Telepon</th>
                <th width="80" <?php echo $btsklm; ?>>Status</th>
                <th width="140" <?php echo $btsklm; ?>>Aksi</th>
              </tr>
              <?php while ($data=mysqli_fetch_array($query)){ 
			  ?>
              <tr>
                <td height="1" bgcolor="#6c6969" colspan="9"></td>
              </tr>
              <tr>
                <td align="center">
					<?php if (@$_GET["nik"]==$data['nik']){
						echo "<font color='red'>".$data['nik']."</font>";
					}else{
						echo $data['nik'];
					} ?>
				</td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['nama']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['tempat_lahir']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo substr($data["tanggal_lahir"],8,2)."/".substr($data["tanggal_lahir"],5,2)."/".substr($data["tanggal_lahir"],0,4); ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['agama']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['status_perkawinan']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['telepon']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['status']; ?></td>
                <td align="center" <?php echo $btsklm; ?>>
                <a href="?page=bendahara&aksi=edit&nik=<?php echo $data['nik']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Ubah" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				<a href="?page=bendahara&aksi=hapus&nik=<?php echo $data['nik']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
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
	$_SESSION["SD_nik"]=$_POST["nik"];
	$_SESSION["SD_nama"]=$_POST["nama"];
	$_SESSION["SD_tempat_lahir"]=$_POST["tempat_lahir"];
	
	$tanggal = $_POST["tanggal_lahir"];
	function ubahTanggal($tanggal){
		$pisah = explode('/',$tanggal);
		$array = array($pisah[2],$pisah[0],$pisah[1]);
		$satukan = implode('-',$array);
		return $satukan;
	}
	$tgl_benar = ubahTanggal($tanggal).date(" H:s");

	$_SESSION["SD_tanggal_lahir"]=$_POST["tanggal_lahir"];
	$_SESSION["SD_alamat"]=$_POST["alamat"];
	$_SESSION["SD_kode_pos"]=$_POST["kode_pos"];
	$_SESSION["SD_rt_rw"]=$_POST["rt_rw"];
	$_SESSION["SD_kelurahan"]=$_POST["kelurahan"];
	$_SESSION["SD_kecamatan"]=$_POST["kecamatan"];
	$_SESSION["SD_kabupaten"]=$_POST["kabupaten"];
	$_SESSION["SD_provinsi"]=$_POST["provinsi"];
	$_SESSION["SD_agama"]=$_POST["agama"];
	$_SESSION["SD_status_perkawinan"]=$_POST["status_perkawinan"];
	$_SESSION["SD_kewarganegaraan"]=$_POST["kewarganegaraan"];
	$_SESSION["SD_telepon"]=$_POST["telepon"];
	$_SESSION["SD_status"]=$_POST["status"];
	$_SESSION["SD_kata_sandi"]=$_POST["kata_sandi"];
	$query=mysqli_query($db,"select * from tb_bendahara where nik='".$_POST['nik']."'");
	if (mysqli_num_rows($query)>0){
		echo"<script>alert('nik yang sama sudah ada');document.location='?page=bendahara';</script>";
	}else{
		mysqli_query($db,"insert into tb_bendahara (nik,nama,tempat_lahir,tanggal_lahir,alamat,kode_pos,rt_rw,kelurahan,kecamatan,kabupaten,provinsi,agama,status_perkawinan,kewarganegaraan,telepon,status,kata_sandi) values ('". $_SESSION["SD_nik"] ."','". $_SESSION["SD_nama"] ."','". $_SESSION["SD_tempat_lahir"] ."','". $tgl_benar ."','". $_SESSION["SD_alamat"] ."','". $_SESSION["SD_kode_pos"] ."','". $_SESSION["SD_rt_rw"] ."','". $_SESSION["SD_kelurahan"] ."','". $_SESSION["SD_kecamatan"] ."','". $_SESSION["SD_kabupaten"] ."','". $_SESSION["SD_provinsi"] ."','". $_SESSION["SD_agama"] ."','". $_SESSION["SD_status_perkawinan"] ."','". $_SESSION["SD_kewarganegaraan"] ."','". $_SESSION["SD_telepon"] ."','". $_SESSION["SD_status"] ."','". $_SESSION["SD_kata_sandi"] ."')");
		$_SESSION["SD_nik"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_kode_pos"]="";
		$_SESSION["SD_rt_rw"]="";
		$_SESSION["SD_kelurahan"]="";
		$_SESSION["SD_kecamatan"]="";
		$_SESSION["SD_kabupaten"]="";
		$_SESSION["SD_provinsi"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_status_perkawinan"]="";
		$_SESSION["SD_kewarganegaraan"]="Indonesia";
		$_SESSION["SD_telepon"]="";
		$_SESSION["SD_status"]="";
		$_SESSION["SD_kata_sandi"]="";
		echo "<script>alert('data tersimpan');document.location='?page=bendahara&aksi=hapus';</script>";
	}
}elseif (@$_POST['btnedit']){
	$_SESSION["SD_nik"]=$_POST["nik"];
	$_SESSION["SD_nama"]=$_POST["nama"];
	$_SESSION["SD_tempat_lahir"]=$_POST["tempat_lahir"];

	$tanggal = $_POST["tanggal_lahir"];
	function ubahTanggal($tanggal){
		$pisah = explode('/',$tanggal);
		$array = array($pisah[2],$pisah[0],$pisah[1]);
		$satukan = implode('-',$array);
		return $satukan;
	}
	$tgl_benar = ubahTanggal($tanggal).date(" H:s");
	
	$_SESSION["SD_tanggal_lahir"]=$_POST["tanggal_lahir"];	
	$_SESSION["SD_alamat"]=$_POST["alamat"];
	$_SESSION["SD_kode_pos"]=$_POST["kode_pos"];
	$_SESSION["SD_rt_rw"]=$_POST["rt_rw"];
	$_SESSION["SD_kelurahan"]=$_POST["kelurahan"];
	$_SESSION["SD_kecamatan"]=$_POST["kecamatan"];
	$_SESSION["SD_kabupaten"]=$_POST["kabupaten"];
	$_SESSION["SD_provinsi"]=$_POST["provinsi"];
	$_SESSION["SD_agama"]=$_POST["agama"];
	$_SESSION["SD_status_perkawinan"]=$_POST["status_perkawinan"];
	$_SESSION["SD_kewarganegaraan"]=$_POST["kewarganegaraan"];
	$_SESSION["SD_telepon"]=$_POST["telepon"];
	$_SESSION["SD_status"]=$_POST["status"];
	$_SESSION["SD_kata_sandi"]=$_POST["kata_sandi"];
	$query=mysqli_query($db,"select * from tb_bendahara where nik='".$_POST['nik']."' and nik<>'".$_GET['nik']."'");
	if (mysqli_num_rows($query)>0){
		echo"<script>alert('Kode persyaratan pelanggan yang sama sudah ada');document.location='?page=bendahara';</script>";
	}else{
		mysqli_query($db,"update tb_bendahara set nik='". $_SESSION["SD_nik"] ."',nama='". $_SESSION["SD_nama"] ."',tempat_lahir='". $_SESSION["SD_tempat_lahir"] ."',tanggal_lahir='". $tgl_benar ."',alamat='". $_SESSION["SD_alamat"] ."',kode_pos='". $_SESSION["SD_kode_pos"] ."',rt_rw='". $_SESSION["SD_rt_rw"] ."',kelurahan='". $_SESSION["SD_kelurahan"] ."',kecamatan='". $_SESSION["SD_kecamatan"] ."',kabupaten='". $_SESSION["SD_kabupaten"] ."',provinsi='". $_SESSION["SD_provinsi"] ."',agama='". $_SESSION["SD_agama"] ."',status_perkawinan='". $_SESSION["SD_status_perkawinan"] ."',kewarganegaraan='". $_SESSION["SD_kewarganegaraan"] ."',telepon='". $_SESSION["SD_telepon"] ."',status='". $_SESSION["SD_status"] ."',kata_sandi='". $_SESSION["SD_kata_sandi"] ."' where nik='".$_GET['nik']."'");
		$_SESSION["SD_nik"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_kode_pos"]="";
		$_SESSION["SD_rt_rw"]="";
		$_SESSION["SD_kelurahan"]="";
		$_SESSION["SD_kecamatan"]="";
		$_SESSION["SD_kabupaten"]="";
		$_SESSION["SD_provinsi"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_status_perkawinan"]="";
		$_SESSION["SD_kewarganegaraan"]="Indonesia";
		$_SESSION["SD_telepon"]="";
		$_SESSION["SD_status"]="";
		$_SESSION["SD_kata_sandi"]="";
		echo "<script>alert('data diedit');document.location='?page=sekretaris_desa_bendahara'</script>";
	}
}elseif (@$_GET['aksi']=='hapus' && @$_GET["pesan"]=="ya"){
		mysqli_query($db,"delete from tb_bendahara where nik='".$_GET['nik']."'");
		$_SESSION["SD_nik"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_kode_pos"]="";
		$_SESSION["SD_rt_rw"]="";
		$_SESSION["SD_kelurahan"]="";
		$_SESSION["SD_kecamatan"]="";
		$_SESSION["SD_kabupaten"]="";
		$_SESSION["SD_provinsi"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_status_perkawinan"]="";
		$_SESSION["SD_kewarganegaraan"]="Indonesia";
		$_SESSION["SD_telepon"]="";
		$_SESSION["SD_status"]="";
		$_SESSION["SD_kata_sandi"]="";
		echo "<script>alert('data telah dihapus');document.location='?page=sekretaris_desa_bendahara';</script>";
}elseif (@$_GET['aksi']=='batal_tambah'){
		$_SESSION["SD_nik"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_kode_pos"]="";
		$_SESSION["SD_rt_rw"]="";
		$_SESSION["SD_kelurahan"]="";
		$_SESSION["SD_kecamatan"]="";
		$_SESSION["SD_kabupaten"]="";
		$_SESSION["SD_provinsi"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_status_perkawinan"]="";
		$_SESSION["SD_kewarganegaraan"]="Indonesia";
		$_SESSION["SD_telepon"]="";
		$_SESSION["SD_status"]="";
		$_SESSION["SD_kata_sandi"]="";
		echo "<script>document.location='?page=sekretaris_desa_bendahara&aksi=tambah';</script>";
}elseif (@$_GET['aksi']=='batal_ubah'){
		$_SESSION["SD_nik"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_kode_pos"]="";
		$_SESSION["SD_rt_rw"]="";
		$_SESSION["SD_kelurahan"]="";
		$_SESSION["SD_kecamatan"]="";
		$_SESSION["SD_kabupaten"]="";
		$_SESSION["SD_provinsi"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_status_perkawinan"]="";
		$_SESSION["SD_kewarganegaraan"]="Indonesia";
		$_SESSION["SD_telepon"]="";
		$_SESSION["SD_status"]="";
		$_SESSION["SD_kata_sandi"]="";
		echo "<script>document.location='?page=sekretaris_desa_bendahara';</script>";
}elseif (@$_GET['aksi']=='batal_hapus'){
		$_SESSION["SD_nik"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_kode_pos"]="";
		$_SESSION["SD_rt_rw"]="";
		$_SESSION["SD_kelurahan"]="";
		$_SESSION["SD_kecamatan"]="";
		$_SESSION["SD_kabupaten"]="";
		$_SESSION["SD_provinsi"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_status_perkawinan"]="";
		$_SESSION["SD_kewarganegaraan"]="Indonesia";
		$_SESSION["SD_telepon"]="";
		$_SESSION["SD_status"]="";
		$_SESSION["SD_kata_sandi"]="";
		echo "<script>document.location='?page=sekretaris_desa_bendahara';</script>";
}
?>