<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pendaftar extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Pendaftar_model');
        }

        public function index()
        {
			if ($this->session->userdata('id_user_level') != "1") {
            ?>
				<script type="text/javascript">
                    alert('Anda tidak berhak mengakses halaman ini!');
                    window.location='<?php echo base_url("Login/home"); ?>'
                </script>
            <?php
			}
			
			$data = [
                'page' => "Pendaftar",
				'list' => $this->Pendaftar_model->tampil(),
                
            ];
            $this->load->view('pendaftar/index', $data);
        }
        
        //menampilkan view create
        public function create()
        {
            if ($this->session->userdata('id_user_level') != "1") {
            ?>
				<script type="text/javascript">
                    alert('Anda tidak berhak mengakses halaman ini!');
                    window.location='<?php echo base_url("Login/home"); ?>'
                </script>
            <?php
			}
			
			$data['page'] = "Pendaftar";
            $this->load->view('pendaftar/create',$data);
        }

        //menambahkan data ke database
        public function store()
        {
			if ($this->session->userdata('id_user_level') != "1") {
            ?>
				<script type="text/javascript">
                    alert('Anda tidak berhak mengakses halaman ini!');
                    window.location='<?php echo base_url("Login/home"); ?>'
                </script>
            <?php
			}
			$config['upload_path'] = './assets/img/upload/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload',$config);
			
			if(!empty($_FILES['filefoto']['name'])){
				if(!$this->upload->do_upload('filefoto')) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
					redirect('alternatif/create');
				} else {
					$data = [
						'nama' => $this->input->post('nama'),
						'alamat' => $this->input->post('alamat'),
						'telp' => $this->input->post('telp'),
						'product' => $this->input->post('product'),
						'pengalaman' => $this->input->post('pengalaman'),
						'harga' => $this->input->post('harga'),
						'foto' => $this->upload->data('file_name'),
					];
					
					$this->form_validation->set_rules('nama', 'Nama', 'required');               

					if ($this->form_validation->run() != false) {
						$result = $this->Pendaftar_model->insert($data);
						if ($result) {
							$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
							redirect('pendaftar');
						}
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
						redirect('pendaftar/create');
						
					}
				}
			}else{
				$data = [
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'telp' => $this->input->post('telp'),
					'product' => $this->input->post('product'),
					'pengalaman' => $this->input->post('pengalaman'),
					'harga' => $this->input->post('harga'),
					'foto' => 'default.png'
				];
				
				$this->form_validation->set_rules('nama', 'Nama', 'required');               

				if ($this->form_validation->run() != false) {
					$result = $this->Pendaftar_model->insert($data);
					if ($result) {
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
						redirect('pendaftar');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
					redirect('pendaftar/create');
					
				}
			}
            

        }

        public function edit($id_alternatif)
        {
            if ($this->session->userdata('id_user_level') != "1") {
            ?>
				<script type="text/javascript">
                    alert('Anda tidak berhak mengakses halaman ini!');
                    window.location='<?php echo base_url("Login/home"); ?>'
                </script>
            <?php
			}
			$pendaftar = $this->Pendaftar_model->show($id_alternatif);
            $data = [
                'page' => "Pendaftar",
				'pendaftar' => $pendaftar
            ];
            $this->load->view('pendaftar/edit', $data);
        }
		
		public function detail($id_alternatif)
        {
            if ($this->session->userdata('id_user_level') != "1") {
            ?>
				<script type="text/javascript">
                    alert('Anda tidak berhak mengakses halaman ini!');
                    window.location='<?php echo base_url("Login/home"); ?>'
                </script>
            <?php
			}
			$pendaftar = $this->Pendaftar_model->show($id_alternatif);
            $data = [
                'page' => "Pendaftar",
				'pendaftar' => $pendaftar
            ];
            $this->load->view('pendaftar/detail', $data);
        }
    
        public function update($id_alternatif)
        {
            if ($this->session->userdata('id_user_level') != "1") {
            ?>
				<script type="text/javascript">
                    alert('Anda tidak berhak mengakses halaman ini!');
                    window.location='<?php echo base_url("Login/home"); ?>'
                </script>
            <?php
			}
			$config['upload_path'] = './assets/img/upload/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload',$config);
			
			if(!empty($_FILES['filefoto']['name'])){
				if(!$this->upload->do_upload('filefoto')) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
					redirect('alternatif');
				} else {
					$id_alternatif = $this->input->post('id_alternatif');
					$data = array(
						'nama' => $this->input->post('nama'),
						'alamat' => $this->input->post('alamat'),
						'telp' => $this->input->post('telp'),
						'product' => $this->input->post('product'),
						'pengalaman' => $this->input->post('pengalaman'),
						'harga' => $this->input->post('harga'),
						'foto' => $this->upload->data('file_name'),
					);

					$this->Pendaftar_model->update($id_alternatif, $data);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
					redirect('pendaftar');
				}
			}else{
				$id_alternatif = $this->input->post('id_alternatif');
				$data = array(
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'telp' => $this->input->post('telp'),
					'product' => $this->input->post('product'),
					'pengalaman' => $this->input->post('pengalaman'),
					'harga' => $this->input->post('harga'),
				);

				$this->Pendaftar_model->update_nofoto($id_alternatif, $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
				redirect('pendaftar');
			}
        }
    
        public function destroy($id_alternatif)
        {
            if ($this->session->userdata('id_user_level') != "1") {
            ?>
				<script type="text/javascript">
                    alert('Anda tidak berhak mengakses halaman ini!');
                    window.location='<?php echo base_url("Login/home"); ?>'
                </script>
            <?php
			}
			$this->Pendaftar_model->delete($id_alternatif);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            redirect('pendaftar');
        }
		
		public function daftar()
        {
            $this->load->view('pendaftar/daftar');
        }
		
		public function daftar_proses()
        {
			$config['upload_path'] = './assets/img/upload/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload',$config);
			
			if(!empty($_FILES['filefoto']['name'])){
				if(!$this->upload->do_upload('filefoto')) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
					redirect('alternatif/create');
				} else {
					$data = [
						'nama' => $this->input->post('nama'),
						'alamat' => $this->input->post('alamat'),
						'telp' => $this->input->post('telp'),
						'product' => $this->input->post('product'),
						'pengalaman' => $this->input->post('pengalaman'),
						'harga' => $this->input->post('harga'),
						'foto' => $this->upload->data('file_name'),
					];
					
					$this->form_validation->set_rules('nama', 'Nama', 'required');               

					if ($this->form_validation->run() != false) {
						$result = $this->Pendaftar_model->insert($data);
						if ($result) {
							$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, anda berhasil mendaftar!</div>');
							redirect('Pendaftar/daftar');
						}
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda gagal mendaftar!</div>');
						redirect('Pendaftar/daftar');
						
					}
				}
			}else{
				$data = [
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'telp' => $this->input->post('telp'),
					'product' => $this->input->post('product'),
					'pengalaman' => $this->input->post('pengalaman'),
					'harga' => $this->input->post('harga'),
					'foto' => 'default.png'
				];
				
				$this->form_validation->set_rules('nama', 'Nama', 'required');               

				if ($this->form_validation->run() != false) {
					$result = $this->Pendaftar_model->insert($data);
					if ($result) {
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, anda berhasil mendaftar!</div>');
						redirect('Pendaftar/daftar');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda gagal mendaftar!</div>');
					redirect('Pendaftar/daftar');
					
				}
			}
            

        }
    
    }
    
    