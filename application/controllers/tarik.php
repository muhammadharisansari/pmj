<?php
class Tarik extends CI_Controller
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
        $data['syaratst_']    = $this->syarat_model->tampil_st('syarat')->result();
        $data['minmax_']      = $this->syarat_model->tampil_minmax('minmax')->result();
        $this->load->view('header_nasabah');
        $this->load->view('view_tarik', $data);
        $this->load->view('footer_nasabah');
    }

    public function tarik_aksi()
    {
        $id_nasabah     = $this->input->post('id_nasabah');
        $sisa_saldo     = $this->input->post('sisa_saldo');
        $penarikan      = $this->input->post('penarikan');
        date_default_timezone_set('Asia/Singapore');
        $tanggal        = date('Y-m-d');
        $waktu          = date('h:i a');

        $code = rand(0, 999999);
        $code_tarik =  "id" . $code . $id_nasabah;

        $data = array(
            'id_nasabah'        => $id_nasabah,
            'jumlah_penarikan'  => $penarikan,
            'tanggal'           => $tanggal,
            'waktu'             => $waktu,
            'code_id'           => $code_tarik,
            'status'            => 'menunggu',
            'jenis'             => 'tunai'
        );

        $sisa = $sisa_saldo - $penarikan;

        $data2 = array(
            'sisa_saldo'    => $sisa,
            'code_tarik'    => $code_tarik
        );
        $where = array(
            'id_nasabah'    => $id_nasabah
        );
        $where = $where['id_nasabah'];
        // var_dump($data2, $where);
        // die();

        $this->nasabah_model->update_saldo($where, $data2, 'nasabah');

        $this->nasabah_model->insert_deposit($data, 'mutasi');
        // $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">
        //  Silahkan tukarkan code kamu untuk pencairan. Lihat code di <strong>halaman tarik tunai </strong><a href="tarik" class="text-dark">(klik disini)</a>
        // <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('tarik');
        //}
    }
}
