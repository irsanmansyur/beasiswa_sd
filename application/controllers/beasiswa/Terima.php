<?php
class Terima extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function data($id)
	{
		$this->db->where("id", $id)->update("pendaftaran", ['status' => STATUS_MEMENUHI_SYARAT]);
		$this->session->set_flashdata("success", "Pendaftaran Beasiswa telah memenuhi syarat untuk peringkinan");
		return redirect(base_url("admin/datapeserta"));
	}
	public function mendapatkan_beasiswa()
	{
		$id = $this->input->post("id");
		$this->db->where_in("id", $id)->update("pendaftaran", ['status' => STATUS_DITERIMA]);
		$this->session->set_flashdata("success", "Siswa Telah Ditetapkan untuk meneriama beasiswa berdasarkan peringkinan menurut metode SAW");
		return redirect(base_url("admin/datapeserta"));
	}
}
