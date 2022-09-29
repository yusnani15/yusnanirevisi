<?php
if(@$_GET["page"]=="dana_desa"){
	include("cek_login.php");
	include("dana_desa.php");
}
elseif(@$_GET["page"]=="sekretaris_desa"){
	include("cek_login.php");
	include("sekretaris_desa.php");
}
elseif(@$_GET["page"]=="kartu_keluarga"){
	include("cek_login.php");
	include("kartu_keluarga.php");
}
elseif(@$_GET["page"]=="penduduk"){
	include("cek_login.php");
	include("penduduk.php");

}

elseif(@$_GET["page"]=="lahir"){
	include("cek_login.php");
	include("lahir.php");
}

elseif(@$_GET["page"]=="permohonan_surat"){
	include("cek_login.php");
	include("permohonan_surat.php");
}

elseif(@$_GET["page"]=="meninggal"){
	include("cek_login.php");
	include("meninggal.php");

}
elseif(@$_GET["page"]=="pendatang"){
	include("cek_login.php");
	include("pendatang.php");

}
elseif(@$_GET["page"]=="pindah"){
	include("cek_login.php");
	include("pindah.php");

}
elseif(@$_GET["page"]=="surat_domisili"){
	include("cek_login.php");
	include("surat_domisili.php");
}

elseif(@$_GET["page"]=="surat_kematian"){
	include("cek_login.php");
	include("surat_kematian.php");
}

elseif(@$_GET["page"]=="surat_usaha"){
	include("cek_login.php");
	include("surat_usaha.php");
}

elseif(@$_GET["page"]=="surat_pindah"){
	include("cek_login.php");
	include("surat_pindah.php");
}

elseif(@$_GET["page"]=="surat_ahli_waris"){
	include("cek_login.php");
	include("surat_ahli_waris.php");
}

elseif(@$_GET["page"]=="surat_menikah"){
	include("cek_login.php");
	include("surat_menikah.php");
}

elseif(@$_GET["page"]=="surat_belum_menikah"){
	include("cek_login.php");
	include("surat_belum_menikah.php");
}

elseif(@$_GET["page"]=="surat_pengganti_ktp"){
	include("cek_login.php");
	include("surat_pengganti_ktp.php");
}

elseif(@$_GET["page"]=="surat_kurang_mampu"){
	include("cek_login.php");
	include("surat_kurang_mampu.php");
}

elseif(@$_GET["page"]=="surat_berkelakuan_baik"){
	include("cek_login.php");
	include("surat_berkelakuan_baik.php");
}

elseif(@$_GET["page"]=="ubah_user"){
	include("cek_login.php");
	include("ubah_user.php");
}

elseif(@$_GET["page"]=="keluar"){
	$_SESSION["yusnani_status"]="";
	$_SESSION["yusnani_nik"]="";
	echo"<script>document.location='index.php';</script >";
}else{
	include("home.php");
}

?>