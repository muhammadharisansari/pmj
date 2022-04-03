<?php
$admin  = $this->admin_model->get_data($this->session->userdata['nama']);
$admin  = array(
  'username_admin'    => $admin->username_admin,
  'level_admin'       => $admin->level_admin,
  'foto_admin'        => $admin->foto_admin,
);

$nasabah = $this->nasabah_model->hitung_menunggu('nasabah')->num_rows();
$hadiah  = $this->hadiah_model->hitung_menunggu('klaim_hadiah')->num_rows();
$deposit = $this->mutasi_model->hitung_menunggu('mutasi')->num_rows();
$pesanan = $this->pesan_model->hitung_menunggu('pesan')->num_rows();

?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>administrator/dash">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="<?php echo base_url(); ?>assets/template/img/pmj_bg.png" alt="" style="width: 50px;">
        </div>
        <div class="sidebar-brand-text mx-3">PMJ</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>administrator/dash">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Transaksi setor -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>administrator/transaksi">
          <i class="fas fa-fw fa-tint"></i>
          <span>Setoran</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-clipboard-check"></i>
          <span>Verifikasi</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url(); ?>administrator/nasabah_ver">Verifikasi nasabah</a>
            <a class="collapse-item" href="<?= base_url(); ?>administrator/deposit">Deposit</a>
            <a class="collapse-item" href="<?= base_url(); ?>administrator/barang_tukar">Barang tukar</a>
            <a class="collapse-item" href="<?= base_url(); ?>administrator/hadiah_poin">Hadiah poin</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-bullhorn"></i>
          <span>Pengumuman</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url(); ?>administrator/info_terkini">Info terkini</a>
            <a class="collapse-item" href="<?= base_url(); ?>administrator/dash">Iklan Carosel</a>
            <a class="collapse-item" href="<?= base_url(); ?>administrator/harga_minyak">Harga minyak</a>
            <a class="collapse-item" href="<?= base_url(); ?>administrator/syarat">Syarat deposit</a>
            <a class="collapse-item" href="<?= base_url(); ?>administrator/profil_pmj">Profil PMJ</a>
            <div class="collapse-divider"></div>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>administrator/laporan">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Laporan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pengaturan
      </div>

      <!-- Admin -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>administrator/admin">
          <i class="fas fa-fw fa-cog"></i>
          <span>Admin</span></a>
      </li>

      <!-- Nasabah -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>administrator/nasabah">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Nasabah</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <h5><strong>Halo <?php echo $admin['username_admin'] ?></strong></h5>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter" id="notif"></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <?php if ($nasabah == 0 && $hadiah == 0 && $deposit == 0 && $pesanan == 0) { ?>
                  <div>
                    <h5 class="mt-2 text-center">Notif Kosong</h5>
                  </div>
                <?php } else {
                } ?>

                <?php if ($nasabah > 0) { ?>
                  <a class="dropdown-item d-flex align-items-center" href="<?= base_url(); ?>administrator/nasabah_ver">
                    <div class="mr-3">
                      <div class="icon-circle bg-primary">
                        <i class="fas fa-user text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-danger"><?= $nasabah; ?> request</div>
                      <span class="font-weight-bold">Verifikasi nasabah</span>
                    </div>
                  </a>
                <?php } else {
                } ?>

                <?php if ($hadiah > 0) { ?>
                  <a class="dropdown-item d-flex align-items-center" href="<?= base_url(); ?>administrator/hadiah_poin">
                    <div class="mr-3">
                      <div class="icon-circle bg-danger">
                        <i class="fas fa-gift text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-danger"><?= $hadiah; ?> request</div>
                      <span class="font-weight-bold">Klaim hadiah</span>
                    </div>
                  </a>
                <?php } else {
                } ?>

                <?php if ($deposit > 0) { ?>
                  <a class="dropdown-item d-flex align-items-center" href="<?= base_url(); ?>administrator/deposit">
                    <div class="mr-3">
                      <div class="icon-circle bg-success">
                        <i class="fas fa-dollar-sign text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-danger"><?= $deposit; ?> request</div>
                      <span class="font-weight-bold">Request deposit</span>
                    </div>
                  </a>
                <?php } else {
                } ?>

                <?php if ($pesanan > 0) { ?>
                  <a class="dropdown-item d-flex align-items-center" href="<?= base_url(); ?>administrator/barang_tukar">
                    <div class="mr-3">
                      <div class="icon-circle bg-info">
                        <i class="fas fa-cart-arrow-down text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-danger"><?= $pesanan; ?> request</div>
                      <span class="font-weight-bold">Request pesanan</span>
                    </div>
                  </a>
                <?php } else {
                } ?>

              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $admin['level_admin'] ?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url() . 'assets/admin_foto/' . $admin['foto_admin'] ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profil">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logadm/logout">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <script type="text/javascript">
          function loadDoc() {

            setInterval(function() {

              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("notif").innerHTML = this.responseText;
                }
              };
              xhttp.open("GET", "<?php base_url(); ?>data_admin", true);
              xhttp.send();

            }, 1000);

          }
          loadDoc();
        </script>