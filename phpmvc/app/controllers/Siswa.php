<?php 

	class Siswa extends Controller
	{
		public function index()
		{
			$data['mhs'] = $this->model('Model_Siswa')->getAllSiswa();


			$this->view('templates/header');
			$this->view('siswa/index',$data);
			$this->view('templates/footer');
		}

		public function detail($id)
		{
			$data['mhs'] = $this->model('Model_siswa')->getSiswaById($id);
			
			$this->view('templates/header');
			$this->view('siswa/detail',$data);
			$this->view('templates/footer');
		}

		public function tambah()
		{
			if ($this->model('Model_siswa')->tambahDataSiswa($_POST) > 0) {
				Flasher::setFlash('Data berhasil','ditambahkan','success');
				header('Location: '. BASEURL.'/siswa');
				exit;
			}else{
				Flasher::setFlash('Data gagal','ditambahkan','danger');
				header('Location: '. BASEURL.'/siswa');
				exit;
			}
		}

		public function hapus($id)
		{
			if ($this->model('Model_siswa')->hapusDataSiswa($id) > 0) {
				Flasher::setFlash('Data berhasil ','dihapus ','success');
				header('Location: '. BASEURL .'/siswa');
				exit;
			}else{
				Flasher::setFlash('Data gagal ','dihapus ','danger');
				header('Location: '. BASEURL .'/siswa');
				exit;
			}
		}

		public function getubah()
		{
			echo json_encode($this->model('Model_siswa')->getSiswaById($_POST['id']));
		}

		public function ubah()
		{
			if ($this->model('Model_siswa')->ubahDataSiswa($_POST) > 0) {
				Flasher::setFlash('Data berhasil','diubah','success');
				header('Location: '. BASEURL.'/siswa');
				exit;
			}else{
				Flasher::setFlash('Data gagal','diubah','danger');
				header('Location: '. BASEURL.'/siswa');
				exit;
			}
		}

		public function cari()
		{
			$data['mhs'] = $this->model('Model_siswa')->cariDataSiswa();
			$this->view('templates/header');
			$this->view('siswa/index',$data);
			$this->view('templates/footer');
		}
	}