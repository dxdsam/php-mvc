<?php 

	class Model_siswa
	{
		private $table = 'tb_siswa';
		private $db;

		public function __construct()
		{
			$this->db = new Database;
		}

		public function getAllSiswa()
		{
			$this->db->query('SELECT * FROM '.$this->table);
			return $this->db->resultSet();
		}

		public function getSiswaById($id)
		{
			$this->db->query('SELECT * FROM '. $this->table .' WHERE id=:id ');
			$this->db->bind('id',$id);
			return $this->db->single();
		}

		public function tambahDataSiswa($data)
		{
			$query = "INSERT INTO $this->table VALUES ('', :nama, :nisn, :kelas)";
			$this->db->query($query);

			$this->db->bind('nama',$data['nama']);
			$this->db->bind('nisn',$data['nisn']);
			$this->db->bind('kelas',$data['kelas']);

			$this->db->execute();
			return $this->db->rowCount();
		}

		public function hapusDataSiswa($id)
		{

			$query = 'DELETE FROM '.$this->table.' WHERE id=:id';
			$this->db->query($query);

			$this->db->bind('id', $id);
			$this->db->execute();
			return $this->db->rowCount();
		}

		public function ubahDataSiswa($data)
		{
			$query = "UPDATE $this->table SET  nama = :nama, nisn = :nisn, kelas = :kelas WHERE id = :id";

			$this->db->query($query);

			$this->db->bind('nama',$data['nama']);
			$this->db->bind('nisn',$data['nisn']);
			$this->db->bind('kelas',$data['kelas']);
			$this->db->bind('id',$data['id']);

			$this->db->execute();
			return $this->db->rowCount();
		}

		public function cariDataSiswa()
		{
			$keyword = $_POST['keyword'];
			$query = "SELECT * FROM $this->table WHERE nama LIKE :keyword";
			$this->db->query($query);
			$this->db->bind('keyword', "%$keyword%");
			return  $this->db->resultSet();
		}



		
	}