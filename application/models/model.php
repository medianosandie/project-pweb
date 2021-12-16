<?php

class model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all_data()
	{
		$query = $this->db->get('inventaris_kantor');
		return $query->result();
	}

	public function tambah()
	{
		$data = [
			'kode_barang' => $this->input->post('kode_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'jumlah' => $this->input->post('jumlah'),
			'harga' => $this->input->post('harga'),
		];

		$this->db->insert('inventaris_kantor', $data);
	}

	public function edit($id)
	{
		$query = $this->db->get_where('inventaris_kantor', ['kode_barang' => $id]);
		return $query->row();
	}

	public function update()
	{
		$kondisi = ['kode_barang' => $this->input->post('kode_barang')];
		
		$data = [
			'kode_barang' => $this->input->post('kode_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'jumlah' => $this->input->post('jumlah'),
			'harga' => $this->input->post('harga'),
		];

		$this->db->update('inventaris_kantor', $data, $kondisi);
	}

	public function hapus($id)
	{
		$this->db->delete('inventaris_kantor', ['kode_barang' => $id]);
	}
}

?>