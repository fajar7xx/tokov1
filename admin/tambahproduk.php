<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
	<h1 class="h2">Tambah Produk</h1>
</div>

<div class="card">
	<div class="card-header">
	Tambah Produk	
	</div>
	<div class="card-body">
		<form method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-3 col-form-label text-right">Nama Produk</label>
				<div class="col-sm-9">
					<input type="text" name="nama" value="" placeholder="" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label text-right">Harga (Rp)</label>
				<div class="col-sm-9">
					<input type="text" name="harga" value="" placeholder="" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label text-right">Berat (gram)</label>
				<div class="col-sm-9">
					<input type="text" name="berat" value="" placeholder="" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label text-right">Deskripsi</label>
				<div class="col-sm-9">
					<textarea class="form-control" rows="10" name="deskripsi"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label text-right">Image</label>
				<div class="col-sm-9">
					<input type="file" name="gambar" value="" placeholder="" class="form-control-file">
				</div>
			</div>

			<button class="btn btn-primary float-right" name="simpan">
				<i class="fas fa-save"></i>
				Simpan
			</button>
		</form>
	</div>
</div>

<?php
r

// upload form
if(isset($_POST['simpan'])){

	$id_produk = Uuid::uuid4();

	$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
	$harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
	$berat = mysqli_real_escape_string($koneksi, $_POST['berat']);
	$deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

	$nama_file = $_FILES['gambar']['name'];
	$lokasi_file = $_FILES['gambar']['tmp_name'];
	move_uploaded_file($lokasi_file, "../img/".$nama_file);

	$query_tambah_produk =  "INSERT INTO products(id_produk, nm_products, harga, berat, img, deskripsi) VALUES ('$id_produk', '$nama', '$harga', '$berat', '$nama_file', '$deskripsi')";
	$sql_tambah_produk = mysqli_query($koneksi, $query_tambah_produk) or die(mysqli_error($koneksi));

	echo '<div class="alert alert-secondary" role="alert">
			data tersimpan
		</div>
		<meta http-equiv="refresh" content="1;url=index.php?page=product">';

}
?>

