<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-user-plus"></i> Data Pendaftar</h1>

	<a href="<?= base_url('Pendaftar'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-edit"></i> Edit Data Pendaftar</h6>
    </div>
	
	<form method="post" action="<?=base_url('')?>Pendaftar/update/<?=$pendaftar->id_alternatif?>" enctype="multipart/form-data">
		<div class="card-body">
			<div class="row">
				<?php echo form_hidden('id_alternatif', $pendaftar->id_alternatif) ?>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Pendaftar</label>
					<input autocomplete="off" type="text" name="nama" value="<?php echo $pendaftar->nama ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Telephone</label>
					<input autocomplete="off" type="text" name="telp" value="<?php echo $pendaftar->telp ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Product Yang Dijual</label>
					<input autocomplete="off" type="text" name="product" value="<?php echo $pendaftar->product ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Pengalaman Berjualan (Tahun)</label>
					<input autocomplete="off" type="text" name="pengalaman" value="<?php echo $pendaftar->pengalaman ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Kisaran Harga Product</label>
					<input autocomplete="off" type="text" name="harga" value="<?php echo $pendaftar->harga ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Foto</label>
					<input type="file" accept="image/png, image/jpg, image/jpeg, image/gif" name="filefoto" class="form-control"/>
					
					<br/>
					<?php
					if ($pendaftar->foto == NULL) {
					?>
						<img src="<?=base_url('')?>assets/img/upload/default.png" class="img-fluid" width="150px"/>
					<?php
					}else{
					?>
						<img src="<?=base_url('')?>assets/img/upload/<?php echo $pendaftar->foto ?>" class="img-fluid" width="150px"/>
					<?php
					}
					?>
				</div>
				
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Alamat</label>
					<textarea name="alamat" class="form-control"/><?php echo $pendaftar->alamat ?></textarea>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	<?php echo form_close() ?>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>