<?php

class signup extends CI_controller
{
    public function index()
    {
        $data['bank_'] = $this->bank_model->get_data('bank');
        $this->load->view('view_signup', $data);
    }

    public function tambah_nasabah()
    {
        $tgl_daftar     = date('Y-m-d');
        $NIK            = $this->input->post('nik');
        $nama           = $this->input->post('nama');
        $tanggal_lahir  = $this->input->post('tanggal_lahir');
        $jk             = $this->input->post('jenis_kelamin');
        $alamat         = $this->input->post('alamat');
        $hp             = $this->input->post('hp');
        $username       = $this->input->post('username');
        $password       = $this->input->post('password');
        $bank           = $this->input->post('bank');
        $rekening       = $this->input->post('no_rekening');
        $foto           = $_FILES['foto_ktp'];

        $cek_user   = $this->login_nasabah_model->cek_user($username);
        $cek_hp     = $this->login_nasabah_model->cek_hp($hp);
        $cek_nik    = $this->login_nasabah_model->cek_nik($NIK);

        if ($cek_nik->num_rows() > 0) {
            $this->session->set_flashdata('pesan', '<div style="color:red;">
			<strong>NIK</strong> yang kamu masukan sudah terdaftar. Silahkan gunakan yang lain
			</div>');
            redirect('signup');
        } else if ($cek_hp->num_rows() > 0) {
            $this->session->set_flashdata('pesan', '<div style="color:red;">
			<strong>No HP</strong> yang kamu masukan sudah terdaftar. Silahkan gunakan yang lain
			</div>');
            redirect('signup');
        } else if ($cek_user->num_rows() > 0) {
            $this->session->set_flashdata('pesan', '<div style="color:red;">
			<strong>Username</strong> yang kamu masukan sudah terdaftar. Silahkan gunakan yang lain
			</div>');
            redirect('signup');
        }

        if ($foto) {
            $config['upload_path']      = './assets/upload';
            $config['allowed_types']    = 'jpg|png';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto_ktp')) {
                $userfile = $this->upload->data('file_name');
                $this->db->set('ktp_nasabah', $userfile);

                $data = array(
                    'tgl_daftar'        => $tgl_daftar,
                    'nik_nasabah'       => $NIK,
                    'nama_nasabah'      => $nama,
                    'tl_nasabah'        => $tanggal_lahir,
                    'jk_nasabah'        => $jk,
                    'alamat_nasabah'    => $alamat,
                    'hp_nasabah'        => $hp,
                    'username_nasabah'  => $username,
                    'password_nasabah'  => md5($password),
                    'bank_nasabah'      => $bank,
                    'rek_nasabah'       => $rekening,
                    'status_verifikasi' => 'menunggu',
                    'blokir'            => 'tidak',
                );
            } else {
                // echo "gagal upload";
                $data = array(
                    'tgl_daftar'        => $tgl_daftar,
                    'nik_nasabah'       => $NIK,
                    'nama_nasabah'      => $nama,
                    'tl_nasabah'        => $tanggal_lahir,
                    'jk_nasabah'        => $jk,
                    'alamat_nasabah'    => $alamat,
                    'hp_nasabah'        => $hp,
                    'username_nasabah'  => $username,
                    'password_nasabah'  => md5($password),
                    'bank_nasabah'      => $bank,
                    'rek_nasabah'       => $rekening,
                    'ktp_nasabah'       => 'kosong.png',
                    'status_verifikasi' => 'menunggu',
                    'blokir'            => 'tidak',
                );
            }
        }
        // var_dump($data);
        // die();
        $this->nasabah_model->insert_data($data, 'nasabah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">
			Selamat, anda Berhasil mendaftar. Silahkan login
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('login');
    }
}
