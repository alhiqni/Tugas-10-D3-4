<?php  
require 'functions.php';
// cek tombol submit sudah di click atau belum
if (isset($_POST["submit"])) {
	// cek apakah berhasil atau tidak
	if (tambah($_POST)>0 ){
		echo "
		<script>
			alert ('Data berhasil ditambahkan')
			document.location.href= 'index.php'
		</script>
		";
	}else{
		echo "
		<script>
			alert ('Data gagal ditambahkan')
			document.location.href= 'index.php'
		</script>
		";
	} 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Data produk</title>
</head>
<body>
	<h1>Tambah Data produk</h1>

	<form action="" method="post" enctype="multipart/form-data" >
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama_produk" id="nama" required>
			</li>
			<li>
				<label for="keterangan">Keterangan : </label>
				<input type="text" name="keterangan" id="keterangan" required>
			</li>
			<li>
				<label for="harga">Harga : </label>
				<input type="text" name="harga" id="harga" required>
			</li>
			<li>
				<label for="jumlah">Jumlah :</label>
				<input type="number" name="jumlah" id="jumlah">
			</li>
			<button type="submit" name="submit">Tambah Data produk</button>
			</li>
		</ul>
	</form>
	<script type="text/javascript">
		var rupiah = document.getElementById('harga');
		rupiah.addEventListener('keyup', function(e){
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>
</body>
</html>