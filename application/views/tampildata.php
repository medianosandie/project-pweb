<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="container-fluid">
	<div class="row" style="display:flex; justify-content:center;">
		<div class="col-md-10">

			<?php
				if(isset($_SESSION['hapus_sukses']) || isset($_SESSION['update_sukses'])) :
					$notif = '';

					isset($_SESSION['hapus_sukses']) ? $notif .= $_SESSION['hapus_sukses'] : '';
					isset($_SESSION['update_sukses']) ? $notif .= $_SESSION['update_sukses'] : '';
			?>
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  	<strong>Sukses!</strong> <?php echo $notif; ?>
					</div>
			<?php
				endif;
			?>

			<h1 class="align-middle text-center">Tabel Data Inventaris Kantor</h1>
			<div class="col-md-12 align-middle mt-4 mb-1">
				<div class="table-responsive">
					<table class="table table-secondary table-striped table-bordered table-hover">
						<thead class="thead-light align-middle">
							<tr>
								<th class="align-middle text-center p-7">No</th>
								<th class="align-middle text-center p-7">Kode Barang</th>
								<th class="align-middle text-center p-7">Nama Barang</th>
								<th class="align-middle text-center p-7">Jumlah (unit)</th>
								<th class="align-middle text-center p-7">Harga (Rp/unit)</th>
								<th class="align-middle text-center p-7">Aksi</th>
							</tr>
						</thead>
								
						<tbody>
							<?php
								$no = 1;
								foreach($database as $db) : ?>
									<tr>
										<td class="align-middle text-center"><?php echo $no; ?></td>
										<td><?php echo $db->kode_barang; ?></td>
										<td><?php echo $db->nama_barang; ?></td>
										<td><?php echo $db->jumlah; ?></td>
										<td><?php echo $db->harga; ?></td>
										<td class="align-middle text-center">
											<a href="<?php echo base_url('home/editdata/'.$db->kode_barang); ?>"><button type="button" class="btn btn-primary btn-xs">Edit</button></a>
											<a href="<?php echo base_url('home/hapusdata/'.$db->kode_barang); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><button type="button" class="btn btn-danger btn-xs">Hapus</button></a>
										</td>
									</tr>
							<?php
								$no++;
								endforeach;
							?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="col-md-12">
				<a href="<?php echo base_url('home/tambahdata'); ?>" class="d-block" >
					<button style="width:100%" type="button" class="btn btn-success p-2">Tambah Data</button> 
				</a>
			</div>

		</div>
	</div>
</section>

