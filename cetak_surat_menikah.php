<body>
<style type="text/css">
		 body {
            //background-image: url('img/background.jpg');
            background-color: grey;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            position: absolute;
            z-index: -1;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            opacity: 100;
            filter:alpha(opacity=15);
            height:99%;
			width:99%;
        }
		a{
			text-decoration:none;
			font-family:times new roman;
			size:12px;
		}
		p{
			text-decoration:none;	
			font-family:times new roman;
			size:12px;
		}
	</style>
	
<?php
include("koneksi.php");
$query_surat =mysqli_query($db,"select * from tb_surat_menikah where nomor='".$_GET["nomor"]."'");
$nomor="-";	
$tanggal="-";
$periode="-";
$nik="-";
$alamat="-";
$lama="-";
$pekerjaan="-";
$nama_pasangan="-";
$keterangan="-";
$nama_pasangan_terdahulu="-";
if (mysqli_num_rows($query_surat)>0){
	$data_surat=mysqli_fetch_array($query_surat);
	$nomor=$data_surat["nomor"];
	if($nomor<10){
		$nomor="000".$nomor;
	}elseif($nomor<100){
		$nomor="00".$nomor;
		
	}elseif($nomor<1000){
		$nomor="0".$nomor;		
	}else{
		$nomor=$nomor;
	}
	$tanggal=substr($data_surat["tanggal"],8,2)."/".substr($data_surat["tanggal"],5,2)."/".substr($data_surat["tanggal"],0,4);
	$tanggal_disetujui=substr($data_surat["tanggal_disetujui"],8,2)."/".substr($data_surat["tanggal_disetujui"],5,2)."/".substr($data_surat["tanggal_disetujui"],0,4);
	$tahun_disetujui=substr($data_surat["tanggal_disetujui"],0,4);
	$bulan_disetujui=substr($data_surat["tanggal_disetujui"],5,2);
	if($bulan_disetujui<7){
		$periode=($tahun_disetujui-1)."/".$tahun_disetujui;
	}else{
		$periode=$tahun_disetujui."/".($tahun_disetujui+1);		
	}

	$nik=$data_surat["nik"];
	$alamat=$data_surat["alamat"];
	$pekerjaan=$data_surat["pekerjaan"];
	$nama_pasangan=$data_surat["nama_pasangan"];
	$keterangan=$data_surat["keterangan"];
	$nama_pasangan_terdahulu=$data_surat["nama_pasangan_terdahulu"];

	$query_kades =mysqli_query($db,"select * from tb_kepala_desa");
	$nama_kades="-";
	$jabatan_kades="Pangulu kelurahan Perasmian.<br>Kecamatan Dolok Silau Kabupaten Simalungun";
	if(mysqli_num_rows($query_kades)>0){
		$data_kades=mysqli_fetch_array($query_kades);
		$nama_kades=$data_kades["nama"];
	}

	$query_sekdes =mysqli_query($db,"select * from tb_sekretaris_desa");
	$nama_sekdes="-";
	$jabatan_kades="Pangulu kelurahan Perasmian.<br>Kecamatan Dolok Silau Kabupaten Simalungun";
	if(mysqli_num_rows($query_sekdes)>0){
		$data_sekdes=mysqli_fetch_array($query_sekdes);
		$nama_sekdes=$data_sekdes["nama"];
	}

	$query_penduduk =mysqli_query($db,"select * from tb_penduduk where nik='".$nik."'");
	$nama="-";
	$tempat_lahir="-";
	$tanggal_lahir="-";
	//$nik="-";
	$bangsa="Indonesia";
	$agama="-";
	$jenis_kelamin="-";
	//$pekerjaan="-";
	//$alamat="-";
	if(mysqli_num_rows($query_penduduk)>0){
		$data_penduduk=mysqli_fetch_array($query_penduduk);
		$nama=$data_penduduk["nama"];
		$tempat_lahir=$data_penduduk["tempat_lahir"];
		$tanggal_lahir=substr($data_penduduk["tanggal_lahir"],8,2)."/".substr($data_penduduk["tanggal_lahir"],5,2)."/".substr($data_penduduk["tanggal_lahir"],0,4);
		//$nik=$data_penduduk["tempat_lahir"];
		//$bangsa="Indonesia";
		$agama=$data_penduduk["agama"];
		$jenis_kelamin=$data_penduduk["jenis_kelamin"];
		//$pekerjaan="-";
		//$alamat="-";
	}
	?>
        <table width="650" align="center" cellpadding="0" bgcolor="white" cellspacing="0" style="border:0px solid #989; border-radius:0px;">
          <tr>
            <td align="center"><br>
			<?php include("kop_surat.php");?>
				<table width="590" border="0" align="center" cellpadding="3" cellspacing="3">
				  <tr>
					<td width="590" bgcolor="" align="justify">
					<center>
						<u><b>SURAT KETERANGAN UNTUK MENIKAH</b></u><br>
						Nomor : <?php echo "470/".$nomor."/".$periode;?><br>
						<br>
					</center>
					
						Yang bertanda tangan dibawah ini menerangkan dengan sesungguhnya bahwa :<br>
						<table width="97%" border="0" align="center" cellpadding="3" cellspacing="4">
							<tr>
								<td width="3">1.</td>
								<td width="182">Nama</td>
								<td width="10">:</td>
								<td width="auto"><?php echo $nama; ?></td>
							</tr>
							<tr>
								<td>2.</td>
								<td>Tempat/Tgl. Lahir</td>
								<td>:</td>
								<td><?php echo $tempat_lahir."/".$tanggal_lahir; ?></td>
							</tr>
							<tr>
								<td>3.</td>
								<td>NIK</td>
								<td>:</td>
								<td><?php echo $nik; ?></td>
							</tr>
							<tr>
								<td>4.</td>
								<td>Jenis Kelamin</td>
								<td>:</td>
								<td><?php echo $jenis_kelamin; ?></td>
							</tr>
							<tr>
								<td>5.</td>
								<td>Bangsa/Agama</td>
								<td>:</td>
								<td><?php echo $bangsa."/".$agama; ?></td>
							</tr>
							<tr>
								<td valign="top">6.</td>
								<td>Pekerjaan</td>
								<td>:</td>
								<td><?php echo $pekerjaan; ?></td>
							</tr>
							<tr>
								<td valign="top">7.</td>
								<td valign="top">Alamat Tempat Tinggal</td>
								<td valign="top">:</td>
								<td><?php echo $alamat; ?></td>
							</tr>
							<tr>
								<td valign="top">8.</td>
								<td>Bin/Binti</td>
								<td>:</td>
								<td><?php echo $nama_pasangan; ?></td>
							</tr>
							<tr>
								<td valign="top">9.</td>
								<td>Keterangan</td>
								<td>:</td>
								<td><?php echo $keterangan; ?></td>
							</tr>
							<tr>
								<td valign="top">10.</td>
								<td>Nama Istri/Suami Terdahulu</td>
								<td>:</td>
								<td><?php echo $nama_pasangan_terdahulu; ?></td>
							</tr>
						</table>
						<br>						
						Demikian surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan seperlunya.
						<br><br>
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
								<td><?php echo $tanggal_disetujui; ?></td>
							</tr>
							<tr>
								<td>
									<img src="img/stempel.png" style="position:absolute;">
								</td>
								<td colspan="3">
									<hr>
									<div style="width:200px;height:100px;border:solid red 0px;position:absolute;">
									Pagulu kelurahan Perasmian<br><br><br><br>
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
<?php 
}else{ 
	echo "<font size='15' color='#99FFCC'><center>Data Kosong</center></font>";
} ?>
	
