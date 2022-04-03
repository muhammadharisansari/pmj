<?php
class Info extends CI_Controller
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
    $data['info_'] = $this->info_model->get_data('info');
    $this->load->view('header_nasabah');
    $this->load->view('view_info', $data);
    $this->load->view('footer_nasabah');
  }
}
