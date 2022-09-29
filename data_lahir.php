<br>
<?php
$btsklm="style='box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.1);'";
if (!@$_SESSION['pswd']){
	$_SESSION["pswd"]="sembunyi";
	echo "<script>document.location='?page=data_lahir';</script>";
}
if (@$_GET['pswd']=='lihat'){
	$_SESSION["pswd"]=$_GET["pswd"];
	echo "<script>document.location='?page=data_lahir';</script>";
}
if (@$_GET['pswd']=='sembunyi'){
	$_SESSION["pswd"]=$_GET["pswd"];
	echo "<script>document.location='?page=data_lahir';</script>";
}
//echo @$_SESSION["pswd"];
?>

<?php
// $query_urut=mysqli_query($db,"select * from tb_data_lahir order by id_lahir desc");
// $urut=0;
//if (mysqli_num_rows($query_urut)>0){
//	$data=mysqli_fetch_array($query_urut);
//	$urut=substr($data["id_lahir "],1,1);
//}
//$urut=$urut+1;
//if ($urut>9){
//	$kdurut="P".$urut;
//}else{
//	$kdurut="P0".$urut;
//}

if(@$_POST['cari']){
		echo"<script>document.location='?page=data_lahir&cari=".$_POST["cari"]."';</script>";	
}?>

<?php if (@$_GET['aksi']=='edit'){
	$query_edit=mysqli_query($db,"select * from tb_data_lahir where id_lahir ='".$_GET['id_lahir ']."'");
	$data_edit=mysqli_fetch_array($query_edit);
	$_SESSION["SD_id_lahir"]=$data_edit["id_lahir"];
	$_SESSION["SD_nama_bayi"]=$data_edit["nama_bayi"];
	$_SESSION["SD_jenis_kelamin"]=$data_edit["jenis_kelamin"];
	$_SESSION["SD_tempat_lahir"]=$data_edit["tempat_lahir"];
	$_SESSION["SD_tanggal_lahir"]=$data_edit["tanggal_lahir"];
	$_SESSION["SD_alamat"]=$data_edit["alamat"];
	$_SESSION["SD_agama"]=$data_edit["agama"];
	$_SESSION["SD_hubungan_keluarga"]=$data_edit["hubungan_keluarga"];
	$_SESSION["SD_id_kk"]=$data_edit["id_kk"];
?> 

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Edit Data Lahir
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=data_lahir<?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="?page=data_lahir&nomor_kk =<?php  echo $_GET["nomor_kk "]; ?><?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>">
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
					<select name="nomor_kk" id="nomor_kk" onchange="submit()" required >
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
			  <td valign="top">Nama Bayi</td>
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
			  <td valign="top">Nagori</td>
			  <td valign="top">:</td>
			  <td>
				<select id="kelurahan" name="kelurahan"/>
					<option <?php if (@$_SESSION["SD_kelurahan"]=="Perasmian"){ echo "selected"; } ?>/>Perasmian</option>
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
			  <td valign="top">Kabupaten</td>
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
			</tr>
			<tr>
			  <td valign="top">Kewarganegaraan</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="kewarganegaraan" id="kewarganegaraan" maxlength="30" value="Indonesia" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Hubungan Keluarga</td>
			  <td valign="top">:</td>
			  <td>
				<select id="hubungan_keluarga" name="hubungan_keluarga"/>
					<option <?php if (@$_SESSION["SD_hubungan_keluarga"]=="Kepala Keluarga"){ echo "selected"; } ?>/>Kepala Keluarga</option>
					<option <?php if (@$_SESSION["SD_hubungan_keluarga"]=="Istri"){ echo "selected"; } ?>/>Istri</option>
					<option <?php if (@$_SESSION["SD_hubungan_keluarga"]=="Anak"){ echo "selected"; } ?>/>Anak</option>
					<option <?php if (@$_SESSION["SD_hubungan_keluarga"]=="Orang Tua"){ echo "selected"; } ?>/>Orang Tua</option>
					<option <?php if (@$_SESSION["SD_hubungan_keluarga"]=="Menantu"){ echo "selected"; } ?>/>Menantu</option>
					<option <?php if (@$_SESSION["SD_hubungan_keluarga"]=="Famili Lain"){ echo "selected"; } ?>/>Famili Lain</option>
				</select>
			  </td>
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
				<td height="36" colspan="3" bgcolor="" align="left">
				<input type="submit" name="btnedit" id="btnedit" value="Edit" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
				<a href="?page=data_lahir&aksi=batal_ubah<?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				</td>
			</tr>
      </table>
    </td>
  </tr>
</table>
</form>

<?php }elseif (@$_GET['aksi']=='hapus'){
	$query_hapus=mysqli_query($db,"select * from tb_data_lahir where nomor_kk='".$_GET['nomor_kk']."'");
	$data_hapus=mysqli_fetch_array($query_hapus);
	$_SESSION["SD_id_lahir"]=$data_hapus["id_lahir"];
	$_SESSION["SD_nama_bayi"]=$data_hapus["nama_bayi"];
	$_SESSION["SD_jenis_kelamin"]=$data_hapus["jenis_kelamin"];
	$_SESSION["SD_tempat_lahir"]=$data_hapus["tempat_lahir"];
	$_SESSION["SD_tanggal_lahir"]=$data_hapus["tanggal_lahir"];
	$_SESSION["SD_alamat"]=$data_hapus["alamat"];
	$_SESSION["SD_agama"]=$data_hapus["agama"];
	$_SESSION["SD_hubungan_keluarga"]=$data_hapus["hubungan_keluarga"];
	$_SESSION["SD_id_kk"]=$data_hapus["id_kk"];
?> 

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Yakin ingin menghapus data Lahir berikut?
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=data_lahir<?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
			  <td valign="top">Nama</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_nama_bayi"]; ?></td>
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
			  <td valign="top">Hubungan Keluarga</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_hubungan_keluarga"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">ID KK</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_id_kk"]; ?></td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="" align="left">
				<a href="?page=data_lahir&aksi=hapus&nomor_kk=<?php echo $_GET['nomor_kk']; ?><?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>&pesan=ya"><input type="button" name="button2" id="button2" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				<a href="?page=data_lahir&aksi=batal_hapus<?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
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
	<td width="20%"  bgcolor="white" align="right"><a href="?page=data_lahir<?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="?page=data_lahir<?php if(@$_GET["nomor_kk"]!=""){ echo "&nomor_kk=".$_GET["nomor_kk"]; } ?>">
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
					<select name="nomor_kk" id="nomor_kk" onchange="submit()" required >
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
			  <td valign="top">Nagori</td>
			  <td valign="top">:</td>
			  <td>
				<select id="kelurahan" name="kelurahan"/>
					<option <?php if (@$_SESSION["SD_kelurahan"]=="Perasmian"){ echo "selected"; } ?>/>Perasmian</option>
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
			  <td valign="top">Kabupaten</td>
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
			  <td valign="top">Hubungan Keluarga</td>
			  <td valign="top">:</td>
			  <td>
				<select id="hubungan_keluarga" name="hubungan_keluarga"/>
					<option <?php if (@$_SESSION["SD_hubungan_keluarga"]=="Kepala Keluarga"){ echo "selected"; } ?>/>Kepala Keluarga</option>
					<option <?php if (@$_SESSION["SD_hubungan_keluarga"]=="Istri"){ echo "selected"; } ?>/>Istri</option>
					<option <?php if (@$_SESSION["SD_hubungan_keluarga"]=="Anak"){ echo "selected"; } ?>/>Anak</option>
					<option <?php if (@$_SESSION["SD_hubungan_keluarga"]=="Orang Tua"){ echo "selected"; } ?>/>Orang Tua</option>
					<option <?php if (@$_SESSION["SD_hubungan_keluarga"]=="Menantu"){ echo "selected"; } ?>/>Menantu</option>
					<option <?php if (@$_SESSION["SD_hubungan_keluarga"]=="Famili Lain"){ echo "selected"; } ?>/>Famili Lain</option>
				</select>
			  </td>
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
				<td height="36" colspan="3" bgcolor="" align="left">
					<input type="submit" name="btnsimpan" id="btnsimpan" value="Simpan" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
					<a href="?page=data_lahir&aksi=batal_tambah"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
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
	<td width="80%"  bgcolor="white" >Data Lahir
		<a href="?page=data_lahir&aksi=tambah&nomor_kk=<?php echo @$_GET["nomor_kk"]; ?>"><input type="button" name="button" id="button2" value="+ Tambah" <?php echo "style='width:160px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
	</td>
  </tr>
</table>

<br>

<?php
$query=mysqli_query($db,"select * from tb_data_lahir where nomor_kk='".$_GET["nomor_kk"]."' order by nomor_kk asc");	
	if (mysqli_num_rows($query)>0){
		?>
		<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 2px #6c6969">
          <tr>
            <td width="100%" bgcolor="#6c6969"  background="img/blk.jpg" align="center">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
              <tr>
                <th width="100" <?php echo $btsklm; ?>>Nomor KK </th>
                <th width="100" <?php echo $btsklm; ?>>Nama Bayi</th>
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
					<?php if (@$_GET["nomor_kk"]==$data['nomor_kk']){
						echo "<font color='red'>".$data['nomor_kk']."</font>";
					}else{
						echo $data['nomor_kk'];
					} ?>
				</td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['nama']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['tempat_lahir']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo substr($data["tanggal_lahir"],8,2)."/".substr($data["tanggal_lahir"],5,2)."/".substr($data["tanggal_lahir"],0,4); ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['hubungan_keluarga']; ?></td>
                <td align="center" <?php echo $btsklm; ?>>
                <a href="?page=data_lahir&aksi=edit&nomor_kk=<?php echo $data['nomor_kk']; ?>&nomor_kk=<?php echo @$_GET["nomor_kk"]; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Ubah" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				<a href="?page=data_lahir&aksi=hapus&nomor_kk=<?php echo $data['nomor_kk']; ?>&nomor_kk=<?php echo @$_GET["nomor_kk"]; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
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
	<td width="80%"  bgcolor="white" >Data Lahir
		<a href="?page=data_lahir&aksi=tambah"><input type="button" name="button" id="button2" value="+ Tambah" <?php echo "style='width:160px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
		<a href="?page=data_lahir&kategori=data_lahir" target="_blank"><input type="button" name="button" id="button2" value="Cetak Laporan" <?php echo "style='width:160px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
	</td>
	<td width="20"  bgcolor="white">
		<form method="post"><input name="cari" type="text" placeholder="   Cari penduduk... " style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:97%"/></form>
    </td>
  </tr>
</table>

<br>

<?php
$query=mysqli_query($db,"select * from tb_data_lahir order by nomor_kk asc");	
if(@$_GET['cari']){
	if(@$_GET['cari']=="menikah" or @$_GET['cari']=="Menikah" or @$_GET['cari']=="nikah" or @$_GET['cari']=="Nikah"){
		$cri="Menikah";
		$query =mysqli_query($db,"select * from tb_data_lahir where nomr_kk like '%".$_GET['cari']."%' or nama like '%".$_GET['cari']."%' or nomor_kk like '%".$_GET['cari']."%' or status_perkawinan='".$cri."' order by nik asc");
	}else{
		//Ubah proram ini jika ingin menambah kategori pencarian
		$query =mysqli_query($db,"select * from tb_data_lahir where nomor_kk like '%".$_GET['cari']."%' or nama like '%".$_GET['cari']."%' or nomor_kk like '%".$_GET['cari']."%' or status_perkawinan like '%".$_GET['cari']."%' order by nik asc");		
	}
}elseif(@$_GET['nomor_kk']){
	$query =mysqli_query($db,"select * from tb_data_lahir where nomor_kk like '%".$_GET['nomor_kk']."%' order by nomor_kk asc");
}else{
	$query=mysqli_query($db,"select * from tb_data_lahir order by nomor_kk asc");	
}
	if (mysqli_num_rows($query)>0){
		?>
		<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 2px #6c6969">
          <tr>
            <td width="100%" bgcolor="#6c6969"  background="img/blk.jpg" align="center">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
              <tr>
                <th width="100" <?php echo $btsklm; ?>>Nomor KK </th>
                <th width="100" <?php echo $btsklm; ?>>Nama Bayi </th>
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
					<?php if (@$_GET["nomor_kk"]==$data['nomor_kk']){
						echo "<font color='red'>".$data['nomor_kk']."</font>";
					}else{
						echo $data['nomor_kk'];
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
                <a href="?page=data_lahir&aksi=edit&nomor_kk=<?php echo $data['nomor_kk']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Ubah" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				<a href="?page=data_lahir&aksi=hapus&nomor_kk=<?php echo $data['nomor_kk']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
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
	$_SESSION["SD_id_lahir"]=$_POST["id_lahir"];
	$_SESSION["SD_nama_bayi"]=$_POST["nama_bayi"];
	$_SESSION["SD_jenis_kelamin"]=$_POST["jenis_kelamin"];
	$_SESSION["SD_tempat_lahir"]=$data_e_POSTdit["tempat_lahir"];
	$_SESSION["SD_tanggal_lahir"]=$_POST["tanggal_lahir"];
	$_SESSION["SD_alamat"]=$_POST["alamat"];
	$_SESSION["SD_agama"]=$_POST["agama"];
	$_SESSION["SD_hubungan_keluarga"]=$_POST["hubungan_keluarga"];
	$_SESSION["SD_id_kk"]=$_POST["id_kk"];
	$query=mysqli_query($db,"select * from tb_data_lahir where id_lahir='".$_POST['id_lahir']."'");
	if (mysqli_num_rows($query)>0){
		if(@$_GET["nomor_kk"]!=""){
			echo "<script>alert('nomor_id yang sama sudah ada');document.location='?page=data_lahir&id_lahir=".$_GET["id_lahir"]."';</script>";
		}else{
			echo "<script>alert('nomor_id yang sama sudah ada');document.location='?page=data_lahir';</script>";
		}
	}else{
		mysqli_query($db,"insert into tb_data_lahir (id_lahir,nama_bayi,jenis_kelamin,tempat_lahir,tanggal_lahir,alamat,agama,hubungan_keluarga,id_kk) values ('". $_SESSION["SD_nik"] ."','". $_SESSION["SD_nomor_kk"] ."','". $_SESSION["SD_nama"] ."','". $_SESSION["SD_jenis_kelamin"] ."','". $_SESSION["SD_tempat_lahir"] ."','". $tgl_benar ."','". $_SESSION["SD_alamat"] ."','". $_SESSION["SD_kode_pos"] ."','". $_SESSION["SD_rt_rw"] ."','". $_SESSION["SD_kelurahan"] ."','". $_SESSION["SD_kecamatan"] ."','". $_SESSION["SD_kabupaten"] ."','". $_SESSION["SD_provinsi"] ."','". $_SESSION["SD_agama"] ."','". $_SESSION["SD_status_perkawinan"] ."','". $_SESSION["SD_pekerjaan"] ."','". $_SESSION["SD_kewarganegaraan"] ."','". $_SESSION["SD_telepon"] ."','". $_SESSION["SD_hubungan_keluarga"] ."','". $_SESSION["SD_status"] ."','". $_SESSION["SD_kata_sandi"] ."')");
		$_SESSION["SD_id_lahir"]="";
		$_SESSION["SD_nama_bayi"]="";
		$_SESSION["SD_jenis_kelamin"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_hubungan_keluarga"]="";
		$_SESSION["SD_id_kk"]="";
		if(@$_GET["id_lahir"]!=""){
			echo "<script>alert('data tersimpan');document.location='?page=data_lahir&nomor_kk=".$_GET["id_lahir"]."';</script>";
		}else{
			echo "<script>alert('data tersimpan');document.location='?page=data_lahir';</script>";
		}
	}
}elseif (@$_POST['btnedit']){
	$_SESSION["SD_id_lahir"]=$_POST["id_lahir"];
	$_SESSION["SD_nama_bayi"]=$_POST["nama_bayi"];
	$_SESSION["SD_jenis_kelamin"]=$_POST["jenis_kelamin"];
	$_SESSION["SD_tempat_lahir"]=$_POST["tempat_lahir"];
	$tanggal = $_POST["tanggal_lahir"];
	$tgl_benar = $tanggal;
	$_SESSION["SD_tanggal_lahir"]=$_POST["tanggal_lahir"];
	$_SESSION["SD_alamat"]=$_POST["alamat"];
	$_SESSION["SD_hubungan_keluarga"]=$_POST["hubungan_keluarga"];
	$_SESSION["SD_id_kk"]=$_POST["id_kk"];

	echo $_SESSION["SD_nomor_kk"]."<br>";
	echo $_GET["nomor_kk"]."<br>";
	$query666=mysqli_query($db,"select * from tb_data_lahir where id_lahir='".$_POST['id_lahir']."' and nomor_kk<>'".$_GET['id_lahir']."'");
	if (mysqli_num_rows($query666)>0){
		if(@$_GET["nomor_kk"]!=""){
			echo "<script>alert('nomor_kk yang sama sudah ada');document.location='?page=data_lahir&aksi=edit&id_lahir=".$_GET["id_lahir"]."&nomor_kk=".$_GET["nomor_kk"]."';</script>";
		}else{
			echo "<script>alert('nomor_kk yang sama sudah ada');document.location='?page=data_lahir&aksi=edit&id_lahir=".$_GET["id_lahir"]."';</script>";
		}
	}else{
		mysqli_query($db,"update tb_data_lahir set nomor_kk='". $_SESSION["SD_id_lahir"] ."',nomor_kk='". $_SESSION["SD_id_lahir"] ."',nama='". $_SESSION["SD_nama_bayi"] ."',jenis_kelamin='". $_SESSION["SD_jenis_kelamin"] ."',tempat_lahir='". $_SESSION["SD_tempat_lahir"] ."',tanggal_lahir='". $tgl_benar ."',alamat='". $_SESSION["SD_alamat"] ."',agama='". $_SESSION["SD_agama"] ."',hubungan_keluarga='". $_SESSION["SD_hubungan_keluarga"] ."',id_kk='". $_SESSION["SD_id_kk"] ."' where id_kk='".$_GET['id_kk']."'");
		$_SESSION["SD_id_lahir"]="";
		$_SESSION["SD_nama_bayi"]="";
		$_SESSION["SD_jenis_kelamin"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_hubungan_keluarga"]="";
		$_SESSION["SD_id_kk"]="";
		
		if(@$_GET["nomor_kk"]!=""){
			echo "<script>alert('data telah diedit');document.location='?page=data_lahir&nomor_kk=".$_GET["id_lahir"]."';</script>";
		}else{
			echo "<script>alert('data telah diedit');document.location='?page=data_lahir';</script>";
		}
	}
}elseif (@$_GET['aksi']=='hapus' && @$_GET["pesan"]=="ya"){
		mysqli_query($db,"delete from tb_data_lahir where id_lahir='".$_GET['id_lahir']."'");
		$_SESSION["SD_id_lahir"]="";
		$_SESSION["SD_nama_bayi"]="";
		$_SESSION["SD_jenis_kelamin"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_hubungan_keluarga"]="";
		$_SESSION["SD_id_kk"]="";
		
		if(@$_GET["id_lahir"]!=""){
			echo "<script>alert('data telah dihapus');document.location='?page=data_lahir&id_lahir=".$_GET["id_lahir"]."';</script>";
		}else{
			echo "<script>alert('data telah dihapus');document.location='?page=data_lahir';</script>";
		}
}elseif (@$_GET['aksi']=='batal_tambah'){
	
		$_SESSION["SD_id_lahir"]="";
		$_SESSION["SD_nama_bayi"]="";
		$_SESSION["SD_jenis_kelamin"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_hubungan_keluarga"]="";
		$_SESSION["SD_id_kk"]="";

		if(@$_GET["id_lahir"]!=""){
			echo "<script>document.location='?page=data_lahir&id_lahir=".$_GET["id_lahir"]."';</script>";
		}else{
			echo "<script>document.location='?page=data_lahir';</script>";
		}
}elseif (@$_GET['aksi']=='batal_ubah'){

		$_SESSION["SD_id_lahir"]="";
		$_SESSION["SD_nama_bayi"]="";
		$_SESSION["SD_jenis_kelamin"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_hubungan_keluarga"]="";
		$_SESSION["SD_id_kk"]="";
		if(@$_GET["id_lahir"]!=""){
			echo "<script>document.location='?page=data_lahir&id_lahir=".$_GET["id_lahir"]."';</script>";
		}else{
			echo "<script>document.location='?page=data_lahir';</script>";
		}
}elseif (@$_GET['aksi']=='batal_hapus'){
		
		$_SESSION["SD_id_lahir"]="";
		$_SESSION["SD_nama_bayi"]="";
		$_SESSION["SD_jenis_kelamin"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_hubungan_keluarga"]="";
		$_SESSION["SD_id_kk"]="";
		if(@$_GET["nomor_kk"]!=""){
			echo "<script>document.location='?page=data_lahir&id_lahir=".$_GET["id_lahir"]."';</script>";
		}else{
			echo "<script>document.location='?page=data_lahir';</script>";
		}
}
?>