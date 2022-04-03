<?php
class dash extends CI_Controller
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
        $admin  = $this->admin_model->get_data($this->session->userdata['nama']);
        $admin  = array(
            'username_admin'    => $admin->username_admin,
            'level_admin'       => $admin->level_admin,
        );

        $data['setoran'] = $this->mutasi_model->hitung_data('riwayat_setoran');
        $data['nasabah'] = $this->nasabah_model->hitung_data('nasabah');
        $data['hadiah']  = $this->hadiah_model->hitung_data('klaim_hadiah');
        $data['admin']   = $this->admin_model->hitung_data('mutasi');
        $data['barang']  = $this->tukar_model->hitung_data('tukar');
        $data['carosel'] = $this->carosel_model->tampil('carosel');
        // var_dump($data);
        // die();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/view_dash', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_carosel($id_carosel, $file_carosel)
    {
        // var_dump($id_info, $gambar);
        // die();
        $hapus = 'assets/img/' . $file_carosel;
        if (file_exists($hapus)) {
            unlink($hapus);
        }

        // $file = $_FILES['file'];

        $config['upload_path']      = './assets/img';
        $config['allowed_types']    = 'jpg|png|jfif';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $userfile = $this->upload->data('file_name');
            $this->db->set('file_carosel', $userfile);
        } else {
            echo "gagal upload";
        }
        $this->carosel_model->update($id_carosel, 'carosel');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
    <strong>Carosel Berhasil diupdate</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
        redirect('administrator/dash');
    }
}
