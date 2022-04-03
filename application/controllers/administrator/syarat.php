<?php
class syarat extends CI_Controller
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
    $data['syarat_tf'] = $this->syarat_model->tampil_tf('syarat')->result();
    $data['syarat_st'] = $this->syarat_model->tampil_st('syarat')->result();
    $data['minmax_']   = $this->syarat_model->tampil_minmax('minmax')->result();

    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/view_syarat', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function simpanst()
  {
    $syaratst = $this->input->post('syaratst');

    $data = array(
      'syarat'    => $syaratst,
      'kategori'  => 'tunai'
    );

    $this->syarat_model->simpan($data, 'syarat');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
                        syarat baru berhasil disimpan
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
    redirect('administrator/syarat');
  }

  public function simpantf()
  {
    $syarattf = $this->input->post('syarattf');

    $data = array(
      'syarat'    => $syarattf,
      'kategori'  => 'transfer'
    );

    $this->syarat_model->simpan($data, 'syarat');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
                        syarat baru berhasil disimpan
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
    redirect('administrator/syarat');
  }

  public function edit($id_syarat)
  {
    $syarat = $this->input->post('syarat');

    $data = array(
      'syarat' => $syarat
    );

    $where = $id_syarat;

    $this->syarat_model->update($where, $data, 'syarat');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
        syarat baru berhasil diedit
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('administrator/syarat');
  }

  public function edit_harga()
  {
    $id_minmax  = $this->input->post('id_minmax');
    $minimal    = $this->input->post('minimal');
    $maksimal   = $this->input->post('maksimal');

    $data = array(
      'minimal'  => $minimal,
      'maksimal' => $maksimal
    );

    $where = $id_minmax;

    $this->syarat_model->update_harga($where, $data, 'minmax');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
        Nominal baru berhasil diupdate
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('administrator/syarat');
  }

  public function hapus($id_syarat)
  {
    $this->syarat_model->hapus($id_syarat, 'syarat');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
        syarat baru berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('administrator/syarat');
  }
}
