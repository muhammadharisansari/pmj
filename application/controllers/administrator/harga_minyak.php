<?php
class harga_minyak extends CI_Controller
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
    $data['harga_']     = $this->harga_model->tampil_data('harga')->result();
    $data['pengepul_']  = $this->harga_model->data_pengepul('harga_pengepul')->result();

    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/view_harga', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function update()
  {
    $ukuran = $this->input->post('ukuran');
    $harga  = $this->input->post('harga');
    $poin   = $this->input->post('poin');
    $ket    = $this->input->post('keterangan');

    $data = array(
      'ukuran'     => $ukuran,
      'harga'      => $harga,
      'poin'       => $poin,
      'keterangan' => $ket
    );

    // var_dump($data);
    // die();

    $this->harga_model->update($data, 'harga');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
    <strong>Data berhasil diupdate</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
    redirect('administrator/harga_minyak');
  }

  public function update_pengepul()
  {
    $harga = $this->input->post('harga');

    $data = array(
      'harga_pengepul'     => $harga
    );

    $this->harga_model->update_pengepul($data, 'harga_pengepul');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
    <strong>Data berhasil diupdate</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
    redirect('administrator/harga_minyak');
  }
}
