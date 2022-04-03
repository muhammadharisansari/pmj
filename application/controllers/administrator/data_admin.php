<?php
class data_admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

    // menyembunyikan pesan error bawaan php
    error_reporting(0);

    if (!isset($this->session->userdata['nama'])) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-danger fade show " role="alert">
                      Mohon maaf, silahkan login terlebih dahulu
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
      redirect('administrator/logadm');
    }
  }

  public function index()
  {
    $nasabah = $this->nasabah_model->hitung_menunggu('nasabah');
    $nasabah = $nasabah->num_rows();

    $hadiah = $this->hadiah_model->hitung_menunggu('klaim hadiah');
    $hadiah = $hadiah->num_rows();

    $deposit = $this->mutasi_model->hitung_menunggu('mutasi');
    $deposit = $deposit->num_rows();

    $pesanan = $this->pesan_model->hitung_menunggu('pesan');
    $pesanan = $pesanan->num_rows();

    $total = $nasabah + $hadiah + $deposit + $pesanan;
    if ($total > 9) {
      echo '9+';
    } else {
      echo $total;
    }
  }
}
