<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model');
		$this->load->helper(['url_helper', 'form']);
    	$this->load->library(['form_validation', 'session']);
	}

	public function lihatdata()
	{
		$data['database'] = $this->model->get_all_data();

		$data['title'] = "Tabel Data Inventaris Kantor";

		$this->load->view('templates/header', $data);
		$this->load->view('tampildata', $data);
		$this->load->view('templates/footer');
	}

	public function tambahdata()
	{
		$data['title'] = "Tambah Data";

		$this->load->view('templates/header', $data);
		$this->load->view('tambahdata');
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$this->form_validation->set_message('is_unique', '{field} sudah terpakai');

		$this->form_validation->set_rules('kode_barang', 'Kode Barang', ['required', 'is_unique[inventaris_kantor.kode_barang]']);

		$this->validasi();

		if($this->form_validation->run() === FALSE)
		{
			$this->tambahdata();
		}
		else
		{
			$this->model->tambah();
			$this->session->set_flashdata('input_sukses','Data berhasil ditambahkan');
			redirect('/home/lihatdata');
		}
	}

	public function hapusdata($id)
	{
		$this->model->hapus($id);
		$this->session->set_flashdata('hapus_sukses','Data berhasil dihapus');
		redirect('/home/lihatdata');
	}

	public function editdata($id)
	{
		$data['title'] = 'Edit Data';

		$data['db'] = $this->model->edit($id);

		$this->load->view('templates/header', $data);
		$this->load->view('editdata', $data);
		$this->load->view('templates/footer');
	}

	public function update($id)
	{
		$this->validasi();

		if($this->form_validation->run() === FALSE)
		{
			$this->editdata($id);
		}
		else
		{
			$this->model->update();
			$this->session->set_flashdata('update_sukses', 'Data berhasil diperbarui');
			redirect('/home/lihatdata');
		}
	}

	public function validasi()
	{
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');

		$config = [
			[
				'field' => 'kode_barang',
				'label' => 'Kode Barang',
				'rules' => 'required'
			],
			[
				'field' => 'nama_barang',
				'label' => 'Nama Barang',
				'rules' => 'required'
			],
			[
				'field' => 'harga',
				'label' => 'Harga',
				'rules' => 'required'
			],
			[
				'field' => 'jumlah',
				'label' => 'Jumlah',
				'rules' => 'required'
			]
		];

		$this->form_validation->set_rules($config);
	}
}
?>