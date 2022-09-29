<br>
<?php
$btsklm = "style='box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.1);'";
if (!@$_SESSION['pswd']) {
	$_SESSION["pswd"] = "sembunyi";
	echo "<script>document.location='?page=penduduk';</script>";
}
if (@$_GET['pswd'] == 'lihat') {
	$_SESSION["pswd"] = $_GET["pswd"];
	echo "<script>document.location='?page=penduduk';</script>";
}
if (@$_GET['pswd'] == 'sembunyi') {
	$_SESSION["pswd"] = $_GET["pswd"];
	echo "<script>document.location='?page=penduduk';</script>";
}
//echo @$_SESSION["pswd"];
?>

<?php
$query_urut = mysqli_query($db, "select * from tb_penduduk order by nik desc");
$urut = 0;
if (mysqli_num_rows($query_urut) > 0) {
	$data = mysqli_fetch_array($query_urut);
	$urut = substr($data["nik"], 1, 2);
}
$urut = $urut + 1;
if ($urut > 9) {
	$kdurut = "P" . $urut;
} else {
	$kdurut = "P0" . $urut;
}

//if(@$_POST['cari']){
//		echo"<script>document.location='?page=penduduk&cari=".$_POST["cari"]."';</script>";	
//}
?>

<?php if (@$_GET['aksi'] == 'edit') {
	$query_edit = mysqli_query($db, "select * from tb_penduduk where nik='" . $_GET['nik'] . "'");
	$data_edit = mysqli_fetch_array($query_edit);
	$_SESSION["SD_nik"] = $data_edit["nik"];
	$_SESSION["SD_nomor_kk"] = $data_edit["nomor_kk"];
	$_SESSION["SD_nama"] = $data_edit["nama"];
	$_SESSION["SD_jenis_kelamin"] = $data_edit["jenis_kelamin"];
	$_SESSION["SD_tempat_lahir"] = $data_edit["tempat_lahir"];
	$_SESSION["SD_tanggal_lahir"] = $data_edit["tanggal_lahir"];
	$_SESSION["SD_alamat"] = $data_edit["alamat"];
	$_SESSION["SD_kode_pos"] = $data_edit["kode_pos"];
	$_SESSION["SD_rt_rw"] = $data_edit["rt_rw"];
	$_SESSION["SD_kelurahan"] = $data_edit["kelurahan"];
	$_SESSION["SD_kecamatan"] = $data_edit["kecamatan"];
	$_SESSION["SD_kabupaten"] = $data_edit["kabupaten"];
	$_SESSION["SD_provinsi"] = $data_edit["provinsi"];
	$_SESSION["SD_agama"] = $data_edit["agama"];
	$_SESSION["SD_status_perkawinan"] = $data_edit["status_perkawinan"];
	$_SESSION["SD_pekerjaan"] = $data_edit["pekerjaan"];
	$_SESSION["SD_kewarganegaraan"] = $data_edit["kewarganegaraan"];
	$_SESSION["SD_telepon"] = $data_edit["telepon"];
	$_SESSION["SD_hubungan_keluarga"] = $data_edit["hubungan_keluarga"];
	$_SESSION["SD_status"] = $data_edit["status"];
	$_SESSION["SD_kata_sandi"] = $data_edit["kata_sandi"];
?>

	<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
		<tr>
			<td width="80%" bgcolor="white">Edit Penduduk
			</td>
			<td width="20%" bgcolor="white" align="right"><a href="?page=penduduk<?php if (@$_GET["nomor_kk"] != "") {
																						echo "&nomor_kk=" . $_GET["nomor_kk"];
																					} ?>">
					<font color="red">X</font>
				</a>
			</td>
		</tr>
	</table>

	<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="?page=penduduk&nik=<?php echo $_GET["nik"]; ?><?php if (@$_GET["nomor_kk"] != "") {
																																		echo "&nomor_kk=" . $_GET["nomor_kk"];
																																	} ?>">
		<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
			<tr>
				<td bgcolor="" valign="top">
					<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
						<tr>
							<td width="190">NIK</td>
							<td width="1">:</td>
							<td width="auto"><input type="text" name="nik" id="nik" maxlength="20" value="<?php echo @$_SESSION["SD_nik"]; ?>" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Nomor KK</td>
							<td valign="top">:</td>
							<td>
								<?php if (@$_GET["nomor_kk"] != "") { ?>
									<input type="text" name="nomor_kk" id="nomor_kk" maxlength="30" value="<?php echo @$_GET["nomor_kk"]; ?>" readonly="readonly" required style="width:150px" />
								<?php } else { ?>
									<select name="nomor_kk" id="nomor_kk" onchange="submit()" required>
										<?php
										$query = mysqli_query($db, "select * from tb_kartu_keluarga");
										echo '<option value="">-Pilih-</option>';
										while ($row = mysqli_fetch_array($query)) { ?>
											<option value="<?php echo $row['nomor_kk']; ?>"><?php echo $row['nomor_kk'] . " - " . $row['nama_kepala_keluarga']; ?></option>
										<?php } ?>
									</select>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td valign="top">Nama</td>
							<td valign="top">:</td>
							<td><input type="text" name="nama" id="nama" maxlength="50" value="<?php echo @$_SESSION["SD_nama"]; ?>" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Jenis Kelamin</td>
							<td valign="top">:</td>
							<td>
								<select id="jenis_kelamin" name="jenis_kelamin" />
								<option <?php if (@$_SESSION["SD_jenis_kelamin"] == "Laki-laki") {
											echo "selected";
										} ?> />Laki-laki</option>
								<option <?php if (@$_SESSION["SD_jenis_kelamin"] == "Perempuan") {
											echo "selected";
										} ?> />Perempuan</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Tempat Lahir</td>
							<td valign="top">:</td>
							<td><input type="text" name="tempat_lahir" id="tempat_lahir" maxlength="30" value="<?php echo @$_SESSION["SD_tempat_lahir"]; ?>" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Tanggal Lahir</td>
							<td valign="top">:</td>
							<td><input type="date" name="tanggal_lahir" id="tanggal_lahir" maxlength="12" value="<?php echo @$_SESSION["SD_tanggal_lahir"]; ?>" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Alamat</td>
							<td valign="top">:</td>
							<td><textarea name="alamat" id="alamat" required style="width:50%;height:50px;"><?php echo @$_SESSION["SD_alamat"]; ?></textarea></td>
						</tr>
						<tr>
							<td valign="top">Kode Pos</td>
							<td valign="top">:</td>
							<td><input type="text" name="kode_pos" id="kode_pos" maxlength="30" value="<?php echo @$_SESSION["SD_kode_pos"]; ?>" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">RT/RW</td>
							<td valign="top">:</td>
							<td><input type="text" name="rt_rw" id="rt_rw" maxlength="30" value="<?php echo @$_SESSION["SD_rt_rw"]; ?>" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Nagori</td>
							<td valign="top">:</td>
							<td>
								<select id="kelurahan" name="kelurahan" />
								<option <?php if (@$_SESSION["SD_kelurahan"] == "Perasmian") {
											echo "selected";
										} ?> />Perasmian</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Kecamatan</td>
							<td valign="top">:</td>
							<td>
								<select id="kecamatan" name="kecamatan" />
								<option <?php if (@$_SESSION["SD_kecamatan"] == "Dolok Silau") {
											echo "selected";
										} ?> />Dolok Silau</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Kabupaten</td>
							<td valign="top">:</td>
							<td>
								<select id="kabupaten" name="kabupaten" />
								<option <?php if (@$_SESSION["SD_kabupaten"] == "Simalungun") {
											echo "selected";
										} ?> />Simalungun</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Provinsi</td>
							<td valign="top">:</td>
							<td>
								<select id="provinsi" name="provinsi" />
								<option <?php if (@$_SESSION["SD_provinsi"] == "Sumatera Utara") {
											echo "selected";
										} ?> />Sumatera Utara</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Agama</td>
							<td valign="top">:</td>
							<td>
								<select id="agama" name="agama" />
								<option <?php if (@$_SESSION["SD_agama"] == "Islam") {
											echo "selected";
										} ?> />Islam</option>
								<option <?php if (@$_SESSION["SD_agama"] == "Kristen Protestan") {
											echo "selected";
										} ?> />Kristen Protestan</option>
								<option <?php if (@$_SESSION["SD_agama"] == "Khatolik") {
											echo "selected";
										} ?> />Khatolik</option>
								<option <?php if (@$_SESSION["SD_agama"] == "Hindu") {
											echo "selected";
										} ?> />Hindu</option>
								<option <?php if (@$_SESSION["SD_agama"] == "Budha") {
											echo "selected";
										} ?> />Budha</option>
								<option <?php if (@$_SESSION["SD_agama"] == "Konghucu") {
											echo "selected";
										} ?> />Konghucu</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Status Perkawinan</td>
							<td valign="top">:</td>
							<td>
								<select id="status_perkawinan" name="status_perkawinan" />
								<option <?php if (@$_SESSION["SD_status_perkawinan"] == "Belum Menikah") {
											echo "selected";
										} ?> />Belum Menikah</option>
								<option <?php if (@$_SESSION["SD_status_perkawinan"] == "Menikah") {
											echo "selected";
										} ?> />Menikah</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Pekerjaan</td>
							<td valign="top">:</td>
							<td><input type="text" name="pekerjaan" id="pekerjaan" maxlength="30" value="<?php echo @$_SESSION["SD_pekerjaan"]; ?>" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Kewarganegaraan</td>
							<td valign="top">:</td>
							<td><input type="text" name="kewarganegaraan" id="kewarganegaraan" maxlength="30" value="Indonesia" readonly="readonly" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Telepon</td>
							<td valign="top">:</td>
							<td><input type="text" name="telepon" id="telepon" maxlength="13" value="<?php echo @$_SESSION["SD_telepon"]; ?>" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Hubungan Keluarga</td>
							<td valign="top">:</td>
							<td>
								<select id="hubungan_keluarga" name="hubungan_keluarga" />
								<option <?php if (@$_SESSION["SD_hubungan_keluarga"] == "Kepala Keluarga") {
											echo "selected";
										} ?> />Kepala Keluarga</option>
								<option <?php if (@$_SESSION["SD_hubungan_keluarga"] == "Istri") {
											echo "selected";
										} ?> />Istri</option>
								<option <?php if (@$_SESSION["SD_hubungan_keluarga"] == "Anak") {
											echo "selected";
										} ?> />Anak</option>
								<option <?php if (@$_SESSION["SD_hubungan_keluarga"] == "Orang Tua") {
											echo "selected";
										} ?> />Orang Tua</option>
								<option <?php if (@$_SESSION["SD_hubungan_keluarga"] == "Menantu") {
											echo "selected";
										} ?> />Menantu</option>
								<option <?php if (@$_SESSION["SD_hubungan_keluarga"] == "Famili Lain") {
											echo "selected";
										} ?> />Famili Lain</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Status</td>
							<td valign="top">:</td>
							<td>
								<select id="status" name="status" />
								<option <?php if (@$_SESSION["SD_status"] == "Aktif") {
											echo "selected";
										} ?> />Aktif</option>
								<option <?php if (@$_SESSION["SD_status"] == "Tidak Aktif") {
											echo "selected";
										} ?> />Tidak Aktif</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Kata Sandi</td>
							<td valign="top">:</td>
							<td><input type="password" name="kata_sandi" id="kata_sandi" maxlength="20" value="<?php echo @$_SESSION["SD_kata_sandi"]; ?>" required style="width:150px" /></td>
						</tr>
						<tr>
							<td height="36" colspan="3" bgcolor="" align="left">
								<input type="submit" name="btnedit" id="btnedit" value="Edit" <?php echo "style='width:100px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> />
								<a href="?page=penduduk&aksi=batal_ubah<?php if (@$_GET["nomor_kk"] != "") {
																			echo "&nomor_kk=" . $_GET["nomor_kk"];
																		} ?>"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>

<?php } elseif (@$_GET['aksi'] == 'hapus') {
	$query_hapus = mysqli_query($db, "select * from tb_penduduk where nik='" . $_GET['nik'] . "'");
	$data_hapus = mysqli_fetch_array($query_hapus);
	$_SESSION["SD_nik"] = $data_hapus["nik"];
	$_SESSION["SD_nomor_kk"] = $data_hapus["nomor_kk"];
	$_SESSION["SD_nama"] = $data_hapus["nama"];
	$_SESSION["SD_jenis_kelamin"] = $data_hapus["jenis_kelamin"];
	$_SESSION["SD_tempat_lahir"] = $data_hapus["tempat_lahir"];
	$_SESSION["SD_tanggal_lahir"] = substr($data_hapus["tanggal_lahir"], 8, 2) . "/" . substr($data_hapus["tanggal_lahir"], 5, 2) . "/" . substr($data_hapus["tanggal_lahir"], 0, 4);
	$_SESSION["SD_alamat"] = $data_hapus["alamat"];
	$_SESSION["SD_kode_pos"] = $data_hapus["kode_pos"];
	$_SESSION["SD_rt_rw"] = $data_hapus["rt_rw"];
	$_SESSION["SD_kelurahan"] = $data_hapus["kelurahan"];
	$_SESSION["SD_kecamatan"] = $data_hapus["kecamatan"];
	$_SESSION["SD_kabupaten"] = $data_hapus["kabupaten"];
	$_SESSION["SD_provinsi"] = $data_hapus["provinsi"];
	$_SESSION["SD_agama"] = $data_hapus["agama"];
	$_SESSION["SD_status_perkawinan"] = $data_hapus["status_perkawinan"];
	$_SESSION["SD_pekerjaan"] = $data_hapus["pekerjaan"];
	$_SESSION["SD_kewarganegaraan"] = $data_hapus["kewarganegaraan"];
	$_SESSION["SD_telepon"] = $data_hapus["telepon"];
	$_SESSION["SD_status"] = $data_hapus["status"];
	$_SESSION["SD_hubungan_keluarga"] = $data_hapus["hubungan_keluarga"];
	$_SESSION["SD_kata_sandi"] = $data_hapus["kata_sandi"];
?>

	<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
		<tr>
			<td width="80%" bgcolor="white">Yakin ingin menghapus data Penduduk berikut?
			</td>
			<td width="20%" bgcolor="white" align="right"><a href="?page=penduduk<?php if (@$_GET["nomor_kk"] != "") {
																						echo "&nomor_kk=" . $_GET["nomor_kk"];
																					} ?>">
					<font color="red">X</font>
				</a>
			</td>
		</tr>
	</table>

	<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
		<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
			<tr>
				<td bgcolor="" valign="top">
					<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
						<tr>
							<td width="190">NIK</td>
							<td width="1">:</td>
							<td width="auto"><?php echo @$_SESSION["SD_nik"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Nomor KK</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_nomor_kk"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Nama</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_nama"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Jenis Kelamin</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_jenis_kelamin"] ?></td>
						</tr>
						<tr>
							<td valign="top">Tempat Lahir</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_tempat_lahir"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Tanggal Lahir</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_tanggal_lahir"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Alamat</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_alamat"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Kode Pos</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_kode_pos"]; ?></td>
						</tr>
						<tr>
							<td valign="top">RT/RW</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_rt_rw"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Nagori</td>
							<td valign="top">:</td>
							<td> <?php echo @$_SESSION["SD_kelurahan"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Kecamatan</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_kecamatan"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Kabupaten</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_kabupaten"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Provinsi</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_provinsi"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Agama</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_agama"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Status Perkawinan</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_status_perkawinan"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Pekerjaan</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_pekerjaan"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Kewarganegaraan</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_kewarganegaraan"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Telepon</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_telepon"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Hubungan Keluarga</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_hubungan_keluarga"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Status</td>
							<td valign="top">:</td>
							<td><?php echo @$_SESSION["SD_status"]; ?></td>
						</tr>
						<tr>
							<td valign="top">Kata Sandi</td>
							<td valign="top">:</td>
							<td>*******************</td>
						</tr>
						<tr>
							<td height="36" colspan="3" bgcolor="" align="left">
								<a href="?page=penduduk&aksi=hapus&nik=<?php echo $_GET['nik']; ?><?php if (@$_GET["nomor_kk"] != "") {
																										echo "&nomor_kk=" . $_GET["nomor_kk"];
																									} ?>&pesan=ya"><input type="button" name="button2" id="button2" value="Hapus" <?php echo "style='width:100px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></a>
								<a href="?page=penduduk&aksi=batal_hapus<?php if (@$_GET["nomor_kk"] != "") {
																			echo "&nomor_kk=" . $_GET["nomor_kk"];
																		} ?>"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>

<?php } elseif (@$_GET['aksi'] == 'tambah') {
?>

	<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
		<tr>
			<td width="80%" bgcolor="white">Tambah Penduduk
			</td>
			<td width="20%" bgcolor="white" align="right"><a href="?page=penduduk<?php if (@$_GET["nomor_kk"] != "") {
																						echo "&nomor_kk=" . $_GET["nomor_kk"];
																					} ?>">
					<font color="red">X</font>
				</a>
			</td>
		</tr>
	</table>

	<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="?page=penduduk<?php if (@$_GET["nomor_kk"] != "") {
																										echo "&nomor_kk=" . $_GET["nomor_kk"];
																									} ?>">
		<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
			<tr>
				<td bgcolor="" valign="top">
					<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
						<tr>
							<td width="190">NIK</td>
							<td width="1">:</td>
							<td width="auto"><input type="text" name="nik" id="nik" maxlength="20" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Nomor KK</td>
							<td valign="top">:</td>
							<td>
								<?php if (@$_GET["nomor_kk"] != "") { ?>
									<input type="text" name="nomor_kk" id="nomor_kk" maxlength="30" value="<?php echo @$_GET["nomor_kk"]; ?>" readonly="readonly" required style="width:150px" />
								<?php } else { ?>
									<select name="nomor_kk" onchange="getDataNKK(this)" id="nomor_kk" required>
										<?php
										$query = mysqli_query($db, "select * from tb_kartu_keluarga");
										echo '<option value="">-Pilih-</option>';
										while ($row = mysqli_fetch_array($query)) { ?>
											<option value="<?php echo $row['nomor_kk']; ?>"><?php echo $row['nomor_kk'] . " - " . $row['nama_kepala_keluarga']; ?></option>
										<?php } ?>
									</select>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td valign="top">Nama</td>
							<td valign="top">:</td>
							<td><input type="text" name="nama" id="nama" maxlength="50" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Jenis Kelamin</td>
							<td valign="top">:</td>
							<td>
								<select id="jenis_kelamin" name="jenis_kelamin" />
								<option>--Pilih Jenis Kelamin--</option>
								<option value="Laki-Laki" required>Laki-laki</option>
								<option value="Perempuan" required>Perempuan</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Tempat Lahir</td>
							<td valign="top">:</td>
							<td><input type="text" name="tempat_lahir" id="tempat_lahir" maxlength="30" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Tanggal Lahir</td>
							<td valign="top">:</td>
							<td><input type="date" name="tanggal_lahir" id="tanggal_lahir" maxlength="12" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Alamat</td>
							<td valign="top">:</td>
							<td><textarea name="alamat" id="alamat" required style="width:50%;height:50px;"></textarea></td>
						</tr>
						<tr>
							<td valign="top">Kode Pos</td>
							<td valign="top">:</td>
							<td><input type="text" name="kode_pos" id="kode_pos" maxlength="30" value="<?php echo @$_SESSION["SD_kode_pos"]; ?>" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">RT/RW</td>
							<td valign="top">:</td>
							<td><input type="text" name="rt_rw" id="rt_rw" maxlength="30" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Nagori</td>
							<td valign="top">:</td>
							<td>
								<select id="kelurahan" name="kelurahan" />
								<option <?php if (@$_SESSION["SD_kelurahan"] == "Perasmian") {
											echo "selected";
										} ?> />Perasmian</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Kecamatan</td>
							<td valign="top">:</td>
							<td>
								<select id="kecamatan" name="kecamatan" />
								<option <?php if (@$_SESSION["SD_kecamatan"] == "Dolok Silau") {
											echo "selected";
										} ?> />Dolok Silau</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Kabupaten</td>
							<td valign="top">:</td>
							<td>
								<select id="kabupaten" name="kabupaten" />
								<option <?php if (@$_SESSION["SD_kabupaten"] == "Simalungun") {
											echo "selected";
										} ?> />Simalungun</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Provinsi</td>
							<td valign="top">:</td>
							<td>
								<select id="provinsi" name="provinsi" />
								<option <?php if (@$_SESSION["SD_provinsi"] == "Sumatera Utara") {
											echo "selected";
										} ?> />Sumatera Utara</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Agama</td>
							<td valign="top">:</td>
							<td>
								<select id="agama" name="agama" />
								<option>--Pilih Agama--</option>
								<option value="Islam" required>Islam</option>
								<option value="Protestan" required>Kristen Protestan</option>
								<option value="Khatolik" required>Khatolik</option>
								<option value="Hindu" required>Hindu</optionv>
								<option value="Budha" required>Budha</option>
								<option value="Konghucu" required>Konghucu</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Status Perkawinan</td>
							<td valign="top">:</td>
							<td>
								<select id="status_perkawinan" name="status_perkawinan" />
								<option>--Pilih Status--</option>
								<option value="Belum Menikah" required>Belum Menikah</option>
								<option value="Menikah" required>Menikah</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Pekerjaan</td>
							<td valign="top">:</td>
							<td><input type="text" name="pekerjaan" id="pekerjaan" maxlength="30" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Kewarganegaraan</td>
							<td valign="top">:</td>
							<td><input type="text" name="kewarganegaraan" id="kewarganegaraan" maxlength="30" value="Indonesia" readonly="readonly" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Telepon</td>
							<td valign="top">:</td>
							<td><input type="text" name="telepon" id="telepon" maxlength="13" required style="width:150px" /></td>
						</tr>
						<tr>
							<td valign="top">Hubungan Keluarga</td>
							<td valign="top">:</td>
							<td>
								<select id="hubungan_keluarga" name="hubungan_keluarga" />
								<option>--Pilih Hubungan Keluarga--</option>
								<option value="Kepala Keluarga" required>Kepala Keluarga</option>
								<option value="Istri" required>Istri</option>
								<option value="Anak" required>Anak</option>
								<option value="Orang Tua" required>Orang Tua</option>
								<option value="Menantu" required>Menantu</option>
								<option value="Famili Lain" required>Famili Lain</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Status</td>
							<td valign="top">:</td>
							<td>
								<select id="status" name="status" />
								<option <?php if (@$_SESSION["SD_status"] == "Aktif") {
											echo "selected";
										} ?> />Aktif</option>
								<option <?php if (@$_SESSION["SD_status"] == "Tidak Aktif") {
											echo "selected";
										} ?> />Tidak Aktif</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Kata Sandi</td>
							<td valign="top">:</td>
							<td><input type="password" name="kata_sandi" id="kata_sandi" maxlength="20" required style="width:150px" /></td>
						</tr>
						<tr>
							<td height="36" colspan="3" bgcolor="" align="left">
								<input type="submit" name="btnsimpan" id="btnsimpan" value="Simpan" <?php echo "style='width:100px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> />
								<a href="?page=penduduk&aksi=batal_tambah"><input type="button" name="button2" id="button2" value="Batal" <?php echo "style='width:100px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>

	<!-- # Menampilkan Data Keluarga berdasarkan NIK -->
	<h2 style="text-align: center">Daftar Anggota Keluarga</h2>
	<table border="1" align="center" cellpadding="3" cellspacing="0" style="margin-bottom: 1rem">
		<thead>
			<tr>
				<td>NIK</td>
				<td>Nama</td>
			</tr>
		</thead>
		<tbody id="table_data_by_nik">
		</tbody>

	</table>

<?php
} elseif (@$_GET["nomor_kk"] != "") {
?>

	<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
		<tr>
			<td width="80%" bgcolor="white">Penduduk
				<a href="?page=penduduk&aksi=tambah&nomor_kk=<?php echo @$_GET["nomor_kk"]; ?>"><input type="button" name="button" id="button2" value="+ Tambah" <?php echo "style='width:160px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></a>
			</td>
		</tr>
	</table>

	<br>

	<?php
	$query = mysqli_query($db, "select * from tb_penduduk where nomor_kk='" . $_GET["nomor_kk"] . "' order by nik asc");
	if (mysqli_num_rows($query) > 0) {
	?>
		<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 2px #6c6969">
			<tr>
				<td width="100%" bgcolor="#6c6969" background="img/blk.jpg" align="center">
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
						<tr>
							<th width="100" <?php echo $btsklm; ?>>NIK</th>
							<th width="100" <?php echo $btsklm; ?>>Nama</th>
							<th width="100" <?php echo $btsklm; ?>>Tempat Lahir</th>
							<th width="80" <?php echo $btsklm; ?>>Tanggal Lahir</th>
							<th width="80" <?php echo $btsklm; ?>>Hubungan Keluarga</th>
							<th width="140" <?php echo $btsklm; ?>>Aksi</th>
						</tr>
						<?php while ($data = mysqli_fetch_array($query)) {
						?>
							<tr>
								<td height="1" bgcolor="#6c6969" colspan="10"></td>
							</tr>
							<tr>
								<td align="center">
									<?php if (@$_GET["nik"] == $data['nik']) {
										echo "<font color='red'>" . $data['nik'] . "</font>";
									} else {
										echo $data['nik'];
									} ?>
								</td>
								<td align="center" <?php echo $btsklm; ?>><?php echo $data['nama']; ?></td>
								<td align="center" <?php echo $btsklm; ?>><?php echo $data['tempat_lahir']; ?></td>
								<td align="center" <?php echo $btsklm; ?>><?php echo substr($data["tanggal_lahir"], 8, 2) . "/" . substr($data["tanggal_lahir"], 5, 2) . "/" . substr($data["tanggal_lahir"], 0, 4); ?></td>
								<td align="center" <?php echo $btsklm; ?>><?php echo $data['hubungan_keluarga']; ?></td>
								<td align="center" <?php echo $btsklm; ?>>
									<a href="?page=penduduk&aksi=edit&nik=<?php echo $data['nik']; ?>&nomor_kk=<?php echo @$_GET["nomor_kk"]; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Ubah" <?php echo "style='width:100px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></a>
									<a href="?page=penduduk&aksi=hapus&nik=<?php echo $data['nik']; ?>&nomor_kk=<?php echo @$_GET["nomor_kk"]; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></a>
							</tr>
						<?php } ?>
					</table>
				</td>
			</tr>
		</table>
	<?php
	} else {
		echo "<font size='8' color='#F4DE64'><center>Data Tidak Tersedia</center></font>";
	}
} else {
	?>

	<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
		<tr>
			<td width="80%" bgcolor="white">Penduduk
				<a href="?page=penduduk&aksi=tambah"><input type="button" name="button" id="button2" value="+ Tambah" <?php echo "style='width:160px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></a>
				<a href="?page=laporan&kategori=penduduk" target="_blank"><input type="button" name="button" id="button2" value="Cetak Laporan" <?php echo "style='width:160px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></a>
			</td>
			<td>
				<form method="post" action="" class="form-cari">
					<input name="keyword_cari" type="text" placeholder="Masukan NIK/Nama/NomorHP" style="background-color:#FFFFFF; border:2px solid #000000;border-radius:10px;width:97%" />
					<button style="margin-left:8px" name="btn_cari">Cari</button>
				</form>
				</td=>
		</tr>
	</table>

	<br>

	<?php
	$query = mysqli_query($db, "select * from tb_penduduk order by nik asc");

	/* Fitur Cari Data Penduduk */
	if (isset($_POST['keyword_cari'])) {
		$KEY = $_POST['keyword_cari'];
		$query = mysqli_query($db, "SELECT * FROM tb_penduduk WHERE nik LIKE '%$KEY%' OR nama LIKE '%$KEY%' OR telepon LIKE '%$KEY%'");
	}

	if (mysqli_num_rows($query) > 0) {
	?>
		<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 2px #6c6969">
			<tr>
				<td width="100%" bgcolor="#6c6969" background="img/blk.jpg" align="center">
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
						<?php while ($data = mysqli_fetch_array($query)) {
						?>
							<tr>
								<td height="1" bgcolor="#6c6969" colspan="9"></td>
							</tr>
							<tr>
								<td align="center">
									<?php if (@$_GET["nik"] == $data['nik']) {
										echo "<font color='red'>" . $data['nik'] . "</font>";
									} else {
										echo $data['nik'];
									} ?>
								</td>
								<td align="center" <?php echo $btsklm; ?>><?php echo $data['nama']; ?></td>
								<td align="center" <?php echo $btsklm; ?>><?php echo $data['tempat_lahir']; ?></td>
								<td align="center" <?php echo $btsklm; ?>><?php echo substr($data["tanggal_lahir"], 8, 2) . "/" . substr($data["tanggal_lahir"], 5, 2) . "/" . substr($data["tanggal_lahir"], 0, 4); ?></td>
								<td align="center" <?php echo $btsklm; ?>><?php echo $data['agama']; ?></td>
								<td align="center" <?php echo $btsklm; ?>><?php echo $data['status_perkawinan']; ?></td>
								<td align="center" <?php echo $btsklm; ?>><?php echo $data['telepon']; ?></td>
								<td align="center" <?php echo $btsklm; ?>><?php echo $data['status']; ?></td>
								<td align="center" <?php echo $btsklm; ?>>
									<a href="?page=penduduk&aksi=edit&nik=<?php echo $data['nik']; ?>"><input type="button" name="btnlogin" id="btnlogin" value="Ubah" <?php echo "style='width:100px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></a>
									<a href="?page=penduduk&aksi=hapus&nik=<?php echo $data['nik']; ?> "><input type="button" name="btnlogin" id="btnlogin" value="Hapus" <?php echo "style='width:100px;background-color:" . $btnbgcolor . ";height:30px;color:" . $btntextcolor . ";'"; ?> /></a>
							</tr>
						<?php } ?>
					</table>
				</td>
			</tr>
		</table>
<?php
	} else {
		echo "<font size='8' color='#F4DE64'><center>Data Tidak Tersedia</center></font>";
	}
}
?>

<?php
if (@$_POST['btnsimpan']) {
	$_SESSION["SD_nik"] = $_POST["nik"];
	$_SESSION["SD_nomor_kk"] = $_POST["nomor_kk"];
	$_SESSION["SD_nama"] = $_POST["nama"];
	$_SESSION["SD_jenis_kelamin"] = $_POST["jenis_kelamin"];
	$_SESSION["SD_tempat_lahir"] = $_POST["tempat_lahir"];

	$tanggal = $_POST["tanggal_lahir"];
	$tgl_benar = $tanggal;
	$_SESSION["SD_tanggal_lahir"] = $_POST["tanggal_lahir"];
	$_SESSION["SD_alamat"] = $_POST["alamat"];
	$_SESSION["SD_kode_pos"] = $_POST["kode_pos"];
	$_SESSION["SD_rt_rw"] = $_POST["rt_rw"];
	$_SESSION["SD_kelurahan"] = $_POST["kelurahan"];
	$_SESSION["SD_kecamatan"] = $_POST["kecamatan"];
	$_SESSION["SD_kabupaten"] = $_POST["kabupaten"];
	$_SESSION["SD_provinsi"] = $_POST["provinsi"];
	$_SESSION["SD_agama"] = $_POST["agama"];
	$_SESSION["SD_status_perkawinan"] = $_POST["status_perkawinan"];
	$_SESSION["SD_pekerjaan"] = $_POST["pekerjaan"];
	$_SESSION["SD_kewarganegaraan"] = $_POST["kewarganegaraan"];
	$_SESSION["SD_telepon"] = $_POST["telepon"];
	$_SESSION["SD_hubungan_keluarga"] = $_POST["hubungan_keluarga"];
	$_SESSION["SD_status"] = $_POST["status"];
	$_SESSION["SD_kata_sandi"] = $_POST["kata_sandi"];
	$query = mysqli_query($db, "select * from tb_penduduk where nik='" . $_POST['nik'] . "'");
	if (mysqli_num_rows($query) > 0) {
		if (@$_GET["nomor_kk"] != "") {
			echo "<script>alert('nik yang sama sudah ada');document.location='?page=penduduk&nomor_kk=" . $_GET["nomor_kk"] . "';</script>";
		} else {
			echo "<script>alert('nik yang sama sudah ada');document.location='?page=penduduk';</script>";
		}
	} else {
		mysqli_query($db, "insert into tb_penduduk (nik,nomor_kk,nama,jenis_kelamin,tempat_lahir,tanggal_lahir,alamat,kode_pos,rt_rw,kelurahan,kecamatan,kabupaten,provinsi,agama,status_perkawinan,pekerjaan,kewarganegaraan,telepon,hubungan_keluarga,status,kata_sandi) values ('" . $_SESSION["SD_nik"] . "','" . $_SESSION["SD_nomor_kk"] . "','" . $_SESSION["SD_nama"] . "','" . $_SESSION["SD_jenis_kelamin"] . "','" . $_SESSION["SD_tempat_lahir"] . "','" . $tgl_benar . "','" . $_SESSION["SD_alamat"] . "','" . $_SESSION["SD_kode_pos"] . "','" . $_SESSION["SD_rt_rw"] . "','" . $_SESSION["SD_kelurahan"] . "','" . $_SESSION["SD_kecamatan"] . "','" . $_SESSION["SD_kabupaten"] . "','" . $_SESSION["SD_provinsi"] . "','" . $_SESSION["SD_agama"] . "','" . $_SESSION["SD_status_perkawinan"] . "','" . $_SESSION["SD_pekerjaan"] . "','" . $_SESSION["SD_kewarganegaraan"] . "','" . $_SESSION["SD_telepon"] . "','" . $_SESSION["SD_hubungan_keluarga"] . "','" . $_SESSION["SD_status"] . "','" . $_SESSION["SD_kata_sandi"] . "')");
		$_SESSION["SD_nik"] = "";
		$_SESSION["SD_nomor_kk"] = "";
		$_SESSION["SD_nama"] = "";
		$_SESSION["SD_jenis_kelamin"] = "";
		$_SESSION["SD_tempat_lahir"] = "";
		$_SESSION["SD_tanggal_lahir"] = "";
		$_SESSION["SD_alamat"] = "";
		$_SESSION["SD_kode_pos"] = "";
		$_SESSION["SD_rt_rw"] = "";
		$_SESSION["SD_kelurahan"] = "";
		$_SESSION["SD_kecamatan"] = "";
		$_SESSION["SD_kabupaten"] = "";
		$_SESSION["SD_provinsi"] = "";
		$_SESSION["SD_agama"] = "";
		$_SESSION["SD_status_perkawinan"] = "";
		$_SESSION["SD_pekerjaan"] = "";
		$_SESSION["SD_kewarganegaraan"] = "Indonesia";
		$_SESSION["SD_telepon"] = "";
		$_SESSION["SD_hubungan_keluarga"] = "";
		$_SESSION["SD_status"] = "";
		$_SESSION["SD_kata_sandi"] = "";
		if (@$_GET["nomor_kk"] != "") {
			echo "<script>alert('data tersimpan');document.location='?page=penduduk&nomor_kk=" . $_GET["nomor_kk"] . "';</script>";
		} else {
			echo "<script>alert('data tersimpan');document.location='?page=penduduk';</script>";
		}
	}
} elseif (@$_POST['btnedit']) {
	$_SESSION["SD_nik"] = $_POST["nik"];
	$_SESSION["SD_nomor_kk"] = $_POST["nomor_kk"];
	$_SESSION["SD_nama"] = $_POST["nama"];
	$_SESSION["SD_jenis_kelamin"] = $_POST["jenis_kelamin"];
	$_SESSION["SD_tempat_lahir"] = $_POST["tempat_lahir"];

	$tanggal = $_POST["tanggal_lahir"];
	$tgl_benar = $tanggal;
	$_SESSION["SD_tanggal_lahir"] = $_POST["tanggal_lahir"];
	$_SESSION["SD_alamat"] = $_POST["alamat"];
	$_SESSION["SD_kode_pos"] = $_POST["kode_pos"];
	$_SESSION["SD_rt_rw"] = $_POST["rt_rw"];
	$_SESSION["SD_kelurahan"] = $_POST["kelurahan"];
	$_SESSION["SD_kecamatan"] = $_POST["kecamatan"];
	$_SESSION["SD_kabupaten"] = $_POST["kabupaten"];
	$_SESSION["SD_provinsi"] = $_POST["provinsi"];
	$_SESSION["SD_agama"] = $_POST["agama"];
	$_SESSION["SD_status_perkawinan"] = $_POST["status_perkawinan"];
	$_SESSION["SD_pekerjaan"] = $_POST["pekerjaan"];
	$_SESSION["SD_kewarganegaraan"] = $_POST["kewarganegaraan"];
	$_SESSION["SD_telepon"] = $_POST["telepon"];
	$_SESSION["SD_hubungan_keluarga"] = $_POST["hubungan_keluarga"];
	$_SESSION["SD_status"] = $_POST["status"];
	$_SESSION["SD_kata_sandi"] = $_POST["kata_sandi"];
	echo $_SESSION["SD_nik"] . "<br>";
	echo $_GET["nik"] . "<br>";
	$query666 = mysqli_query($db, "select * from tb_penduduk where nik='" . $_POST['nik'] . "' and nik<>'" . $_GET['nik'] . "'");
	if (mysqli_num_rows($query666) > 0) {
		if (@$_GET["nomor_kk"] != "") {
			echo "<script>alert('NIK yang sama sudah ada');document.location='?page=penduduk&aksi=edit&nik=" . $_GET["nik"] . "&nomor_kk=" . $_GET["nomor_kk"] . "';</script>";
		} else {
			echo "<script>alert('NIK yang sama sudah ada');document.location='?page=penduduk&aksi=edit&nik=" . $_GET["nik"] . "';</script>";
		}
	} else {
		mysqli_query($db, "update tb_penduduk set nik='" . $_SESSION["SD_nik"] . "',nomor_kk='" . $_SESSION["SD_nomor_kk"] . "',nama='" . $_SESSION["SD_nama"] . "',jenis_kelamin='" . $_SESSION["SD_jenis_kelamin"] . "',tempat_lahir='" . $_SESSION["SD_tempat_lahir"] . "',tanggal_lahir='" . $tgl_benar . "',alamat='" . $_SESSION["SD_alamat"] . "',kode_pos='" . $_SESSION["SD_kode_pos"] . "',rt_rw='" . $_SESSION["SD_rt_rw"] . "',kelurahan='" . $_SESSION["SD_kelurahan"] . "',kecamatan='" . $_SESSION["SD_kecamatan"] . "',kabupaten='" . $_SESSION["SD_kabupaten"] . "',provinsi='" . $_SESSION["SD_provinsi"] . "',agama='" . $_SESSION["SD_agama"] . "',status_perkawinan='" . $_SESSION["SD_status_perkawinan"] . "',pekerjaan='" . $_SESSION["SD_pekerjaan"] . "',kewarganegaraan='" . $_SESSION["SD_kewarganegaraan"] . "',telepon='" . $_SESSION["SD_telepon"] . "',hubungan_keluarga='" . $_SESSION["SD_hubungan_keluarga"] . "',status='" . $_SESSION["SD_status"] . "',kata_sandi='" . $_SESSION["SD_kata_sandi"] . "' where nik='" . $_GET['nik'] . "'");
		$_SESSION["SD_nik"] = "";
		$_SESSION["SD_nomor_kk"] = "";
		$_SESSION["SD_nama"] = "";
		$_SESSION["SD_tempat_lahir"] = "";
		$_SESSION["SD_tanggal_lahir"] = "";
		$_SESSION["SD_alamat"] = "";
		$_SESSION["SD_kode_pos"] = "";
		$_SESSION["SD_rt_rw"] = "";
		$_SESSION["SD_kelurahan"] = "";
		$_SESSION["SD_kecamatan"] = "";
		$_SESSION["SD_kabupaten"] = "";
		$_SESSION["SD_provinsi"] = "";
		$_SESSION["SD_agama"] = "";
		$_SESSION["SD_status_perkawinan"] = "";
		$_SESSION["SD_pekerjaan"] = "";
		$_SESSION["SD_kewarganegaraan"] = "Indonesia";
		$_SESSION["SD_telepon"] = "";
		$_SESSION["SD_hubungan_keluarga"] = "";
		$_SESSION["SD_status"] = "";
		$_SESSION["SD_kata_sandi"] = "";
		if (@$_GET["nomor_kk"] != "") {
			echo "<script>alert('data telah diedit');document.location='?page=penduduk&nomor_kk=" . $_GET["nomor_kk"] . "';</script>";
		} else {
			echo "<script>alert('data telah diedit');document.location='?page=penduduk';</script>";
		}
	}
} elseif (@$_GET['aksi'] == 'hapus' && @$_GET["pesan"] == "ya") {
	mysqli_query($db, "delete from tb_penduduk where nik='" . $_GET['nik'] . "'");
	$_SESSION["SD_nik"] = "";
	$_SESSION["SD_nomor_kk"] = "";
	$_SESSION["SD_nama"] = "";
	$_SESSION["SD_tempat_lahir"] = "";
	$_SESSION["SD_tanggal_lahir"] = "";
	$_SESSION["SD_alamat"] = "";
	$_SESSION["SD_kode_pos"] = "";
	$_SESSION["SD_rt_rw"] = "";
	$_SESSION["SD_kelurahan"] = "";
	$_SESSION["SD_kecamatan"] = "";
	$_SESSION["SD_kabupaten"] = "";
	$_SESSION["SD_provinsi"] = "";
	$_SESSION["SD_agama"] = "";
	$_SESSION["SD_status_perkawinan"] = "";
	$_SESSION["SD_pekerjaan"] = "";
	$_SESSION["SD_kewarganegaraan"] = "Indonesia";
	$_SESSION["SD_telepon"] = "";
	$_SESSION["SD_hubungan_keluarga"] = "";
	$_SESSION["SD_status"] = "";
	$_SESSION["SD_kata_sandi"] = "";
	if (@$_GET["nomor_kk"] != "") {
		echo "<script>alert('data telah dihapus');document.location='?page=penduduk&nomor_kk=" . $_GET["nomor_kk"] . "';</script>";
	} else {
		echo "<script>alert('data telah dihapus');document.location='?page=penduduk';</script>";
	}
} elseif (@$_GET['aksi'] == 'batal_tambah') {
	$_SESSION["SD_nik"] = "";
	$_SESSION["SD_nomor_kk"] = "";
	$_SESSION["SD_nama"] = "";
	$_SESSION["SD_tempat_lahir"] = "";
	$_SESSION["SD_tanggal_lahir"] = "";
	$_SESSION["SD_alamat"] = "";
	$_SESSION["SD_kode_pos"] = "";
	$_SESSION["SD_rt_rw"] = "";
	$_SESSION["SD_kelurahan"] = "";
	$_SESSION["SD_kecamatan"] = "";
	$_SESSION["SD_kabupaten"] = "";
	$_SESSION["SD_provinsi"] = "";
	$_SESSION["SD_agama"] = "";
	$_SESSION["SD_status_perkawinan"] = "";
	$_SESSION["SD_pekerjaan"] = "";
	$_SESSION["SD_kewarganegaraan"] = "Indonesia";
	$_SESSION["SD_telepon"] = "";
	$_SESSION["SD_hubungan_keluarga"] = "";
	$_SESSION["SD_status"] = "";
	$_SESSION["SD_kata_sandi"] = "";
	if (@$_GET["nomor_kk"] != "") {
		echo "<script>document.location='?page=penduduk&nomor_kk=" . $_GET["nomor_kk"] . "';</script>";
	} else {
		echo "<script>document.location='?page=penduduk';</script>";
	}
} elseif (@$_GET['aksi'] == 'batal_ubah') {
	$_SESSION["SD_nik"] = "";
	$_SESSION["SD_nomor_kk"] = "";
	$_SESSION["SD_nama"] = "";
	$_SESSION["SD_tempat_lahir"] = "";
	$_SESSION["SD_tanggal_lahir"] = "";
	$_SESSION["SD_alamat"] = "";
	$_SESSION["SD_kode_pos"] = "";
	$_SESSION["SD_rt_rw"] = "";
	$_SESSION["SD_kelurahan"] = "";
	$_SESSION["SD_kecamatan"] = "";
	$_SESSION["SD_kabupaten"] = "";
	$_SESSION["SD_provinsi"] = "";
	$_SESSION["SD_agama"] = "";
	$_SESSION["SD_status_perkawinan"] = "";
	$_SESSION["SD_pekerjaan"] = "";
	$_SESSION["SD_kewarganegaraan"] = "Indonesia";
	$_SESSION["SD_telepon"] = "";
	$_SESSION["SD_hubungan_keluarga"] = "";
	$_SESSION["SD_status"] = "";
	$_SESSION["SD_kata_sandi"] = "";
	if (@$_GET["nomor_kk"] != "") {
		echo "<script>document.location='?page=penduduk&nomor_kk=" . $_GET["nomor_kk"] . "';</script>";
	} else {
		echo "<script>document.location='?page=penduduk';</script>";
	}
} elseif (@$_GET['aksi'] == 'batal_hapus') {
	$_SESSION["SD_nik"] = "";
	$_SESSION["SD_nomor_kk"] = "";
	$_SESSION["SD_nama"] = "";
	$_SESSION["SD_tempat_lahir"] = "";
	$_SESSION["SD_tanggal_lahir"] = "";
	$_SESSION["SD_alamat"] = "";
	$_SESSION["SD_kode_pos"] = "";
	$_SESSION["SD_rt_rw"] = "";
	$_SESSION["SD_kelurahan"] = "";
	$_SESSION["SD_kecamatan"] = "";
	$_SESSION["SD_kabupaten"] = "";
	$_SESSION["SD_provinsi"] = "";
	$_SESSION["SD_agama"] = "";
	$_SESSION["SD_status_perkawinan"] = "";
	$_SESSION["SD_pekerjaan"] = "";
	$_SESSION["SD_kewarganegaraan"] = "Indonesia";
	$_SESSION["SD_telepon"] = "";
	$_SESSION["SD_hubungan_keluarga"] = "";
	$_SESSION["SD_status"] = "";
	$_SESSION["SD_kata_sandi"] = "";
	if (@$_GET["nomor_kk"] != "") {
		echo "<script>document.location='?page=penduduk&nomor_kk=" . $_GET["nomor_kk"] . "';</script>";
	} else {
		echo "<script>document.location='?page=penduduk';</script>";
	}
}
?>