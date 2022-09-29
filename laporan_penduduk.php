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
		$no=0;
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
					  <th width="100">No</th>
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
						 $no=$no+1;
					  ?>
					  <tr>
					  <td align="center"><?php echo $no; ?></td>
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
<?php } 
			$query_kades =mysqli_query($db,"select * from tb_kepala_desa");
			$nama_kades="-";
			$jabatan_kades="Pangulu Nagori Perasmian.<br>Kecamatan Dolok Silau Kabupaten Simalungun";
			if(mysqli_num_rows($query_kades)>0){
				$data_kades=mysqli_fetch_array($query_kades);
				$nama_kades=$data_kades["nama"];
			} ?>

			<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="360" rowspan="4"></td>
					<td width="80" rowspan="2"></td>
					<td width="100">Diperbuat di</td>
					<td width="5">:</td>
					<td width="auto">Perasmian</td>
				</tr>
				<tr>
					<td>Pada Tanggal</td>
					<td>:</td>
					<td><?php echo date("d M Y"); ?></td>
				</tr>
				<tr>
					<td>
						<img src="img/stempel.png" style="position:absolute;">
					</td>
					<td colspan="3">
						<hr>
						<div style="width:200px;height:100px;border:solid red 0px;position:absolute;">
						Pagulu Nagori Perasmian<br><br><br><br>
						<?php echo $nama_kades; ?>
						</div>
					</td>
				</tr>
			</table>
			<br><br><br><br><br><br><br>			
		</td>
	</tr>
</table>				
			  </td>
		  </tr>
        </table>
            
	
<script>
window.print();
</script>