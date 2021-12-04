<?php
class Tolak extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function data($id)
	{
		$this->db->where("id", $id)->update("pendaftaran", ['status' => STATUS_DITOLAK]);
		$this->session->set_flashdata("danger", "Pendaftaran Beasiswa telah di Tolak");
		return redirect(base_url("admin/datapeserta"));
	}
}
