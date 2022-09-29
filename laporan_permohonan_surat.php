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
	</head>
<body>



<?php 
include("koneksi.php");
//notif surat domisili
$query=mysqli_query($db,"select * from tb_surat_domisili where status='Telah Divalidasi'");	
$jlh_surat_domisili=0;
$data=mysqli_fetch_array($query);
$jlh_surat_domisili=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_domisili where status='Belum Divalidasi'");	
$notif_surat_domisili=0;
$data=mysqli_fetch_array($query);
$notif_surat_domisili=mysqli_num_rows($query);

//notif surat pindah
$query=mysqli_query($db,"select * from tb_surat_pindah  where status='Telah Divalidasi'");	
$jlh_surat_pindah=0;
$data=mysqli_fetch_array($query);
$jlh_surat_pindah=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_pindah where status='Belum Divalidasi'");	
$notif_surat_pindah=0;
$data=mysqli_fetch_array($query);
$notif_surat_pindah=mysqli_num_rows($query);

//notif surat usaha
$query=mysqli_query($db,"select * from tb_surat_usaha  where status='Telah Divalidasi'");	
$jlh_surat_usaha=0;
$data=mysqli_fetch_array($query);
$jlh_surat_usaha=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_usaha where status='Belum Divalidasi'");	
$notif_surat_usaha=0;
$data=mysqli_fetch_array($query);
$notif_surat_usaha=mysqli_num_rows($query);

//notif surat ahli waris
$query=mysqli_query($db,"select * from tb_surat_ahli_waris  where status='Telah Divalidasi'");	
$jlh_surat_ahli_waris=0;
$data=mysqli_fetch_array($query);
$jlh_surat_ahli_waris=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_ahli_waris where status='Belum Divalidasi'");	
$notif_surat_ahli_waris=0;
$data=mysqli_fetch_array($query);
$notif_surat_ahli_waris=mysqli_num_rows($query);

//notif surat kematian
$query=mysqli_query($db,"select * from tb_surat_kematian  where status='Telah Divalidasi'");
$jlh_surat_kematian=0;
$data=mysqli_fetch_array($query);
$jlh_surat_kematian=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_kematian where status='Belum Divalidasi'");
$notif_surat_kematian=0;
$data=mysqli_fetch_array($query);
$notif_surat_kematian=mysqli_num_rows($query);

//notif surat menikah
$query=mysqli_query($db,"select * from tb_surat_menikah where status='Telah Divalidasi'");
$jlh_surat_menikah=0;
$data=mysqli_fetch_array($query);
$jlh_surat_menikah=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_menikah where status='Belum Divalidasi'");
$notif_surat_menikah=0;
$data=mysqli_fetch_array($query);
$notif_surat_menikah=mysqli_num_rows($query);

//notif surat belum_menikah	
$query=mysqli_query($db,"select * from tb_surat_belum_menikah where status='Telah Divalidasi'");	
$jlh_surat_belum_menikah=0;
$data=mysqli_fetch_array($query);
$jlh_surat_belum_menikah=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_belum_menikah where status='Belum Divalidasi'");	
$notif_surat_belum_menikah=0;
$data=mysqli_fetch_array($query);
$notif_surat_belum_menikah=mysqli_num_rows($query);

//notif surat pengganti KTP
$query=mysqli_query($db,"select * from tb_surat_pengganti_ktp where status='Telah Divalidasi'");	
$jlh_surat_pengganti_ktp=0;
$data=mysqli_fetch_array($query);
$jlh_surat_pengganti_ktp=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_pengganti_ktp where status='Belum Divalidasi'");	
$notif_surat_pengganti_ktp=0;
$data=mysqli_fetch_array($query);
$notif_surat_pengganti_ktp=mysqli_num_rows($query);

//notif surat kurang_mampu
$query=mysqli_query($db,"select * from tb_surat_kurang_mampu where status='Telah Divalidasi'");	
$jlh_surat_kurang_mampu=0;
$data=mysqli_fetch_array($query);
$jlh_surat_kurang_mampu=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_kurang_mampu where status='Belum Divalidasi'");	
$notif_surat_kurang_mampu=0;
$data=mysqli_fetch_array($query);
$notif_surat_kurang_mampu=mysqli_num_rows($query);

//notif surat berkelakuan baik
$query=mysqli_query($db,"select * from tb_surat_berkelakuan_baik where status='Telah Divalidasi'");	
$jlh_surat_berkelakuan_baik=0;
$data=mysqli_fetch_array($query);
$jlh_surat_berkelakuan_baik=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_berkelakuan_baik where status='Belum Divalidasi'");	
$notif_surat_berkelakuan_baik=0;
$data=mysqli_fetch_array($query);
$notif_surat_berkelakuan_baik=mysqli_num_rows($query);
	?>
	<table width="797" align="center" cellpadding="3" bgcolor="white" cellspacing="0" style="border:4px solid #989; border-radius:0px;">
	  <tr>
		<td align="center">
		<?php include("lap_title.php");?>
			<table width="780" border="0" align="center" cellpadding="3" cellspacing="3">
			  <tr>
				<td width="780" bgcolor=""  background="img/blk.jpg" align="left"><font color=""><strong></strong></font>
				  <table width="780" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
				  <tr>
					<th width="150">Surat</th>
					<th align="center" width="10">Jumlah Permohonan</th>
				  </tr>
				  <tr>
					<td width="150">Surat Keterangan Domisili</td>
					<td align="center"><?php echo $jlh_surat_domisili; ?></td>
				  </tr>
				  <tr>
					<td width="200">Surat Keterangan Pindah</td>
					<td align="center"><?php echo $jlh_surat_pindah; ?></td>
				  </tr>
				  <tr>
					<td width="200">Surat Keterangan Ahli Waris</td>
					<td align="center"><?php echo $jlh_surat_ahli_waris; ?></td>
				  </tr>
				  <tr>
					<td width="200">Surat Keterangan Kematian</td>
					<td align="center"><?php echo $jlh_surat_kematian; ?></td>
				  </tr>
				  <tr>
					<td width="200">Surat Keterangan Usaha</td>
					<td align="center"><?php echo $jlh_surat_usaha; ?></td>
				  </tr>
				  <tr>
					<td width="200">Surat Keterangan Belum Menikah</td>
					<td align="center"><?php echo $jlh_surat_belum_menikah; ?></td>
				  </tr>
				  <tr>
					<td width="200">Surat Keterangan Untuk Menikah</td>
					<td align="center"><?php echo $jlh_surat_menikah; ?></td>
				  </tr>
				  <tr>
					<td width="200">Surat Keterangan Pengganti KTP</td>
					<td align="center"><?php echo $jlh_surat_pengganti_ktp; ?></td>
				  </tr>
				  <tr>
					<td width="200">Surat Keterangan Kurang Mampu</td>
					<td align="center"><?php echo $jlh_surat_kurang_mampu; ?></td>
				  </tr>
				  <tr>
					<td width="200">Surat Keterangan Berkelakukan Baik</td>
					<td align="center"><?php echo $jlh_surat_berkelakuan_baik; ?></td>
				  </tr>
				  </table></td>
			  </tr>
			</table>		
		  </td>
	  </tr>
	</table>
<script>
window.print();
</script>