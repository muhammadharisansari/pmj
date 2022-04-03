<?php
class admin extends CI_Controller
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
    $data['admin_'] = $this->admin_model->get_all('admin')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/view_admin', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_admin()
  {
    $username     = $this->input->post('username');
    $hp           = $this->input->post('hp');
    $level        = $this->input->post('level');
    $password     = $this->input->post('password');
    $konpassword  = $this->input->post('konpassword');
    $foto         = $_FILES['userfile'];

    $cek_username = $this->admin_model->cek_username($username);

    if ($cek_username->num_rows() > 0) {
      foreach ($cek_username->result() as $ck_) {
        $un = $ck_->username_admin;
      }
      if ($un == $username) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger fade show " role="alert">
            <strong>Username</strong> yang kamu masukkan sudah terdaftar. Silahkan gunakan yang lain
            		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            		    <span aria-hidden="true">&times;</span>
            		  </button> 
            		</div>');
        redirect('administrator/admin');
      }
    }

    if ($password !== $konpassword) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger fade show " role="alert">
      <strong>GAGAL!</strong> password dengan konfirm password tidak sama
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
      redirect('administrator/admin');
    } else {
      $passwordya = md5($password);
    }

    if ($foto) {
      $config['upload_path']      = './assets/admin_foto';
      $config['allowed_types']    = 'jpg|png';

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('userfile')) {
        $userfile = $this->upload->data('file_name');
        $this->db->set('foto_admin', $userfile);

        $data = array(
          'username_admin'  => $username,
          'hp_admin'        => $hp,
          'level_admin'     => $level,
          'password_admin'  => $passwordya,
          'status'          => 'offline',
          'blokir'          => 'tidak'
        );
      } else {
        $data = array(
          'username_admin'  => $username,
          'hp_admin'        => $hp,
          'level_admin'     => $level,
          'password_admin'  => $passwordya,
          'foto_admin'      => 'kosong.png',
          'status'          => 'offline',
          'blokir'          => 'tidak'
        );
      }
    }

    // var_dump($data);
    // die();
    $this->admin_model->insert($data, 'admin');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
      <strong>Berhasil!</strong> data telah disimpan
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
    redirect('administrator/admin');
  }

  public function hapus($username_admin, $foto_admin)
  {
    // var_dump($foto_admin);
    // die();
    if ($foto_admin != 'kosong.png') {
      $hapus = 'assets/admin_foto/' . $foto_admin;
      if (file_exists($hapus)) {
        unlink($hapus);
      }
    }

    $this->admin_model->hapus($username_admin, 'admin');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
      <strong>Berhasil!</strong> data telah dihapus
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
    redirect('administrator/admin');
  }

  public function blokornot($username_admin)
  {
    $status = $this->input->post('blokiran');

    if ($status == 'ya') {
      $data = array(
        'blokir' => 'tidak'
      );
    } else {
      $data = array(
        'blokir' => 'ya'
      );
    }
    $where = $username_admin;
    $this->admin_model->update_admin($where, $data, 'admin');
    redirect('administrator/admin');
  }
}
