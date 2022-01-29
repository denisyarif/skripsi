<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Sistem Pendukung Keputusan Metode WP</title>

        <!-- Custom fonts for this template-->
        <link href="<?= base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

        <!-- Custom styles for this template-->
        <link href="<?= base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet" />
		<link rel="shortcut icon" href="<?= base_url('assets/')?>img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?= base_url('assets/')?>img/favicon.ico" type="image/x-icon">
    </head>

    <body class="bg-gradient-primary">
        <nav class="navbar navbar-expand-lg navbar-dark bg-white shadow-lg pb-3 pt-3 font-weight-bold">
            <div class="container">
                <a class="navbar-brand text-primary" style="font-weight: 900;" href="<?= base_url('')?>"> <i class="fa fa-database mr-2 rotate-n-15"></i> Sistem Pendukung Keputusan Metode WP</a>
            </div>
        </nav>

        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">				
				<div class="col-xl-7 col-lg-7 col-md-12 mt-5">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Pendaftaran</h1>
                                        </div>
										
										<?= $this->session->flashdata('message'); ?>
										
                                        <form method="post" action="<?=base_url('')?>Pendaftar/daftar_proses" enctype="multipart/form-data">
											<div class="form-group">
												<label class="font-weight-bold">Nama Pendaftar</label>
												<input autocomplete="off" type="text" name="nama" required class="form-control"/>
											</div>
											
											<div class="form-group">
												<label class="font-weight-bold">Telephone</label>
												<input autocomplete="off" type="text" name="telp" required class="form-control"/>
											</div>
											
											<div class="form-group">
												<label class="font-weight-bold">Product Yang Dijual</label>
												<input autocomplete="off" type="text" name="product" required class="form-control"/>
											</div>
											
											<div class="form-group">
												<label class="font-weight-bold">Pengalaman Berjualan (Tahun)</label>
												<input autocomplete="off" type="text" name="pengalaman" required class="form-control"/>
											</div>
											
											<div class="form-group">
												<label class="font-weight-bold">Kisaran Harga Product</label>
												<input autocomplete="off" type="text" name="harga" required class="form-control"/>
											</div>
											
											<div class="form-group">
												<label class="font-weight-bold">Foto</label>
												<input type="file" accept="image/png, image/jpg, image/jpeg, image/gif" name="filefoto" class="form-control"/>
											</div>
											
											<div class="form-group">
												<label class="font-weight-bold">Alamat</label>
												<textarea name="alamat" class="form-control"/></textarea>
											</div>
										
											<button type="submit" class="btn btn-success btn-block"><i class="fa fa-user-plus"></i> Daftar</button>
										</form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('assets/')?>js/sb-admin-2.min.js"></script>
    </body>
</html>


