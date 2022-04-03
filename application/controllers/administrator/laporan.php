<?php
class laporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('pdf');

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
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/view_laporan_filter');
        $this->load->view('templates_administrator/footer');
    }

    public function export_pdf_nasabah()
    {
        if ($this->input->post('dari') && $this->input->post('sampai')) {
            $dari   = $this->input->post('dari');
            $sampai = $this->input->post('sampai');
            $data['nasabah_']   = $this->nasabah_model->tampil_filter($dari, $sampai, 'nasabah');
            $data['dari']       = $this->input->post('dari');
            $data['sampai']     = $this->input->post('sampai');
        } else if (!$this->input->post('dari') && !$this->input->post('sampai')) {
            $data['dari']       = '';
            $data['sampai']     = '';
            $data['nasabah_'] = $this->nasabah_model->tampil_data('nasabah');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning fade show " role="alert">
            kotak input "Dari" dan "Sampai" harus diisi
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('administrator/laporan');
        }


        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "daftar_nasabah";
        $this->pdf->load_view('administrator/cetak_daftar_nasabah', $data);
    }

    public function export_pdf_admin()
    {
        $data['admin_'] = $this->admin_model->get_all('admin')->result();

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "daftar_admin";
        $this->pdf->load_view('administrator/cetak_daftar_admin', $data);
    }

    public function export_pdf_tukar_barang()
    {
        $data['tukar_'] = $this->tukar_model->tampil('tukar');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "daftar_tukar_barang";
        $this->pdf->load_view('administrator/cetak_daftar_tukar_barang', $data);
    }

    public function export_pdf_hadiah_poin()
    {
        $data['hadiah_'] = $this->hadiah_model->tampil('hadiah');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "daftar_hadiah_poin";
        $this->pdf->load_view('administrator/cetak_daftar_hadiah_poin', $data);
    }

    public function export_pdf_saldo_nasabah()
    {
        $data['saldo_'] = $this->nasabah_model->tampil_data('nasabah');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "daftar_saldo_nasabah";
        $this->pdf->load_view('administrator/cetak_daftar_saldo_nasabah', $data);
    }

    public function filter_transaksi_klaim_hadiah()
    {
        $keyword = $this->input->post('tahun') . '-' . (strlen($this->input->post('bulan')) == 1 ? '0' . (string)$this->input->post('bulan') : $this->input->post('bulan'));
        $data['results'] = $this->hadiah_model->tampil_laporan($keyword);
        $data['bulan']   = getMonth($this->input->post('bulan'));
        $data['tahun']   = $this->input->post('tahun');
        // var_dump($data);
        // die();
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "daftar_klaim_hadiah_" . getMonth($this->input->post('bulan')) . "_" . $this->input->post('tahun');
        $this->pdf->load_view('administrator/cetak_transaksi_klaim_hadiah', $data);
    }

    public function filter_transaksi_tukar_barang()
    {
        $keyword = $this->input->post('tahun') . '-' . (strlen($this->input->post('bulan')) == 1 ? '0' . (string)$this->input->post('bulan') : $this->input->post('bulan'));
        $data['results'] = $this->pesan_model->get_laporan($keyword);
        $data['bulan']   = getMonth($this->input->post('bulan'));
        $data['tahun']   = $this->input->post('tahun');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "daftar_transaksi_tukar_barang_" . getMonth($this->input->post('bulan')) . "_" . $this->input->post('tahun');
        $this->pdf->load_view('administrator/cetak_transaksi_tukar_barang', $data);
    }

    public function filter_transaksi_setoran()
    {
        $keyword = $this->input->post('tahun') . '-' . (strlen($this->input->post('bulan')) == 1 ? '0' . (string)$this->input->post('bulan') : $this->input->post('bulan'));
        $data['results']  = $this->mutasi_model->tampil_laporan($keyword);
        $data['pengepul'] = $this->harga_model->data_pengepul('harga_pengepul')->result();
        $data['bulan']    = getMonth($this->input->post('bulan'));
        $data['tahun']    = $this->input->post('tahun');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "daftar_transaksi_setoran_" . getMonth($this->input->post('bulan')) . "_" . $this->input->post('tahun');
        $this->pdf->load_view('administrator/cetak_transaksi_setoran', $data);
    }

    public function filter_laporan()
    {
        $keyword = $this->input->post('tahun') . '-' . (strlen($this->input->post('bulan')) == 1 ? '0' . (string)$this->input->post('bulan') : $this->input->post('bulan'));
        $data['mutasi']  = $this->mutasi_model->tampil_laporan($keyword);
        $data['barang'] = $this->pesan_model->get_laporan($keyword);
        $data['pengepul'] = $this->harga_model->data_pengepul('harga_pengepul')->result();
        $data['bulan']    = getMonth($this->input->post('bulan'));
        $data['tahun']    = $this->input->post('tahun');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_keuangan_" . getMonth($this->input->post('bulan')) . "_" . $this->input->post('tahun');
        $this->pdf->load_view('administrator/cetak_laporan_keuangan', $data);
    }

    // public function cari_grafik1()
    // {
    //     $data['tahun_'] = $this->input->post('tahun');

    //     if ($this->input->post('tahun') == 'pilih tahun') {
    //         $data['tahun_'] = date('Y');
    //     }

    //     $this->load->view('templates_administrator/header');
    //     $this->load->view('templates_administrator/sidebar');
    //     $this->load->view('administrator/view_laporan_filter', $data);
    //     $this->load->view('templates_administrator/footer');
    // }
}
