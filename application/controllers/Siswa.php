<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

  public function index()
  {
    //load model
    $this->load->model('m_siswa');

    $data = array(
      'data_siswa' => $this->m_siswa->get_siswa()->result()
    );
    //load view
    $this->load->view('data_siswa', $data);
  }

  // Tambah Data Siswa
  public function tambah()
  {
    // load view
    $this->load->view('tambah_siswa');
  }

  public function simpan()
  {
    // load model
    $this->load->model('m_siswa');

    // get data dari form
    $nis      = $this->input->post('nis');
    $nama      = $this->input->post('nama');
    $kelas     = $this->input->post('kelas');
    $tgl_lahir = $this->input->post('tanggal_lahir');
    $tempat_lahir = $this->input->post('tempat_lahir');
    $alamat    = $this->input->post('alamat');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $agama = $this->input->post('agama');

    $data = array(
      'nis'         => $nis,
      'nama' => $nama,
      'kelas'        => $kelas,
      'tanggal_lahir' => $tgl_lahir,
      'tempat_lahir' => $tempat_lahir,
      'alamat'       => $alamat,
      'jenis_kelamin' => $jenis_kelamin,
      'agama'        => $agama
    );

    // insert data via model
    $this->m_siswa->simpan_siswa($data);

    // Redirect ke controller
    redirect('/');
  }

  public function hapus($id)
  {
    // Load model
    $this->load->model('m_siswa');

    //get ID dari URL segment ke 3
    $id['id'] = $this->uri->segment(3);

    // Delete via model
    $this->m_siswa->hapus_siswa($id);

    // Redirect ke controller siswa
    redirect('/');
  }
}
