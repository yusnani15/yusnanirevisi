<br>

<?php
$query_pendapatan=mysqli_query($db,"select * from tb_pendapatan");
$total_pendapatan=0;
while($data_pendapatan=mysqli_fetch_array($query_pendapatan)){
	$total_pendapatan=$total_pendapatan+$data_pendapatan["jumlah"];
}

$query_pengeluaran=mysqli_query($db,"select * from tb_realisasi");
$total_pengeluaran=0;
while($data_pengeluaran=mysqli_fetch_array($query_pengeluaran)){
	$total_pengeluaran=$total_pengeluaran+$data_pengeluaran["jumlah"];
}
	
$saldo=$total_pendapatan-$total_pengeluaran;

?> 

<table width="99%" border="0" align="center" cellpadding="6" cellspacing="0" style="border: solid 2px #6c6969">
  <tr>
	<td width="80%"  bgcolor="white" >Dana Desa
	</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
	<td bgcolor="" valign="top">
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="WHITE">
			<tr>
			  <td width="190">Total Pendapatan</td>
			  <td width="1">:</td>
			  <td width="auto"><?php echo "Rp ".number_format($total_pendapatan,0); ?></td>
			</tr>
			<tr>
			  <td valign="top">Total Pengeluaran (Realisasi)</td>
			  <td valign="top">:</td>
			  <td width="auto"><?php echo "Rp ".number_format($total_pengeluaran,0); ?></td>
			</tr>
			<tr>
			  <td valign="top">Saldo</td>
			  <td valign="top">:</td>
			  <td width="auto"><?php echo "Rp ".number_format($saldo,0); ?></td>
			</tr>
		</table>
    </td>
  </tr>
</table>