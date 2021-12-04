<?php class Beasiswa extends CI_Controller
{
	public function jenis($id_kd)
	{

		$data['title'] = "Pendaftaran Beasiswa SKM";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['jenis_beasiswa'] = $jenis_beasiswa = $this->db->where("kd_beasiswa", $id_kd)->get('beasiswa')->row();
		$data['beasiswas'] = $this->db->from('pendaftaran')
			->select("pendaftaran.*")
			->join("user", "user.nis=pendaftaran.nis")
			->select("user.name,user.jenis_kelamin")
			->join("beasiswa", "beasiswa.kd_beasiswa=pendaftaran.kd_beasiswa")
			->select("beasiswa.name as nama_beasiswa")
			->where("pendaftaran.kd_beasiswa",  $jenis_beasiswa->kd_beasiswa)
			->where("pendaftaran.status", STATUS_MEMENUHI_SYARAT)
			->get()->result();
		$data['max_beasiswa'] = $this->db->from("pendaftaran")
			->select("max(tg_ot) as max_tg_ot, max(pd_ot) as max_pd_ot,max(peringkat) as max_peringkat,max(kelas) as max_kelas")
			->where("pendaftaran.kd_beasiswa", "1")
			->where("pendaftaran.status", STATUS_MEMENUHI_SYARAT)
			->get()->row();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		if ($jenis_beasiswa->name == "beasiswa BSKM")
			$this->load->view('penilaian/beasiswa-skm', $data);
		else
			$this->load->view('penilaian/beasiswa-prestasi', $data);
		$this->load->view('templates/footer');
	}
}
