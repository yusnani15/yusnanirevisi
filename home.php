<?php
//notif surat domisili
$query=mysqli_query($db,"select * from tb_surat_domisili");	
$jlh_surat_domisili=0;
$data=mysqli_fetch_array($query);
$jlh_surat_domisili=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_domisili where status='Belum Divalidasi'");	
$notif_surat_domisili=0;
$data=mysqli_fetch_array($query);
$notif_surat_domisili=mysqli_num_rows($query);

//notif surat pindah
$query=mysqli_query($db,"select * from tb_surat_pindah");	
$jlh_surat_pindah=0;
$data=mysqli_fetch_array($query);
$jlh_surat_pindah=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_pindah where status='Belum Divalidasi'");	
$notif_surat_pindah=0;
$data=mysqli_fetch_array($query);
$notif_surat_pindah=mysqli_num_rows($query);

//notif surat usaha
$query=mysqli_query($db,"select * from tb_surat_usaha");	
$jlh_surat_usaha=0;
$data=mysqli_fetch_array($query);
$jlh_surat_usaha=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_usaha where status='Belum Divalidasi'");	
$notif_surat_usaha=0;
$data=mysqli_fetch_array($query);
$notif_surat_usaha=mysqli_num_rows($query);

//notif surat ahli waris
$query=mysqli_query($db,"select * from tb_surat_ahli_waris");	
$jlh_surat_ahli_waris=0;
$data=mysqli_fetch_array($query);
$jlh_surat_ahli_waris=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_ahli_waris where status='Belum Divalidasi'");	
$notif_surat_ahli_waris=0;
$data=mysqli_fetch_array($query);
$notif_surat_ahli_waris=mysqli_num_rows($query);

//notif surat kematian
$query=mysqli_query($db,"select * from tb_surat_kematian");
$jlh_surat_kematian=0;
$data=mysqli_fetch_array($query);
$jlh_surat_kematian=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_kematian where status='Belum Divalidasi'");
$notif_surat_kematian=0;
$data=mysqli_fetch_array($query);
$notif_surat_kematian=mysqli_num_rows($query);

//notif surat menikah
$query=mysqli_query($db,"select * from tb_surat_menikah");
$jlh_surat_menikah=0;
$data=mysqli_fetch_array($query);
$jlh_surat_menikah=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_menikah where status='Belum Divalidasi'");
$notif_surat_menikah=0;
$data=mysqli_fetch_array($query);
$notif_surat_menikah=mysqli_num_rows($query);

//notif surat belum_menikah	
$query=mysqli_query($db,"select * from tb_surat_belum_menikah");	
$jlh_surat_belum_menikah=0;
$data=mysqli_fetch_array($query);
$jlh_surat_belum_menikah=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_belum_menikah where status='Belum Divalidasi'");	
$notif_surat_belum_menikah=0;
$data=mysqli_fetch_array($query);
$notif_surat_belum_menikah=mysqli_num_rows($query);

//notif surat pengganti KTP
$query=mysqli_query($db,"select * from tb_surat_pengganti_ktp");	
$jlh_surat_pengganti_ktp=0;
$data=mysqli_fetch_array($query);
$jlh_surat_pengganti_ktp=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_pengganti_ktp where status='Belum Divalidasi'");	
$notif_surat_pengganti_ktp=0;
$data=mysqli_fetch_array($query);
$notif_surat_pengganti_ktp=mysqli_num_rows($query);

//notif surat kurang_mampu
$query=mysqli_query($db,"select * from tb_surat_kurang_mampu");	
$jlh_surat_kurang_mampu=0;
$data=mysqli_fetch_array($query);
$jlh_surat_kurang_mampu=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_kurang_mampu where status='Belum Divalidasi'");	
$notif_surat_kurang_mampu=0;
$data=mysqli_fetch_array($query);
$notif_surat_kurang_mampu=mysqli_num_rows($query);

//notif surat berkelakuan baik
$query=mysqli_query($db,"select * from tb_surat_berkelakuan_baik");	
$jlh_surat_berkelakuan_baik=0;
$data=mysqli_fetch_array($query);
$jlh_surat_berkelakuan_baik=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_berkelakuan_baik where status='Belum Divalidasi'");	
$notif_surat_berkelakuan_baik=0;
$data=mysqli_fetch_array($query);
$notif_surat_berkelakuan_baik=mysqli_num_rows($query);


//notif jumlah KK
$query=mysqli_query($db,"select * from tb_kartu_keluarga");	
$jlh_kk=0;
$data=mysqli_fetch_array($query);
$jlh_kk=mysqli_num_rows($query);

//notif jumlah penduduk
$query=mysqli_query($db,"select * from tb_penduduk");	
$jlh_penduduk=0;
$data=mysqli_fetch_array($query);
$jlh_penduduk=mysqli_num_rows($query);
	
$jlh_permohonan = $jlh_surat_domisili +
		$jlh_surat_pindah +
		$jlh_surat_ahli_waris +
		$jlh_surat_kematian +
		$jlh_surat_usaha +
		$jlh_surat_belum_menikah +
		$jlh_surat_menikah +
		$jlh_surat_pengganti_ktp +
		$jlh_surat_kurang_mampu +
		$jlh_surat_berkelakuan_baik; 
	
if (@$_SESSION['yusnani_status']=="Kepala Desa" && $_SESSION['yusnani_nik']!=""){?>
	<table width="99.9%" border="0" align="center" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="390" height="100px" bgcolor="grey" align="center">
		<font size="10+">
			<?php echo "Selamat datang di halaman <B>Kepala Desa</B>"; ?>
		</font>
		</td>
	  </tr>
	</table>
<?php }?>

<?php
if (@$_SESSION['yusnani_status']=="Sekretaris Desa" && $_SESSION['yusnani_nik']!=""){?>
	<table width="99.9%" border="0" align="center" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="390" height="60px" bgcolor="grey" align="center">
		<font size="10+">
			<?php echo "Selamat datang di halaman <B>Sekretaris Desa </B>"; ?> 
		</font>
		</td>
	  </tr>
	</table>

	<a href="?page=kartu_keluarga">
	<table width="20%" border="0" align="left" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="100%" height="70px" bgcolor="white" style="border: solid 2px #0171b9;background-color:#a2f4dc;" align="center">
			<font size="5+">
			<?php echo "Jumlah KK: <B>$jlh_kk</B>"; ?>
			</font>
		</td>
	  </tr>
	</table>
	
	<a href="?page=penduduk">
	<table width="20%" border="0" align="left" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="100%" height="70px" bgcolor="white" style="border: solid 2px #0171b9;background-color:#a2f4dc;" align="center">
			<font size="5+">
			<?php echo "Jumlah Penduduk: <B>$jlh_penduduk</B>"; ?>
			</font>
		</td>
	  </tr>
	</table>
	</a>

	<a href="?page=data_lahir">
	<table width="20%" border="0" align="left" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="100%" height="70px" bgcolor="white" style="border: solid 2px #0171b9;background-color:#a2f4dc;" align="center">
			<font size="5+">
			<?php echo "Jumlah Penduduk: <B>$jlh_penduduk</B>"; ?>
			</font>
		</td>
	  </tr>
	</table>
	</a>
	
	<a href="?page=laporan&kategori=permohonan_surat" target="blank">
	<table width="20%" border="0" align="left" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="100%" height="70px" bgcolor="white" style="border: solid 2px #0171b9;background-color:#a2f4dc;" align="center">
			<font size="5+">
			<?php echo "Jumlah Permohonan Surat: <B>$jlh_permohonan</B>"; ?>
			</font>
		</td>
	  </tr>
	</table>
	</a>
	<br>
	<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="100%" height="0" bgcolor="white" style="border: solid 0px #0171b9;background-color:red;" align="center">
		</td>
	  </tr>
	</table>

	<center><p style="font-size:28px;line-height:0px;"><STRONG><U>PERMOHONAN SURAT</U></STRONG></p></center>
	<a href="?page=surat_domisili">
	<table width="20%" border="0" align="left" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="100%" height="70px" bgcolor="white" style="border: solid 2px #0171b9" align="center">
			<font size="5+">
			<?php echo "Surat Keterangan <br> Domisili: <B>$jlh_surat_domisili</B>"; ?>
			</font>
			<?php if($notif_surat_domisili>0){ ?>
				<table width="20%" border="0" align="left" cellpadding="0" cellspacing="0"style="border-radius:20px 20px;border:solid 1px red;width:40px;height:40px;background-color:red;color:white">
					<tr>
						<td align="center" valign="middle">
							<font size="3+">
							<?php echo $notif_surat_domisili; ?>
							</font>
						</td>
					</tr>
				</table>
			<?php } ?>	
		</td>
	  </tr>
	</table>
	</a>
	<a href="?page=surat_pindah">
	<table width="20%" border="0" align="left" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="100%" height="70px" bgcolor="white" style="border: solid 2px #0171b9" align="center">
		<font size="5+">
			<?php echo "Surat Keterangan <br>Pindah: <B>$jlh_surat_pindah</B>"; ?>
		</font>
			<?php if($notif_surat_pindah>0){ ?>
				<table width="20%" border="0" align="left" cellpadding="0" cellspacing="0"style="border-radius:20px 20px;border:solid 1px red;width:40px;height:40px;background-color:red;color:white">
					<tr>
						<td align="center" valign="middle">
							<font size="3+">
							<?php echo $notif_surat_pindah; ?>
							</font>
						</td>
					</tr>
				</table>
			<?php } ?>
		</td>
	  </tr>
	</table>
	</a>
	<a href="?page=surat_ahli_waris">
	<table width="20%" border="0" align="left" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="100%" height="70px" bgcolor="white" style="border: solid 2px #0171b9" align="center">
		<font size="5+">
			<?php echo "Surat Keterangan <br> Ahli Waris: <B>$jlh_surat_ahli_waris</B>"; ?>
		</font>
			<?php if($notif_surat_ahli_waris>0){ ?>
				<table width="20%" border="0" align="left" cellpadding="0" cellspacing="0"style="border-radius:20px 20px;border:solid 1px red;width:40px;height:40px;background-color:red;color:white">
					<tr>
						<td align="center" valign="middle">
							<font size="3+">
							<?php echo $notif_surat_ahli_waris; ?>
							</font>
						</td>
					</tr>
				</table>
			<?php } ?>
		</td>
	  </tr>
	</table>	
	</a>
	<a href="?page=surat_kematian">
	<table width="20%" border="0" align="left" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="100%" height="70px" bgcolor="white" style="border: solid 2px #0171b9" align="center">
		<font size="5+">
			<?php echo "Surat Keterangan <br>Kematian: <B>$jlh_surat_kematian</B>"; ?>
		</font>
			<?php if($notif_surat_kematian>0){ ?>
				<table width="20%" border="0" align="left" cellpadding="0" cellspacing="0"style="border-radius:20px 20px;border:solid 1px red;width:40px;height:40px;background-color:red;color:white">
					<tr>
						<td align="center" valign="middle">
							<font size="3+">
							<?php echo $notif_surat_kematian; ?>
							</font>
						</td>
					</tr>
				</table>
			<?php } ?>
		</td>
	  </tr>
	</table>	
	</a>
	<a href="?page=surat_usaha">
	<table width="20%" border="0" align="left" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="100%" height="70px" bgcolor="white" style="border: solid 2px #0171b9" align="center">
		<font size="5+">
			<?php echo "Surat Keterangan <br> Usaha: <B>$jlh_surat_usaha</B>"; ?>
		</font>
			<?php if($notif_surat_usaha>0){ ?>
				<table width="20%" border="0" align="left" cellpadding="0" cellspacing="0"style="border-radius:20px 20px;border:solid 1px red;width:40px;height:40px;background-color:red;color:white">
					<tr>
						<td align="center" valign="middle">
							<font size="3+">
							<?php echo $notif_surat_usaha; ?>					
							</font>
						</td>
					</tr>
				</table>
			<?php } ?>			
		</td>
	  </tr>
	</table>	
	</a>
	<a href="?page=surat_belum_menikah">
	<table width="20%" border="0" align="left" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="100%" height="70px" bgcolor="white" style="border: solid 2px #0171b9" align="center">
		<font size="5+">
			<?php echo "Surat Keterangan <br>  Belum Menikah: <B>$jlh_surat_belum_menikah</B>"; ?>
		</font>
			<?php if($notif_surat_belum_menikah>0){ ?>
				<table width="20%" border="0" align="left" cellpadding="0" cellspacing="0"style="border-radius:20px 20px;border:solid 1px red;width:40px;height:40px;background-color:red;color:white">
					<tr>
						<td align="center" valign="middle">
							<font size="3+">
							<?php echo $notif_surat_belum_menikah; ?>					
							</font>
						</td>
					</tr>
				</table>
			<?php } ?>			
		</td>
	  </tr>
	</table>	
	</a>
	<a href="?page=surat_menikah">
	<table width="20%" border="0" align="left" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="100%" height="70px" bgcolor="white" style="border: solid 2px #0171b9" align="center">
			<font size="5+">
				<?php echo "Surat Keterangan <br> Untuk Menikah: <B>$jlh_surat_menikah</B>"; ?>
			</font>
			<?php if($notif_surat_menikah>0){ ?>
				<table width="20%" border="0" align="left" cellpadding="0" cellspacing="0"style="border-radius:20px 20px;border:solid 1px red;width:40px;height:40px;background-color:red;color:white">
					<tr>
						<td align="center" valign="middle">
							<font size="3+">
							<?php echo $notif_surat_menikah; ?>					
							</font>
						</td>
					</tr>
				</table>
			<?php } ?>			
		</td>
	  </tr>
	</table>	
	</a>
	<a href="?page=surat_pengganti_ktp">
	<table width="20%" border="0" align="left" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="100%" height="70px" bgcolor="white" style="border: solid 2px #0171b9" align="center">
		<font size="5+">
			<?php echo "Surat Keterangan <br> Pengganti KTP: <B>$jlh_surat_pengganti_ktp</B>"; ?>
		</font>
			<?php if($notif_surat_pengganti_ktp>0){ ?>
				<table width="20%" border="0" align="left" cellpadding="0" cellspacing="0"style="border-radius:20px 20px;border:solid 1px red;width:40px;height:40px;background-color:red;color:white">
					<tr>
						<td align="center" valign="middle">
							<font size="3+">
							<?php echo $notif_surat_pengganti_ktp; ?>					
							</font>
						</td>
					</tr>
				</table>
			<?php } ?>			
		</td>
	  </tr>
	</table>	
	</a>
	<a href="?page=surat_kurang_mampu">
	<table width="20%" border="0" align="left" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="100%" height="70px" bgcolor="white" style="border: solid 2px #0171b9" align="center">
		<font size="5+">
			<?php echo "Surat Keterangan <br> Kurang Mampu: <B>$jlh_surat_kurang_mampu</B>"; ?>
		</font>
			<?php if($notif_surat_kurang_mampu>0){ ?>
				<table width="20%" border="0" align="left" cellpadding="0" cellspacing="0"style="border-radius:20px 20px;border:solid 1px red;width:40px;height:40px;background-color:red;color:white">
					<tr>
						<td align="center" valign="middle">
							<font size="3+">
							<?php echo $notif_surat_kurang_mampu; ?>					
							</font>
						</td>
					</tr>
				</table>
			<?php } ?>			
		</td>
	  </tr>
	</table>	
	</a>
	<a href="?page=surat_berkelakuan_baik">
	<table width="20%" border="0" align="left" cellpadding="3" cellspacing="3">
	  <tr>
		<td width="100%" height="70px" bgcolor="white" style="border: solid 2px #0171b9" align="center">
		<font size="5+">
			<?php echo "Surat Keterangan Berkelakuan Baik: <B>$jlh_surat_berkelakuan_baik</B>"; ?>
		</font>
			<?php if($notif_surat_berkelakuan_baik>0){ ?>
				<table width="20%" border="0" align="left" cellpadding="0" cellspacing="0"style="border-radius:20px 20px;border:solid 1px red;width:40px;height:40px;background-color:red;color:white">
					<tr>
						<td align="center" valign="middle">
							<font size="3+">
							<?php echo $notif_surat_berkelakuan_baik; ?>					
							</font>
						</td>
					</tr>
				</table>
			<?php } ?>			
		</td>
	  </tr>
	</table>	
	</a>
<?php }?>
<?php
if (@$_SESSION['yusnani_status']=="Penduduk" && $_SESSION['yusnani_nik']!=""){?>
	<table width="99.9%" border="0" align="center" cellpadding="3" cellspacing="3">
	  <tr>
	  <td width="300" height="50px" bgcolor="grey" align="center">
		<font size="10+">
			<?php echo "Selamat datang di halaman <B>Penduduk</B>"; ?>
		</font>
		</td>
	  </tr>
	</table><br>
	<br>
	

	<!-- content-section-starts-here -->
	<div class="main-body">
		<div class="wrap">
			<div class="col-md-8 content-left">
			
				<div align="time new roman">
                   
		<h2 class="post">Visi dan Misi</h2>
                      
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    
    padding: 8px;
}

tr:nth-child(even){background-color: #f6f6f6}

th {
    background-color: #0171b9;
    color: white;
}
</style>

<br>
<table>
  <tbody><tr>
  
    <th>VISI</th>
    <th>MISI</th>
  </tr>
  <tr align="justify">
   
    <td align="justify">
Mewujudkan Desa Perasmian yang Maju dan Sejahtera</td>
    <td align="justify">
    <ul>
    <li>Meningkatkan pembangunan agar ada perubahan sehingga desa menjadi maju. </li>
	<li>Meningkatkan perekonomian masyarakat.</li>
    <li>Meningkatkan pengelolaan sumber daya alam untuk kesejahteraan masyarakat.</li>
    <li>Memberikan pemenuhan segala hak hak kebutuhan dasar warga masyarakat Desa Perasmian.</li>
    <li>Peningkatan peran dan fungsi Pemerintahan Desa dalam pelayanan masyarakat.</li>
    </ul></td>
  </tr>
</tbody></table>
        </div>

<?php }?>
<br>
<table width="100%" cellpadding="0" cellspacing="0" style="border:0px solid #b1dfc0; border-radius:0px; float:left">
  <tr>
    <td width="100%" height="auto" align="center" valign="middle">
	<marquee behavior="alternate">
		<img src="img/slide/1.jpg" height="300" style="margin:0">
		<img src="img/slide/2.jpg" height="300" style="margin:0">
		<img src="img/slide/3.jpg" height="300" style="margin:0">
		<img src="img/slide/4.jpg" height="300" style="margin:0">
		<img src="img/slide/5.jpg" height="300" style="margin:0">
		<img src="img/slide/6.jpg" height="300" style="margin:0">
		<img src="img/slide/7.jpg" height="300" style="margin:0">
		<img src="img/slide/8.jpg" height="300" style="margin:0">
		<img src="img/slide/9.jpg" height="300" style="margin:0">
		<img src="img/slide/10.jpg" height="300" style="margin:0">
		</marquee>
	</td>
  </tr>
</table>