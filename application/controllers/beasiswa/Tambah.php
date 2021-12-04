<?php
class Tambah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function skm()
	{
		$data['title'] = "Pendaftaran Beasiswa SKM";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($this->__validation_skm()) {
			$data = [
				"nis" => $this->input->post("nis"),
				"kd_beasiswa" => $this->input->post("kd_beasiswa"),
				"kelas" => $this->input->post("kelas"),
				"tg_ot" => $this->input->post("tg_ot"),
				"pd_ot" => $this->input->post("pd_ot"),
				"dok_skm" => $this->__upload_file("dok_skm"),
				"dok_kk" => $this->__upload_file("dok_kk"),
				"dok_kp" => $this->__upload_file("dok_kp"),
			];
			$this->db->insert("pendaftaran", $data);
			$this->session->set_flashdata("message", "Pendaftaran Berhasil");
			return redirect(base_url("user/pendaftaran"));
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/pendaftaran-skm', $data);
		$this->load->view('templates/footer');
	}
	public function prestasi()
	{
		$data['title'] = "Pendaftaran Beasiswa SKM";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($this->__validation_prestasi()) {
			$data = [
				"nis" => $this->input->post("nis"),
				"kd_beasiswa" => 2,
				"kelas" => $this->input->post("kelas"),
				"peringkat" => $this->input->post("peringkat"),
				"tg_ot" => $this->input->post("tg_ot"),
				"pd_ot" => $this->input->post("pd_ot"),
				"dok_rangking" => $this->__upload_file("dok_rangking"),
				"dok_kk" => $this->__upload_file("dok_kk"),
				"dok_kp" => $this->__upload_file("dok_kp"),
			];
			$this->db->insert("pendaftaran", $data);
			$this->session->set_flashdata("message", "Pendaftaran Berhasil");
			return redirect(base_url("user/pendaftaran"));
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/pendaftaran-prestasi', $data);
		$this->load->view('templates/footer');
	}

	private function __upload_file($input)
	{
		//upload configuration
		$config['upload_path']   = 'uploads/beasiswa_dok/';
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['max_size']      = 5120;
		$this->load->library('upload', $config);
		//upload file to directory
		if ($this->upload->do_upload($input)) {
			$uploadData = $this->upload->data();
			$uploadedFile = $uploadData['file_name'];
			return $uploadedFile;
		}
		return "";
	}

	public function __validation_skm()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("nis", "Siswa", "required");
		$this->form_validation->set_rules("kelas", "kelas", "required");
		$this->form_validation->set_rules("kd_beasiswa", "Jenis Beasiswa", "required");
		$this->form_validation->set_rules("tg_ot", "Tanggungan Orang tua", "required");
		$this->form_validation->set_rules("pd_ot", "Pendapatan Orang tua", "required");
		//load file helper
		$this->load->helper('file');
		$this->form_validation->set_rules('dok_skm', 'Dokument SKM', 'callback_file_check_dok_skm');
		$this->form_validation->set_rules('dok_kp', 'Dokument Kartu Pelajar', 'callback_file_check_dok_kp');
		$this->form_validation->set_rules('dok_kk', 'Dokument Kartu Keluarga', 'callback_file_check_dok_kk');
		return $this->form_validation->run();
	}
	public function __validation_prestasi()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("nis", "Siswa", "required");
		$this->form_validation->set_rules("kelas", "kelas", "required");
		$this->form_validation->set_rules("peringkat", "Peringkat", "required");
		$this->form_validation->set_rules("kd_beasiswa", "Jenis Beasiswa", "required");
		$this->form_validation->set_rules("tg_ot", "Tanggungan Orang tua", "required");
		$this->form_validation->set_rules("pd_ot", "Pendapatan Orang tua", "required");
		//load file helper
		$this->load->helper('file');
		$this->form_validation->set_rules('dok_rangking', 'Dokument SKM', 'callback_file_check_dok_rangking');
		$this->form_validation->set_rules('dok_kp', 'Dokument Kartu Pelajar', 'callback_file_check_dok_kp');
		$this->form_validation->set_rules('dok_kk', 'Dokument Kartu Keluarga', 'callback_file_check_dok_kk');
		return $this->form_validation->run();
	}

	/*
     * file value and type check during validation
     */
	public function file_check_dok_skm($str)
	{
		return $this->__cek_file("dok_skm");
	}
	public function file_check_dok_rangking($str)
	{
		return $this->__cek_file("dok_rangking");
	}
	public function file_check_dok_kp($str)
	{
		return $this->__cek_file("dok_kp");
	}
	public function file_check_dok_kk($str)
	{
		return $this->__cek_file("dok_kk");
	}
	private function __cek_file($input)
	{
		$allowed_mime_type_arr = array('application/pdf', 'image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
		$mime = get_mime_by_extension($_FILES[$input]['name']);
		$maxsize = 5242880;

		if (isset($_FILES[$input]['name']) && $_FILES[$input]['name'] != "") {
			if (in_array($mime, $allowed_mime_type_arr)) {
				return true;
			} else if ($_FILES[$input]['size'] >= $maxsize) {
				$this->form_validation->set_message('file_check_' . $input, 'File Terlalu besar.');
				return false;
			} else {
				$this->form_validation->set_message('file_check_' . $input, 'Please select only pdf/gif/jpg/png file.');
				return false;
			}
		} else {
			$this->form_validation->set_message('file_check_' . $input, 'Please choose a file to upload.');
			return false;
		}
	}
}
