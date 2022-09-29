
<br>
<?php
$btsklm="style='box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.1);'";
if (!@$_SESSION['pswd']){
	$_SESSION["pswd"]="sembunyi";
	echo "<script>document.location='?page=surat_kematian';</script>";
}
if (@$_GET['pswd']=='lihat'){
	$_SESSION["pswd"]=$_GET["pswd"];
	echo "<script>document.location='?page=surat_kematian';</script>";
}
if (@$_GET['pswd']=='sembunyi'){
	$_SESSION["pswd"]=$_GET["pswd"];
	echo "<script>document.location='?page=surat_kematian';</script>";
}
//echo @$_SESSION["pswd"];
?>

<?php
if(@$_POST['cari']){
		echo"<script>document.location='?page=surat_kematian&cari=".$_POST["cari"]."';</script>";
}?>

<?php if (@$_GET['aksi']=='edit'){
	$query_edit=mysqli_query($db,"select * from tb_surat_kematian where nomor='".$_GET['nomor']."'");
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
	$_SESSION["SD_alamat"]=$data_edit["alamat"];
	$_SESSION["SD_tanggal_meninggal"]=$data_edit["tanggal_meninggal"];
	$_SESSION["SD_di"]=$data_edit["di"];
	$_SESSION["SD_disebabkan"]=$data_edit["disebabkan"];

?> 

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Edit Surat Keterangan Kematian
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=surat_kematian"><font color="red">X</font></a>
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
			  <td valign="top">Alamat</td>
			  <td valign="top">:</td>
			  <td><textarea name="alamat" id="alamat" required style="width:50%;height:50px;"><?php echo @$_SESSION["SD_alamat"]; ?></textarea></td>
			</tr>
			<tr>
			  <td valign="top">Tanggal Meninggal</td>
			  <td valign="top">:</td>
			  <td><input type="date" name="tanggal_meninggal" id="tanggal_meninggal" maxlength="200" value="<?php echo @$_SESSION["SD_tanggal_meninggal"]; ?>" required style="width:100px"/></td>
			</tr>
			<tr>
			  <td valign="top">Di</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="di" id="di" maxlength="30" value="<?php echo @$_SESSION["SD_di"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
			  <td valign="top">Disebabkan</td>
			  <td valign="top">:</td>
			  <td><input type="text" name="disebabkan" id="disebabkan" maxlength="30" value="Indonesia" required style="width:150px"/></td>
			</tr>
			<tr>
				<td valign="top">KTP</td>
				<td valign="top">:</td>
				<td valign="top"><label for="gambar"></label>
					<input type="file" name="gambar_ktp" id="gambar_ktp" accept="image/*" required />
					<br>
					<img src="Img_Alumni/<?php echo "kematian_ktp_".$data_edit['nomor'].".jpg"; ?>" width="100" />
				</td>
			</tr>
			<tr>
				<td valign="top">KK</td>
				<td valign="top">:</td>
				<td valign="top"><label for="gambar"></label>
					<input type="file" name="gambar_kk" id="gambar_kk" accept="image/*" required />
					<br>
					<img src="Img_Alumni/<?php echo "kematian_kk_".$data_edit['nomor'].".jpg"; ?>" width="100" />
				</td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="#ffffcc" align="left">
				<input type="submit" name="btnedit" id="btnedit" value="Edit" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
				<a href="?page=surat_kematian&aksi=batal_ubah"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				</td>
			</tr>
      </table>
    </td>
  </tr>
</table>
</form>

<?php }elseif (@$_GET['aksi']=='hapus'){
	$query_hapus=mysqli_query($db,"select * from tb_surat_kematian where nomor='".$_GET['nomor']."'");
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
	$_SESSION["SD_alamat"]=$data_hapus["alamat"];
	$_SESSION["SD_tanggal_meninggal"]=substr($data_hapus["tanggal_meninggal"],8,2)."/".substr($data_hapus["tanggal_meninggal"],5,2)."/".substr($data_hapus["tanggal_meninggal"],0,4);
	$_SESSION["SD_di"]=$data_hapus["di"];
	$_SESSION["SD_disebabkan"]=$data_hapus["disebabkan"];
?> 

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Yakin ingin menghapus data Surat Keterangan Kematian berikut?
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=surat_kematian"><font color="red">X</font></a>
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
			  <td valign="top">Alamat</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_alamat"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Tanggal Meninggal</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_tanggal_meninggal"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Di</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_di"]; ?></td>
			</tr>
			<tr>
			  <td valign="top">Disebabkan</td>
			  <td valign="top">:</td>
			  <td><?php echo @$_SESSION["SD_disebabkan"]; ?></td>
			</tr>
			<tr>
				<td height="36" colspan="3" align="left">
				<a href="?page=surat_kematian&aksi=hapus&nomor=<?php echo $_GET['nomor']; ?>&pesan=ya"><input type="button" name="button2" id="button2" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				<a href="?page=surat_kematian&aksi=batal_hapus"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
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
	<td width="80%"  bgcolor="white" >Tambah Surat Keterangan Kematian
	</td>
	<td width="20%"  bgcolor="white" align="right"><a href="?page=surat_kematian"><font color="red">X</font></a>
	</td>
  </tr>
</table>
<?php 
$query_tambah=mysqli_query($db,"select * from tb_penduduk where nik='".$_SESSION['yusnani_nik']."'");
$data_tambah=mysqli_fetch_array($query_tambah);

$nomor_surat=0;
$query_domisili=mysqli_query($db,"select * from tb_surat_kematian order by nomor desc");
$nomor_surat_domisili=0;
if(mysqli_num_rows($query_domisili)>0){
	$data_domisili=mysqli_fetch_array($query_domisili);
	$nomor_surat_domisili=$data_domisili["nomor"];
}

if($nomor_surat_domisili>0){
	$nomor_surat=$nomor_surat_domisili;
}
$nomor_surat=$nomor_surat+1;
$_SESSION["SD_nomor"]=$nomor_surat;
$_SESSION["SD_nik"]=@$data_tambah["nik"];
$_SESSION["SD_nomor_kk"]=@$data_tambah["nomor_kk"];
$_SESSION["SD_nama"]=@$data_tambah["nama"];
$_SESSION["SD_jenis_kelamin"]=@$data_tambah["jenis_kelamin"];
$_SESSION["SD_tempat_lahir"]=@$data_tambah["tempat_lahir"];
$_SESSION["SD_tanggal_lahir"]=substr(@$data_tambah["tanggal_lahir"],5,2)."/".substr(@$data_tambah["tanggal_lahir"],8,2)."/".substr(@$data_tambah["tanggal_lahir"],0,4);
$_SESSION["SD_agama"]=@$data_tambah["agama"];

if(@$_SESSION["SD_alamat"]==""){
	$_SESSION["SD_alamat"]=@$data_tambah["alamat"];
}
$_SESSION["SD_tanggal_meninggal"]="";
$_SESSION["SD_di"]="";
$_SESSION["SD_disebabkan"]="";
?>
<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
				<td width="190">Nomor</td>
				<td width="1">:</td>
				<td width="auto"><input type="text" name="nomor" id="nomor" maxlength="20" value="<?php echo @$_SESSION["SD_nomor"]; ?>" readonly="readonly" required style="width:150px"/></td>
				</tr>
			<tr>
				<td width="190">NIK</td>
				<td width="1">:</td>
				<td width="auto">
				
					<select name="nik" id="nik" onchange="changeValue(this.value)" required >
						<?php
						if($_SESSION["yusnani_status"]=="Penduduk"){
							$query=mysqli_query($db,"select * from tb_penduduk where nik='".$_SESSION["SD_nik"]."'");							
						}else{
							$query=mysqli_query($db,"select * from tb_penduduk order by nik asc");
							echo '<option value="">-Pilih-</option>';							
						}
						
						//$result = mysqli_query($db,"select * from tb_penduduk");							
						$jsArray="var prdName = new Array();\n";
						while ($row=mysqli_fetch_array($query)){
							if($_SESSION['SD_nik']==$row['nik']){
								$sel='selected';
							}else{
								$sel='';
							}
							echo '<option name="nik" value="'. $row['nik'] .'" '. $sel .' >'. $row['nik']. " - " . $row['nama'] .'</option>';
							$jsArray .= "prdName['".$row['nik']."'] = {nomor_kk:'".addslashes($row['nomor_kk'])."',nama:'".addslashes($row['nama'])."',jenis_kelamin:'".addslashes($row['jenis_kelamin'])."',tempat_lahir:'".addslashes($row['tempat_lahir'])."',tanggal_lahir:'".addslashes(substr($row['tanggal_lahir'],8,2)."/".substr($row['tanggal_lahir'],5,2)."/".substr($row['tanggal_lahir'],0,4))."',kewarganegaraan:'".addslashes($row['kewarganegaraan'])."',agama:'".addslashes($row['agama'])."',alamat:'".addslashes($row['alamat'])."',pekerjaan:'".addslashes($row['pekerjaan'])."'};\n";
						} ?>
					</select>

					
					<script type="text/javascript">
					<?php echo $jsArray; ?>
					function changeValue(id){
						
						document.getElementById('nomor_kk').value=prdName[id].nomor_kk;
						document.getElementById('nama').value=prdName[id].nama;
						document.getElementById('jenis_kelamin').value=prdName[id].jenis_kelamin;
						document.getElementById('tempat_lahir').value=prdName[id].tempat_lahir;
						document.getElementById('tanggal_lahir').value=prdName[id].tanggal_lahir;
						document.getElementById('disebabkan').value=prdName[id].disebabkan;
						document.getElementById('agama').value=prdName[id].agama;
						document.getElementById('alamat').value=prdName[id].alamat;
					};
					</script>						
				</td>
			</tr>
			<tr>
				<td valign="top">Nomor KK</td>
				<td valign="top">:</td>
				<td><input type="text" name="nama" id="nomor_kk" maxlength="30" value="<?php echo @$_SESSION["SD_nomor_kk"]; ?>" readonly="readonly" required style="width:150px"/></td>
			</tr>
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
				<td valign="top">Agama</td>
				<td valign="top">:</td>
				<td><input type="text" name="agama" id="agama" maxlength="12" value="<?php echo @$_SESSION["SD_agama"]; ?>" readonly="readonly" required style="width:150px"/></td>
			</tr>
			<tr>
				<td valign="top">Alamat</td>
				<td valign="top">:</td>
				<td><textarea name="alamat" id="alamat" required style="width:50%;height:50px;"><?php echo @$_SESSION["SD_alamat"]; ?></textarea></td>
			</tr>			
			<tr>
				<td valign="top">Tanggal Meninggal</td>
				<td valign="top">:</td>
				<td><input type="date" name="tanggal_meninggal" id="tanggal_meninggal" maxlength="200" value="<?php echo @$_SESSION["SD_tanggal_meninggal"]; ?>" required style="width:140px"/></td>
			</tr>
			<tr>
				<td valign="top">Di</td>
				<td valign="top">:</td>
				<td><input type="text" name="di" id="di" maxlength="30" value="<?php echo @$_SESSION["SD_di"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
				<td valign="top">Disebabkan</td>
				<td valign="top">:</td>
				<td><input type="text" name="disebabkan" id="disebabkan" maxlength="60" value="<?php echo @$_SESSION["SD_disebabkan"]; ?>" required style="width:150px"/></td>
			</tr>
			<tr>
				<td valign="top">KTP</td>
				<td valign="top">:</td>
				<td valign="top"><label for="gambar"></label>
					<input type="file" name="gambar_ktp" id="gambar_ktp" accept="image/*" required/><br>
					  <small class="text-danger font-weight-bold">KTP harus berformat image(jpg/png) </small><br/>
				</td>
			<tr>
				<td valign="top">KK</td>
				<td valign="top">:</td>
				<td valign="top"><label for="gambar"></label>
					<input type="file" name="gambar_kk" id="gambar_kk" accept="image/*" required/><br>
					<small class="text-danger font-weight-bold">KK harus berformat image(jpg/png)</small><br/>
				</td>
			</tr>
			<tr>
				<td valign="top">Keterangan Rumah Sakit</td>
				<td valign="top">:</td>
				<td valign="top"><label for="gambar"></label>
					<input type="file" name="gambar_rsu" id="gambar_rsu" accept="image/*"/>
				</td>
			</tr>
			</tr>
			<tr>
				<td colspan="3" valign="top"><h3>Anggota Keluarga</h3>
					<?php
					$query = mysqli_query($db, "select * from tb_penduduk where nomor_kk='" . $_SESSION["SD_nomor_kk"] . "' order by hubungan_keluarga desc");
					?>
					<table width="70%" border="0" align="left" cellpadding="0" cellspacing="0" style="border: solid 2px #6c6969">
						<tr>
							<td width="" bgcolor="#6c6969" background="img/blk.jpg" align="center">
								<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
									<tr>
										<th width="100" <?php echo $btsklm; ?>>NIK</th>
										<th width="100" <?php echo $btsklm; ?>>Nama</th>
										<th width="100" <?php echo $btsklm; ?>>Tempat Lahir</th>
										<th width="80" <?php echo $btsklm; ?>>Tanggal Lahir</th>
										<th width="80" <?php echo $btsklm; ?>>Hubungan Keluarga</th>
									</tr>
									<?php while ($data = mysqli_fetch_array($query)) {
									?>
										<tr>
											<td height="1" bgcolor="#6c6969" colspan="10"></td>
										</tr>
										<tr>
											<td align="center">
												<?php if (@$_GET["nik"] == $data['nik']) {
													echo "<font color='red'>" . $data['nik'] . "</font>";
												} else {
													echo $data['nik'];
												} ?>
											</td>
											<td align="center" <?php echo $btsklm; ?>><?php echo $data['nama']; ?></td>
											<td align="center" <?php echo $btsklm; ?>><?php echo $data['tempat_lahir']; ?></td>
											<td align="center" <?php echo $btsklm; ?>><?php echo substr($data["tanggal_lahir"], 8, 2) . "/" . substr($data["tanggal_lahir"], 5, 2) . "/" . substr($data["tanggal_lahir"], 0, 4); ?></td>
											<td align="center" <?php echo $btsklm; ?>><?php echo $data['hubungan_keluarga']; ?></td>
										</tr>
									<?php } ?>
								</table>
							</td>
						</tr>
					</table>			
				</td>
			</tr>
			<tr>
				<td height="36" colspan="3" bgcolor="" align="left">
					<input type="submit" name="btnsimpan" id="btnsimpan" value="Simpan" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
					<a href="?page=surat_kematian&aksi=batal_tambah"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
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
	<td width="80%"  bgcolor="white" >Surat Keterangan Kematian
		<?php if (@$_SESSION["yusnani_status"]=="Penduduk" or @$_SESSION["yusnani_status"]=="Sekretaris Desa"){ ?>
			<a href="?page=surat_kematian&aksi=tambah"><input type="button" name="button" id="button2" value="+ Tambah" <?php echo "style='width:160px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
		<?php } ?>
	</td>
  </tr>
</table>

<br>

<?php
if (@$_SESSION["yusnani_status"]=="Sekretaris Desa"){
	$query=mysqli_query($db,"select * from tb_surat_kematian order by nomor asc");	
	if(@$_GET['cari']){
		$query =mysqli_query($db,"select * from tb_surat_kematian where nomor like '%".$_GET['cari']."%' or nama like '%".$_GET['cari']."%' order by nomor asc");
	}elseif(@$_GET['nomor']){
		$query =mysqli_query($db,"select * from tb_surat_kematian where nomor like '%".$_GET['nomor']."%' order by nomor asc");
	}else{
		$query=mysqli_query($db,"select * from tb_surat_kematian order by nomor asc");	
	}	
}elseif (@$_SESSION["yusnani_status"]=="Penduduk"){
	$query=mysqli_query($db,"select * from tb_surat_kematian where nik='".$_SESSION["yusnani_nik"]."' or pemohon='".$_SESSION["yusnani_nik"]."'  order by nomor asc");	
	if(@$_GET['cari']){
		$query =mysqli_query($db,"select * from tb_surat_kematian where nik='".$_SESSION["yusnani_nik"]."' or pemohon='".$_SESSION["yusnani_nik"]."' and (nomor like '%".$_GET['cari']."%' or nama like '%".$_GET['cari']."%') order by nomor asc");
	}elseif(@$_GET['nomor']){
		$query =mysqli_query($db,"select * from tb_surat_kematian where nik='".$_SESSION["yusnani_nik"]."' or pemohon='".$_SESSION["yusnani_nik"]."' and (nomor like '%".$_GET['nomor']."%') order by nomor asc");
	}else{
		$query=mysqli_query($db,"select * from tb_surat_kematian where nik='".$_SESSION["yusnani_nik"]."' or pemohon='".$_SESSION["yusnani_nik"]."' order by nomor asc");	
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
                <th width="250" <?php echo $btsklm; ?>>Lampiran</th>
                <th width="150" <?php echo $btsklm; ?>>Status</th>
                <th width="180" <?php echo $btsklm; ?>>Aksi</th>
              </tr>
              <?php while ($data=mysqli_fetch_array($query)){
				$query_penduduk =mysqli_query($db,"select * from tb_penduduk where nik='".$data["nik"]."'");
				$nik=$data["nik"];
				$nama="-";
				$tempat_lahir="-";
				$tanggal_lahir="-";
				$bangsa="Indonesia";
				$agama="-";
				$jenis_kelamin="-";
				if(mysqli_num_rows($query_penduduk)>0){
					$data_penduduk=mysqli_fetch_array($query_penduduk);
					$nama=$data_penduduk["nama"];
					$tempat_lahir=$data_penduduk["tempat_lahir"];
					$tanggal_lahir=substr($data_penduduk["tanggal_lahir"],8,2)."/".substr($data_penduduk["tanggal_lahir"],5,2)."/".substr($data_penduduk["tanggal_lahir"],0,4);
					$agama=$data_penduduk["agama"];
					$jenis_kelamin=$data_penduduk["jenis_kelamin"];
					//$di="-";
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
					echo "KK :<a href='img/file/kematian_kk_".$data['nomor'].".jpg' target='_blank'>kk_".$data['nomor'].".jpg</a><br>";
					echo "KTP :<a href='img/file/kematian_ktp_".$data['nomor'].".jpg' target='_blank'>ktp_".$data['nomor'].".jpg</a><br>";
					$lokasi_gambar="img/file/kematian_rsu_".$data["nomor"].".jpg";
					if(file_exists($lokasi_gambar)){
						echo "Keterangan Rumah Sakit :<a href='img/file/kematian_rsu_".$data['nomor'].".jpg' target='_blank'>ket_rsu_".$data['nomor'].".jpg</a>";
					}
					?>				
				</td>
                <td align="center" <?php echo $btsklm; ?>><?php if($data['status']=="Belum Divalidasi"){ echo "Sedang Diproses"; }else{echo $data['status'];} ?></td>
                <td align="center" <?php echo $btsklm; ?>>
					<?php if (@$_SESSION["yusnani_status"]=="Penduduk"){?>
						<?php if ($data["status"]=="Belum Divalidasi"){?>
							<!--<a href="?page=surat_kematian&aksi=cetak&nomor=<?php echo $data['nomor']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Cetak" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>-->
							<a href="?page=surat_kematian&aksi=hapus&nomor=<?php echo $data['nomor']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
						<?php } ?>
						<?php if ($data["status"]=="Telah Divalidasi"){?>
							<a href="cetak_surat_kematian.php?aksi=cetak&nomor=<?php echo $data['nomor']; ?>" target="_blank"><input type="button" name="btnlogin" id="btnlogin" value="Cetak" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
							<!--<a href="?page=surat_kematian&aksi=hapus&nomor=<?php echo $data['nomor']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>-->
						<?php } ?>
						<?php if ($data["status"]=="Tidak Disetujui"){?>
							<!--<a href="?page=surat_kematian&aksi=cetak&nomor=<?php echo $data['nomor']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Cetak" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>-->
							<!--<a href="?page=surat_kematian&aksi=hapus&nomor=<?php echo $data['nomor']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>-->
							<input type="button" name="btnlogin" id="btnlogin" value="...!..." <?php echo "style='width:100px;border:0px;background-color:#ffcc99;height:30px;color:black;'"; ?>/>
						<?php } ?>
					<?php } ?>
					<?php if (@$_SESSION["yusnani_status"]=="Sekretaris Desa"){?>
						<?php if ($data["status"]=="Belum Divalidasi"){?>
							<a href="cetak_surat_kematian.php?aksi=cetak&nomor=<?php echo $data['nomor']; ?>" target="_blank"><input type="button" name="btnlogin" id="btnlogin" value="Cek Surat" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
							<a href="?page=surat_kematian&aksi=validasi&nomor=<?php echo $data['nomor']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Validasi" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
							<a href="?page=surat_kematian&aksi=tolak&nomor=<?php echo $data['nomor']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Tolak" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
						<?php } ?>
						<?php if ($data["status"]=="Telah Divalidasi"){?>
							<a href="cetak_surat_kematian.php?aksi=cetak&nomor=<?php echo $data['nomor']; ?>" target="_blank"><input type="button" name="btnlogin" id="btnlogin" value="Cetak" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
							<!--<a href="?page=surat_kematian&aksi=validasi&nomor=<?php echo $data['nomor']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Validasi" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>-->
							<a href="?page=surat_kematian&aksi=tolak&nomor=<?php echo $data['nomor']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Tolak" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
						<?php } ?>
						<?php if ($data["status"]=="Tidak Disetujui"){?>
							<a href="?page=surat_kematian&aksi=validasi&nomor=<?php echo $data['nomor']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Validasi" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
							<!--<a href="?page=surat_kematian&aksi=tolak&nomor=<?php echo $data['nomor']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Tolak" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>-->
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
if (@$_POST['btnsimpan']){
	$_SESSION["SD_nomor"]=$_POST["nomor"];
	$_SESSION["SD_nik"]=$_POST["nik"];
	$_SESSION["SD_nama"]=$_POST["nama"];
	$_SESSION["SD_jenis_kelamin"]=$_POST["jenis_kelamin"];
	$_SESSION["SD_tempat_lahir"]=$_POST["tempat_lahir"];
	
	$tanggal = $_POST["tanggal_lahir"];
	$tgl_benar = $tanggal;
	$tanggal2=$_POST["tanggal_meninggal"];
	$tgl_benar2 = $tanggal2;
	
	$_SESSION["SD_tanggal_lahir"]=$_POST["tanggal_lahir"];
	$_SESSION["SD_agama"]=$_POST["agama"];
	$_SESSION["SD_alamat"]=$_POST["alamat"];
	$_SESSION["SD_tanggal_meninggal"]=$_POST["tanggal_meninggal"];
	$_SESSION["SD_di"]=$_POST["di"];
	$_SESSION["SD_disebabkan"]=$_POST["disebabkan"];
	
	if($_SESSION["SD_nik"]==""){
		echo"kosong<br>";
	}else{	
		echo"kosong<br>";
		$query=mysqli_query($db,"select * from tb_surat_kematian where nomor='".$_POST['nomor']."'");
		if (mysqli_num_rows($query)>0){
			echo"<script>alert('nomor yang sama sudah ada');document.location='?page=surat_kematian&aksi=tambah';</script>";
		}else{
			$lokasi_file_ktp_lama="img/file/kematian_ktp_".$_SESSION["SD_nomor"].".jpg";
			//unlink("$lokasi_file_ktp_lama");
			$lokasi_file_ktp=$_FILES['gambar_ktp']['tmp_name'];
			$lokasi_upload_ktp="img/file/kematian_ktp_".$_SESSION['SD_nomor'].".jpg";
			copy($lokasi_file_ktp,$lokasi_upload_ktp);

			$lokasi_file_kk_lama="img/file/kematian_kk_".$_SESSION["SD_nomor"].".jpg";
			//unlink("$lokasi_file_kk_lama");
			$lokasi_file_kk=$_FILES['gambar_kk']['tmp_name'];
			$lokasi_upload_kk="img/file/kematian_kk_".$_SESSION['SD_nomor'].".jpg";
			copy($lokasi_file_kk,$lokasi_upload_kk);

			echo $lokasi_file_kk."<br>";
			$lokasi_file_rsu_lama="img/file/kematian_kk_".$_SESSION["SD_nomor"].".jpg";
			//unlink("$lokasi_file_rsu_lama");
			$lokasi_file_rsu=$_FILES['gambar_rsu']['tmp_name'];
			$lokasi_upload_rsu="img/file/kematian_rsu_".$_SESSION['SD_nomor'].".jpg";
			copy($lokasi_file_rsu,$lokasi_upload_rsu);
			
			if($_SESSION["yusnani_status"]=="Penduduk"){
				$pemohon=$_SESSION["yusnani_nik"];
			}else{
				$pemohon=$_SESSION["yusnani_nik"];
			}
			
			mysqli_query($db,"insert into tb_surat_kematian (nomor,tanggal,nik,alamat,tanggal_meninggal,di,disebabkan,status,pemohon) values ('". $_SESSION["SD_nomor"] ."','".date("Y/m/d")."','". $_SESSION["SD_nik"] ."','". $_SESSION["SD_alamat"] ."','". $tgl_benar2 ."','". $_SESSION["SD_di"] ."','". $_SESSION["SD_disebabkan"] ."','Belum Divalidasi','".$pemohon."')");
			$_SESSION["SD_nomor"]="";
			$_SESSION["SD_nik"]="";
			$_SESSION["SD_nama"]="";
			$_SESSION["SD_tempat_lahir"]="";
			$_SESSION["SD_tanggal_lahir"]="";
			$_SESSION["SD_agama"]="";
			$_SESSION["SD_disebabkan"]="";
			$_SESSION["SD_alamat"]="";
			$_SESSION["SD_tanggal_meninggal"]="";
			$_SESSION["SD_di"]="";
			echo "<script>alert('data tersimpan');document.location='?page=surat_kematian';</script>";
		}
	}
}elseif (@$_POST['btnedit']){
	$_SESSION["SD_nomor"]=$_POST["nomor"];
	$_SESSION["SD_nik"]=$_POST["nik"];
	$_SESSION["SD_nama"]=$_POST["nama"];
	$_SESSION["SD_jenis_kelamin"]=$_POST["jenis_kelamin"];
	$_SESSION["SD_tempat_lahir"]=$_POST["tempat_lahir"];

	$tanggal = $_POST["tanggal_lahir"];
	$tgl_benar = $tanggal;	

	$tanggal2 = $_POST["tanggal_meninggal"];
	$tgl_benar2 = $tanggal2;

	$_SESSION["SD_tanggal_lahir"]=$_POST["tanggal_lahir"];
	$_SESSION["SD_alamat"]=$_POST["alamat"];
	$_SESSION["SD_agama"]=$_POST["agama"];
	$_SESSION["SD_tanggal_meninggal"]=$_POST["tanggal_meninggal"];
	$_SESSION["SD_di"]=$_POST["di"];
	$_SESSION["SD_disebabkan"]=$_POST["disebabkan"];
	
	if($_SESSION["SD_nik"]==""){
		echo"kosong<br>";
	}else{
		$query=mysqli_query($db,"select * from tb_surat_kematian where nomor='".$_POST['nomor']."' and nomor<>'".$_GET['nomor']."'");
		if (mysqli_num_rows($query)>0){
			echo"<script>alert('Nomor surat yang sama sudah ada');document.location='?page=surat_kematian';</script>";
		}else{

			$lokasi_file_ktp_lama="img/file/kematian_ktp_".$_GET["nomor"].".jpg";
			unlink("$lokasi_file_ktp_lama");
			$lokasi_file_ktp=$_FILES['gambar_ktp']['tmp_name'];
			$lokasi_upload_ktp="img/file/kematian_ktp_".$_SESSION['SD_nomor'].".jpg";
			copy($lokasi_file_ktp,$lokasi_upload_ktp);

			$lokasi_file_kk_lama="img/file/kematian_kk_".$_GET["nomor"].".jpg";
			unlink("$lokasi_file_kk_lama");
			$lokasi_file_kk=$_FILES['gambar_kk']['tmp_name'];
			$lokasi_upload_kk="img/file/kematian_kk_".$_SESSION['SD_nomor'].".jpg";
			copy($lokasi_file_kk,$lokasi_upload_kk);
			
			if($_SESSION["yusnani_status"]=="Penduduk"){
				$pemohon=$_SESSION["yusnani_nik"];
			}else{
				$pemohon=$_SESSION["yusnani_nik"];
			}
			
			mysqli_query($db,"update tb_surat_kematian set nomor='". $_SESSION["SD_nomor"] ."',nik='". $_SESSION["SD_nik"] ."',tanggal='". $tgl_benar ."',alamat='". $_SESSION["SD_alamat"] ."',tanggal_meninggal='". $tgl_benar2 ."',di='". $_SESSION["SD_di"] ."',disebabkan='". $_SESSION["SD_disebabkan"] ."' where nomor='".$_GET['nomor']."'");
			$_SESSION["SD_nomor"]="";
			$_SESSION["SD_nik"]="";
			$_SESSION["SD_nama"]="";
			$_SESSION["SD_jenis_kelamin"]="";
			$_SESSION["SD_tempat_lahir"]="";
			$_SESSION["SD_tanggal_lahir"]="";
			$_SESSION["SD_alamat"]="";
			$_SESSION["SD_agama"]="";
			$_SESSION["SD_tanggal_meninggal"]="";
			$_SESSION["SD_di"]="";
			$_SESSION["SD_disebabkan"]="";
			echo "<script>alert('data diedit');document.location='?page=surat_kematian'</script>";
		}
	}
}elseif (@$_GET['aksi']=='hapus' && @$_GET["pesan"]=="ya"){
	
		$lokasi_file_ktp_lama="img/file/kematian_ktp_".$_GET["nomor"].".jpg";
		unlink("$lokasi_file_ktp_lama");

		$lokasi_file_kk_lama="img/file/kematian_kk_".$_GET["nomor"].".jpg";
		unlink("$lokasi_file_kk_lama");
	
		mysqli_query($db,"delete from tb_surat_kematian where nomor='".$_GET['nomor']."'");
		$_SESSION["SD_nomor"]="";
		$_SESSION["SD_nik"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_jenis_kelamin"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_tanggal_meninggal"]="";
		$_SESSION["SD_di"]="";
		$_SESSION["SD_disebabkan"]="";
		echo "<script>alert('data telah dihapus');document.location='?page=surat_kematian';</script>";
}elseif (@$_GET['aksi']=='validasi'){
		mysqli_query($db,"update tb_surat_kematian set tanggal_disetujui='".date("Y-m-d")."',status='Telah Divalidasi' where nomor='".$_GET['nomor']."'");
		$_SESSION["SD_nomor"]="";
		$_SESSION["SD_nik"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_jenis_kelamin"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_tanggal_meninggal"]="";
		$_SESSION["SD_di"]="";
		$_SESSION["SD_disebabkan"]="";
		echo "<script>alert('data telah divalidasi');document.location='?page=surat_kematian';</script>";
}elseif (@$_GET['aksi']=='tolak'){
		mysqli_query($db,"update tb_surat_kematian set status='Tidak Disetujui' where nomor='".$_GET['nomor']."'");
		$_SESSION["SD_nomor"]="";
		$_SESSION["SD_nik"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_jenis_kelamin"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_tanggal_meninggal"]="";
		$_SESSION["SD_di"]="";
		$_SESSION["SD_disebabkan"]="";
		echo "<script>alert('data tidak disetujui');document.location='?page=surat_kematian';</script>";
}elseif (@$_GET['aksi']=='batal_tambah'){
		$_SESSION["SD_nomor"]="";
		$_SESSION["SD_nik"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_jenis_kelamin"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_tanggal_meninggal"]="";
		$_SESSION["SD_di"]="";
		$_SESSION["SD_disebabkan"]="";
		echo "<script>document.location='?page=surat_kematian&aksi=tambah';</script>";
}elseif (@$_GET['aksi']=='batal_ubah'){
		$_SESSION["SD_nomor"]="";
		$_SESSION["SD_nik"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_jenis_kelamin"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_tanggal_meninggal"]="";
		$_SESSION["SD_di"]="";
		$_SESSION["SD_disebabkan"]="";
		echo "<script>document.location='?page=surat_kematian';</script>";
}elseif (@$_GET['aksi']=='batal_hapus'){
		$_SESSION["SD_nomor"]="";
		$_SESSION["SD_nik"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_jenis_kelamin"]="";
		$_SESSION["SD_tempat_lahir"]="";
		$_SESSION["SD_tanggal_lahir"]="";
		$_SESSION["SD_alamat"]="";
		$_SESSION["SD_agama"]="";
		$_SESSION["SD_tanggal_meninggal"]="";
		$_SESSION["SD_di"]="";
		$_SESSION["SD_disebabkan"]="";
		echo "<script>document.location='?page=surat_kematian';</script>";
}
?>