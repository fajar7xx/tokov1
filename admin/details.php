<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
	<h1 class="h2">Order Detail</h1>
</div>

<?php
$id = $_GET['id'];  
$query_detail_order = "SELECT
						    *
						FROM
						    orders
						LEFT JOIN customers USING(id_pelanggan) 
						WHERE id_orders = '$id'";

$sql_detail_order =  mysqli_query($koneksi, $query_detail_order) or die(mysqli_error($koneksi));
$detailnya = mysqli_fetch_array($sql_detail_order, MYSQLI_ASSOC);
?>

<pre>
	<?php 

	// var_dump($detailnya);

	?>
</pre>	

<div class="row">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">
				<i class="fa fa-user"></i> Customer Details
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">Nama</li>
				<li class="list-group-item">Email</li>
				<li class="list-group-item">Telp</li>
				<li class="list-group-item">Detail</li>
			</ul>

		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">
				<i class="fa fa-user"></i> Customer Details
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">Nama</li>
				<li class="list-group-item">Email</li>
				<li class="list-group-item">Telp</li>
				<li class="list-group-item">Detail</li>
			</ul>

		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">
				<i class="fa fa-user"></i> Customer Details
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">Nama</li>
				<li class="list-group-item">Email</li>
				<li class="list-group-item">Telp</li>
				<li class="list-group-item">Detail</li>
			</ul>

		</div>
	</div>
</div>


<div class="card my-2">
	<div class="card-header">
		Detail Order
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<th>NO</th>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subtotal</th>
				</thead>
				<tbody>
				<?php 
					$no = 1;
					$qPembelian_Produk = "SELECT
										    *
										FROM
										    `pembelian_produk`
										LEFT JOIN products USING(id_produk)
										WHERE
										    id_orders = '$id'";
					$Sql_Pembelian_Produk = mysqli_query($koneksi, $qPembelian_Produk) or die(mysqli_error($koneksi));
					while($order = mysqli_fetch_assoc($Sql_Pembelian_Produk)):
				?>
				<tr>
					<td><?=$no++;?></td>
					<td><?=$order['nm_products'];?></td>
					<td><?=rupiah($order['harga']);?></td>
					<td><?=$order['jumlah'];?></td>
					<td><?=rupiah($order['jumlah']*$order['harga']);?></td>
				</tr>
				<?php  
					endwhile;
				?>	
				</tbody>
			</table>
		</div>
	</div>
</div>
