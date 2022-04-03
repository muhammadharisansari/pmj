<?php
class Notif extends CI_Controller
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
    }

    public function index()
    {
        $data = $this->nasabah_model->get_data($this->session->userdata['name']);
        $data  = array(
            'id_nasabah'    => $data->id_nasabah
        );
        $where = $data['id_nasabah'];
        $data['notif_'] = $this->notif_model->tampil_data($where, 'notif');
        $this->load->view('header_nasabah');
        $this->load->view('view_notif', $data);
        $this->load->view('footer_nasabah');
    }

    public function baca($id_notif)
    {
        $where = array(
            'id_notif' => $id_notif
        );
        $data = array('status' => 'sudah');

        $this->notif_model->baca($where, $data, 'notif');
        redirect('notif');
    }

    public function hapus($id_notif)
    {
        $where = array(
            'id_notif' => $id_notif
        );

        $this->notif_model->hapus($where, 'notif');
        redirect('notif');
    }
}
