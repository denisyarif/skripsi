<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-user-plus"></i> Data Pendaftar</h1>

	<a href="<?= base_url('Pendaftar'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-eye"></i> Detail Data Pendaftar</h6>
    </div>
	
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th width="30%" class="bg-light">Nama</th>
					<td><?php echo $pendaftar->nama ?></td>
				</tr>
				<tr>
					<th class="bg-light">Alamat</th>
					<td><?php echo $pendaftar->alamat ?></td>
				</tr>
				<tr>
					<th class="bg-light">Telephone</th>
					<td><?php echo $pendaftar->telp ?></td>
				</tr>
				<tr>
					<th class="bg-light">Product</th>
					<td><?php echo $pendaftar->product ?></td>
				</tr>
				<tr>
					<th class="bg-light">Pengalaman Berjualan (Tahun)</th>
					<td><?php echo $pendaftar->pengalaman ?></td>
				</tr>
				<tr>
					<th class="bg-light">Kisaran Harga Product</th>
					<td><?php echo $pendaftar->harga ?></td>
				</tr>
				<tr>
					<th class="bg-light">Foto</th>
					<td>
					<?php
					if ($pendaftar->foto == NULL) {
					?>
						<img src="<?=base_url('')?>assets/img/upload/default.png" class="img-fluid" width="300px"/>
					<?php
					}else{
					?>
						<img src="<?=base_url('')?>assets/img/upload/<?php echo $pendaftar->foto ?>" class="img-fluid" width="300px"/>
					<?php
					}
					?>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>