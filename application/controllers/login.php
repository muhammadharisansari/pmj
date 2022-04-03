<?php

class Login extends CI_controller
{

    public function index()
    {
        $this->load->view('view_login_nasabah');
    }

    public function proses_login()
    {
        $this->form_validation->set_rules('username', 'username', 'required', [
            'required' => 'username wajib diisi'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required', [
            'required' => 'password wajib diisi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('view_login_nasabah');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = MD5($password);

            $cek = $this->login_nasabah_model->cek_login($user, $pass);

            if ($cek->num_rows() > 0) {

                foreach ($cek->result() as $ck) {
                    $sess_data['name']       = $ck->username_nasabah;
                    // $sess_data['password']   = $ck->password_nasabah;
                    $sess_data['blokir']     = $ck->blokir;

                    $this->session->set_userdata($sess_data);
                }
                redirect('landing_page');
                // if ($sess_data['blokir'] == "tidak") {
                //     redirect('landing_page');
                // } else {
                //     $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-danger fade show" role="alert">
                // 		  Ups.! Akun anda kemungkinan diblokir, segera hubungi admin 
                // 		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                // 		    <span aria-hidden="true">&times;</span>
                // 		  </button>
                // 		</div>');
                //     redirect('login');
                // }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-danger fade show" role="alert">
					  Maaf username atau password salah 
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
