<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Cuustomers</h1>
</div>

<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th class="text-center">#</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Telp</th>
				<th class="text-center">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php  
			$no = 1;
			$query_customers = "SELECT * FROM customers";
			$sql_customers = mysqli_query($koneksi, $query_customers) or die(mysqli_error($koneksi));
			while($customers = mysqli_fetch_assoc($sql_customers)):
			?>
			<tr>
				<td align="center"><?=$no++;?></td>
				<td><?=$customers['nm_pelanggan'];?></td>
				<td><?=$customers['email_pelanggan'];?></td>
				<td><?=$customers['telp_pelanggan'];?></td>
				<td>
					<a href="" class="btn btn-sm btn-block btn-danger">Hapus Data</a>
				</td>
			</tr>
			<?php  
			endwhile;
			?>
		</tbody>
	</table>
</div>