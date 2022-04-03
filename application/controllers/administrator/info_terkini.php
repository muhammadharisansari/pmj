<?php
class info_terkini extends CI_Controller
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
        $data['info_']      = $this->info_model->get_data('info');
        $data['nasabah_']   = $this->nasabah_model->tampil_data('nasabah');

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/view_info_terkini', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function broadcast()
    {
        $pesan = $this->input->post('pesan_notif');
        $pilih = $this->input->post('pilih');
        date_default_timezone_set('Asia/Singapore');
        $tanggal = date('Y-m-d');
        $waktu   = date('h:i:s a');
        // melakukan perulangan sebanyak data yang ingin dikirim
        for ($i = 0; $i <= count($pilih) - 1; $i++) {
            $id = $pilih[$i];
            $notif = array(
                'id_nasabah'    => $id,
                'tanggal_notif' => $tanggal,
                'waktu_notif'   => $waktu,
                'isi_notif'     => $pesan,
                'status'        => 'belum'
            );

            $this->nasabah_model->kirim($notif, 'notif');
        }
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
            <strong>Notifikasi berhasil dikirim</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
        redirect('administrator/info_terkini');
    }

    public function info()
    {
        $judul  = $this->input->post('judul');
        $pesan  = $this->input->post('pesan');
        $gambar = $_FILES['gambar'];
        $link   = $this->input->post('link');
        date_default_timezone_set('Asia/Singapore');
        $tanggal = date('Y-m-d');

        if ($gambar) {

            $config['upload_path']      = './assets/upload/publish';
            $config['allowed_types']    = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $userfile = $this->upload->data('file_name');
                $this->db->set('gambar', $userfile);
            } else {
                echo "gagal upload";
            }
        }

        $data = array(
            'judul_info'    => $judul,
            'tanggal_info'  => $tanggal,
            'konten_info'   => $pesan,
            'link'          => $link
        );

        $this->info_model->insert($data, 'info');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
    <strong>Info berhasil dipublish</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
        redirect('administrator/info_terkini');
    }

    public function edit($id_info, $gambar)
    {
        // var_dump($id_info, $gambar);
        // die();
        $hapus = 'assets/upload/publish/' . $gambar;
        if (file_exists($hapus)) {
            unlink($hapus);
        }

        $judul      = $this->input->post('judul');
        $pesan      = $this->input->post('pesan');
        // $jenis      = $this->input->post('jenis_file');
        $gambar     = $_FILES['gambar'];
        $link       = $this->input->post('link');

        if ($gambar) {

            $config['upload_path']      = './assets/upload/publish';
            $config['allowed_types']    = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $userfile = $this->upload->data('file_name');
                $this->db->set('gambar', $userfile);
            } else {
                echo "gagal upload";
            }
        }

        $data = array(
            'judul_info'    => $judul,
            'konten_info'   => $pesan,
            'link'          => $link
        );

        $where = $id_info;
        $this->info_model->update($where, $data, 'info');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
    <strong>Info berhasil edit</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
        redirect('administrator/info_terkini');
    }

    public function hapus($id_info, $gambar)
    {
        // var_dump($id_info, $gambar);
        // die();
        $hapus = 'assets/upload/publish/' . $gambar;
        if (file_exists($hapus)) {
            unlink($hapus);
        }

        $this->info_model->hapus($id_info, 'info');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
        <strong>Info berhasil hapus</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('administrator/info_terkini');
    }
}
