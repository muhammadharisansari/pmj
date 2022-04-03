<?php

class Mutasi_nasabah extends CI_controller
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
        $data = array(
            'id_nasabah' => $data->id_nasabah
        );
        $where = $data['id_nasabah'];

        $data['mutasi_'] = $this->mutasi_model->tampil_data($where, 'mutasi');

        $this->load->view('header_nasabah');
        $this->load->view('view_mutasi_nasabah', $data);
        $this->load->view('footer_nasabah');
    }
}
