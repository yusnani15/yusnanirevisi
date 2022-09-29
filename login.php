<?php 	if (@$_POST['status']){
	$_SESSION['yusnani_status']=$_POST["status"];
}
?>
<form id="form1" name="form1" method="post" action="">
	<table width="360" border="0" align="center" cellpadding="3" cellspacing="3" style="border:solid 2pt black" bgcolor="white">
		<tr>
			<td align="center">
			<strong>Sistem Informasi Administrasi Kependudukan</strong><br><br>
			<img src="img/logo.png" width="100px"/>
			<br><br>
			<strong>Desa Perasmian Kecamatan Dolok Silau<br>Kabupaten Simalungun</strong><br><br>
				<table width="100%" border="0" align="center" cellpadding="4" cellspacing="3">
					<tr>
						<td width="160"><img src="img/status1.png" width="" height="15px"/>Status</td>
						<td width="">
							<select id="status" name="status">
								<option <?php if(@$_SESSION["yusnani_status"]=="Penduduk"){ echo"Selected"; } ?>>Penduduk</option>
								<option <?php if(@$_SESSION["yusnani_status"]=="Sekretaris Desa"){ echo"Selected"; } ?>>Sekretaris Desa</option>
								<option <?php if(@$_SESSION["yusnani_status"]=="Kepala Desa"){ echo"Selected"; } ?>>Kepala Desa</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width=""><img src="img/user1.png" width="" height="15px"/>NIK</td>
						<td width=""><input type="text" name="nik" id="nik" required /></td>
					</tr>
					<tr>
						<td width=""><img src="img/password1.png" width="" height="15px"/>Kata Sandi</td>
						<td><input type="password" name="kata_sandi" id="kata_sandi" required/></td>
					</tr>
					<tr>
						<td colspan="3" align="center">
							<p>
								<input type="submit" name="btnlogin" id="btnlogin" value="MASUK" <?php echo "style='width:99%;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/>
							</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>

<?php
if (@$_POST['btnlogin']){
	if (@$_POST['status']=="Kepala Desa"){
		$query=mysqli_query($db,"select * from tb_kepala_desa where nik='".$_POST['nik']."' and kata_sandi='".$_POST['kata_sandi']."'");
		if (mysqli_num_rows($query)>0){
			$_SESSION['yusnani_status']=$_POST["status"];
			$_SESSION['yusnani_nik']=$_POST['nik'];
			echo"<script>alert('Login Berhasil');document.location='?page=home';</script >";
		}else{
			echo"<script>alert('nik dan kata sandi salah');document.location='';</script >";
		}
	}

	elseif (@$_POST['status']=="Bendahara"){
		$query=mysqli_query($db,"select * from tb_bendahara where nik='".$_POST['nik']."' and kata_sandi='".$_POST['kata_sandi']."'");
		if (mysqli_num_rows($query)>0){
			$_SESSION['yusnani_status']=$_POST["status"];
			$_SESSION['yusnani_nik']=$_POST['nik'];
			echo"<script>alert('Login Berhasil');document.location='?link=home';</script >";
		}else{
			echo"<script>alert('nik dan kata sandi salah');document.location='';</script >";
		}
	}
	elseif (@$_POST['status']=="Sekretaris Desa"){
		$query=mysqli_query($db,"select * from tb_sekretaris_desa where nik='".$_POST['nik']."' and kata_sandi='".$_POST['kata_sandi']."'");
		if (mysqli_num_rows($query)>0){
			$_SESSION['yusnani_status']=$_POST["status"];
			$_SESSION['yusnani_nik']=$_POST['nik'];
			echo"<script>alert('Login Berhasil');document.location='?link=home';</script >";
		}else{
			echo"<script>alert('nik dan kata sandi salah');document.location='';</script >";
		}
	}
	elseif (@$_POST['status']=="Penduduk"){
		$query=mysqli_query($db,"select * from tb_penduduk where nik='".$_POST['nik']."' and kata_sandi='".$_POST['kata_sandi']."'");
		if (mysqli_num_rows($query)>0){
			$_SESSION['yusnani_status']=$_POST["status"];
			$_SESSION['yusnani_nik']=$_POST['nik'];
			echo"<script>alert('Login Berhasil');document.location='?link=home';</script >";
		}else{
			echo"<script>alert('nik dan kata sandi salah');document.location='';</script >";
		}
	}
}
?>