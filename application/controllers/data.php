<?php
class Data extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // menyembunyikan pesan error bawaan php
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
        // menyembunyikan pesan error bawaan php
        error_reporting(0);

        $data = $this->nasabah_model->get_data($_SESSION['name']);

        $data  = array(
            'id_nasabah'    => $data->id_nasabah
        );
        $where = $data['id_nasabah'];

        $data  = $this->notif_model->get_data($where, 'notif');
        $notif = $data->num_rows();

        // var_dump($notif);
        // die();

        if ($notif == 0) {
            echo "";
        } else if ($notif > 9) {
            echo '9+';
        } else {
            echo $notif;
        }
    }
}
