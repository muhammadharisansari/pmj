<?php
class transaksi extends CI_Controller
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
        $data['nasabah_'] = $this->nasabah_model->tampil_data('nasabah');

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/view_transaksi', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function setor_aksi()
    {
        $id_nasabah = $this->input->post('id_nasabah');
        $setor      = $this->input->post('setor');
        date_default_timezone_set('Asia/Singapore');
        $tanggal = date('Y-m-d');
        $waktu   = date('h:i:s a');


        // untuk menambah deposit dan poin
        $tambah = $this->harga_model->tampil_data('harga')->row();
        $tambah = array(
            'harga'     => $tambah->harga,
            'ukuran'    => $tambah->ukuran,
            'poin'      => $tambah->poin
        );
        // var_dump($tambah['poin']);
        // die();

        $nasabah = $this->nasabah_model->get_nasabah($id_nasabah);
        $nasabah = array(
            'sisa_saldo'    => $nasabah->sisa_saldo,
            'poin'          => $nasabah->poin
        );
        //saldo
        $deposit    = ($tambah['harga'] / $tambah['ukuran']) * $setor;
        $hasil      = $nasabah['sisa_saldo'] + $deposit;
        //poin
        $poin        = 0;
        if ($setor < 1000) {
            $poin = $tambah['poin'] / 2;
            $poin = $nasabah['poin'] + $poin;
        } else if ($setor >= 1000) {
            $poin = ($tambah['poin'] * $setor) / 1000;
            $poin = $nasabah['poin'] + $poin;
        }

        $data2 = array(
            'sisa_saldo'    => $hasil,
            'poin'          => $poin
        );
        $where = array(
            'id_nasabah'    => $id_nasabah
        );
        $where = $where['id_nasabah'];

        $this->nasabah_model->update_saldo($where, $data2, 'nasabah');

        // untuk riwayat setor
        $setoran = array(
            'id_nasabah'    => $id_nasabah,
            'waktu_setor'   => $waktu,
            'tanggal_setor' => $tanggal,
            'jumlah_setor'  => $setor,
            'senilai'       => $deposit
        );

        // untuk notif
        $notif = array(
            'id_nasabah'    => $id_nasabah,
            'tanggal_notif' => $tanggal,
            'waktu_notif'   => $waktu,
            'isi_notif'     => 'Kamu telah menabung minyak sebanyak ' . $setor . ' ml, senilai Rp.' . $deposit . '. Cek detailnya di menu setoran. <a href="riwayat_minyak">(klik disini)</a> ',
            'status'        => 'belum'
        );

        $this->mutasi_model->insert_setor($setoran, 'riwayat_setoran');
        $this->notif_model->insert($notif);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">
			<strong>Transaksi berhasil ditambahkan</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('administrator/transaksi');
    }
}
