<?php

class Profil_nasabah extends CI_controller
{

  function __construct()
  {
    parent::__construct();
    error_reporting(0);

    if (!isset($this->session->userdata['name'])) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-danger fade show " role="alert">
					  Mohon maaf, silahkan login terlebih dahulu
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
      redirect('login');
    }

    $data = $this->nasabah_model->get_data($this->session->userdata['name']);
    $data  = array(
      'blokir'    => $data->blokir
    );

    $blok = $data['blokir'];
    if ($blok == 'ya') {
      $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-danger fade show " role="alert">
                      Mohon maaf, sepertinya anda sedang diblokir
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
      redirect('login');
    }
  }

  public function index()
  {
    $data = $this->nasabah_model->get_data($this->session->userdata['name']);
    $data  = array(
      'id_nasabah'    => $data->id_nasabah
    );
    $where = $data['id_nasabah'];

    $data['nasabah_']     = $this->nasabah_model->tampil_nasabah($where, 'nasabah');
    $data['bank_']        = $this->bank_model->get_data('bank');
    $this->load->view('header_nasabah');
    $this->load->view('view_profil_nasabah', $data);
    $this->load->view('footer_nasabah');
  }

  public function update_nasabah_aksi()
  {

    $data = $this->nasabah_model->get_data($this->session->userdata['name']);
    $data  = array(
      'id_nasabah'    => $data->id_nasabah
    );
    $where = $data['id_nasabah'];

    // $id_nasabah         = $this->input->post('id_nasabah');
    $nik_nasabah        = $this->input->post('NIK');
    $nama_nasabah       = $this->input->post('nama');
    $tl_nasabah         = $this->input->post('tanggal');
    $jk_nasabah         = $this->input->post('jk');
    $alamat_nasabah     = $this->input->post('alamat');
    $hp_nasabah         = $this->input->post('hp');
    $bank_nasabah       = $this->input->post('bank');
    $rek_nasabah        = $this->input->post('rekening');
    $foto               = $_FILES['userfile'];
    $password_lama      = $this->input->post('password_lama');
    $password_baru      = $this->input->post('password_baru');
    $password_kosong    = $this->input->post('kosong');
    $ktp_lama           = $this->input->post('ktp_lama');

    $cek_hp     = $this->login_nasabah_model->cek_hp($hp_nasabah);
    $cek_nik    = $this->login_nasabah_model->cek_nik($nik_nasabah);

    if ($cek_nik->num_rows() > 0) {
      foreach ($cek_nik->result() as $ck_) {
        $id = $ck_->id_nasabah;
      }
      if ($id !== $where) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger fade show " role="alert">
            <strong>NIK</strong> yang kamu masukkan sudah terdaftar. Silahkan gunakan yang lain
            		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            		    <span aria-hidden="true">&times;</span>
            		  </button> 
            		</div>');
        redirect('profil_nasabah');
      }
    }
    if ($cek_hp->num_rows() > 0) {
      foreach ($cek_hp->result() as $ck2_) {
        $id = $ck2_->id_nasabah;
      }
      if ($id !== $where) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger fade show " role="alert">
            <strong>No HP</strong> yang kamu masukkan sudah terdaftar. Silahkan gunakan yang lain
            		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            		    <span aria-hidden="true">&times;</span>
            		  </button>
            		</div>');
        redirect('profil_nasabah');
      }
    }

    if ($foto) {

      $config['upload_path']      = './assets/upload';
      $config['allowed_types']    = 'jpg|png';

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('userfile')) {
        $userfile = $this->upload->data('file_name');
        $this->db->set('ktp_nasabah', $userfile);
      } else {
        echo "gagal upload";
      }
    } else {
      $hapus = 'assets/upload/' . $ktp_lama;
      if (file_exists($hapus)) {
        unlink($hapus);
      }
    }
    // var_dump($password_lama, $password_baru, $password_kosong);
    // die();

    $password_nasabah = "";

    if ($password_lama == "" && $password_baru == "") {
      $password_nasabah = $password_kosong;
    } else if (md5($password_lama) == $password_kosong && $password_baru != "") {
      $password_nasabah = md5($password_baru);
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger fade show" role="alert">
            Isi kedua kolom <strong>Ubah Password</strong> dan password lama harus sama persis jika ingin merubah password
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

      redirect('profil_nasabah');
    }

    $data = array(
      'nik_nasabah'        => $nik_nasabah,
      'nama_nasabah'       => $nama_nasabah,
      'tl_nasabah'         => $tl_nasabah,
      'jk_nasabah'         => $jk_nasabah,
      'alamat_nasabah'     => $alamat_nasabah,
      'hp_nasabah'         => $hp_nasabah,
      'password_nasabah'   => $password_nasabah,
      'bank_nasabah'       => $bank_nasabah,
      'rek_nasabah'        => $rek_nasabah,
    );

    $data1 = $this->nasabah_model->get_data($this->session->userdata['name']);
    $data1  = array(
      'id_nasabah'    => $data1->id_nasabah
    );
    $where = $data1['id_nasabah'];

    // var_dump($data, $where);
    // die();
    $this->nasabah_model->update_nasabah($where, $data, 'nasabah');

    $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">
					  Data kamu berhasil diperbarui
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');

    redirect('profil_nasabah');
  }
}
