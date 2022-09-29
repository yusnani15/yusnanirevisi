<?php $btsklm="style='box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.1);'";?>
<br>
<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Sekretaris Desa
	
	<?php $query_row=mysqli_query($db,"select * from tb_sekretaris_desa order by nik asc");	
		if (mysqli_num_rows($query_row)<=0){
	?>
		<a href="?page=sekretaris_desa&aksi=tambah"><input type="button" name="button" id="button2" value="+ Tambah" <?php echo "style='width:160px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
	<?php } ?>	
	</td>
  </tr>
</table>

<br>

<?php
$query=mysqli_query($db,"select * from tb_sekretaris_desa order by nik asc");
if (mysqli_num_rows($query)>0){
?>
	<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 2px #6c6969">
	  <tr>
		<td width="100%" bgcolor="#6c6969"  background="img/blk.jpg" align="center">
		  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
		  <tr>
			<th width="100" <?php echo $btsklm; ?>>NIK</th>
			<th width="100" <?php echo $btsklm; ?>>Nama</th>
			<th width="100" <?php echo $btsklm; ?>>Tempat Lahir</th>
			<th width="80" <?php echo $btsklm; ?>>Tanggal Lahir</th>
			<th width="80" <?php echo $btsklm; ?>>Agama</th>
			<th width="80" <?php echo $btsklm; ?>>Status Perkawinan</th>
			<th width="80" <?php echo $btsklm; ?>>Telepon</th>
			<th width="80" <?php echo $btsklm; ?>>Status</th>
			<th width="140" <?php echo $btsklm; ?>>Aksi</th>
		  </tr>
		  <?php while ($data=mysqli_fetch_array($query)){ 
		  ?>
		  <tr>
			<td height="1" bgcolor="#6c6969" colspan="9"></td>
		  </tr>
		  <tr>
			<td align="center">
				<?php if (@$_GET["nik"]==$data['nik']){
					echo "<font color='red'>".$data['nik']."</font>";
				}else{
					echo $data['nik'];
				} ?>
			</td>
			<td align="center" <?php echo $btsklm; ?>><?php echo $data['nama']; ?></td>
			<td align="center" <?php echo $btsklm; ?>><?php echo $data['tempat_lahir']; ?></td>
			<td align="center" <?php echo $btsklm; ?>><?php echo substr($data["tanggal_lahir"],8,2)."/".substr($data["tanggal_lahir"],5,2)."/".substr($data["tanggal_lahir"],0,4); ?></td>
			<td align="center" <?php echo $btsklm; ?>><?php echo $data['agama']; ?></td>
			<td align="center" <?php echo $btsklm; ?>><?php echo $data['status_perkawinan']; ?></td>
			<td align="center" <?php echo $btsklm; ?>><?php echo $data['telepon']; ?></td>
			<td align="center" <?php echo $btsklm; ?>><?php echo $data['status']; ?></td>
			<td align="center" <?php echo $btsklm; ?>>
			<a href="?page=sekretaris_desa&aksi=edit&nik=<?php echo $data['nik']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Ubah" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
			<a href="?page=sekretaris_desa&aksi=hapus&nik=<?php echo $data['nik']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
		  </tr>
		  <?php } ?>
		  </table></td>
	  </tr>
	</table>
<?php 
}else{
	echo "<font size='8' color='#F4DE64'><center>Data Tidak Tersedia</center></font>";	
}
?>

<br>
<br>

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Bendahara
	<?php $query_row=mysqli_query($db,"select * from tb_bendahara order by nik asc");
		if (mysqli_num_rows($query_row)<=0){
	?>
		<a href="?page=bendahara&aksi=tambah"><input type="button" name="button" id="button2" value="+ Tambah" <?php echo "style='width:160px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
	<?php } ?>		
	</td>
  </tr>
</table>

<br>

<?php
$query=mysqli_query($db,"select * from tb_bendahara order by nik asc");	
if(@$_GET['cari']){
	$query =mysqli_query($db,"select * from tb_bendahara where nik like '%".$_GET['cari']."%' or nama like '%".$_GET['cari']."%' order by nik asc");
}elseif(@$_GET['nik']){
	$query =mysqli_query($db,"select * from tb_bendahara where nik like '%".$_GET['nik']."%' order by nik asc");
}else{
	$query=mysqli_query($db,"select * from tb_bendahara order by nik asc");	
}
	if (mysqli_num_rows($query)>0){
		?>
		<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 2px #6c6969">
          <tr>
            <td width="100%" bgcolor="#6c6969"  background="img/blk.jpg" align="center">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
              <tr>
                <th width="100" <?php echo $btsklm; ?>>NIK</th>
                <th width="100" <?php echo $btsklm; ?>>Nama</th>
                <th width="100" <?php echo $btsklm; ?>>Tempat Lahir</th>
                <th width="80" <?php echo $btsklm; ?>>Tanggal Lahir</th>
                <th width="80" <?php echo $btsklm; ?>>Agama</th>
                <th width="80" <?php echo $btsklm; ?>>Status Perkawinan</th>
                <th width="80" <?php echo $btsklm; ?>>Telepon</th>
                <th width="80" <?php echo $btsklm; ?>>Status</th>
                <th width="140" <?php echo $btsklm; ?>>Aksi</th>
              </tr>
              <?php while ($data=mysqli_fetch_array($query)){ 
			  ?>
              <tr>
                <td height="1" bgcolor="#6c6969" colspan="9"></td>
              </tr>
              <tr>
                <td align="center">
					<?php if (@$_GET["nik"]==$data['nik']){
						echo "<font color='red'>".$data['nik']."</font>";
					}else{
						echo $data['nik'];
					} ?>
				</td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['nama']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['tempat_lahir']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo substr($data["tanggal_lahir"],8,2)."/".substr($data["tanggal_lahir"],5,2)."/".substr($data["tanggal_lahir"],0,4); ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['agama']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['status_perkawinan']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['telepon']; ?></td>
                <td align="center" <?php echo $btsklm; ?>><?php echo $data['status']; ?></td>
                <td align="center" <?php echo $btsklm; ?>>
                <a href="?page=bendahara&aksi=edit&nik=<?php echo $data['nik']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Ubah" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
				<a href="?page=bendahara&aksi=hapus&nik=<?php echo $data['nik']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:".$btnbgcolor.";height:30px;color:".$btntextcolor.";'"; ?>/></a>
              </tr>
              <?php } ?>
              </table></td>
          </tr>
        </table>
            <?php 
	}else{
		echo "<font size='8' color='#F4DE64'><center>Data Tidak Tersedia</center></font>";	
	}
