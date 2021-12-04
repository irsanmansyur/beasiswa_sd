<?php
class Detail extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function data($id)
	{
		$data['title'] = "Pendaftaran Beasiswa SKM";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$beasiswa_pendaftaran = $this->db->where("id", $id)->get("pendaftaran")->row();
		if ($beasiswa_pendaftaran->status == STATUS_BELUM_DITINJAU)
			$this->db->where("id", $beasiswa_pendaftaran->id)->update("pendaftaran", ['status' => STATUS_DITINJAU]);
		$data['beasiswa'] = $this->db->from("pendaftaran")
			->select("pendaftaran.*")
			->join("user", "user.nis=pendaftaran.nis")
			->select("user.image,user.name,user.jenis_kelamin,user.tanggal_lahir,user.email,user.alamat,user.no_tlp,user.date_created")
			->join("beasiswa", "beasiswa.kd_beasiswa=pendaftaran.kd_beasiswa")
			->select("beasiswa.name as nama_beasiswa")
			->where("id", $id)
			->get()->row();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('beasiswa/detail-pendaftar', $data);
		$this->load->view('templates/footer');
	}
}
