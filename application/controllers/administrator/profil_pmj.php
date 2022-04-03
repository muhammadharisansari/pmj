<?php
class profil_pmj extends CI_Controller
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
    $data['profil'] = $this->profil_model->tampil_data('kontak')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/view_profil', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function update()
  {
    $alamat = $this->input->post('alamat');
    $jam    = $this->input->post('jam');
    $email  = $this->input->post('email');
    $wa     = $this->input->post('wa');
    $ig     = $this->input->post('ig');
    $fb     = $this->input->post('fb');
    $peta   = $this->input->post('peta');

    $data = array(
      'alamat_pmj' => $alamat,
      'jam_pmj'    => $jam,
      'email_pmj'  => $email,
      'wa_pmj'     => $wa,
      'ig_pmj'     => $ig,
      'fb_pmj'     => $fb,
      'map_pmj'    => $peta
    );
    // var_dump($alamat);
    // die();
    $this->profil_model->update($data, 'kontak');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">
					  Data berhasil diupdate
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');

    redirect('administrator/profil_pmj');
  }
}
