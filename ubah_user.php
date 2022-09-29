<script>
	$(document).ready(function(){
	$("#tanggal_lahir").datepicker({
	})
	})
</script>

<br>

<?php
if(@$_SESSION["yusnani_status"]=="Kepala Desa"){
	$query_edit=mysqli_query($db,"select * from tb_kepala_desa where nik='".$_SESSION['yusnani_nik']."'");
}elseif(@$_SESSION["yusnani_status"]=="Sekretaris Desa"){
	$query_edit=mysqli_query($db,"select * from tb_sekretaris_desa where nik='".$_SESSION['yusnani_nik']."'");
}elseif(@$_SESSION["yusnani_status"]=="Bendahara"){
	$query_edit=mysqli_query($db,"select * from tb_bendahara where nik='".$_SESSION['yusnani_nik']."'");
}else{
	$query_edit=mysqli_query($db,"select * from tb_penduduk where nik='".$_SESSION['yusnani_nik']."'");	
		
}

$data_edit=mysqli_fetch_array($query_edit);
$_SESSION["SD_nik"]=$data_edit["nik"];
$_SESSION["SD_nomor_kk"]=$data_edit["nomor_kk"];
$_SESSION["SD_nama"]=$data_edit["nama"];
$_SESSION["SD_jenis_kelamin"]=$data_edit["jenis_kelamin"];
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

if(@$_SESSION["yusnani_status"]=="Kepala Desa"){
	$_SESSION["SD_pekerjaan"]="Kepala Desa";
}elseif(@$_SESSION["yusnani_status"]=="Sekretaris Desa"){
	$_SESSION["SD_pekerjaan"]="Sekretaris Desa";
}elseif(@$_SESSION["yusnani_status"]=="Bendahara"){
	$_SESSION["SD_pekerjaan"]="Bendahara";
}else{
	$_SESSION["SD_pekerjaan"]=$data_edit["pekerjaan"];
}

$_SESSION["SD_kewarganegaraan"]=$data_edit["kewarganegaraan"];
$_SESSION["SD_telepon"]=$data_edit["telepon"];
$_SESSION["SD_status"]=$data_edit["status"];
$_SESSION["SD_kata_sandi"]=$data_edit["kata_sandi"];
?> 

	<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
	  <tr>
		<td width="80%"  bgcolor="white" >Ubah User
		</td>
		<td width="20%"  bgcolor="white" align="right"><a href="?page=home"><font color="red">X</font></a>
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
				  <td valign="top">Nomor KK</td>
				  <td valign="top">:</td>
				  <td><input type="text" name="nomor_kk" id="nomor_kk" maxlength="30" value="<?php echo @$_SESSION["SD_nomor_kk"]; ?>" required style="width:150px"/></td>
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
				<?php if(@$_SESSION["yusnani_status"]=="Kepala Desa"){ ?>
				<?php }elseif(@$_SESSION["yusnani_status"]=="Sekretaris Desa"){ ?>
				<?php }elseif(@$_SESSION["yusnani_status"]=="Bendahara"){ ?>
				<?php }else{ ?>
					<tr>
					  <td valign="top">Pekerjaan</td>
					  <td valign="top">:</td>
					  <td><input type="text" name="pekerjaan" id="pekerjaan" maxlength="30" value="<?php echo @$_SESSION["SD_pekerjaan"]; ?>" required style="width:150px"/></td>
					</tr>
				<?php } ?>
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
					<input type="submit" name="btnedit" id="btnedit" value="Ubah" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
					<a href="?page=home"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
					</td>
				</tr>
		  </table>
		</td>
	  </tr>
	</table>
	</form>

<?php 
if (@$_POST['btnedit']){
	$_SESSION["SD_nik"]=$_POST["nik"];
	$_SESSION["SD_nomor_kk"]=$_POST["nomor_kk"];
	$_SESSION["SD_nama"]=$_POST["nama"];
	$_SESSION["SD_jenis_kelamin"]=$_POST["jenis_kelamin"];
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
	$_SESSION["SD_pekerjaan"]=$_POST["pekerjaan"];
	$_SESSION["SD_kewarganegaraan"]=$_POST["kewarganegaraan"];
	$_SESSION["SD_telepon"]=$_POST["telepon"];
	$_SESSION["SD_status"]=$_POST["status"];
	$_SESSION["SD_kata_sandi"]=$_POST["kata_sandi"];
	$query=mysqli_query($db,"select * from tb_sekretaris_desa where nik='".$_POST['nik']."' and nik<>'".$_SESSION['yusnani_nik']."'");
	if (mysqli_num_rows($query)>0){
		echo"<script>alert('Nik sekretaris desa yang sama sudah ada');document.location='?page=';</script>";
	}else{
		if(@$_SESSION["yusnani_status"]=="Kepala Desa"){
			mysqli_query($db,"update tb_kepala_desa set nik='". $_SESSION["SD_nik"] ."',nomor_kk='". $_SESSION["SD_nomor_kk"] ."',nama='". $_SESSION["SD_nama"] ."',jenis_kelamin='". $_SESSION["SD_jenis_kelamin"] ."',tempat_lahir='". $_SESSION["SD_tempat_lahir"] ."',tanggal_lahir='". $tgl_benar ."',alamat='". $_SESSION["SD_alamat"] ."',kode_pos='". $_SESSION["SD_kode_pos"] ."',rt_rw='". $_SESSION["SD_rt_rw"] ."',kelurahan='". $_SESSION["SD_kelurahan"] ."',kecamatan='". $_SESSION["SD_kecamatan"] ."',kabupaten='". $_SESSION["SD_kabupaten"] ."',provinsi='". $_SESSION["SD_provinsi"] ."',agama='". $_SESSION["SD_agama"] ."',status_perkawinan='". $_SESSION["SD_status_perkawinan"] ."',Kewarganegaraan='". $_SESSION["SD_kewarganegaraan"] ."',telepon='". $_SESSION["SD_telepon"] ."',status='". $_SESSION["SD_status"] ."',kata_sandi='". $_SESSION["SD_kata_sandi"] ."' where nik='".$_SESSION['yusnani_nik']."'");
		}elseif(@$_SESSION["yusnani_status"]=="Sekretaris Desa"){
			mysqli_query($db,"update tb_sekretaris_desa set nik='". $_SESSION["SD_nik"] ."',nomor_kk='". $_SESSION["SD_nomor_kk"] ."',nama='". $_SESSION["SD_nama"] ."',jenis_kelamin='". $_SESSION["SD_jenis_kelamin"] ."',tempat_lahir='". $_SESSION["SD_tempat_lahir"] ."',tanggal_lahir='". $tgl_benar ."',alamat='". $_SESSION["SD_alamat"] ."',kode_pos='". $_SESSION["SD_kode_pos"] ."',rt_rw='". $_SESSION["SD_rt_rw"] ."',kelurahan='". $_SESSION["SD_kelurahan"] ."',kecamatan='". $_SESSION["SD_kecamatan"] ."',kabupaten='". $_SESSION["SD_kabupaten"] ."',provinsi='". $_SESSION["SD_provinsi"] ."',agama='". $_SESSION["SD_agama"] ."',status_perkawinan='". $_SESSION["SD_status_perkawinan"] ."',Kewarganegaraan='". $_SESSION["SD_kewarganegaraan"] ."',telepon='". $_SESSION["SD_telepon"] ."',status='". $_SESSION["SD_status"] ."',kata_sandi='". $_SESSION["SD_kata_sandi"] ."' where nik='".$_SESSION['yusnani_nik']."'");
		}else{
			mysqli_query($db,"update tb_penduduk set nik='". $_SESSION["SD_nik"] ."',nomor_kk='". $_SESSION["SD_nomor_kk"] ."',nama='". $_SESSION["SD_nama"] ."',jenis_kelamin='". $_SESSION["SD_jenis_kelamin"] ."',tempat_lahir='". $_SESSION["SD_tempat_lahir"] ."',tanggal_lahir='". $tgl_benar ."',alamat='". $_SESSION["SD_alamat"] ."',kode_pos='". $_SESSION["SD_kode_pos"] ."',rt_rw='". $_SESSION["SD_rt_rw"] ."',kelurahan='". $_SESSION["SD_kelurahan"] ."',kecamatan='". $_SESSION["SD_kecamatan"] ."',kabupaten='". $_SESSION["SD_kabupaten"] ."',provinsi='". $_SESSION["SD_provinsi"] ."',agama='". $_SESSION["SD_agama"] ."',status_perkawinan='". $_SESSION["SD_status_perkawinan"] ."',pekerjaan='". $_SESSION["SD_pekerjaan"] ."',Kewarganegaraan='". $_SESSION["SD_kewarganegaraan"] ."',telepon='". $_SESSION["SD_telepon"] ."',status='". $_SESSION["SD_status"] ."',kata_sandi='". $_SESSION["SD_kata_sandi"] ."' where nik='".$_SESSION['yusnani_nik']."'");
		}
		$_SESSION['yusnani_nik']=$_SESSION["SD_nik"];
		
		$_SESSION["SD_nik"]="";
		$_SESSION["SD_nomor_kk"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_jenis_kelamin"]="";
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
		$_SESSION["SD_pekerjaan"]="";
		$_SESSION["SD_kewarganegaraan"]="Indonesia";
		$_SESSION["SD_telepon"]="";
		$_SESSION["SD_status"]="";
		$_SESSION["SD_kata_sandi"]="";
		echo "<script>alert('data diedit');document.location='?page=ubah_user'</script>";
	}
}elseif (@$_GET['aksi']=='batal_ubah'){
		$_SESSION["SD_nik"]="";
		$_SESSION["SD_nomor_kk"]="";
		$_SESSION["SD_nama"]="";
		$_SESSION["SD_jenis_kelamin"]="";
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
		$_SESSION["SD_pekerjaan"]="";
		$_SESSION["SD_kewarganegaraan"]="Indonesia";
		$_SESSION["SD_telepon"]="";
		$_SESSION["SD_status"]="";
		$_SESSION["SD_kata_sandi"]="";
		echo "<script>document.location='?page=home';</script>";
}
?>