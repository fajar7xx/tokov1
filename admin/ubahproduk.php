<?php
$id = $_GET['id'];

$query_produk = "SELECT * FROM products WHERE id_produk = '$id'";
$sql_produk = mysqli_query($koneksi, $query_produk) or die(mysqli_error($koneksi));
$produk = mysqli_fetch_assoc($sql_produk);
?>

<div class="card">
	<div class="card-header">
	Edit Produk	
	</div>
	<div class="card-body">
		<form method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-3 col-form-label text-right">Nama Produk</label>
				<div class="col-sm-9">
					<input type="text" name="nama" placeholder="" class="form-control" value="<?=$produk['nm_products'];?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label text-right">Harga (Rp)</label>
				<div class="col-sm-9">
					<input type="text" name="harga" value="<?=$produk['harga'];?>" placeholder="" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label text-right">Berat (gram)</label>
				<div class="col-sm-9">
					<input type="text" name="berat" value="<?=$produk['berat'];?>" placeholder="" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label text-right">Deskripsi</label>
				<div class="col-sm-9">
					<textarea class="form-control" rows="10" name="deskripsi">
						<?=$produk['deskripsi'];?>
					</textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9">
					<img src="../img/<?=$produk['img'];?>" class="img-fluid">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label text-right">Ganti Image</label>
				<div class="col-sm-9">
					<input type="file" name="gambar" value="" placeholder="" class="form-control-file">
				</div>
			</div>

			<button class="btn btn-primary float-right" name="edit">
				<i class="fas fa-pen-square"></i>
				Ubah
			</button>
		</form>
	</div>
</div>

<?php  
if(isset($_POST['edit'])){
	$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
	$harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
	$berat = mysqli_real_escape_string($koneksi, $_POST['berat']);
	$deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

	$nama_file = $_FILES['gambar']['name'];
	$lokasi_file = $_FILES['gambar']['tmp_name'];
	// jika file dirubah
	if(!empty($lokasi_file)){
		move_uploaded_file($lokasi_file, "../img/$nama_file");

		$queryubah_produk  = "UPDATE products SET nm_products = '$nama', harga = '$harga', berat='$berat', deskripsi='$deskripsi', img='$nama_file' WHERE id_produk = '$id'";
		$sqlubah_produk = mysqli_query($koneksi, $queryubah_produk) or die(mysqli_error($koneksi));
	}
	else{
		$queryubah_produk  = "UPDATE products SET nm_products = '$nama', harga = '$harga', berat='$berat', deskripsi='$deskripsi', img='$nama_file' WHERE id_produk = '$id'";
		$sqlubah_produk = mysqli_query($koneksi, $queryubah_produk) or die(mysqli_error($koneksi));
	}

	echo '<div class="alert alert-secondary" role="alert">
			data tersimpan
		</div>
		<meta http-equiv="refresh" content="1;url=index.php?page=products">';
}

?>