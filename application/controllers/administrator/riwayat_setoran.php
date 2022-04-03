<?php
class riwayat_setoran extends CI_Controller
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
    $data['riwayat_'] = $this->mutasi_model->tampil_riwayat('riwayat_setoran');

    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/view_riwayat_setoran', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function hapus($id_setoran)
  {
    $where = array('id_setoran' => $id_setoran);
    $this->mutasi_model->delete($where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">
					  Data berhasil dihapus
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');

    redirect('administrator/riwayat_setoran');
  }
}
