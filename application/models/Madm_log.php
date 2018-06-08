<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madm_log extends CI_Model {

	public function log_activity()
	{
		// $this->db->select('p.id_pengaduan, l.nama_level, l.posisi, p.status, pl.timestamp,');
		// $this->db->from('pengaduan p');
		// $this->db->join('pengaduan p','id_pengaduan.p = id_pengaduan.pl');
		// $this->db->join('level l','id_level.l = id_level.pl');
		//$this->db->where('');

		// $this->db->select('u.id_user, u.nama_pengguna, u.email, u.status, l.nama_level, r.role');
		// $this->db->from('user u','level l', 'roles r');
		// $this->db->join('level l','l.id_level = u.id_level');
		// $this->db->join('roles r','r.id_role = u.id_role','left');
		// return $this->db->get()->result();
		
		$this->db->select('p.id_pengaduan, p.wkt_pengaduan, pl.id_user, pl.status, k.kategori, r.role, p.subjek, pl.timestamp');
		$this->db->from('pengaduan_level pl');
		$this->db->join('user u','u.id_user = pl.id_user');
		$this->db->join('pengaduan p','p.id_pengaduan = pl.id_pengaduan');
		$this->db->join('kategori k','k.id_kategori = pl.id_kategori');
		$this->db->join('roles r','r.id_role = u.id_role');
		$this->db->order_by('timestamp','ASC');
		return $this->db->get()->result();
	}

}