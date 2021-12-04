<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Siswa_model');
	}

	public function index()
	{
		$data['title'] = 'DASHBOARD';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function dashboard()
	{
		$data['title'] = 'DASHBOARD';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user/dashboard', $data);
		$this->load->view('templates/footer');
	}
	public function profil()
	{
		$data['title'] = 'BIODATA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/profil', $data);
		$this->load->view('templates/footer');
	}


	public function pendaftaran()
	{
		$data['title'] = 'PENDAFTARAN';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['beasiswas'] = $this->db->get("beasiswa")->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/pendaftaran', $data);
		$this->load->view('templates/footer');
	}

	public function Kriteria()
	{
		$data['title'] = 'DATA KRITERIA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/kriteria', $data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['title'] = 'UBAH PROFIL';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		} else {

			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$tanggal_lahir = $this->input->post('tanggal_lahir');
			$alamat = $this->input->post('alamat');
			$no_tlp = $this->input->post('no_tlp');




			// cek jika ada gambar yang akan diupload

			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']      = '2048';
				$config['upload_path'] = './assets/img/profil/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpeg') {
						unlink(FCPATH . 'assets/img/profil/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->dispay_errors();
				}
			}
			$this->db->set('tanggal_lahir', $tanggal_lahir);
			$this->db->set('alamat', $alamat);
			$this->db->set('no_tlp', $no_tlp);
			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil anda berhasil diperbaharui!</div>');
			redirect('user/edit');
		}
	}

	public function seleksi()
	{
		$data['title'] = 'HASIL SELEKSI';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/seleksi', $data);
		$this->load->view('templates/footer');
	}
}
