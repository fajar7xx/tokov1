<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Product List</h1>
	<div class="float-right">
		<a href="index.php?page=tambahproduk" class="btn btn-primary">
			<i class="fa fa-plus-square"></i>
			Tambah produk
		</a>
	</div>
</div>

<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th class="text-center">#</th>
				<th>Nama Produk</th>
				<th>Harga</th>
				<th>Berat</th>
				<th>Photo</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php  
			$no = 1;
			$query_produk = "SELECT * FROM products";
			$sql_produk = mysqli_query($koneksi, $query_produk) or die(mysqli_error($koneksi));
			while($produk = mysqli_fetch_assoc($sql_produk)):
			?>
			<tr>
				<td align="center"><?=$no++;?></td>
				<td><?=$produk['nm_products'];?></td>
				<td><?=rupiah($produk['harga']);?></td>
				<td><?=$produk['berat'];?></td>
				<td>
					<img src="../img/<?=$produk['img'];?>" class="img-thumbnail" width="10%">
				</td>
				<td>
					<a href="" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Info">
						<i class="fas fa-info-circle"></i>
					</a>
					<a href="index.php?page=ubahproduk&id=<?=$produk['id_produk'];?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit">
						<i class="fas fa-pen-square"></i>
					</a>
					<a href="index.php?page=hapusproduk&id=<?=$produk['id_produk'];?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
						<i class="far fa-trash-alt"></i>
					</a>
				</td>
			</tr>
			<?php  
			endwhile;
			?>
		</tbody>
	</table>
</div>