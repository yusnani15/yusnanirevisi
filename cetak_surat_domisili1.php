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
$query_surat =mysqli_query($db,"select * from tb_surat_domisili where nomor='".$_GET["nomor"]."'");
$nomor="-";	
$tanggal="-";
$periode="-";
$nik="-";
$alamat="-";
$lama="-";
$pekerjaan="-";
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
	$lama=$data_surat["lama"];

	$query_kades =mysqli_query($db,"select * from tb_kepala_desa");
	$nama_kades="-";
	$jabatan_kades="Pangulu Nagori Perasmian.<br>Kecamatan Dolok Silau Kabupaten Simalungun";
	if(mysqli_num_rows($query_kades)>0){
		$data_kades=mysqli_fetch_array($query_kades);
		$nama_kades=$data_kades["nama"];
	}

	$query_sekdes =mysqli_query($db,"select * from tb_sekretaris_desa");
	$nama_sekdes="-";
	$jabatan_kades="Pangulu Nagori Perasmian.<br>Kecamatan Dolok Silau Kabupaten Simalungun";
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
						<u><b>SURAT KETERANGAN</b></u><br>
						Nomor : <?php echo "000/000/dddd/dddd";?><br>
						<br>
					</center>
					
						Yang bertanda tangan dibawah ini :<br>
						<table width="97%" border="0" align="center" cellpadding="3" cellspacing="4">
							<tr>
								<td width="162">Nama</td>
								<td width="10">:</td>
								<td width="auto"><?php echo "Aaa"; ?></td>
							</tr>
							<tr>
								<td valign="top">Jabatan</td>
								<td valign="top">:</td>
								<td><?php echo "Aaa"; ?></td>
							</tr>
						</table>
						<br>
						Menerangkan dengan sesungguhnya bahwa :<br>
						<table width="97%" border="0" align="center" cellpadding="3" cellspacing="6">
							<tr>
								<td width="162">Nama</td>
								<td width="10">:</td>
								<td width="auto"><?php echo "Aaa"; ?></td>
							</tr>
							<tr>
								<td>Tempat/Tgl. Lahir</td>
								<td>:</td>
								<td><?php echo "Aaa, dd/mm/yyyy"; ?></td>
							</tr>
							<tr>
								<td>NIK</td>
								<td>:</td>
								<td><?php echo "Aaa"; ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>:</td>
								<td><?php echo "Aaa"; ?></td>
							</tr>
							<tr>
								<td>Bangsa/Agama</td>
								<td>:</td>
								<td><?php echo "Aaa/Aaa"; ?></td>
							</tr>
							<tr>
								<td>Pekerjaan</td>
								<td>:</td>
								<td><?php echo "Aaa"; ?></td>
							</tr>
							<tr>
								<td valign="top">Alamat Tempat Tinggal</td>
								<td valign="top">:</td>
								<td><?php echo "Aaa"; ?></td>
							</tr>
						</table>
						<br>						
						<table width="100%" border="0" align="center" cellpadding="3" cellspacing="6">
							<tr>
								<td width="10" valign="top">1.</td>
								<td width="auto" align="justify">
									Nama tersebut diatas adalah benar-benar penduduk Nagori Perasmian Kecamatan Dolok Silau Kabupaten Simalungun
								</td>
							</tr>
							<tr>
								<td valign="top">2.</td>
								<td  align="justify">
									Turut diterangkan bahwa nama tersebut diatas benar-benar tinggal atau Berdomisili Selama ±<?php echo $lama; ?> Tahun di Nagori Perasmian Kecamatan Dolok Silau
								</td>
							</tr>
						</table>
						<br>
						Demikian surat keterangan ini diperbuat untuk dapat dipergunakan seperlunya
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
								<td><?php echo "dd/mm/yyyy"; ?></td>
							</tr>
							<tr>
								<td>
								</td>
								<td colspan="3">
									<hr>
									<div style="width:200px;height:100px;border:solid red 0px;position:absolute;">
									Pagulu Nagori Perasmian<br><br><br><br>
									<?php echo "Aaa"; ?>
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
	
