<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Siswa_model');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}


	public function dataSiswa()
	{
		$data['title'] = 'Data Siswa';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user'] = $this->Siswa_model->getAllSiswa();
		if ($this->input->post('keyword')) {
			$data['user'] = $this->Siswa_model->cariDataSiswa();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/datasiswa', $data);
	}

	public function dataPeserta()
	{
		$data['title'] = 'Data Peserta';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['join'] = $this->Siswa_model->jointable();
		$data['beasiswas'] = $this->db->from('pendaftaran')
			->select("pendaftaran.*")
			->join("user", "user.nis=pendaftaran.nis")
			->select("user.name,user.jenis_kelamin")
			->join("beasiswa", "beasiswa.kd_beasiswa=pendaftaran.kd_beasiswa")
			->select("beasiswa.name as nama_beasiswa")
			->get()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/datapeserta', $data);
		$this->load->view('templates/footer');
	}

	public function penilaian()
	{
		$data['title'] = 'Penilaian';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['jenis_beasiswa'] = $this->db->get("beasiswa")->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/penilaian', $data);
		$this->load->view('templates/footer');
	}

	public function detail($nis)
	{
		$data['title'] = 'Penilaian';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user'] = $this->Siswa_model->getSiswaBynis($nis);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/detail', $data);
	}

	public  function editdataSiswa($nis)
	{
		$data['title'] = 'Edit Data Siswa';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user'] = $this->Siswa_model->getSiswaBynis($nis);

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/editdatasiswa', $data);
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

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil siswa berhasil diperbaharui!</div>');
			redirect('admin/datasiswa');
		}
	}

	public function hapus($nis)
	{

		$this->Siswa_model->hapusDataSiswa($nis);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data siswa berhasil dihapus!</div>');
		redirect('admin/datasiswa');
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}


	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}


	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
	}
}
