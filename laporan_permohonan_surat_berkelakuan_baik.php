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
<body><?php 
include("koneksi.php");
$tgl1=$_GET["tanggal_awal"];
$tgl2=$_GET["tanggal_akhir"];
?>
<table width="797" align="center" cellpadding="3" bgcolor="white" cellspacing="0" style="border:4px solid #989; border-radius:0px;">
	<tr>
		<td align="center">
		<?php include("lap_title.php");?>

		<?php
		$query =mysqli_query($db,"select * from tb_surat_berkelakuan_baik where (tanggal BETWEEN '$tgl1' AND '$tgl2') and status<>'Telah Divalidasi' order by tanggal desc");
		$no=0;
		$jlh_lahir=mysqli_num_rows($query);
		if (mysqli_num_rows($query)>0){ ?>
				Belum Divalidasi
				<table width="780" border="0" align="center" cellpadding="3" cellspacing="3">
				  <tr>
					<td width="780" bgcolor=""  background="img/blk.jpg" align="left"><font color=""><strong></strong></font>
					  <table width="780" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
					
					  <tr>
						<th width="40">No</th>
						<th width="200">Nomor Surat</th>
						<th width="200">Penduduk</th>
						<th width="150">Tanggal Pengajuan</th>
					  </tr>
					  <?php while ($data=mysqli_fetch_array($query)){
						  $no=$no+1;
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
							$kewarganegaraan=$data_penduduk["kewarganegaraan"];
							$agama=$data_penduduk["agama"];
							$jenis_kelamin=$data_penduduk["jenis_kelamin"];
							//$pekerjaan="-";
							//$alamat="-";
						}
					  ?>
					  <tr>
						<td align="center"><?php echo $no;?></td>
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
						<td align="center"><?php echo "NIK: ".$nik."<br>Nama: ".$nama;?></td>
						<td align="center"><?php echo substr($data["tanggal"],8,2)."/".substr($data["tanggal"],5,2)."/".substr($data["tanggal"],0,4); ?></td>
					  <?php } 	?>
					   <tr>
						<td align="left" height="30" colspan="6"><b><?php echo "Jumlah Data : ".$jlh_lahir; ?></b></td>
					  </tr>
					  
					 
					  </table></td>
				  </tr>
				</table>
		<?php } ?>	
			
		<?php
		$query =mysqli_query($db,"select * from tb_surat_berkelakuan_baik where (tanggal BETWEEN '$tgl1' AND '$tgl2') and status='Telah Divalidasi' order by tanggal desc");
		$no=0;
		$jlh_lahir=mysqli_num_rows($query);
		if (mysqli_num_rows($query)>0){ ?>
				Telah Divalidasi
				<table width="780" border="0" align="center" cellpadding="3" cellspacing="3">
				  <tr>
					<td width="780" bgcolor=""  background="img/blk.jpg" align="left"><font color=""><strong></strong></font>
					  <table width="780" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
					
					  <tr>
						<th width="40">No</th>
						<th width="200">Nomor Surat</th>
						<th width="200">Penduduk</th>
						<th width="150">Tanggal Pengajuan</th>
					  </tr>
					  <?php while ($data=mysqli_fetch_array($query)){
						  $no=$no+1;
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
							$kewarganegaraan=$data_penduduk["kewarganegaraan"];
							$agama=$data_penduduk["agama"];
							$jenis_kelamin=$data_penduduk["jenis_kelamin"];
							//$pekerjaan="-";
							//$alamat="-";
						}
					  ?>
					  <tr>
						<td align="center"><?php echo $no;?></td>
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
						<td align="center"><?php echo "NIK: ".$nik."<br>Nama: ".$nama;?></td>
						<td align="center"><?php echo substr($data["tanggal"],8,2)."/".substr($data["tanggal"],5,2)."/".substr($data["tanggal"],0,4); ?></td>
					  <?php } 	?>
					   <tr>
						<td align="left" height="30" colspan="6"><b><?php echo "Jumlah Data : ".$jlh_lahir; ?></b></td>
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

<script>
window.print();
</script>