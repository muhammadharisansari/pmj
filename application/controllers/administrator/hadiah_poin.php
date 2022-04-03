<?php
class hadiah_poin extends CI_Controller
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
        $data['hadiah']  = $this->hadiah_model->tampil('hadiah');
        $data['klaim']   = $this->hadiah_model->tampil_klaim('klaim_hadiah');
        $data['riwayat'] = $this->hadiah_model->riwayat_klaim('klaim_hadiah');
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/view_hadiah', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function simpan_hadiah()
    {
        $poin   = $this->input->post('poin');
        $ket    = $this->input->post('ket');
        $gambar = $_FILES['gambar'];


        if ($gambar) {

            $config['upload_path']      = './assets/img';
            $config['allowed_types']    = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $userfile = $this->upload->data('file_name');
                $this->db->set('gambar_hadiah', $userfile);
            } else {
                echo "gagal upload";
            }
        }

        $data = array(
            'jumlah_poin' => $poin,
            'ket_hadiah'  => $ket
        );

        // var_dump($data, $gambar);
        // die();

        $this->hadiah_model->simpan($data, 'hadiah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
        <strong>Hadiah berhasil ditambahkan</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('administrator/hadiah_poin');
    }

    public function hapus_hadiah($id_hadiah, $gambar_hadiah)
    {
        // var_dump($id_info, $gambar);
        // die();
        $hapus = 'assets/img/' . $gambar_hadiah;
        if (file_exists($hapus)) {
            unlink($hapus);
        }

        $this->hadiah_model->hapus($id_hadiah, 'hadiah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
        <strong>Hadiah berhasil dihapus</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('administrator/hadiah_poin');
    }

    public function edit($id_hadiah, $gambar_hadiah)
    {
        // var_dump($id_info, $gambar);
        // die();
        $hapus = 'assets/img/' . $gambar_hadiah;
        if (file_exists($hapus)) {
            unlink($hapus);
        }

        $poin   = $this->input->post('poin');
        $ket    = $this->input->post('ket');
        $gambar = $_FILES['gambar'];


        if ($gambar) {

            $config['upload_path']      = './assets/img';
            $config['allowed_types']    = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $userfile = $this->upload->data('file_name');
                $this->db->set('gambar_hadiah', $userfile);
            } else {
                echo "gagal upload";
            }
        }

        $data = array(
            'jumlah_poin' => $poin,
            'ket_hadiah'  => $ket
        );

        // var_dump($data, $gambar);
        // die();

        $this->hadiah_model->edit($id_hadiah, $data, 'hadiah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
        <strong>Hadiah berhasil diedit</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('administrator/hadiah_poin');
    }

    public function klaim($id_klaim)
    {
        $data = array(
            'status' => 'selesai'
        );
        $this->hadiah_model->klaim($id_klaim, $data, 'klaim_hadiah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
        <strong>Hadiah berhasil dikonfirmasi</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('administrator/hadiah_poin');
    }
}
