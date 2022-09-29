<?php 
//notif surat domisili
$query=mysqli_query($db,"select * from tb_surat_domisili where status='Telah Divalidasi'");	
$jlh_surat_domisili=0;
$data=mysqli_fetch_array($query);
$jlh_surat_domisili=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_domisili ");	
$jlhall_surat_domisili=0;
$data=mysqli_fetch_array($query);
$jlhall_surat_domisili=mysqli_num_rows($query);

//notif surat pindah
$query=mysqli_query($db,"select * from tb_surat_pindah  where status='Telah Divalidasi'");	
$jlh_surat_pindah=0;
$data=mysqli_fetch_array($query);
$jlh_surat_pindah=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_pindah ");	
$jlhall_surat_pindah=0;
$data=mysqli_fetch_array($query);
$jlhall_surat_pindah=mysqli_num_rows($query);

//notif surat usaha
$query=mysqli_query($db,"select * from tb_surat_usaha  where status='Telah Divalidasi'");	
$jlh_surat_usaha=0;
$data=mysqli_fetch_array($query);
$jlh_surat_usaha=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_usaha ");	
$jlhall_surat_usaha=0;
$data=mysqli_fetch_array($query);
$jlhall_surat_usaha=mysqli_num_rows($query);

//notif surat ahli waris
$query=mysqli_query($db,"select * from tb_surat_ahli_waris  where status='Telah Divalidasi'");	
$jlh_surat_ahli_waris=0;
$data=mysqli_fetch_array($query);
$jlh_surat_ahli_waris=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_ahli_waris ");	
$jlhall_surat_ahli_waris=0;
$data=mysqli_fetch_array($query);
$jlhall_surat_ahli_waris=mysqli_num_rows($query);

//notif surat kematian
$query=mysqli_query($db,"select * from tb_surat_kematian  where status='Telah Divalidasi'");
$jlh_surat_kematian=0;
$data=mysqli_fetch_array($query);
$jlh_surat_kematian=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_kematian ");
$jlhall_surat_kematian=0;
$data=mysqli_fetch_array($query);
$jlhall_surat_kematian=mysqli_num_rows($query);

//notif surat menikah
$query=mysqli_query($db,"select * from tb_surat_menikah where status='Telah Divalidasi'");
$jlh_surat_menikah=0;
$data=mysqli_fetch_array($query);
$jlh_surat_menikah=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_menikah ");
$jlhall_surat_menikah=0;
$data=mysqli_fetch_array($query);
$jlhall_surat_menikah=mysqli_num_rows($query);

//notif surat belum_menikah	
$query=mysqli_query($db,"select * from tb_surat_belum_menikah where status='Telah Divalidasi'");	
$jlh_surat_belum_menikah=0;
$data=mysqli_fetch_array($query);
$jlh_surat_belum_menikah=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_belum_menikah ");	
$jlhall_surat_belum_menikah=0;
$data=mysqli_fetch_array($query);
$jlhall_surat_belum_menikah=mysqli_num_rows($query);

//notif surat pengganti KTP
$query=mysqli_query($db,"select * from tb_surat_pengganti_ktp where status='Telah Divalidasi'");	
$jlh_surat_pengganti_ktp=0;
$data=mysqli_fetch_array($query);
$jlh_surat_pengganti_ktp=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_pengganti_ktp ");	
$jlhall_surat_pengganti_ktp=0;
$data=mysqli_fetch_array($query);
$jlhall_surat_pengganti_ktp=mysqli_num_rows($query);

//notif surat kurang_mampu
$query=mysqli_query($db,"select * from tb_surat_kurang_mampu where status='Telah Divalidasi'");	
$jlh_surat_kurang_mampu=0;
$data=mysqli_fetch_array($query);
$jlh_surat_kurang_mampu=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_kurang_mampu ");	
$jlhall_surat_kurang_mampu=0;
$data=mysqli_fetch_array($query);
$jlhall_surat_kurang_mampu=mysqli_num_rows($query);

//notif surat berkelakuan baik
$query=mysqli_query($db,"select * from tb_surat_berkelakuan_baik where status='Telah Divalidasi'");	
$jlh_surat_berkelakuan_baik=0;
$data=mysqli_fetch_array($query);
$jlh_surat_berkelakuan_baik=mysqli_num_rows($query);

$query=mysqli_query($db,"select * from tb_surat_berkelakuan_baik ");	
$jlhall_surat_berkelakuan_baik=0;
$data=mysqli_fetch_array($query);
$jlhall_surat_berkelakuan_baik=mysqli_num_rows($query);

//notif surat domisili
$query=mysqli_query($db,"select * from tb_surat_domisili where status<>'Telah Divalidasi'");	
$jlhblm_surat_domisili=0;
$data=mysqli_fetch_array($query);
$jlhblm_surat_domisili=mysqli_num_rows($query);

//notif surat pindah
$query=mysqli_query($db,"select * from tb_surat_pindah  where status<>'Telah Divalidasi'");	
$jlhblm_surat_pindah=0;
$data=mysqli_fetch_array($query);
$jlhblm_surat_pindah=mysqli_num_rows($query);

//notif surat usaha
$query=mysqli_query($db,"select * from tb_surat_usaha  where status<>'Telah Divalidasi'");	
$jlhblm_surat_usaha=0;
$data=mysqli_fetch_array($query);
$jlhblm_surat_usaha=mysqli_num_rows($query);

//notif surat ahli waris
$query=mysqli_query($db,"select * from tb_surat_ahli_waris  where status<>'Telah Divalidasi'");	
$jlhblm_surat_ahli_waris=0;
$data=mysqli_fetch_array($query);
$jlhblm_surat_ahli_waris=mysqli_num_rows($query);

//notif surat kematian
$query=mysqli_query($db,"select * from tb_surat_kematian  where status<>'Telah Divalidasi'");
$jlhblm_surat_kematian=0;
$data=mysqli_fetch_array($query);
$jlhblm_surat_kematian=mysqli_num_rows($query);

//notif surat menikah
$query=mysqli_query($db,"select * from tb_surat_menikah where status<>'Telah Divalidasi'");
$jlhblm_surat_menikah=0;
$data=mysqli_fetch_array($query);
$jlhblm_surat_menikah=mysqli_num_rows($query);

//notif surat belum_menikah	
$query=mysqli_query($db,"select * from tb_surat_belum_menikah where status<>'Telah Divalidasi'");	
$jlhblm_surat_belum_menikah=0;
$data=mysqli_fetch_array($query);
$jlhblm_surat_belum_menikah=mysqli_num_rows($query);

//notif surat pengganti KTP
$query=mysqli_query($db,"select * from tb_surat_pengganti_ktp where status<>'Telah Divalidasi'");	
$jlhblm_surat_pengganti_ktp=0;
$data=mysqli_fetch_array($query);
$jlhblm_surat_pengganti_ktp=mysqli_num_rows($query);

//notif surat kurang_mampu
$query=mysqli_query($db,"select * from tb_surat_kurang_mampu where status<>'Telah Divalidasi'");	
$jlhblm_surat_kurang_mampu=0;
$data=mysqli_fetch_array($query);
$jlhblm_surat_kurang_mampu=mysqli_num_rows($query);

//notif surat berkelakuan baik
$query=mysqli_query($db,"select * from tb_surat_berkelakuan_baik where status<>'Telah Divalidasi'");	
$jlhblm_surat_berkelakuan_baik=0;
$data=mysqli_fetch_array($query);
$jlhblm_surat_berkelakuan_baik=mysqli_num_rows($query);


?>
<table width="70%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td width="" bgcolor=""  background="img/blk.jpg" align="left"><font color=""><strong></strong></font>
	  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
	  <tr>
		<th width="250">Surat</th>
		<th align="center" width="10">Jumlah Permohonan</th>
		<th align="center" width="10">Telah Divalidasi</th>
			<th align="center" width="10">Belum/Tidak Divalidasi</th>
		<th align="center" width="400">Aksi</th>
	  </tr>
	  <tr>
		<td width="150">Surat Keterangan Domisili</td>
		<td align="center"><?php echo $jlhall_surat_domisili; ?></td>
		<td align="center"><?php echo $jlh_surat_domisili; ?></td>
		<td align="center"><?php echo $jlhblm_surat_domisili; ?></td>
		<th align="center" width="10">
			<form method="post">Tgl <input name="tanggal_awal" required type="date" value="<?php echo @$_SESSION["tanggal_awal"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/>S/D<input name="tanggal_akhir" required type="date" value="<?php echo @$_SESSION["tanggal_akhir"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/><input type="submit" name="tampil_tanggal1" id="tampil_tanggal1" value="Cetak Laporan" <?php echo "style='width:120px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></form>
			<?php if(@$_POST["tampil_tanggal1"]){
				$_SESSION["tanggal_awal"]=$_POST["tanggal_awal"];
				$_SESSION["tanggal_akhir"]=$_POST["tanggal_akhir"];
				echo "<script>document.location='?page=laporan&kategori=surat_domisili&tanggal_awal=".$_POST["tanggal_awal"]."&tanggal_akhir=".$_POST["tanggal_akhir"]."';</script>";
			} ?>
		</th>
	  </tr>
	  <tr>
		<td width="200">Surat Keterangan Pindah</td>
		<td align="center"><?php echo $jlhall_surat_pindah; ?></td>
		<td align="center"><?php echo $jlh_surat_pindah; ?></td>
		<td align="center"><?php echo $jlhblm_surat_pindah; ?></td>
		<th align="center" width="10">
			<form method="post">Tgl <input name="tanggal_awal" required type="date" value="<?php echo @$_SESSION["tanggal_awal"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/>S/D<input name="tanggal_akhir" required type="date" value="<?php echo @$_SESSION["tanggal_akhir"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/><input type="submit" name="tampil_tanggal2" id="tampil_tanggal2" value="Cetak Laporan" <?php echo "style='width:120px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></form>
			<?php if(@$_POST["tampil_tanggal2"]){
				$_SESSION["tanggal_awal"]=$_POST["tanggal_awal"];
				$_SESSION["tanggal_akhir"]=$_POST["tanggal_akhir"];
				echo "<script>document.location='?page=laporan&kategori=surat_pindah&tanggal_awal=".$_POST["tanggal_awal"]."&tanggal_akhir=".$_POST["tanggal_akhir"]."';</script>";
			} ?>
		</th>
	  </tr>
	  <tr>
		<td width="200">Surat Keterangan Ahli Waris</td>
		<td align="center"><?php echo $jlhall_surat_ahli_waris; ?></td>
		<td align="center"><?php echo $jlh_surat_ahli_waris; ?></td>
		<td align="center"><?php echo $jlhblm_surat_ahli_waris; ?></td>
		<th align="center" width="10">
			<form method="post">Tgl <input name="tanggal_awal" required type="date" value="<?php echo @$_SESSION["tanggal_awal"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/>S/D<input name="tanggal_akhir" required type="date" value="<?php echo @$_SESSION["tanggal_akhir"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/><input type="submit" name="tampil_tanggal3" id="tampil_tanggal3" value="Cetak Laporan" <?php echo "style='width:120px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></form>
			<?php if(@$_POST["tampil_tanggal3"]){
				$_SESSION["tanggal_awal"]=$_POST["tanggal_awal"];
				$_SESSION["tanggal_akhir"]=$_POST["tanggal_akhir"];
				echo "<script>document.location='?page=laporan&kategori=surat_ahli_waris&tanggal_awal=".$_POST["tanggal_awal"]."&tanggal_akhir=".$_POST["tanggal_akhir"]."';</script>";
			} ?>
		</th>
	  </tr>
	  <tr>
		<td width="200">Surat Keterangan Kematian</td>
		<td align="center"><?php echo $jlhall_surat_kematian; ?></td>
			<td align="center"><?php echo $jlh_surat_kematian; ?></td>
			<td align="center"><?php echo $jlhblm_surat_kematian; ?></td>
		<th align="center" width="10">
			<form method="post">Tgl <input name="tanggal_awal" required type="date" value="<?php echo @$_SESSION["tanggal_awal"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/>S/D<input name="tanggal_akhir" required type="date" value="<?php echo @$_SESSION["tanggal_akhir"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/><input type="submit" name="tampil_tanggal4" id="tampil_tanggal4" value="Cetak Laporan" <?php echo "style='width:120px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></form>
			<?php if(@$_POST["tampil_tanggal4"]){
				$_SESSION["tanggal_awal"]=$_POST["tanggal_awal"];
				$_SESSION["tanggal_akhir"]=$_POST["tanggal_akhir"];
				echo "<script>document.location='?page=laporan&kategori=surat_kematian&tanggal_awal=".$_POST["tanggal_awal"]."&tanggal_akhir=".$_POST["tanggal_akhir"]."';</script>";
			} ?>
		</th>
	  </tr>
	  <tr>
		<td width="200">Surat Keterangan Usaha</td>
		<td align="center"><?php echo $jlhall_surat_usaha; ?></td>
		<td align="center"><?php echo $jlh_surat_usaha; ?></td>
		<td align="center"><?php echo $jlhblm_surat_usaha; ?></td>
		<th align="center" width="10">
			<form method="post">Tgl <input name="tanggal_awal" required type="date" value="<?php echo @$_SESSION["tanggal_awal"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/>S/D<input name="tanggal_akhir" required type="date" value="<?php echo @$_SESSION["tanggal_akhir"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/><input type="submit" name="tampil_tanggal5" id="tampil_tanggal5" value="Cetak Laporan" <?php echo "style='width:120px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></form>
			<?php if(@$_POST["tampil_tanggal5"]){
				$_SESSION["tanggal_awal"]=$_POST["tanggal_awal"];
				$_SESSION["tanggal_akhir"]=$_POST["tanggal_akhir"];
				echo "<script>document.location='?page=laporan&kategori=surat_usaha&tanggal_awal=".$_POST["tanggal_awal"]."&tanggal_akhir=".$_POST["tanggal_akhir"]."';</script>";
			} ?>
		</th>
	  </tr>
	  <tr>
		<td width="200">Surat Keterangan Belum Menikah</td>
		<td align="center"><?php echo $jlhall_surat_belum_menikah; ?></td>
		<td align="center"><?php echo $jlh_surat_belum_menikah; ?></td>
		<td align="center"><?php echo $jlhblm_surat_belum_menikah; ?></td>
		<th align="center" width="10">
			<form method="post">Tgl <input name="tanggal_awal" required type="date" value="<?php echo @$_SESSION["tanggal_awal"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/>S/D<input name="tanggal_akhir" required type="date" value="<?php echo @$_SESSION["tanggal_akhir"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/><input type="submit" name="tampil_tanggal6" id="tampil_tanggal6" value="Cetak Laporan" <?php echo "style='width:120px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></form>
			<?php if(@$_POST["tampil_tanggal6"]){
				$_SESSION["tanggal_awal"]=$_POST["tanggal_awal"];
				$_SESSION["tanggal_akhir"]=$_POST["tanggal_akhir"];
				echo "<script>document.location='?page=laporan&kategori=surat_belum_menikah&tanggal_awal=".$_POST["tanggal_awal"]."&tanggal_akhir=".$_POST["tanggal_akhir"]."';</script>";
			} ?>
		</th>
	  </tr>
	  <tr>
		<td width="200">Surat Keterangan Untuk Menikah</td>
		<td align="center"><?php echo $jlhall_surat_menikah; ?></td>
		<td align="center"><?php echo $jlh_surat_menikah; ?></td>
		<td align="center"><?php echo $jlhblm_surat_menikah; ?></td>
		<th align="center" width="10">
			<form method="post">Tgl <input name="tanggal_awal" required type="date" value="<?php echo @$_SESSION["tanggal_awal"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/>S/D<input name="tanggal_akhir" required type="date" value="<?php echo @$_SESSION["tanggal_akhir"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/><input type="submit" name="tampil_tanggal7" id="tampil_tanggal7" value="Cetak Laporan" <?php echo "style='width:120px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></form>
			<?php if(@$_POST["tampil_tanggal7"]){
				$_SESSION["tanggal_awal"]=$_POST["tanggal_awal"];
				$_SESSION["tanggal_akhir"]=$_POST["tanggal_akhir"];
				echo "<script>document.location='?page=laporan&kategori=surat_menikah&tanggal_awal=".$_POST["tanggal_awal"]."&tanggal_akhir=".$_POST["tanggal_akhir"]."';</script>";
			} ?>
		</th>
	  </tr>
	  <tr>
		<td width="200">Surat Keterangan Pengganti KTP</td>
		<td align="center"><?php echo $jlhall_surat_pengganti_ktp; ?></td>
		<td align="center"><?php echo $jlh_surat_pengganti_ktp; ?></td>
		<td align="center"><?php echo $jlhblm_surat_pengganti_ktp; ?></td>
		<th align="center" width="10">
			<form method="post">Tgl <input name="tanggal_awal" required type="date" value="<?php echo @$_SESSION["tanggal_awal"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/>S/D<input name="tanggal_akhir" required type="date" value="<?php echo @$_SESSION["tanggal_akhir"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/><input type="submit" name="tampil_tanggal8" id="tampil_tanggal8" value="Cetak Laporan" <?php echo "style='width:120px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></form>
			<?php if(@$_POST["tampil_tanggal8"]){
				$_SESSION["tanggal_awal"]=$_POST["tanggal_awal"];
				$_SESSION["tanggal_akhir"]=$_POST["tanggal_akhir"];
				echo "<script>document.location='?page=laporan&kategori=surat_pengganti_ktp&tanggal_awal=".$_POST["tanggal_awal"]."&tanggal_akhir=".$_POST["tanggal_akhir"]."';</script>";
			} ?>
		</th>
	  </tr>
	  <tr>
		<td width="200">Surat Keterangan Kurang Mampu</td>
		<td align="center"><?php echo $jlhall_surat_kurang_mampu; ?></td>
		<td align="center"><?php echo $jlh_surat_kurang_mampu; ?></td>
		<td align="center"><?php echo $jlhblm_surat_kurang_mampu; ?></td>
		<th align="center" width="10">
			<form method="post">Tgl <input name="tanggal_awal" required type="date" value="<?php echo @$_SESSION["tanggal_awal"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/>S/D<input name="tanggal_akhir" required type="date" value="<?php echo @$_SESSION["tanggal_akhir"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/><input type="submit" name="tampil_tanggal9" id="tampil_tanggal9" value="Cetak Laporan" <?php echo "style='width:120px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></form>
			<?php if(@$_POST["tampil_tanggal9"]){
				$_SESSION["tanggal_awal"]=$_POST["tanggal_awal"];
				$_SESSION["tanggal_akhir"]=$_POST["tanggal_akhir"];
				echo "<script>document.location='?page=laporan&kategori=surat_kurang_mampu&tanggal_awal=".$_POST["tanggal_awal"]."&tanggal_akhir=".$_POST["tanggal_akhir"]."';</script>";
			} ?>
		</th>
	  </tr>
	  <tr>
		<td width="200">Surat Keterangan Berkelakukan Baik</td>
		<td align="center"><?php echo $jlhall_surat_berkelakuan_baik; ?></td>
		<td align="center"><?php echo $jlh_surat_berkelakuan_baik; ?></td>
		<td align="center"><?php echo $jlhblm_surat_berkelakuan_baik; ?></td>
		<th align="center" width="10">
			<form method="post">Tgl <input name="tanggal_awal" required type="date" value="<?php echo @$_SESSION["tanggal_awal"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/>S/D<input name="tanggal_akhir" required type="date" value="<?php echo @$_SESSION["tanggal_akhir"]; ?>" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:130"/><input type="submit" name="tampil_tanggal10" id="tampil_tanggal10" value="Cetak Laporan" <?php echo "style='width:120px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></form>
			<?php if(@$_POST["tampil_tanggal10"]){
				$_SESSION["tanggal_awal"]=$_POST["tanggal_awal"];
				$_SESSION["tanggal_akhir"]=$_POST["tanggal_akhir"];
				echo "<script>document.location='?page=laporan&kategori=surat_berkelakuan_baik&tanggal_awal=".$_POST["tanggal_awal"]."&tanggal_akhir=".$_POST["tanggal_akhir"]."';</script>";
			} ?>
		</th>
	  </tr>
	  </table></td>
  </tr>
</table>		
