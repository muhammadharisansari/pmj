<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>pmj</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/template/img/pmj_bg.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(); ?>assets/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/vendor/aos/aos.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/template/signup/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <!-- <link href="<?php echo base_url(); ?>assets/template/signup/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all"> -->

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url(); ?>assets/template/css/style.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> 


    <!-- =======================================================
  * Template Name: Flexor - v2.4.0
  * Template URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <header id="header">
        <div class="container d-flex">
            <div class="logo mr-auto">
                <h1 class="text-dark"><a href="<?= base_url(); ?>landing_page">
                        <img src="<?php echo base_url(); ?>assets/template/img/pmj_bg.png" alt=""> PMJ
                    </a></h1>
            </div>

            <div class=" mt-3 mr-5">

                <a href="<?= base_url(); ?>notif"><i class="bx bxs-bell text-dark "></i><span class="badge badge-danger badge-counter" id="noti_number"></span></a>

            </div>

            <nav class="nav-menu d-none d-lg-block mt-2">
                <ul>
                    <li><a href="<?php echo base_url(); ?>landing_page">Home</a></li>
                    <li><a href="<?= base_url(); ?>riwayat_minyak">Setoran</a></li>
                    <li><a href="<?= base_url(); ?>deposit">Penarikan</a></li>
                    <li><a href="<?= base_url(); ?>mutasi_nasabah">Status</a></li>
                    <li><a href="<?= base_url(); ?>menu_lainnya">Lainnya</a></li>
                    <li><a href="<?php echo base_url(); ?>profil_nasabah">Profil</a></li>
                    <li><a href="<?php echo base_url(); ?>login/logout">Logout</a></li>

                </ul>
            </nav>
        </div>
    </header>

    <script type="text/javascript">
        function loadDoc() {

            setInterval(function() {

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("noti_number").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "<?php base_url(); ?>data", true);
                xhttp.send();

            }, 500);

        }

        loadDoc();
    </script>