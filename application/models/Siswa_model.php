<?php


defined('BASEPATH') or exit('No direct script access allowed');
class Siswa_model extends CI_Model{
	
	public function getAllSiswa()
	{
		
		return $query = $this->db->get('user')->result_array();

		return $table = "user";
		return $primarykey = "nis";
		return $allowedFields = ['nis','name','email','jenis_kelamin'];
	}

	public function getSiswaBynis($nis)
	{
		return $this->db->get_where('user',['nis' => $nis] )->row_array();
		$this->db->update('user',['nis' => $nis] )->row_array();
	}

	public function update($nis)
	{
		$this->db->get();
	}

	public function hapusDataSiswa($nis)
	{
		$this->db->where('nis',$nis);
		$this->db->delete('user');
	}
	
	public function cariDataSiswa()
	{
		$keyword = $this->input->post('keyword',true);
		$this->db->like('name', $keyword);
		$this->db->or_like('alamat', $keyword);
		$this->db->or_like('nis', $keyword);
		$this->db->or_like('no_tlp', $keyword);		
		return $this->db->get('user')->result_array();
	}

	public function jointable(){

        $queryPendaftaran = "SELECT `user`.`nis`,`user`.`name`
			           FROM `user` JOIN `beasiswa`
			             ON `user`.`nis` = `beasiswa`.`kd_beasiswa`";
			          
        $daftar = $this->db->query($queryPendaftaran)->result_array();
	}
}