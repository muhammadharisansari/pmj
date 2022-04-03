<?php
class Menu_lainnya extends CI_Controller
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

    $data['nasabah_']   = $this->nasabah_model->tampil_nasabah($where, 'nasabah');
    $data['hadiah_']    = $this->hadiah_model->tampil('hadiah');
    $data['tukar_']     = $this->tukar_model->tampil('tukar');
    $this->load->view('header_nasabah');
    $this->load->view('view_lainnya', $data);
    $this->load->view('footer_nasabah');
  }

  public function tukar_aksi()
  {

    $sisa_saldo    = $this->input->post('sisa_saldo');
    $id_barang     = $this->input->post('id_barang');
    $nama_barang   = $this->input->post('nama_barang');
    $harga         = $this->input->post('harga');
    $modal         = $this->input->post('modal');
    $sedia         = $this->input->post('sedia');
    $jumlah        = $this->input->post('jumlah');
    date_default_timezone_set('Asia/Singapore');
    $tanggal       = date('Y-m-d');

    $harga_ = $harga * $jumlah;
    // var_dump($sisa_saldo, $harga, $jumlah, $harga_);
    // die();
    if ($jumlah > $sedia) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger fade show " role="alert">
    <strong>GAGAL!!</strong> Jumlah pesanan anda melebihi stok yang tersedia
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');

      redirect('menu_lainnya');
    } else if ($harga_ > $sisa_saldo) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger fade show " role="alert">
            <strong>GAGAL!!</strong> Saldo anda tidak mencukupi
            		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            		    <span aria-hidden="true">&times;</span>
            		  </button>
            		</div>');

      redirect('menu_lainnya');
    } else {

      $data = $this->nasabah_model->get_data($this->session->userdata['name']);
      $data  = array(
        'id_nasabah'    => $data->id_nasabah
      );
      $id_nasabah = $data['id_nasabah'];

      //total_modal
      $modals = $modal * $jumlah;

      $data = array(
        'nama_barang'   => $nama_barang,
        'id_nasabah'    => $id_nasabah,
        'harga'         => $harga,
        'tot_modal'     => $modals,
        'jumlah_pesan'  => $jumlah,
        'total_harga'   => $harga_,
        'tanggal'       => $tanggal,
        'status'        => 'dipesan'
      );

      $this->tukar_model->insert_pesan($data, 'pesan');


      // update stok

      $where_barang =  $id_barang;
      $where        = $id_nasabah;
      $sisa         = $sisa_saldo - $harga_;
      $sisa_stok    = $sedia - $jumlah;
      $sisa_stok = array(
        'sedia'    => $sisa_stok
      );
      $data2 = array(
        'sisa_saldo'    => $sisa
      );

      $this->nasabah_model->update_saldo($where, $data2, 'nasabah');
      $this->tukar_model->update_stok($where_barang, $sisa_stok, 'tukar');
      //akhir update stok

      $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
            <strong>Berhasil !!</strong> Silahkan ambil pesanan anda di PMJ
            		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            		    <span aria-hidden="true">&times;</span>
            		  </button>
            		</div>');
      redirect('pesanan_nasabah');
    }
  }

  public function klaim_aksi()
  {
    $data = $this->nasabah_model->get_data($this->session->userdata['name']);
    $data  = array(
      'id_nasabah'  => $data->id_nasabah,
      'username'    => $data->username_nasabah,
    );
    $id_nasabah   = $data['id_nasabah'];
    $username     = $data['username'];
    $nik          = $this->input->post('nik');
    $ket_hadiah   = $this->input->post('ket_hadiah');
    $poin         = $this->input->post('poin');
    $jumlah_poin  = $this->input->post('jumlah_poin');
    date_default_timezone_set('Asia/Singapore');
    $tanggal       = date('Y-m-d');
    $waktu         = date('h:i:s a');

    //untuk tabel klaim 
    date_default_timezone_set('Asia/Singapore');
    $satu        = date('ym-d');
    $dua         = date('h-is-a');

    $gen = $satu . $dua;

    $klaim = array(
      'nik'         => $nik,
      'username'    => $username,
      'ket_hadiah'  => $ket_hadiah,
      'tanggal'     => $tanggal,
      'code'        => $gen,
      'status'      => 'menunggu'
    );

    //untuk tabel notif
    $notif = array(
      'id_nasabah'    => $id_nasabah,
      'tanggal_notif' => $tanggal,
      'waktu_notif'   => $waktu,
      'isi_notif'     => 'Klaim hadiah ' . $ket_hadiah . ' kamu berhasil. Segera datang ke PMJ bawa KTPnya ya, kuy.',
      'status'        => 'belum'
    );

    //untuk tabel nasabah
    $total  = $poin - $jumlah_poin;
    $where  = $id_nasabah;
    $data2  = array(
      'poin' => $total,
    );

    $this->nasabah_model->update_poin($where, $data2, 'nasabah');
    $this->notif_model->insert($notif, 'notif');
    $this->klaim_model->insert($klaim, 'klaim_hadiah');

    $this->session->set_flashdata('pesan', '<div class="alert alert-info fade show" role="alert">
			<strong>Klaim berhasil.</strong> Silahkan cek notif kamu.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

    redirect('menu_lainnya');
  }
}
