<?php
class Profil extends CI_Controller
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
        $data = $this->admin_model->get_profil($this->session->userdata['nama']);
        $data  = array(
            'username_admin'    => $data->username_admin
        );
        $where = $data['username_admin'];
        $data['admin_'] = $this->admin_model->profil($where, 'admin');

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/view_profil_admin', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_admin_aksi($foto_admin)
    {
        $hapus = 'assets/admin_foto/' . $foto_admin;
        if (file_exists($hapus)) {
            unlink($hapus);
        }

        $hp         = $this->input->post('hp');
        $level      = $this->input->post('level');
        $pwlama     = $this->input->post('pwlama');
        $pwbaru     = $this->input->post('pwbaru');
        $pwkosong   = $this->input->post('pwkosong');
        $foto       = $_FILES['userfile'];

        if ($foto) {
            $config['upload_path']      = './assets/admin_foto';
            $config['allowed_types']    = 'jpg|png';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('userfile')) {
                $userfile = $this->upload->data('file_name');
                $this->db->set('foto_admin', $userfile);
            } else {
                echo "gagal upload";
            }
        }
        // var_dump($password_lama, $password_baru, $password_kosong);
        // die();

        $pw = "";

        if ($pwlama == "" && $pwbaru == "") {
            $pw = $pwkosong;
        } else if (md5($pwlama) == $pwkosong && $pwbaru != "") {
            $pw = md5($pwbaru);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger fade show" role="alert">
            Isi kedua kolom <strong>Ubah Password</strong> dan password lama harus sama persis jika ingin merubah password
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

            redirect('administrator/profil');
        }

        $data = array(
            'hp_admin'        => $hp,
            'level_admin'     => $level,
            'password_admin'  => $pw,

        );
        // var_dump($data);
        // die();
        $data1 = $this->admin_model->get_profil($this->session->userdata['nama']);
        $data1  = array(
            'username_admin'    => $data1->username_admin
        );
        $where = $data1['username_admin'];


        $this->admin_model->update_admin($where, $data, 'admin');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">
        			  Data kamu berhasil diperbarui
        			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        			    <span aria-hidden="true">&times;</span>
        			  </button>
        			</div>');

        redirect('administrator/profil');
    }
}
