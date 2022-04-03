<?php
class logadm extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates_administrator/header');
        $this->load->view('administrator/view_log');
        $this->load->view('templates_administrator/footer');
    }

    public function login_aksi()
    {
        //username tidak boleh sama ya
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');

        $user = $user;
        $pass = MD5($pass);

        $cek = $this->login_admin_model->cek_login($user, $pass);
        if ($cek->num_rows() > 0) {

            foreach ($cek->result() as $ck) {
                $sess_data['nama']         = $ck->username_admin;
                //$sess_data['level_admin']  = $ck->level_admin;
                $sess_data['blokir']       = $ck->blokir;

                $this->session->set_userdata($sess_data);
            }
            if ($sess_data['blokir'] == "tidak") {

                $data = array(
                    'status' => 'online'
                );
                $where = $user;
                $this->admin_model->update_admin($where, $data, 'admin');
                redirect('administrator/dash');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-danger fade show" role="alert">
                      Ups.! Akun anda kemungkinan diblokir, segera hubungi admin atasan 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                redirect('administrator/logadm');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-danger fade show" role="alert">
                  Maaf username atau password salah 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
            redirect('administrator/logadm');
        }
    }

    public function logout()
    {
        $data = array(
            'status' => 'offline'
        );

        $data1 = $this->admin_model->get_profil($this->session->userdata['nama']);
        $data1  = array(
            'username_admin'    => $data1->username_admin
        );
        $where = $data1['username_admin'];

        $this->admin_model->update_admin($where, $data, 'admin');
        $this->session->sess_destroy();
        redirect('administrator/logadm');
    }
}
