<?php 
if(@$_GET["kategori"]=="penduduk"){
	$title="LAPORAN PENDUDUK<BR>TAHUN ".date("Y");
}
if(@$_GET["kategori"]=="permohonan_surat"){
	$title="LAPORAN PEMOHONAN SURAT";
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