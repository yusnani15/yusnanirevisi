<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="img/logo.png">
		<title>Pangulu Nagori Perasmian</title>
		<style type="text/css">
		img{
			position:relative;
		}
		pkk{
			position:absolute;
			left:1120px;
			color:red;	
		}
		</style>
		  <link href="jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
		  <script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
		  <script src="jquery-ui-1.11.4/jquery-ui.js"></script>
		  <script src="jquery-ui-1.11.4/jquery-ui.min.js"></script>
		  <link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.theme.css">
		  <link rel="stylesheet" href="menu.css">		
		  <link rel="stylesheet" href="style.css">
	</head>
<body>
<style type="text/css">
        body,html{
			margin:0;
			padding :0;	
		}
		body {
            background-image: url('img/background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            position: absolute;
            z-index: -1;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            opacity: 0.80;
            filter:alpha(opacity=15);
            //height:99%;
			//width:99%;
        }
		.dropdown{
			position: relative;
			display: inline-block;
		}
		.dropdown-content {
			display: none;
			position: absolute;
			border:solid black 1px;
			background-color: #2f3382;
			text-align:left;
			min-width: 300px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
		}
		.dropdown-content a {
			color: white;
			padding: 2px 0px;
			text-decoration: none;
			display: block;
		}
		.dropdown-content a:hover {
			background-color: black;
			color: white;
		}
		.dropdown:hover .dropdown-content {
			display: block;
		}
		.dropdown:hover .dropbtn {
			background-color: white;
		}
		a{text-decoration:none;	}
		p{text-decoration:none;	}
	</style>
	
<?php
session_start();
include("koneksi.php");

$menutextcolor="white";
$menubgcolor="#d61703";	
$menubordercolor="solid 1px #d61703";
$menuwidth="140px";

$btntextcolor="white";
$btnbgcolor="#d61703";

if (@$_SESSION["yusnani_nik"]==""){
//tampil login
	include("login.php");
}elseif(@$_GET["page"]=="laporan" && @$_GET["kategori"]=="penduduk"){
//tampil laporan
	include("laporan_penduduk.php");
}elseif(@$_GET["page"]=="laporan" && @$_GET["kategori"]=="permohonan_surat"){
//tampil laporan
	include("laporan_permohonan_surat.php");
}elseif(@$_GET["page"]=="laporan" && @$_GET["kategori"]=="realisasi_anggaran"){
//tampil laporan
	include("lap_realisasi_anggaran.php");
}elseif(@$_GET["page"]=="laporan" && @$_GET["kategori"]=="realisasi_bantuan"){
//tampil laporan
	include("lap_realisasi_bantuan.php");
}elseif(@$_GET["page"]=="laporan" && @$_GET["kategori"]=="APBDes"){
//tampil laporan
	include("lap_APBDes.php");
}else{
//tampil index
?>

	<!-- H e a d e r -->
	<table width="100%" border="0" align="center" cellpadding="1" cellspacing="" style="background-color:#534c4c;border:solid 1px" >
		<tr>
			<td width="10px" valign="top" background="img/header_left.jpg" align="left">
				<a href="?link=home"><img src="img/logo.png" height="90px"></a>
			</td>
			<td width="auto" height="30px" valign="top" background="img/header.jpg" align="left">
				&nbsp;&nbsp;&nbsp;
				<font color="white" style="text-shadow: 2px 2px #914b41;font-size:40px">
				<strong>PEMERINTAH KABUPATEN SIMALUNGUN</strong>
				</font><br>

				&nbsp;&nbsp;&nbsp;
				<font color="white" style="text-shadow: 2px 2px #914b41;font-size:20px">
				<strong>KECAMATAN DOLOK SILAU</strong>
				</font><br>
				
				&nbsp;&nbsp;&nbsp;
				<font color="white" style="text-shadow: 2px 2px #914b41;font-size:20px">
				<strong>KANTOR PANGULU  PERASMIAN</strong>
				</font>
			</td>
		</tr>
	</table>
	<table width="100% border="0" align="center" cellpadding="1" cellspacing="" background="img/menu.png" style="background-color:#958686;border:solid 1px" >
		<tr>
			<td width="" valign="middle" align="center">
				<?php
				if (@$_SESSION['yusnani_status']=="Kepala Desa" && $_SESSION['yusnani_nik']!=""){?>
					<div class="dropdown">
						<a href="?page=beranda"><input type="button" name="button" id="button2" value="Beranda" <?php echo "style='width:".$menuwidth.";background-color:".$menubgcolor.";height:30px;color:".$menutextcolor.";border:".$menubordercolor.";'"; ?>></a>
					</div>
					<div class="dropdown">
						<a href="?page=sekretaris_desa"><input type="button" name="button" id="button2" value="Sekretaris Desa" <?php echo "style='width:".$menuwidth.";background-color:".$menubgcolor.";height:30px;color:".$menutextcolor.";border:".$menubordercolor.";'"; ?>></a>
					</div>
					<div class="dropdown">
						<input type="button" name="button" id="button2" value="Laporan" <?php echo "style='width:".$menuwidth.";background-color:".$menubgcolor.";height:30px;color:".$menutextcolor.";border:".$menubordercolor.";'"; ?>>
						<div class="dropdown-content">
							<a href="?page=laporan&kategori=penduduk">Laporan Penduduk</a>
							<a href="?page=laporan&kategori=permohonan_surat">Laporan Permohonan Surat </a>
						</div>
					</div>
					<div class="dropdown">
						<input type="button" name="button" id="button2" value="Profil" <?php echo "style='width:".$menuwidth.";background-color:".$menubgcolor.";height:30px;color:".$menutextcolor.";border:".$menubordercolor.";'"; ?>>
						<div class="dropdown-content">
							<a href="?page=ubah_user">Ubah User</a>
							<a href="?page=keluar">Keluar</a>
						</div>
					</div>
				<?php }
				if (@$_SESSION['yusnani_status']=="Sekretaris Desa" && $_SESSION['yusnani_nik']!=""){?>
					<div class="dropdown">
						<a href="?page=beranda"><input type="button" name="button" id="button2" value="Beranda" <?php echo "style='width:".$menuwidth.";background-color:".$menubgcolor.";height:30px;color:".$menutextcolor.";border:".$menubordercolor.";'"; ?>></a>
					</div>
					<div class="dropdown">
						<input type="button" name="button" id="button2" value="Data Master" <?php echo "style='width:".$menuwidth.";background-color:".$menubgcolor.";height:30px;color:".$menutextcolor.";border:".$menubordercolor.";'"; ?>>
						<div class="dropdown-content">
							<a href="?page=penduduk">Data Penduduk</a>
							<a href="?page=kartu_keluarga">Data Kartu Keluarga</a>
							<a href="?page=data_lahir">Data Lahir</a>
							<a href="?page=data_meninggal">Data Meninggal</a>
							<a href="?page=data_pendatang">Data Pendatang</a>
							<a href="?page=data pindah">Data Pindah</a>
						</div>
					</div>
					
					<div class="dropdown">
						<input type="button" name="button" id="button2" value="Profil" <?php echo "style='width:".$menuwidth.";background-color:".$menubgcolor.";height:30px;color:".$menutextcolor.";border:".$menubordercolor.";'"; ?>>
						<div class="dropdown-content">
							<a href="?page=ubah_user">Ubah User</a>
							<a href="?page=keluar">Keluar</a>
						</div>
					</div>
				<?php }
				if (@$_SESSION['yusnani_status']=="Penduduk" && $_SESSION['yusnani_nik']!=""){?>
					<div class="dropdown">
						<a href="?page=beranda"><input type="button" name="button" id="button2" value="Beranda" <?php echo "style='width:".$menuwidth.";background-color:".$menubgcolor.";height:30px;color:".$menutextcolor.";border:".$menubordercolor.";'"; ?>></a>
					</div>
					<div class="dropdown">
						<input type="button" name="button" id="button2" value="Surat" <?php echo "style='width:".$menuwidth.";background-color:".$menubgcolor.";height:30px;color:".$menutextcolor.";border:".$menubordercolor.";'"; ?>>
						<div class="dropdown-content">
							<a href="?page=surat_domisili">Surat Keterangan Domisili</a>
							<a href="?page=surat_pindah">Surat Keterangan Pindah</a>
							<a href="?page=surat_ahli_waris">Surat Keterangan Ahli Waris</a>
							<a href="?page=surat_kematian">Surat Keterangan Kematian</a>
							<a href="?page=surat_usaha">Surat Keterangan Usaha</a>
							<a href="?page=surat_belum_menikah">Surat Keterangan Belum Menikah</a>
							<a href="?page=surat_menikah">Surat Keterangan Untuk Menikah</a>
							<a href="?page=surat_pengganti_ktp">Surat Keterangan Pengganti KTP</a>
							<a href="?page=surat_kurang_mampu">Surat Keterangan Kurang Mampu</a>
							<a href="?page=surat_berkelakuan_baik">Surat Keterangan Berkelakukan Baik</a>							
						</div>
					</div>
					<div class="dropdown">
						<input type="button" name="button" id="button2" value="Profil" <?php echo "style='width:".$menuwidth.";background-color:".$menubgcolor.";height:30px;color:".$menutextcolor.";border:".$menubordercolor.";'"; ?>>
						<div class="dropdown-content">
							<a href="?page=ubah_user">Ubah User</a>
							<a href="?page=keluar">Keluar</a>
						</div>
					</div>
				<?php }?>
			</td>
		</tr>
	</table>

	<!-- C o n t e n -->
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="white" style="border:solid 1px">
		<tr>
			<td height="460px" align="left" valign="top"><?php include("conten.php"); ?>
			</td>
		</tr>
	</table>
	
	<!-- F o o t e r -->	
	<table width="100%S" border="0" align="center" cellpadding="0" cellspacing="0" style="border:solid 3pt grey;">
		<tr>
			<td colspan="2" width="" height="" valign="buttom" background="img/footer.jpg">
				<!--<marquee behavior="alternate">-->
				&nbsp;&nbsp;&nbsp;
				<font color="white" style="-webkit-text-stroke: 0px white;text-shadow: 0px 0px #914b41;font-size:20px">
				<strong>PEMERINTAH KABUPATEN SIMALUNGUN</strong>
				</font>
				<!--</marquee>-->
			</td>
		</tr>
		<tr>
			<td width="" height="" valign="buttom" background="img/menu.png">
				<!--<marquee behavior="alternate">-->
					&nbsp;&nbsp;&nbsp;
					<font size="3+" color="black">
					KANTOR PANGULU PERASMIAN
					</font>
				<!--</marquee>-->
			</td>
		</tr>
	</table>	
<?php } ?>
<script src="script.js"></script>
</body>
</html>