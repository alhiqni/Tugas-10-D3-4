<?php  
require 'functions.php';
$DProduk = query(" SELECT * FROM produk");
if(isset($_POST["cari"]) ){
	$DProduk = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD</title>
</head>
<body>
	<h1>Daftar produk</h1>
	<a href="tambah.php">Tambah Data produk</a>
	<br><br>
	<table border="1" cellspacing="0" cellpadding="10">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Nama</th>
			<th>Keterangan</th>
			<th>Harga</th>
			<th>Jumlah</th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach ($DProduk as $produk ) : ?>
			<tr>
				<td><?= $i ?></td>
				<td>
					<a href="ubah.php?id=<?=$produk["id"] ?>">ubah</a> |
					<a href="hapus.php?id=<?=$produk["id"] ?>" onclick= "return confirm('Yakin?')" >hapus</a>
				</td>
				<td><?= $produk["nama_produk"] ?></td>
				<td><?= $produk["keterangan"] ?></td>
				<td><?= $produk["harga"] ?></td>
				<td><?= $produk["jumlah"] ?></td>
			</tr>
			<?php $i++ ?>
		<?php endforeach ?>
		
	</table>

</body>
</html>