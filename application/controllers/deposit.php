<?php

class Deposit extends CI_controller
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
        $data['syarattf_']    = $this->syarat_model->tampil_tf('syarat')->result();
        $data['syarattf_']    = $this->syarat_model->tampil_tf('syarat')->result();
        $data['minmax_']      = $this->syarat_model->tampil_minmax('minmax')->result();
        $this->load->view('header_nasabah');
        $this->load->view('view_deposit', $data);
        $this->load->view('footer_nasabah');
    }

    public function insert()
    {
        $id_nasabah     = $this->input->post('id_nasabah');
        $sisa_saldo     = $this->input->post('sisa_saldo');
        $penarikan      = $this->input->post('penarikan');
        $rek_nasabah    = $this->input->post('rek_nasabah');
        $bank_nasabah   = $this->input->post('bank_nasabah');
        date_default_timezone_set('Asia/Singapore');
        $tanggal        = date('Y-m-d');
        $waktu          = date('h:i a');

        // if ($penarikan > $sisa_saldo) { 

        //     $this->session->set_flashdata('pesan', '<div class="alert alert-warning fade show" role="alert">
        // 	<strong>GAGAL !</strong> Pengajuan anda melebihi saldo yang tersisa
        // 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        //     redirect('deposit');
        // } elseif ($penarikan < '50000') {
        //     $this->session->set_flashdata('pesan', '<div class="alert alert-warning fade show" role="alert">
        // 	<strong>GAGAL !</strong> Pengajuan anda kurang dari minimal penarikan (50.000)
        // 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        //     redirect('deposit');
        // } elseif ($penarikan > '500000') {
        //     $this->session->set_flashdata('pesan', '<div class="alert alert-warning fade show" role="alert">
        // 	<strong>GAGAL !</strong> Pengajuan anda melebihi dari maksimal penarikan (500.000)
        // 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        //     redirect('deposit');
        // } else {

        $data = array(
            'id_nasabah'        => $id_nasabah,
            'jumlah_penarikan'  => $penarikan,
            'tanggal'           => $tanggal,
            'waktu'             => $waktu,
            'rek'               => $rek_nasabah,
            'bank'              => $bank_nasabah,
            'status'            => 'menunggu',
            'jenis'             => 'transfer'
        );

        $sisa = $sisa_saldo - $penarikan;

        $data2 = array(
            'sisa_saldo'    => $sisa
        );
        $where = array(
            'id_nasabah'    => $id_nasabah
        );
        $where = $where['id_nasabah'];
        // var_dump($data2, $where); 
        // die();
        $this->nasabah_model->update_saldo($where, $data2, 'nasabah');

        $this->nasabah_model->insert_deposit($data, 'mutasi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">
			<strong>Pengajuan anda sedang diproses.</strong> Silahkan cek secara berkala disini
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('mutasi_nasabah');
        //}
    }
}
