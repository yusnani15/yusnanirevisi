<!-- Program surat ahli waris -->
<br>
<?php
$btsklm="style='box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.1);'";
if (!@$_SESSION['pswd']){
	$_SESSION["pswd"]="sembunyi";
	echo "<script>document.location='?page=surat_ahli_waris';</script>";
}
if (@$_GET['pswd']=='lihat'){
	$_SESSION["pswd"]=$_GET["pswd"];
	echo "<script>document.location='?page=surat_ahli_waris';</script>";
}
if (@$_GET['pswd']=='sembunyi'){
	$_SESSION["pswd"]=$_GET["pswd"];
	echo "<script>document.location='?page=surat_ahli_waris';</script>";
}
//echo @$_SESSION["pswd"];
?>

<?php
if(@$_POST['cari']){
		echo"<script>document.location='?page=surat_ahli_waris&cari=".$_POST["cari"]."';</script>";
}?>

<?php if (@$_GET['aksi']=='edit'){
	$query_edit=mysqli_query($db,"select * from tb_surat_ahli_waris where nomor='".$_GET['nomor']."'");
	$data_edit=mysqli_fetch_array($query_edit);
	$_SESSION["SD_nomor"]=$data_edit["nomor"];
	$_SESSION["SD_nik"]=$data_edit["nik"];


	$query_pdd=mysqli_query($db,"select * from tb_penduduk where nik='".$data_edit['nik']."'");
	$data_pdd=mysqli_fetch_array($query_pdd);
	$_SESSION["SD_nama"]=$data_pdd["nama"];
	$_SESSION["SD_tempat_lahir"]=$data_pdd["tempat_lahir"];
	$_SESSION["SD_tanggal_lahir"]=substr($data_pdd["tanggal_lahir"],8,2)."/".substr($data_pdd["tanggal_lahir"],5,2)."/".substr($data_pdd["tanggal_lahir"],0,4);
	$_SESSION["SD_jenis_kelamin"]=$data_pdd["jenis_kelamin"];
	$_SESSION["SD_agama"]=$data_pdd["agama"];
	$_SESSION["SD_kewarganegaraan"]=$data_pdd["kewarganegaraan"];
	$_SESSION["SD_alamat"]=$data_edit["alamat"];
	$_SESSION["SD_nama_usaha"]=$data_edit["nama_usaha"];
	$_SESSION["SD_pekerjaan"]=$data_edit["pekerjaan"];

?> 

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Edit Surat Keterangan Ahli Waris
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=surat_ahli_waris"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<table width="99%" border="1" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="1" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
			  <td width="190">Nomor</td>
			  <td width="1">:</td>
			  <td width="auto"><input type="text" name="nomor" id="nomor" maxlength="20" value="<?php echo @$_SESSION["SD_nomor"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td width="190">NIK</td>
			  <td width="1">:</td>
			  <td width="auto"><input type="text" name="nik" id="nik" maxlength="20" value="<?php echo @$_SESSION["SD_nik"]; ?>"  readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Nama</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="nama" id="nama" maxlength="30" value="<?php echo @$_SESSION["SD_nama"]; ?>" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Jenis Kelamin</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="nama" id="nama" maxlength="30" value="<?php echo @$_SESSION["SD_jenis_kelamin"]; ?>" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Tempat Lahir</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="tempat_lahir" id="tempat_lahir" maxlength="30" value="<?php echo @$_SESSION["SD_tempat_lahir"]; ?>" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Tanggal Lahir</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="tanggal_lahir" id="tanggal_lahir" maxlength="12" value="<?php echo @$_SESSION["SD_tanggal_lahir"]; ?>" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Agama</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="agama" id="agama" maxlength="30" value="<?php echo @$_SESSION["SD_agama"]; ?>" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Kewarganegaraan</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="kewarganegaraan" id="kewarganegaraan" maxlength="30" value="Indonesia" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Alamat</td>
			  <td valign="top">:</td>
			  <td><textarea name="alamat" id="alamat" required style="width:50%;height:50px;" readonly="readonly"><?php echo @$_SESSION["SD_alamat"]; ?></textarea></td>
			</tr>
			<tr>
			  <td valign="top">Pekerjaan</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="pekerjaan" id="pekerjaan" maxlength="30" value="<?php echo @$_SESSION["SD_pekerjaan"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Nama Usaha</td>
			  <td valign="top">:</td>
			  <td><textarea name="nama_usaha" id="nama_usaha" required style="width:50%;height:50px;"><?php echo @$_SESSION["SD_nama_usaha"]; ?></textarea></td>
			</tr>
			<tr>
				<td valign="top">KTP</td>
				<td valign="top">:</td>
				<td valign="top"><label for="gambar"></label>
					<input type="file" name="gambar_ktp" id="gambar_ktp" accept="image/*" required />
					<br>
					<img src="Img_Alumni/<?php echo "ahli_waris_ktp_".$data_edit['nomor'].".jpg"; ?>" width="100" />
				</td>
			</tr>
			<tr>
				<td valign="top">KK</td>
				<td valign="top">:</td>
				<td valign="top"><label for="gambar"></label>
					<input type="file" name="gambar_kk" id="gambar_kk" accept="image/*" required />
					<br>
					<img src="Img_Alumni/<?php echo "ahli_waris_kk_".$data_edit['nomor'].".jpg"; ?>" width="100" />
				</td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="#ffffcc" align="left">
				<input type="submit" name="btnedit" id="btnedit" value="Edit" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
				<a href="?page=surat_ahli_waris&aksi=batal_ubah"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				</td>
			</tr>
      </table>
    </td>
  </tr>
</table>
</form>

<?php }elseif (@$_GET['aksi']=='hapus'){
	$query_hapus=mysqli_query($db,"select * from tb_surat_ahli_waris where nomor='".$_GET['nomor']."'");
	$data_hapus=mysqli_fetch_array($query_hapus);
	$_SESSION["SD_nomor"]=$data_hapus["nomor"];
	$_SESSION["SD_nik"]=$data_hapus["nik"];

	$query_pdd=mysqli_query($db,"select * from tb_penduduk where nik='".$data_hapus['nik']."'");
	$data_pdd=mysqli_fetch_array($query_pdd);

	$_SESSION["SD_nama"]=$data_pdd["nama"];
	$_SESSION["SD_tempat_lahir"]=$data_pdd["tempat_lahir"];
	$_SESSION["SD_tanggal_lahir"]=substr($data_pdd["tanggal_lahir"],8,2)."/".substr($data_pdd["tanggal_lahir"],5,2)."/".substr($data_pdd["tanggal_lahir"],0,4);
	$_SESSION["SD_jenis_kelamin"]=$data_pdd["jenis_kelamin"];
	$_SESSION["SD_agama"]=$data_pdd["agama"];
	$_SESSION["SD_kewarganegaraan"]=$data_pdd["kewarganegaraan"];
	$_SESSION["SD_alamat"]=$data_pdd["alamat"];
	$_SESSION["SD_pekerjaan"]=$data_pdd["pekerjaan"];
?> 

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Yakin ingin menghapus data Surat Keterangan Ahli Waris berikut?
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=surat_ahli_waris"><font color="red">X</font></a>
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
			  <td width="190">Nomor</td>
			  <td width="1">:</td>
			  <td width="auto"><?php echo @$_SESSION["SD_nomor"]; ?></td>
			  <td width="500" rowspan="12" valign="top" style="border:solid 1px grey">
					<center><b>AHLI WARIS</b></center>
					<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 2px #6c6969">
						<tr>
							<td width="100%" bgcolor="#6c6969"  background="img/blk.jpg" align="center">
								<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
									<tr>
										<td width="150" align="center" <?php echo $btsklm; ?>><strong>NIK</strong></td>
										<td width="190" align="center" <?php echo $btsklm; ?>><strong>Nama</strong></td>
									</tr>
									<?php
									$query_waris=mysqli_query($db,"select * from tb_ahli_waris_detail where nomor='".$_SESSION["SD_nomor"]."'");
									while($data_waris=mysqli_fetch_array($query_waris)){
										$query_dr=mysqli_query($db,"select * from tb_penduduk where nik='".$data_waris["nik"]."'");
										$nama2="-";
										if(mysqli_num_rows($query_dr)>0){
											$data_dr=mysqli_fetch_array($query_dr);
											$nama2=$data_dr["nama"];
										}
										?>
									<tr>
									
										<td align="center" <?php echo $btsklm; ?>><?php echo $data_waris["nik"]; ?></td>
										<td align="center" <?php echo $btsklm; ?>><?php echo $nama2; ?></td>
									</tr>
									<?php } ?>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
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
			  <td valign="top">Jenis Kelamin</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_jenis_kelamin"]; ?></td>
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
			  <td valign="top">Agama</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_agama"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Kewarganegaraan</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_kewarganegaraan"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Alamat</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_alamat"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Pekerjaan</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_pekerjaan"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Pekerjaan</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_pekerjaan"]; ?></td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="" align="left">
				<a href="?page=surat_ahli_waris&aksi=hapus&nomor=<?php echo $_GET['nomor']; ?>&pesan=ya"><input type="button" name="button2" id="button2" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				<a href="?page=surat_ahli_waris&aksi=batal_hapus"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
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
	<td width="80%"  bgcolor="white" >Tambah Surat Keterangan Ahli Waris
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=surat_ahli_waris"><font color="red">X</font></a>
	</td>
  </tr>
</table>
<?php
if(@$_SESSION["yusnani_status"]=="Penduduk"){
	$query_tambah=mysqli_query($db,"select * from tb_penduduk where nik='".$_SESSION['yusnani_nik']."'");
	$data_tambah=mysqli_fetch_array($query_tambah);
	$_SESSION["SD_nik"]=$data_tambah["nik"];
}else{
	$query_tambah=mysqli_query($db,"select * from tb_penduduk where nik='".@$_SESSION['SD_nik']."'");
	$data_tambah=mysqli_fetch_array($query_tambah);
}
	$_SESSION["SD_nama"]=@$data_tambah["nama"];
	$_SESSION["SD_tempat_lahir"]=@$data_tambah["tempat_lahir"];
	$_SESSION["SD_tanggal_lahir"]=substr(@$data_tambah["tanggal_lahir"],8,2)."/".substr(@$data_tambah["tanggal_lahir"],5,2)."/".substr(@$data_tambah["tanggal_lahir"],0,4);
	$_SESSION["SD_jenis_kelamin"]=@$data_tambah["jenis_kelamin"];
	$_SESSION["SD_agama"]=@$data_tambah["agama"];
	$_SESSION["SD_kewarganegaraan"]=@$data_tambah["kewarganegaraan"];
	$_SESSION["SD_alamat"]=@$data_tambah["alamat"];
	$_SESSION["SD_pekerjaan"]=@$data_tambah["pekerjaan"];

$nomor_surat=0;
$query_usaha=mysqli_query($db,"select * from tb_surat_ahli_waris order by nomor desc");
$nomor_surat_ahli_waris=0;
if(mysqli_num_rows($query_usaha)>0){
	$data_usaha=mysqli_fetch_array($query_usaha);
	$nomor_surat_ahli_waris=$data_usaha["nomor"];
}
if($nomor_surat_ahli_waris>0){
	$nomor_surat=$nomor_surat_ahli_waris;
}
$nomor_surat=$nomor_surat+1;
$_SESSION["SD_nomor"]=$nomor_surat;
?>
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
				<td width="190">Nomor</td>
				<td width="1">:</td>
				<td width="auto"><input type="text" name="nomor" id="nomor" maxlength="20" value="<?php echo @$_SESSION["SD_nomor"]; ?>" readonly="readonly" required style="width:150px"/></td>
				<td width="500" rowspan="12" valign="top" style="border:solid 1px grey">
					<center><b>AHLI WARIS</b></center>
					<form method="post">
						<select name="nik_pewaris" id="nik_pewaris" onchange="submit()" required >
							<?php
							$query=mysqli_query($db,"select * from tb_penduduk");							
							echo '<option value="">-Pilih-</option>';							
							while ($row=mysqli_fetch_array($query)){?>
								<option value="<?php  echo $row['nik']; ?>"><?php echo $row['nik']." - ".$row['nama']; ?></option>
							<?php } ?>
						</select>
					</form>
					<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 2px #6c6969">
						<tr>
							<td width="100%" bgcolor="#6c6969"  background="img/blk.jpg" align="center">
								<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
									<tr>
										<td width="150" align="center" <?php echo $btsklm; ?>><strong>NIK</strong></td>
										<td width="190" align="center" <?php echo $btsklm; ?>><strong>Nama</strong></td>
										<td width="20" align="center" <?php echo $btsklm; ?>><strong>Aksi</strong></td>
									</tr>
									<?php
									$query_waris=mysqli_query($db,"select * from tb_waris where pemilik='".@$_SESSION["SD_nik"]."'");
									while($data_waris=mysqli_fetch_array($query_waris)){
										$query_dr=mysqli_query($db,"select * from tb_penduduk where nik='".$data_waris["nik"]."'");
										if(mysqli_num_rows($query_dr)>0){
											$data_dr=mysqli_fetch_array($query_dr);
										}else{
											mysqli_query($db,"delete from tb_waris where pemilik='".@$_SESSION["SD_nik"]."' and nik='".$data_waris["nik"]."'");
											echo"<script>document.location='?page=surat_ahli_waris&aksi=tambah';</script>";
										}
									?>
									<tr>
									
										<td align="center" <?php echo $btsklm; ?>><?php echo $data_waris["nik"]; ?></td>
										<td align="center" <?php echo $btsklm; ?>><?php echo $data_dr["nama"]; ?></td>
										<td align="center" <?php echo $btsklm; ?>>
											<a href="?page=surat_ahli_waris&aksi=tambah&ak=hapus_pewaris&id_waris=<?php echo $data_waris["id_waris"]; ?>"><input type="button" name="button2" id="button2" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
										</td>
									</tr>
									<?php } ?>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
			<tr>
				<td width="190">NIK</td>
				<td width="1">:</td>
				<td width="auto">
					<select name="nik" id="nik" onchange="submit()" required >
						<?php
						if($_SESSION["yusnani_status"]=="Penduduk"){
							$query=mysqli_query($db,"select * from tb_penduduk where nik='".$_SESSION["SD_nik"]."'");							
						}else{
							$query=mysqli_query($db,"select * from tb_penduduk order by nik asc");
							echo '<option value="">-Pilih-</option>';							
						}						
						while ($row=mysqli_fetch_array($query)){ ?>
							<option name="nik" value="<?php  echo $row['nik']; ?>" <?php if(@$_SESSION["SD_nik"]==$row["nik"]){ echo"selected"; } ?>><?php echo $row['nik']." - ".$row['nama']; ?></option>
						<?php } ?>
					</select>

					
					<script type="text/javascript">
					<?php echo $jsArray; ?>
					function changeValue(id){
						document.getElementById('nama').value=prdName[id].nama;
						document.getElementById('jenis_kelamin').value=prdName[id].jenis_kelamin;
						document.getElementById('tempat_lahir').value=prdName[id].tempat_lahir;
						document.getElementById('tanggal_lahir').value=prdName[id].tanggal_lahir;
						document.getElementById('kewarganegaraan').value=prdName[id].kewarganegaraan;
						document.getElementById('agama').value=prdName[id].agama;
						document.getElementById('alamat').value=prdName[id].alamat;
						document.getElementById('pekerjaan').value=prdName[id].pekerjaan;
					};
					</script>						
				</td>
			</tr>
			</form>
			<tr>
				<td valign="top">Nama</td>
				<td valign="top">:</td>
				<td><input type="text" name="nama" id="nama" maxlength="30" value="<?php echo @$_SESSION["SD_nama"]; ?>" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
				<td valign="top">Jenis Kelamin</td>
				<td valign="top">:</td>
				<td><input type="text" name="jenis_kelamin" id="jenis_kelamin" maxlength="30" value="<?php echo @$_SESSION["SD_jenis_kelamin"]; ?>" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
				<td valign="top">Tempat Lahir</td>
				<td valign="top">:</td>
				<td><input type="text" name="tempat_lahir" id="tempat_lahir" maxlength="30" value="<?php echo @$_SESSION["SD_tempat_lahir"]; ?>" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
				<td valign="top">Tanggal Lahir</td>
				<td valign="top">:</td>
				<td><input type="text" name="tanggal_lahir" id="tanggal_lahir" maxlength="12" value="<?php echo @$_SESSION["SD_tanggal_lahir"]; ?>" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
				<td valign="top">Kewarganegaraan</td>
				<td valign="top">:</td>
				<td><input type="text" name="kewarganegaraan" id="kewarganegaraan" maxlength="12" value="<?php echo @$_SESSION["SD_kewarganegaraan"]; ?>" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
				<td valign="top">Agama</td>
				<td valign="top">:</td>
				<td><input type="text" name="agama" id="agama" maxlength="12" value="<?php echo @$_SESSION["SD_agama"]; ?>" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
				<td valign="top">Alamat</td>
				<td valign="top">:</td>
				<td><textarea name="alamat" id="alamat" readonly="readonly" required style="width:90%;height:50px;"><?php echo @$_SESSION["SD_alamat"]; ?></textarea></td>
			</tr>
			<tr>
				<td valign="top">Pekerjaan</td>
				<td valign="top">:</td>
				<td><input type="text" name="pekerjaan" id="pekerjaan" maxlength="30" value="<?php echo @$_SESSION["SD_pekerjaan"]; ?>" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
			<tr>
				<td valign="top">KTP</td>
				<td valign="top">:</td>
				<td valign="top"><label for="gambar"></label>
					<input type="file" name="gambar_ktp" id="gambar_ktp" accept="image/*" required/><br>
					  <small class="text-danger font-weight-bold">KTP harus berformat image(jpg/png) </small><br/>
				</td>
			</tr>
			<tr>
			
				<td valign="top">KK</td>
				<td valign="top">:</td>
				<td valign="top"><label for="gambar"></label>
					<input type="file" name="gambar_kk" id="gambar_kk" accept="image/*" required/><br>
										  <small class="text-danger font-weight-bold">KK harus berformat image(jpg/png)</small><br/>
				</td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="" align="left">
					<input type="submit" name="btnsimpan" id="btnsimpan" value="Simpan" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
					<a href="?page=surat_ahli_waris&aksi=batal_tambah"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				</td>
			</tr>
			</form>
		</table>
    </td>
  </tr>
</table>
<?php 
}else{
?>

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Surat Keterangan Ahli Waris
		<?php if (@$_SESSION["yusnani_status"]=="Penduduk" or @$_SESSION["yusnani_status"]=="Sekretaris Desa"){ ?>
			<a href="?page=surat_ahli_waris&aksi=tambah"><input type="button" name="button" id="button2" value="+ Tambah" <?php echo "style='width:160px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
		<?php } ?>
	</td>
  </tr>
</table>

<br>

<?php
if (@$_SESSION["yusnani_status"]=="Sekretaris Desa"){
	$query=mysqli_query($db,"select * from tb_surat_ahli_waris order by nomor asc");
	if(@$_GET['cari']){
		$query =mysqli_query($db,"select * from tb_surat_ahli_waris where nomor like '%".$_GET['cari']."%' or nama like '%".$_GET['cari']."%' order by nomor asc");
	}elseif(@$_GET['nomor']){
		$query =mysqli_query($db,"select * from tb_surat_ahli_waris where nomor like '%".$_GET['nomor']."%' order by nomor asc");
	}else{
		$query=mysqli_query($db,"select * from tb_surat_ahli_waris order by nomor asc");	
	}	
}elseif (@$_SESSION["yusnani_status"]=="Penduduk"){
	$query=mysqli_query($db,"select * from tb_surat_ahli_waris where nik='".$_SESSION["yusnani_nik"]."' order by nomor asc");	
	if(@$_GET['cari']){
		$query =mysqli_query($db,"select * from tb_surat_ahli_waris where nik='".$_SESSION["yusnani_nik"]."'and (nomor like '%".$_GET['cari']."%' or nama like '%".$_GET['cari']."%') order by nomor asc");
	}elseif(@$_GET['nomor']){
		$query =mysqli_query($db,"select * from tb_surat_ahli_waris where nik='".$_SESSION["yusnani_nik"]."' and (nomor like '%".$_GET['nomor']."%') order by nomor asc");
	}else{
		$query=mysqli_query($db,"select * from tb_surat_ahli_waris where nik='".$_SESSION["yusnani_nik"]."' order by nomor asc");	
	}		
}
	if (mysqli_num_rows($query)>0){
		?>
		<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 2px #6c6969">
          <tr>
            <td width="100%" bgcolor="#6c6969"  background="img/blk.jpg" align="center">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
              <tr>
                <th width="200" <?php echo $btsklm; ?>>Nomor Surat</th>
				<?php if (@$_SESSION["yusnani_status"]=="Sekretaris Desa"){?>
					<th width="200" <?php echo $btsklm; ?>>Penduduk</th>
				<?php } ?>
				<th width="150" <?php echo $btsklm; ?>>Tanggal Pengajuan</th>
                <th width="150" <?php echo $btsklm; ?>>Lampiran</th>
                <th width="150" <?php echo $btsklm; ?>>Status</th>
                <th width="180" <?php echo $btsklm; ?>>Aksi</th>
              </tr>
              <?php while ($data=mysqli_fetch_array($query)){
				$query_penduduk =mysqli_query($db,"select * from tb_penduduk where nik='".$data["pemilik"]."'");
				$nik=$data["nik"];
				$nama="-";
				$tempat_lahir="-";
				$tanggal_lahir="-";
				$bangsa="Indonesia";
				$agama="-";
				$jenis_kelamin="-";
				if(mysqli_num_rows($query_penduduk)>0){
					$data_penduduk=mysqli_fetch_array($query_penduduk);
					$nik=$data_penduduk["nik"];
					$nama=$data_penduduk["nama"];
					$tempat_lahir=$data_penduduk["tempat_lahir"];
					$tanggal_lahir=substr($data_penduduk["tanggal_lahir"],8,2)."/".substr($data_penduduk["tanggal_lahir"],5,2)."/".substr($data_penduduk["tanggal_lahir"],0,4);
					$kewarganegaraan=$data_penduduk["kewarganegaraan"];
					$agama=$data_penduduk["agama"];
					$jenis_kelamin=$data_penduduk["jenis_kelamin"];
					//$pekerjaan="-";
					//$alamat="-";
				}
			  ?>
              <tr>
                <td height="1" bgcolor="#6c6969" colspan="9"></td>
              </tr>
              <tr>
                <td align="center">
					<?php
						$nomor=$data["nomor"];
						if($nomor<10){
							$nomor="000".$nomor;
						}elseif($nomor<100){
							$nomor="00".$nomor;
						}elseif($nomor<1000){
							$nomor="0".$nomor;
						}else{
							$nomor=$nomor;
						}
					$tahun_disetujui=substr($data["tanggal_disetujui"],0,4);
					$bulan_disetujui=substr($data["tanggal_disetujui"],5,2);
					if($bulan_disetujui<7){
						$periode=($tahun_disetujui-1)."/".$tahun_disetujui;
					}else{
						$periode=$tahun_disetujui."/".($tahun_disetujui+1);		
					}				
					echo "470/".$nomor."/".$periode;				
					?>
				</td>
				<?php if (@$_SESSION["yusnani_status"]=="Sekretaris Desa"){?>
					<td align="center" <?php echo $btsklm; ?>><?php echo "NIK: ".$nik."<br>Nama: ".$nama;?></td>
				<?php } ?>
                <td align="center" <?php echo $btsklm; ?>><?php echo substr($data["tanggal"],8,2)."/".substr($data["tanggal"],5,2)."/".substr($data["tanggal"],0,4); ?></td>
                <td align="center" <?php echo $btsklm; ?>>
					<?php
					echo "KK :<a href='img/file/ahli_waris_kk_".$data['nomor'].".jpg' target='_blank'>kk_".$data['nomor'].".jpg</a><br>";
					echo "KTP :<a href='img/file/ahli_waris_ktp_".$data['nomor'].".jpg' target='_blank'>ktp_".$data['nomor'].".jpg</a>";
					?>				
				</td>
                <td align="center" <?php echo $btsklm; ?>><?php if($data['status']=="Belum Divalidasi"){ echo "Sedang Diproses"; }else{echo $data['status'];} ?></td>
                <td align="center" <?php echo $btsklm; ?>>
					<?php if (@$_SESSION["yusnani_status"]=="Penduduk"){?>
						<?php if ($data["status"]=="Belum Divalidasi"){?>
							<!--<a href="?page=surat_ahli_waris&aksi=cetak&nomor=<?php echo $data['nomor']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Cetak" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>-->
							<a href="?page=surat_ahli_waris&aksi=hapus&nomor=<?php echo $data['nomor']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
						<?php } ?>
						<?php if ($data["status"]=="Telah Divalidasi"){?>
							<a href="cetak_surat_ahli_waris.php?aksi=cetak&nomor=<?php echo $data['nomor']; ?>" target="_blank"><input type="button" name="btnlogin" id="btnlogin" value="Cetak" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
							<!--<a href="?page=surat_ahli_waris&aksi=hapus&nomor=<?php echo $data['nomor']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>-->
						<?php } ?>
						<?php if ($data["status"]=="Tidak Disetujui"){?>
							<!--<a href="?page=surat_ahli_waris&aksi=cetak&nomor=<?php echo $data['nomor']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Cetak" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>-->
							<!--<a href="?page=surat_ahli_waris&aksi=hapus&nomor=<?php echo $data['nomor']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>-->
							<input type="button" name="btnlogin" id="btnlogin" value="...!..." <?php echo "style='width:100px;border:0px;background-color:#ffcc99;height:30px;color:black;'"; ?>/>
						<?php } ?>
					<?php } ?>
					<?php if (@$_SESSION["yusnani_status"]=="Sekretaris Desa"){?>
						<?php if ($data["status"]=="Belum Divalidasi"){?>
							<a href="cetak_surat_ahli_waris.php?aksi=cetak&nomor=<?php echo $data['nomor']; ?>" target="_blank"><input type="button" name="btnlogin" id="btnlogin" value="Cek Surat" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
							<a href="?page=surat_ahli_waris&aksi=validasi&nomor=<?php echo $data['nomor']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Validasi" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
							<a href="?page=surat_ahli_waris&aksi=tolak&nomor=<?php echo $data['nomor']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Tolak" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
						<?php } ?>
						<?php if ($data["status"]=="Telah Divalidasi"){?>
							<a href="cetak_surat_ahli_waris.php?aksi=cetak&nomor=<?php echo $data['nomor']; ?>" target="_blank"><input type="button" name="btnlogin" id="btnlogin" value="Cetak" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
							<!--<a href="?page=surat_ahli_waris&aksi=validasi&nomor=<?php echo $data['nomor']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Validasi" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>-->
							<a href="?page=surat_ahli_waris&aksi=tolak&nomor=<?php echo $data['nomor']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Tolak" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
						<?php } ?>
						<?php if ($data["status"]=="Tidak Disetujui"){?>
							<a href="?page=surat_ahli_waris&aksi=validasi&nomor=<?php echo $data['nomor']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Validasi" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
							<!--<a href="?page=surat_ahli_waris&aksi=tolak&nomor=<?php echo $data['nomor']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Tolak" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>-->
						<?php } ?>
					<?php } ?>
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
if(@$_POST["nik"]){
	$_SESSION["SD_nik"]=$_POST["nik"];
	//mysqli_query("insert into tb_waris (nik) value ('".$_POST["nik_pewaris"]."')");
	echo"<script>document.location='?page=surat_ahli_waris&aksi=tambah';</script>";
}

if(@$_GET["ak"]=="hapus_pewaris"){
	mysqli_query($db,"delete from tb_waris where id_waris='".$_GET["id_waris"]."'");
	echo"<script>document.location='?page=surat_ahli_waris&aksi=tambah';</script>";
}

if(@$_POST["nik_pewaris"]){
	echo"pewarisssssssss<br>";
	echo $_POST["nik_pewaris"]."<br>";
	echo $_SESSION["SD_nik"]."<br>";
	if(@$_SESSION["SD_nik"]!=""){
		$query345=mysqli_query($db,"select * from tb_waris where pemilik='".$_SESSION["SD_nik"]."' and nik='".$_POST["nik_pewaris"]."'");
		if(mysqli_num_rows($query345)>0){
			echo"<script>alert('Ahli waris yang sama sudah ada');document.location='?page=surat_ahli_waris&aksi=tambah';</script>";		
		}else{
			mysqli_query($db,"insert into tb_waris (nik,pemilik) values ('".$_POST["nik_pewaris"]."','".$_SESSION["SD_nik"]."')");
			echo"<script>document.location='?page=surat_ahli_waris&aksi=tambah';</script>";
		}
	}else{
		echo"<script>alert('Pilih NIK');document.location='?page=surat_ahli_waris&aksi=tambah';</script>";		
	}
}

if (@$_POST['btnsimpan']){
	$nomor_surat=0;
	$query_usaha=mysqli_query($db,"select * from tb_surat_ahli_waris order by nomor desc");
	$nomor_surat_ahli_waris=0;
	if(mysqli_num_rows($query_usaha)>0){
		$data_usaha=mysqli_fetch_array($query_usaha);
		$nomor_surat_ahli_waris=$data_usaha["nomor"];
	}
	if($nomor_surat_ahli_waris>0){
		$nomor_surat=$nomor_surat_ahli_waris;
	}
	$nomor_surat=$nomor_surat+1;
	$_SESSION["SD_nomor"]=$nomor_surat;
	if($_SESSION["SD_nik"]==""){
		echo"<script>alert('Pilih NIK');document.location='?page=surat_ahli_waris&aksi=tambah';</script>";
	}else{
		$query=mysqli_query($db,"select * from tb_surat_ahli_waris where nomor='".$_SESSION['SD_nomor']."'");
		if (mysqli_num_rows($query)>0){
			echo"<script>alert('nomor yang sama sudah ada');document.location='?page=surat_ahli_waris&aksi=tambah';</script>";
		}else{
			$query_warsa=mysqli_query($db,"select * from tb_waris where pemilik='".$_SESSION["SD_nik"]."'");
			if(mysqli_num_rows($query_warsa)>0){
				$lokasi_file_ktp_lama="img/file/ahli_waris_ktp_".$_SESSION["SD_nomor"].".jpg";
				unlink("$lokasi_file_ktp_lama");
				$lokasi_file_ktp=$_FILES['gambar_ktp']['tmp_name'];
				$lokasi_upload_ktp="img/file/ahli_waris_ktp_".$_SESSION['SD_nomor'].".jpg";
				copy($lokasi_file_ktp,$lokasi_upload_ktp);

				$lokasi_file_kk_lama="img/file/ahli_waris_kk_".$_SESSION["SD_nomor"].".jpg";
				unlink("$lokasi_file_kk_lama");
				$lokasi_file_kk=$_FILES['gambar_kk']['tmp_name'];
				$lokasi_upload_kk="img/file/ahli_waris_kk_".$_SESSION['SD_nomor'].".jpg";
				copy($lokasi_file_kk,$lokasi_upload_kk);
				
				mysqli_query($db,"insert into tb_surat_ahli_waris (nomor,tanggal,nik,pemilik,status) values ('". $_SESSION["SD_nomor"] ."','".date("Y/m/d")."','". $_SESSION["yusnani_nik"] ."','". $_SESSION["SD_nik"] ."','Belum Divalidasi')");
								
				$query_wars=mysqli_query($db,"select * from tb_waris where pemilik='".$_SESSION["SD_nik"]."'");
				while($data_wars=mysqli_fetch_array($query_wars)){
					mysqli_query($db,"insert into tb_ahli_waris_detail (nomor,nik) values ('". $_SESSION["SD_nomor"] ."','". $data_wars["nik"] ."')");
				}
				
				$_SESSION["SD_nomor"]="";
				$_SESSION["SD_nik"]="";
				echo "<script>alert('data tersimpan');document.location='?page=surat_ahli_waris';</script>";
			}else{
				echo "<script>alert('belum ada ahli waris');document.location='?page=surat_ahli_waris&aksi=tambah';</script>";				
			}
		}
	}
}elseif (@$_POST['btnedit']){
	$_SESSION["SD_nomor"]=$_POST["nomor"];
	$_SESSION["SD_nik"]=$_POST["nik"];
	
	if($_SESSION["SD_nik"]==""){
		echo"kosong<br>";
	}else{
		$query=mysqli_query($db,"select * from tb_surat_ahli_waris where nomor='".$_POST['nomor']."' and nomor<>'".$_GET['nomor']."'");
		if (mysqli_num_rows($query)>0){
			echo"<script>alert('Nomor surat yang sama sudah ada');document.location='?page=surat_ahli_waris';</script>";
		}else{

			$lokasi_file_ktp_lama="img/file/ahli_waris_ktp_".$_GET["nomor"].".jpg";
			unlink("$lokasi_file_ktp_lama");
			$lokasi_file_ktp=$_FILES['gambar_ktp']['tmp_name'];
			$lokasi_upload_ktp="img/file/ahli_waris_ktp_".$_SESSION['SD_nomor'].".jpg";
			copy($lokasi_file_ktp,$lokasi_upload_ktp);

			$lokasi_file_kk_lama="img/file/ahli_waris_kk_".$_GET["nomor"].".jpg";
			unlink("$lokasi_file_kk_lama");
			$lokasi_file_kk=$_FILES['gambar_kk']['tmp_name'];
			$lokasi_upload_kk="img/file/ahli_waris_kk_".$_SESSION['SD_nomor'].".jpg";
			copy($lokasi_file_kk,$lokasi_upload_kk);
			
			mysqli_query($db,"update tb_surat_ahli_waris set nomor='". $_SESSION["SD_nomor"] ."',nik='". $_SESSION["SD_nik"] ."',tanggal='". $tgl_benar ."',alamat='". $_SESSION["SD_alamat"] ."',nama_usaha='". $_SESSION["SD_nama_usaha"] ."',pekerjaan='". $_SESSION["SD_pekerjaan"] ."' where nomor='".$_GET['nomor']."'");
			$_SESSION["SD_nomor"]="";
			$_SESSION["SD_nik"]="";
			echo "<script>alert('data diedit');document.location='?page=surat_ahli_waris'</script>";
		}
	}
}elseif (@$_GET['aksi']=='hapus' && @$_GET["pesan"]=="ya"){	
		$lokasi_file_ktp_lama="img/file/ahli_waris_ktp_".$_GET["nomor"].".jpg";
		unlink("$lokasi_file_ktp_lama");

		$lokasi_file_kk_lama="img/file/ahli_waris_kk_".$_GET["nomor"].".jpg";
		unlink("$lokasi_file_kk_lama");
	
		mysqli_query($db,"delete from tb_surat_ahli_waris where nomor='".$_GET['nomor']."'");
		mysqli_query($db,"delete from tb_ahli_waris where nomor='".$_GET['nomor']."'");
		$_SESSION["SD_nomor"]="";
		$_SESSION["SD_nik"]="";
		echo "<script>alert('data telah dihapus');document.location='?page=surat_ahli_waris';</script>";
}elseif (@$_GET['aksi']=='validasi'){
		mysqli_query($db,"update tb_surat_ahli_waris set tanggal_disetujui='".date("Y-m-d")."',status='Telah Divalidasi' where nomor='".$_GET['nomor']."'");
		$_SESSION["SD_nomor"]="";
		$_SESSION["SD_nik"]="";
		echo "<script>alert('data telah divalidasi');document.location='?page=surat_ahli_waris';</script>";
}elseif (@$_GET['aksi']=='tolak'){
		mysqli_query($db,"update tb_surat_ahli_waris set status='Tidak Disetujui' where nomor='".$_GET['nomor']."'");
		$_SESSION["SD_nomor"]="";
		$_SESSION["SD_nik"]="";
		echo "<script>alert('data tidak disetujui');document.location='?page=surat_ahli_waris';</script>";
}elseif (@$_GET['aksi']=='batal_tambah'){
		$_SESSION["SD_nomor"]="";
		$_SESSION["SD_nik"]="";
		echo "<script>document.location='?page=surat_ahli_waris&aksi=tambah';</script>";
}elseif (@$_GET['aksi']=='batal_ubah'){
		$_SESSION["SD_nomor"]="";
		$_SESSION["SD_nik"]="";
		echo "<script>document.location='?page=surat_ahli_waris';</script>";
}elseif (@$_GET['aksi']=='batal_hapus'){
		$_SESSION["SD_nomor"]="";
		$_SESSION["SD_nik"]="";
		echo "<script>document.location='?page=surat_ahli_waris';</script>";
}
?>