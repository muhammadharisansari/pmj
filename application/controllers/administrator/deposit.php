<?php
class deposit extends CI_Controller
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
        $data['deposit']        = $this->mutasi_model->deposit('mutasi');
        $data['list_deposit']   = $this->mutasi_model->list_deposit('mutasi');

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/view_deposit', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function ver_deposit($id_transaksi)
    {
        $status     = $this->input->post('status');
        $id         = $this->input->post('id_nasabah');
        $jenis      = $this->input->post('jenis');
        $jumlah     = $this->input->post('jumlah');

        if ($status == NULL) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning fade show " role="alert">
        pilih status transaksi
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
            redirect('administrator/deposit');
        }

        $data = array(
            'status' => $status
        );

        if ($status == 'ditolak') {
            $saldo = $this->nasabah_model->get_nasabah($id, 'nasabah');
            $saldo = array(
                'sisa_saldo' => $saldo->sisa_saldo
            );
            $sisa = $saldo['sisa_saldo'];
            $kembali = $sisa + $jumlah;
            $saldo = array(
                'sisa_saldo' => $kembali
            );
            $where = $id;
            $this->mutasi_model->kembalikan($id, $saldo, 'nasabah');
        }

        if ($jenis == 'tunai') {
            $data2 = array(
                'code_tarik' => ''
            );
            // var_dump($jenis, $data2);
            // die();
            $this->mutasi_model->reset_id_tarik($data2, $id, 'nasabah');
        }

        // var_dump($data);
        // die();
        $this->mutasi_model->verifikasi($id_transaksi, $data, 'mutasi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
        Status transaksi <strong>' . $status . '</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('administrator/deposit');
    }
}
