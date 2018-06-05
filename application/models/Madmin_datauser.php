<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin_datauser extends CI_Model {

	public function user()
	{
		$this->db->select('u.id_user, u.nama_pengguna, u.email, u.status, l.nama_level, r.role');
		$this->db->from('user u','level l', 'roles r');
		$this->db->join('level l','l.id_level = u.id_level');
		$this->db->join('roles r','r.id_role = u.id_role','left');
		return $this->db->get()->result();
	}

	public function save()
	{
		$password = password_hash($this->input->post('new'), PASSWORD_BCRYPT);
		$data = array (
			'password' => $password
		);
		$this->db->where('id_user', $this->session->userdata('id_user'));
		$this->db->update('user', $data);
	}
	//fungsi untuk mengecek password lama :
	public function cek_old()
	{
		$old = password_hash($this->input->post('old'), PASSWORD_BCRYPT);
		$this->db->where('password',$old);
		$query = $this->db->get('user');
		return $query->result();
	}
}
?>