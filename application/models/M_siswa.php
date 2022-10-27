<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_siswa extends CI_Model
{

  public function get_siswa()
  {
    // pilih semua data siswa
    $this->db->select('*');
    $this->db->from('siswa');
    $this->db->order_by('id', 'DESC');
    return $this->db->get();
  }

  public function simpan_siswa($data)
  {
    // insert data
    return $this->db->insert("siswa", $data);
  }

  public function hapus_siswa($id)
  {
    // hapus siswa
    return $this->db->delete("siswa", $id);
  }
}
