<!-- detail pembelian -->

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Orders List</h1>
</div>

<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th class="text-center">#</th>
				<th>Nama</th>
				<th>Tanggal</th>
				<th>Total</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php  
			$no = 1;
			$query_orders = "SELECT
							    orders.*,
							    customers.nm_pelanggan
							FROM
							    orders
							LEFT JOIN customers USING(id_pelanggan)";
			$sql_orders = mysqli_query($koneksi, $query_orders) or die(mysqli_error($koneksi));
			while($orders = mysqli_fetch_assoc($sql_orders)):
			?>
			<tr>
				<td align="center"><?=$no++;?></td>
				<td><?=$orders['nm_pelanggan'];?></td>
				<td><?=$orders['created_at'];?></td>
				<td><?=rupiah($orders['total_orders']);?></td>
				<td>
					<a href="index.php?page=detail&id=<?=$orders['id_orders'];?>" class="btn btn-outline-primary">Detail</a>
				</td>
			</tr>
			<?php  
			endwhile;
			?>
		</tbody>
	</table>
</div>