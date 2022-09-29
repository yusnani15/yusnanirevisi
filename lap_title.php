<?php 
if(@$_GET["kategori"]=="penduduk"){
	$title="LAPORAN PENDUDUK<BR>TAHUN ".date("Y");
}
if(@$_GET["kategori"]=="lahir"){
	$title="LAPORAN DATA LAHIR<BR>PERIODE ".substr($_GET["tanggal_awal"],8,2)."-".substr($_GET["tanggal_awal"],5,2)."-".substr($_GET["tanggal_awal"],0,4)." S/D ".substr($_GET["tanggal_akhir"],8,2)."-".substr($_GET["tanggal_akhir"],5,2)."-".substr($_GET["tanggal_akhir"],0,4);
}
if(@$_GET["kategori"]=="meninggal"){
	$title="LAPORAN DATA LAHIR<BR>PERIODE ".substr($_GET["tanggal_awal"],8,2)."-".substr($_GET["tanggal_awal"],5,2)."-".substr($_GET["tanggal_awal"],0,4)." S/D ".substr($_GET["tanggal_akhir"],8,2)."-".substr($_GET["tanggal_akhir"],5,2)."-".substr($_GET["tanggal_akhir"],0,4);
}
if(@$_GET["kategori"]=="pendatang"){
	$title="LAPORAN DATA PENDATANG<BR>PERIODE ".substr($_GET["tanggal_awal"],8,2)."-".substr($_GET["tanggal_awal"],5,2)."-".substr($_GET["tanggal_awal"],0,4)." S/D ".substr($_GET["tanggal_akhir"],8,2)."-".substr($_GET["tanggal_akhir"],5,2)."-".substr($_GET["tanggal_akhir"],0,4);
}
if(@$_GET["kategori"]=="pindah"){
	$title="LAPORAN DATA PINDAH<BR>PERIODE ".substr($_GET["tanggal_awal"],8,2)."-".substr($_GET["tanggal_awal"],5,2)."-".substr($_GET["tanggal_awal"],0,4)." S/D ".substr($_GET["tanggal_akhir"],8,2)."-".substr($_GET["tanggal_akhir"],5,2)."-".substr($_GET["tanggal_akhir"],0,4);
}
if(@$_GET["kategori"]=="permohonan_surat"){
	$title="LAPORAN PEMOHONAN SURAT<BR>PERIODE ".substr($_GET["tanggal_awal"],8,2)."-".substr($_GET["tanggal_awal"],5,2)."-".substr($_GET["tanggal_awal"],0,4)." S/D ".substr($_GET["tanggal_akhir"],8,2)."-".substr($_GET["tanggal_akhir"],5,2)."-".substr($_GET["tanggal_akhir"],0,4);
}
if(@$_GET["kategori"]=="surat_domisili"){
	$title="LAPORAN PEMOHONAN SURAT DOMISILI<BR>PERIODE ".substr($_GET["tanggal_awal"],8,2)."-".substr($_GET["tanggal_awal"],5,2)."-".substr($_GET["tanggal_awal"],0,4)." S/D ".substr($_GET["tanggal_akhir"],8,2)."-".substr($_GET["tanggal_akhir"],5,2)."-".substr($_GET["tanggal_akhir"],0,4);
}
if(@$_GET["kategori"]=="surat_pindah"){
	$title="LAPORAN PEMOHONAN SURAT PINDAH<BR>PERIODE ".substr($_GET["tanggal_awal"],8,2)."-".substr($_GET["tanggal_awal"],5,2)."-".substr($_GET["tanggal_awal"],0,4)." S/D ".substr($_GET["tanggal_akhir"],8,2)."-".substr($_GET["tanggal_akhir"],5,2)."-".substr($_GET["tanggal_akhir"],0,4);
}
if(@$_GET["kategori"]=="surat_ahli_waris"){
	$title="LAPORAN PEMOHONAN SURAT AHLI WARIS<BR>PERIODE ".substr($_GET["tanggal_awal"],8,2)."-".substr($_GET["tanggal_awal"],5,2)."-".substr($_GET["tanggal_awal"],0,4)." S/D ".substr($_GET["tanggal_akhir"],8,2)."-".substr($_GET["tanggal_akhir"],5,2)."-".substr($_GET["tanggal_akhir"],0,4);
}
if(@$_GET["kategori"]=="surat_kematian"){
	$title="LAPORAN PEMOHONAN SURAT KEMATIAN<BR>PERIODE ".substr($_GET["tanggal_awal"],8,2)."-".substr($_GET["tanggal_awal"],5,2)."-".substr($_GET["tanggal_awal"],0,4)." S/D ".substr($_GET["tanggal_akhir"],8,2)."-".substr($_GET["tanggal_akhir"],5,2)."-".substr($_GET["tanggal_akhir"],0,4);
}
if(@$_GET["kategori"]=="surat_belum_menikah"){
	$title="LAPORAN PEMOHONAN SURAT BELUM MENIKAH<BR>PERIODE ".substr($_GET["tanggal_awal"],8,2)."-".substr($_GET["tanggal_awal"],5,2)."-".substr($_GET["tanggal_awal"],0,4)." S/D ".substr($_GET["tanggal_akhir"],8,2)."-".substr($_GET["tanggal_akhir"],5,2)."-".substr($_GET["tanggal_akhir"],0,4);
}
if(@$_GET["kategori"]=="surat_menikah"){
	$title="LAPORAN PEMOHONAN SURAT UNTUK MENIKAH<BR>PERIODE ".substr($_GET["tanggal_awal"],8,2)."-".substr($_GET["tanggal_awal"],5,2)."-".substr($_GET["tanggal_awal"],0,4)." S/D ".substr($_GET["tanggal_akhir"],8,2)."-".substr($_GET["tanggal_akhir"],5,2)."-".substr($_GET["tanggal_akhir"],0,4);
}
if(@$_GET["kategori"]=="surat_usaha"){
	$title="LAPORAN PEMOHONAN SURAT USAHA<BR>PERIODE ".substr($_GET["tanggal_awal"],8,2)."-".substr($_GET["tanggal_awal"],5,2)."-".substr($_GET["tanggal_awal"],0,4)." S/D ".substr($_GET["tanggal_akhir"],8,2)."-".substr($_GET["tanggal_akhir"],5,2)."-".substr($_GET["tanggal_akhir"],0,4);
}
if(@$_GET["kategori"]=="surat_pengganti_ktp"){
	$title="LAPORAN PEMOHONAN SURAT PENGGANTI KTP<BR>PERIODE ".substr($_GET["tanggal_awal"],8,2)."-".substr($_GET["tanggal_awal"],5,2)."-".substr($_GET["tanggal_awal"],0,4)." S/D ".substr($_GET["tanggal_akhir"],8,2)."-".substr($_GET["tanggal_akhir"],5,2)."-".substr($_GET["tanggal_akhir"],0,4);
}
if(@$_GET["kategori"]=="surat_berkelakuan_baik"){
	$title="LAPORAN PEMOHONAN SURAT BERKELAKUAN BAIK<BR>PERIODE ".substr($_GET["tanggal_awal"],8,2)."-".substr($_GET["tanggal_awal"],5,2)."-".substr($_GET["tanggal_awal"],0,4)." S/D ".substr($_GET["tanggal_akhir"],8,2)."-".substr($_GET["tanggal_akhir"],5,2)."-".substr($_GET["tanggal_akhir"],0,4);
}
if(@$_GET["kategori"]=="surat_kurang_mampu"){
	$title="LAPORAN PEMOHONAN SURAT KURANG MAMPU<BR>PERIODE ".substr($_GET["tanggal_awal"],8,2)."-".substr($_GET["tanggal_awal"],5,2)."-".substr($_GET["tanggal_awal"],0,4)." S/D ".substr($_GET["tanggal_akhir"],8,2)."-".substr($_GET["tanggal_akhir"],5,2)."-".substr($_GET["tanggal_akhir"],0,4);
}
?>

<table width="100%">
	<tr>
		<td align="center" height="80" width="80">
			<img src="img/logo.png" height="80px">
		</td>
		<td align="center"><b>
			<p style="font-size:18px;line-height:0px;">PEMERINTAH KABUPATEN SIMALUNGUN</p>
			<p style="font-size:18px;line-height:0px;">KECAMATAN DOLOK SILAU</p>
			<p style="font-size:33px;line-height:0px;">KANTOR PANGULU NAGORI PERASMIAN</p>
			<p align="right" style="font-size:16px;line-height:0px;">KODE POS 21168</p>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2" height="1px" bgcolor="">
			<hr>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2">
			<H3><?php echo "<u>".$title."</u>"; ?></H3>
		</td>
	</tr>
</table>