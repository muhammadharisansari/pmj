<?php
class nasabah_ver extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

    if (!isset($this->session->userdata['nama'])) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-danger fade show " role="alert">
                      Mohon maaf, silahkan login terlebih dahulu
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
      redirect('administrator/logadm');
    }

    $data1 = $this->admin_model->get_profil($this->session->userdata['nama']);
    $data1  = array(
      'blokir'  => $data1->blokir
    );

    $blok = $data1['blokir'];
    if ($blok == 'ya') {

      $data = array(
        'status' => 'offline'
      );

      $data1 = $this->admin_model->get_profil($this->session->userdata['nama']);
      $data1  = array(
        'username_admin'    => $data1->username_admin,
      );
      $where = $data1['username_admin'];

      $this->admin_model->update_admin($where, $data, 'admin');

      $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-danger fade show " role="alert">
                      Mohon maaf, sepertinya anda sedang diblokir
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
      redirect('administrator/logadm');
    }
  }

  public function index()
  {
    $data['ver'] = $this->nasabah_model->hitung_menunggu('nasabah')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/view_nasabah_ver', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function ver_aksi($id_nasabah)
  {
    $data = array(
      'status_verifikasi' => 'diverifikasi'
    );
    $where = $id_nasabah;

    $this->nasabah_model->verifikasi($where, $data, 'nasabah');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
                        Nasabah diverifikasi
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
    redirect('administrator/nasabah_ver');
  }

  public function pesan_aksi($id_nasabah)
  {
    $pesan = $this->input->post('pesan');
    date_default_timezone_set('Asia/Singapore');
    $tanggal = date('Y-m-d');
    $waktu   = date('h:i:s a');

    $notif = array(
      'id_nasabah'    => $id_nasabah,
      'tanggal_notif' => $tanggal,
      'waktu_notif'   => $waktu,
      'isi_notif'     => $pesan,
      'status'        => 'belum'
    );

    $this->nasabah_model->kirim($notif, 'notif');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
                        Pesan terkirim
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
    redirect('administrator/nasabah_ver');
  }
}
