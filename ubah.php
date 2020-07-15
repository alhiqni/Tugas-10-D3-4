<?php  
require 'functions.php';
// ambil data id di url
$id = $_GET["id"];
// query data produk berdasarkan id
$produk = query ("SELECT * FROM produk WHERE id = $id ")[0];
// cek tombol submit sudah di click atau belum
if (isset($_POST["submit"])) {
	// cek apakah berhasil atau tidak
	if (ubah($_POST)>0 ){
		echo "
		<script>
			alert ('Data berhasil diubah')
			document.location.href= 'index.php'
		</script>
		";
	}else{
		echo "
		<script>
			alert ('Data gagal diubah')
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
	<title>Ubah Data produk</title>
</head>
<body>
	<h1>Ubah Data produk</h1>

	<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $produk["id"] ?> ">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama_produk" id="nama"  value="<?= $produk["nama_produk"] ?> " >
			</li>
			<li>
				<label for="keterangan">Keterangan : </label>
				<input type="text" name="keterangan" id="keterangan"  value="<?= $produk["keterangan"] ?> ">
			</li>
			<li>
				<label for="harga">Harga : </label>
				<input type="text" name="harga" id="harga"  value=" <?= $produk["harga"] ?>">
			</li>
			<li>
				<label for="jumlah">Jumlah :</label>
				<input type="text" name="jumlah" id="jumlah" value="<?= $produk["jumlah"] ?>" >
			</li>
				<button type="submit" name="submit">Ubah</button>
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