<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>pmj</title>

    <!-- Icons font CSS-->
    <!-- <link href="<?php echo base_url(); ?>assets/template/signup/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/template/signup/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all"> -->
    <link href="<?php echo base_url(); ?>assets/template/img/pmj_bg.png" rel="icon">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url(); ?>assets/template/signup/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/template/signup/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url(); ?>assets/template/signup/css/main.css" rel="stylesheet" media="all">

</head>

<body>

    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">

            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title" style=" text-align:center;"><strong>REGISTRASI</strong></h2>

                    <p>
                        <?php echo $this->session->flashdata('pesan') ?>
                    </p>

                    <?php echo form_open_multipart('signup/tambah_nasabah') ?>

                    <div class="input-group">
                        <div class="input-group">
                            <label class="label">NIK</label>
                            <input class="input--style-4" type="number" name="nik" required>
                            <div class="form-text ml-2 " style=" color: red;">*NIK tidak bisa diganti</div>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-group">
                            <label class="label">Nama lengkap</label>
                            <input class="input--style-4" type="text" name="nama" required>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">tanggal_lahir</label>
                                <input class="input--style-4 " type="date" name="tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Jenis Kelamin</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="jenis_kelamin" required>
                                        <option disabled="disabled" selected="selected">--Silahkan pilih--</option>
                                        <option>Laki-laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-group">
                            <label class="label">Alamat</label>
                            <input class="input--style-4" type="text" name="alamat" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-group">
                            <label class="label">No HP</label>
                            <input class="input--style-4" type="number" name="hp" required>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">username</label>
                                <input class="input--style-4" type="text" name="username" required>
                                <div class="form-text ml-2 " style=" color: red;">*username tidak bisa diganti</div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">password</label>
                                <input class="input--style-4" type="password" name="password" required>
                            </div>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Bank</label> 
                                <div class="rs-select2 js-select-simple ">
                                    <select name="bank">
                                        <option disabled="disabled" selected="selected">-pilih bank-</option>
                                        <?php foreach ($bank_ as $b) : ?>
                                            <option><?php echo $b->nama_bank ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">No Rekening</label>
                                <input class="input--style-4" type="number" name="no_rekening" required>
                                <div class="form-text ml-2" style=" color: red;">*Mohon ketikan dengan teliti</div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="label">foto KTP (boleh nanti)</label>
                        <input type="file" name="foto_ktp">
                    </div>

                    <div class="row row-space">
                        <div class="col-md-2">
                            <div class="p-t-15">
                                <button class="btn btn--green" type="submit">Daftar</button>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="p-t-15">
                                <?php echo anchor('login', '<div class ="btn btn--blue">kembali</div>') ?>
                            </div>
                        </div>
                    </div>
                    <?php form_close(); ?>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?php echo base_url(); ?>assets/template/signup/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?php echo base_url(); ?>assets/template/signup/vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/signup/vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/signup/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url(); ?>assets/template/signup/js/global.js"></script>

</body>

</html>
<!-- end document-->