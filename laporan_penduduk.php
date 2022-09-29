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
	$query =mysqli_query($db,"select * from tb_penduduk order by nomor_kk asc");
	$jlh_penduduk=mysqli_num_rows($query);
	if ($jlh_penduduk>0){
	?>
        <table width="797" align="center" cellpadding="3" bgcolor="white" cellspacing="0" style="border:4px solid #989; border-radius:0px;">
          <tr>
            <td align="center">
			<?php include("lap_title.php");?>
				<table width="780" border="0" align="center" cellpadding="3" cellspacing="3">
				  <tr>
					<td width="780" bgcolor=""  background="img/blk.jpg" align="left"><font color=""><strong></strong></font>
					  <table width="780" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
					<?php if (mysqli_num_rows($query)>0){ ?>
					  <tr>
						<th width="150">Nomor KK</th>
						<th width="200">NIK</th>
						<th width="200">Nama Penduduk</th>
						<th width="200">Jenis Kelamin</th>
						<th width="200">Tempat/Tanggal Lahir</th>
						<th width="200">Telepon</th>
					  </tr>
					  <!--<tr>
						<th colspan="6"height="1" bgcolor="red"></td>
					  </tr>-->
					  <?php while ($data=mysqli_fetch_array($query)){
					  ?>
					  <tr>
						<td align="center"><?php echo $data['nomor_kk']; ?></td>
						<td align="center"><?php echo $data['nik']; ?></td>
						<td align="center"><?php echo $data['nama']; ?></td>
						<td align="center"><?php echo $data['jenis_kelamin']; ?></td>
						<td align="center"><?php echo ucfirst($data['tempat_lahir']).", ".substr($data["tanggal_lahir"],8,2)."/".substr($data["tanggal_lahir"],5,2)."/".substr($data["tanggal_lahir"],0,4); ?></td>
						<td align="center"><?php echo $data['telepon']; ?></td>
					  </tr>
					  <!--<tr>
						<th colspan="6"height="1" bgcolor="red"></td>
					  </tr>-->
					  <?php } 
					}else{
						echo "<tr><td colspan='4'><font size='4' color='#99FFCC'><center>Surat tidak ditemukan</center></font></td></tr>";	
					}			  
					  ?>
					  <tr>
						<td align="left" height="30" colspan="6"><b><?php echo "Jumlah Penduduk : ".$jlh_penduduk; ?></b></td>
					  </tr>
					  </table></td>
				  </tr>
				</table>		
			  </td>
		  </tr>
        </table>
            <?php 
	}else{
		echo "<font size='15' color='#99FFCC'><center>Data Kosong</center></font>";	
	?>
	<?php } ?>
	
<script>
window.print();
</script>