<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Perhitungan_model extends CI_Model {
       
        public function get_kriteria()
        {
            $query = $this->db->get('kriteria');
            return $query->result();
        }
        public function get_alternatif()
        {
            $query = $this->db->get('alternatif');
            return $query->result();
        }
		
		public function data_nilai($id_alternatif,$id_kriteria)
		{
			$query = $this->db->query("SELECT * FROM penilaian JOIN sub_kriteria WHERE penilaian.id_sub_kriteria=sub_kriteria.id_sub_kriteria AND penilaian.id_alternatif='$id_alternatif' AND penilaian.id_kriteria='$id_kriteria';");
			return $query->row_array();
		}
		
		public function get_total_kriteria()
		{
			$query = $this->db->query("SELECT SUM(bobot) as total_bobot FROM kriteria;");
			return $query->row_array();
		}
		
		public function total_kriteria()
		{
			$query = $this->db->query("SELECT COUNT(*) as total_kriteria FROM kriteria;");
			return $query->row_array();
		}
		
		public function get_hasil_wp()
        {
			$query = $this->db->query("SELECT * FROM hasil_wp ORDER BY nilai DESC;");
            return $query->result();
        }
		
		public function get_hasil_alternatif($id_alternatif)
		{
			$query = $this->db->query("SELECT * FROM alternatif WHERE id_alternatif='$id_alternatif';");
			return $query->row_array();		
		}
		
		public function insert_hasil_wp($hasil_akhir = [])
        {
            $result = $this->db->insert('hasil_wp', $hasil_akhir);
            return $result;
        }
		
		public function hapus_hasil_wp()
        {
            $query = $this->db->query("TRUNCATE TABLE hasil_wp;");
			return $query;
        }
    }
    