<?php
	require_once "view/header.php";
?>

	<aside>
		<center>
			<h3>Transaksi Berhasil</h3>
			<div id="kanan">
				<form method="post" action="proseskonfirmasi">
				<table border="1px">
				<tr style="background: #008B8B; color: white; font-size: 17px;">
					<th>ID</th>
					<th>Tgl</th>
					<th>Tipe</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Nama</th>
					<th>Telepon</th>
					<th>Check In</th>
					<th>Check Out</th>
					<th>Lama</th>
					<th>Total</th>
				</tr>
				<?php
					$sql = $pdo->query("SELECT * FROM pemesanan ORDER BY idpesan DESC");
			  		while ($datax = $sql->fetch()) {
			  		$idpesan = $datax['idpesan'];
					$tglpesan = $datax['tglpesan'];
					$batasbayar = $datax['batasbayar'];
					$tipe = $datax['tipe'];
					$harga = $datax['harga'];
					$jumlah = $datax['jumlah'];
					$namax = $datax['nama'];
					$alamat = $datax['alamat'];
					$telepon = $datax['telepon'];
					$tglmasuk = $datax['tglmasuk'];
					$tglkeluar = $datax['tglkeluar'];
					$lamahari = $datax['lamahari'];
					$totalbayar = $datax['totalbayar'];
					$status = $datax['status'];

					$tglpesann = date('d/m/Y', strtotime($tglpesan));
					$tglmasukk = date('d/m/Y', strtotime($tglmasuk));
					$tglkeluarr = date('d/m/Y', strtotime($tglkeluar));
					$batasbayarr = date('d/m/Y H:i:s', strtotime($batasbayar));
					$batasjam = date('H:i:s', strtotime($batasbayar));

					$hargaa = number_format($harga,0,",",".");
					$angka = number_format($totalbayar,0,",",".");

					if ($status == 'Berhasil') {
  				?>
				<tr align="center" style="font-weight: normal; font-size: 14px;">
					<td class="tkonfirm"><?php echo $idpesan ?></td>
					<td class="tkonfirm"><?php echo $tglpesann ?></td>
					<td class="tkonfirm"><?php echo $tipe ?></td>
					<td class="tkonfirm"><?php echo $hargaa ?></td>
					<td class="tkonfirm"><?php echo $jumlah ?></td>
					<td class="tkonfirm"><?php echo $namax ?></td>
					<td class="tkonfirm"><?php echo $telepon ?></td>
					<td class="tkonfirm"><?php echo $tglmasukk ?></td>
					<td class="tkonfirm"><?php echo $tglkeluarr ?></td>
					<td class="tkonfirm"><?php echo $lamahari ?> hari</td>
					<td class="tkonfirm"><?php echo $angka ?></td>
				</tr>
				<?php
					}
			  	}
			  ?>
			  </table>
			  </form>
			</div>

			<a href="laporan-transaksi" target="_blank"><button id="laporan" style="width:150px;background:white;color:black;font-weight:bold;padding:4px;border:2px solid white; margin-top: 5px;">Cetak Laporan</button></a>
		</center>
	</aside>

<?php
	require_once "view/footer.php"
?>