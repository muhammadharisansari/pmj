<?php
class barang_tukar extends CI_Controller
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
        $data['pesan'] = $this->pesan_model->get_pesan('pesan');
        $data['tukar'] = $this->tukar_model->tampil('tukar');
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/view_pesan', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function selesai($id_pesan)
    {
        $data = array(
            'status' => 'selesai'
        );
        $this->pesan_model->selesai($data, $id_pesan, 'pesan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
            <strong>Transaksi selesai</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
        redirect('administrator/barang_tukar');
    }

    public function simpan()
    {
        $nama_barang    = $this->input->post('nama_barang');
        $ket            = $this->input->post('ket');
        $satuan         = $this->input->post('satuan');
        $harga          = $this->input->post('harga');
        $modal          = $this->input->post('modal');
        $stok           = $this->input->post('stok');
        $gambar         = $_FILES['gambar'];

        if ($gambar) {
            $config['upload_path']      = './assets/img';
            $config['allowed_types']    = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $userfile = $this->upload->data('file_name');
                $this->db->set('gambar_barang', $userfile);
            } else {
                echo "gagal upload";
            }
        }

        $data = array(
            'nama_barang'   => $nama_barang,
            'ket_barang'    => $ket,
            'harga'         => $harga,
            'modal'         => $modal,
            'satuan'        => $satuan,
            'sedia'         => $stok
        );
        // var_dump($data, $gambar);
        // die();
        $this->tukar_model->simpan($data, 'tukar');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
    <strong>Data berhasil disimpan</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
        redirect('administrator/barang_tukar');
    }

    public function edit($id_barang, $gambar_barang)
    {
        // var_dump($id_barang, $gambar_barang);
        // die();
        $hapus = 'assets/img/' . $gambar_barang;
        if (file_exists($hapus)) {
            unlink($hapus);
        }

        $nama_barang    = $this->input->post('nama_barang');
        $ket            = $this->input->post('ket');
        $satuan         = $this->input->post('satuan');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');
        $gambar         = $_FILES['gambar'];

        // var_dump($gambar);
        // die();
        if ($gambar) {
            $config['upload_path']      = './assets/img';
            $config['allowed_types']    = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $userfile = $this->upload->data('file_name');
                $this->db->set('gambar_barang', $userfile);
            } else {
                echo "gagal upload";
            }
        }

        $data = array(
            'nama_barang'   => $nama_barang,
            'ket_barang'    => $ket,
            'harga'         => $harga,
            'satuan'        => $satuan,
            'sedia'         => $stok
        );

        // var_dump($data, $gambar);
        // die();

        $this->tukar_model->edit($id_barang, $data, 'tukar');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
    <strong>Data berhasil diupdate</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
        redirect('administrator/barang_tukar');
    }

    public function hapus($id_barang, $gambar_barang)
    {
        // var_dump($id_info, $gambar);
        // die();
        $hapus = 'assets/img/' . $gambar_barang;
        if (file_exists($hapus)) {
            unlink($hapus);
        }

        $this->tukar_model->hapus($id_barang, 'tukar');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
    <strong>Data berhasil dihapus</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
        redirect('administrator/barang_tukar');
    }
}
