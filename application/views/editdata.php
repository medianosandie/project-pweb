<?php
	defined('BASEPATH') OR exit('Akses langsung tidak diperbolehkan');
	//echo validation_errors();
?>

<section class="container-fluid">
	<div class="row">
		<div class="form-input clearfix">
			<div class="col-md-12">

				<div>
					<div>
					
						<h1 class="align-middle text-center">Edit Data Inventaris Kantor</h1>

						<?php echo form_open('home/update/'.$db->kode_barang, ['class' => 'form-horizontal', 'method' => 'post']); ?>

							<div class="mt-4 form-group <?php echo (form_error('kode_barang') != '') ? 'has-error has-feedback' : '' ?>">
								<label for="kode_barang" class="control-label col-sm-2 mb-2">Kode Barang</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="kode_barang" value="<?php echo set_value('kode_barang', $db->kode_barang); ?>" readonly>
									<?php echo (form_error('kode_barang') != '') ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' ?>
									<?php echo form_error('kode_barang'); ?>
								</div>
							</div>

							<div class="form-group mt-3">
								<label for="nama_barang" class="control-label col-sm-2 mb-2">Nama Barang</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="nama_barang" value="<?php echo set_value('nama_barang', $db->nama_barang); ?>">
									<?php echo form_error('nama_barang'); ?>
								</div>
							</div>

							<div class="form-group mt-3">
								<label for="jumlah" class="control-label col-sm-2 mb-2">Jumlah</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="jumlah" value="<?php echo set_value('jumlah', $db->jumlah); ?>">
									<?php echo form_error('jumlah'); ?>
								</div>
							</div>

							<div class="form-group mt-3">
								<label for="harga" class="control-label col-sm-2 mb-2">Harga</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="harga" value="<?php echo set_value('harga', $db->harga); ?>">
									<?php echo form_error('harga'); ?>
								</div>
							</div>

							<div class="form-group mt-3">
								<div class="btn-form col-sm-12 ">
									<a href="<?php echo base_url('home/lihatdata'); ?>">
										<button type="button" class='btn btn-danger'>Batal</button>
									</a>
									<a href="<?php echo base_url('home/lihatdata'); ?>">
										<button type="submit" class='btn btn-success'>Simpan</button>
									</a>
								</div>
							</div>
							
						<?php echo form_close(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>