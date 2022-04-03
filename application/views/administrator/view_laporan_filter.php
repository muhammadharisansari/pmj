<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lihat laporan</h1>
    </div>

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-chart-area"></i> Grafik </h6>
                </a>
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card-body">
                                    <!-- <form action="<?= base_url('administrator/laporan/cari_grafik1'); ?>" method="post" class="mt-3"> -->
                                    <form action="" method="post" class="mt-3">
                                        <div class="col-3 mb-3 float-right">
                                            <div class="input-group">
                                                <select name="tahun" class="form-select" aria-label="Default select example">
                                                    <option selected hidden>pilih tahun</option>
                                                    <?php for ($i = 2020; $i <= date('Y'); $i++) { ?>
                                                        <option value=<?= $i; ?>><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <button class="btn btn-outline-info" type="submit" id="button-addon1">Cari</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    $th = '';
                                    // if ($tahun_ != '' || $tahun_ != 'pilih tahun') {
                                    if (isset($_POST['tahun'])) {
                                        $th = $_POST['tahun'];
                                    } else {
                                        $th = date('Y');
                                    }
                                    ?>
                                    <h4>Grafik Jumlah Nasabah Tahun <?= $th; ?></h4>
                                    <div class="chart-area mb-3">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>

                                    <h4 class="mt-5 ">Grafik Transaksi Setoran Tahun <?= $th; ?></h4>
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-clipboard-list"></i> Laporan </h6>
                </a>
                <div class="collapse show" id="collapseCardExample2">
                    <div class="card-body">
                        <div class="row">

                            <!-- transaksi tukar barang Card -->
                            <div class="col-xl-4 col-md-4 mb-4">
                                <div class="card border-left-primary h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <strong>Transaksi Tukar Barang</strong>
                                                </div>

                                            </div>
                                            <!-- <div class="col-auto">
                                                <a href="<?= base_url(); ?>administrator/transaksi">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        <i class="fa fa-file-excel"></i>
                                                    </button>
                                                </a>
                                            </div> -->
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@mdo">
                                                    <i class="fa fa-file-pdf"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Setoran Card -->
                            <div class="col-xl-4 col-md-4 mb-4">
                                <div class="card border-left-primary h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <strong>Transaksi Setoran</strong>
                                                </div>

                                            </div>
                                            <!-- <div class="col-auto">
                                                <a href="<?= base_url(); ?>administrator/transaksi">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        <i class="fa fa-file-excel"></i>
                                                    </button>
                                                </a>
                                            </div> -->
                                            <div class="col-auto">
                                                <button target="_blank" type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal4" data-bs-whatever="@mdo">
                                                    <i class="fa fa-file-pdf"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- keuangan Card -->
                            <div class="col-xl-4 col-md-4 mb-4">
                                <div class="card border-left-primary h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <strong>Laporan Keuangan</strong>
                                                </div>

                                            </div>
                                            <!-- <div class="col-auto">
                                                <a href="<?= base_url(); ?>administrator/transaksi">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        <i class="fa fa-file-excel"></i>
                                                    </button>
                                                </a>
                                            </div> -->
                                            <div class="col-auto">
                                                <button target="_blank" type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal5" data-bs-whatever="@mdo">
                                                    <i class="fa fa-file-pdf"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- nasabah Card -->
                            <div class="col-xl-4 col-md-4 mb-4">
                                <div class="card border-left-primary  h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <strong>Daftar Nasabah</strong>
                                                </div>

                                            </div>
                                            <!-- <div class="col-auto">
                                                <a href="<?= base_url(); ?>administrator/transaksi">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        <i class="fa fa-file-excel"></i>
                                                    </button>
                                                </a>
                                            </div> -->
                                            <div class="col-auto ml-2">
                                                <a target="_blank" href="<?= base_url(); ?>administrator/laporan/export_pdf_nasabah">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        <i class="fa fa-file-pdf"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- admin Card -->
                            <div class="col-xl-4 col-md-4 mb-4">
                                <div class="card border-left-primary  h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <strong>Daftar Admin</strong>
                                                </div>

                                            </div>
                                            <!-- <div class="col-auto">
                                                <a href="<?= base_url(); ?>administrator/transaksi">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        <i class="fa fa-file-excel"></i>
                                                    </button>
                                                </a>
                                            </div> -->
                                            <div class="col-auto ml-2">
                                                <a target="_blank" href="<?= base_url(); ?>administrator/laporan/export_pdf_admin">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        <i class="fa fa-file-pdf"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tukar barang Card -->
                            <div class="col-xl-4 col-md-4 mb-4">
                                <div class="card border-left-primary  h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <strong>Daftar Tukar Barang</strong>
                                                </div>

                                            </div>
                                            <!-- <div class="col-auto">
                                                <a href="<?= base_url(); ?>administrator/transaksi">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        <i class="fa fa-file-excel"></i>
                                                    </button>
                                                </a>
                                            </div> -->
                                            <div class="col-auto ml-2">
                                                <a target="_blank" href="<?= base_url(); ?>administrator/laporan/export_pdf_tukar_barang">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        <i class="fa fa-file-pdf"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- daftar hadiah Card -->
                            <div class="col-xl-4 col-md-4 mb-4">
                                <div class="card border-left-primary h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <strong>Daftar Hadiah Poin</strong>
                                                </div>

                                            </div>
                                            <!-- <div class="col-auto">
                                                <a href="<?= base_url(); ?>administrator/transaksi">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        <i class="fa fa-file-excel"></i>
                                                    </button>
                                                </a>
                                            </div> -->
                                            <div class="col-auto ml-2">
                                                <a target="_blank" href="<?= base_url(); ?>administrator/laporan/export_pdf_hadiah_poin">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        <i class="fa fa-file-pdf"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Saldo Card -->
                            <div class="col-xl-4 col-md-4 mb-4">
                                <div class="card border-left-primary h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <strong>Saldo Nasabah</strong>
                                                </div>

                                            </div>
                                            <!-- <div class="col-auto">
                                                <a href="<?= base_url(); ?>administrator/transaksi">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        <i class="fa fa-file-excel"></i>
                                                    </button>
                                                </a>
                                            </div> -->
                                            <div class="col-auto ml-2">
                                                <a target="_blank" href="<?= base_url(); ?>administrator/laporan/export_pdf_saldo_nasabah">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        <i class="fa fa-file-pdf"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- transaksi klaim hadiah Card -->
                            <div class="col-xl-4 col-md-4 mb-4">
                                <div class="card border-left-primary h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <strong>Transaksi Klaim Hadiah</strong>
                                                </div>

                                            </div>
                                            <!-- <div class="col-auto">
                                                <a href="<?= base_url(); ?>administrator/transaksi">
                                                    <button type="button" class="btn btn-outline-secondary">
                                                        <i class="fa fa-file-excel"></i>
                                                    </button>
                                                </a>
                                            </div> -->
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal3" data-bs-whatever="@mdo">
                                                    <i class="fa fa-file-pdf"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- modal transaksi tukar barang -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Transaksi Tukar Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('administrator/laporan/filter_transaksi_tukar_barang'); ?>" method="post" class="mt-3">
                    <div class="row">
                        <div class="col-6">
                            <select name="bulan" class="form-select" aria-label="Default select example">
                                <option selected disabled hidden>Pilih Bulan</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-select" name="tahun" aria-label="Default select example">
                                <option selected disabled hidden>Pilih Tahun</option>
                                <?php for ($i = 2020; $i <= date('Y'); $i++) { ?>
                                    <option value=<?= $i; ?>><?= $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Unduh laporan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal transaksi klaim hadiah -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Transaksi Klaim Hadiah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('administrator/laporan/filter_transaksi_klaim_hadiah'); ?>" method="post" class="mt-3">
                    <div class="row">
                        <div class="col-6">
                            <select name="bulan" class="form-select" aria-label="Default select example">
                                <option selected disabled hidden>Pilih Bulan</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-select" name="tahun" aria-label="Default select example">
                                <option selected disabled hidden>Pilih Tahun</option>
                                <?php for ($i = 2020; $i <= date('Y'); $i++) { ?>
                                    <option value=<?= $i; ?>><?= $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Unduh laporan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal transaksi setoran -->
<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Transaksi Setoran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('administrator/laporan/filter_transaksi_setoran'); ?>" method="post" class="mt-3">
                    <div class="row">
                        <div class="col-6">
                            <select name="bulan" class="form-select" aria-label="Default select example">
                                <option selected disabled hidden>Pilih Bulan</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-select" name="tahun" aria-label="Default select example">
                                <option selected disabled hidden>Pilih Tahun</option>
                                <?php for ($i = 2020; $i <= date('Y'); $i++) { ?>
                                    <option value=<?= $i; ?>><?= $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Unduh laporan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal laporan keuangan -->
<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Laporan Keuangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('administrator/laporan/filter_laporan'); ?>" enctype="application/x-www-form-urlencoded" method="post" class="mt-3">
                    <div class="row">
                        <div class="col-6">
                            <select name="bulan" class="form-select" aria-label="Default select example">
                                <option selected disabled hidden>Pilih Bulan</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-select" name="tahun" aria-label="Default select example">
                                <option selected disabled hidden>Pilih Tahun</option>
                                <?php for ($i = 2020; $i <= date('Y'); $i++) { ?>
                                    <option value=<?= $i; ?>><?= $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Unduh laporan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- BAGIAN GRAFIK -->

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "mencapai",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    <?php
                    // $th = '';
                    // if ($tahun_) {
                    //     $th = $tahun_;
                    // } else {
                    //     $th = date('Y');
                    // }


                    $data = $th . '-01';
                    $jan = $this->nasabah_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-02';
                    $jan = $this->nasabah_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-03';
                    $jan = $this->nasabah_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-04';
                    $jan = $this->nasabah_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-05';
                    $jan = $this->nasabah_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-06';
                    $jan = $this->nasabah_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-07';
                    $jan = $this->nasabah_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-08';
                    $jan = $this->nasabah_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-09';
                    $jan = $this->nasabah_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-10';
                    $jan = $this->nasabah_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-11';
                    $jan = $this->nasabah_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-12';
                    $jan = $this->nasabah_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 2,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value) + ' org';
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
</script>

<script>
    //Grafik Transaksi Setoran
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#1D35E6';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Area Chart Example
    var ctx = document.getElementById("myBarChart");
    var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [{
                label: "transaksi",
                lineTension: 0.3,
                backgroundColor: "#8895F7",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    <?php
                    // $th = '';
                    // if ($tahun_) {
                    //     $th = $tahun_;
                    // } else {
                    //     $th = date('Y');
                    // }

                    $data = $th . '-01';
                    $jan = $this->mutasi_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-02';
                    $jan = $this->mutasi_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-03';
                    $jan = $this->mutasi_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-04';
                    $jan = $this->mutasi_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-05';
                    $jan = $this->mutasi_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-06';
                    $jan = $this->mutasi_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-07';
                    $jan = $this->mutasi_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-08';
                    $jan = $this->mutasi_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-09';
                    $jan = $this->mutasi_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-10';
                    $jan = $this->mutasi_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-11';
                    $jan = $this->mutasi_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>,
                    <?php
                    $data = $th . '-12';
                    $jan = $this->mutasi_model->get_grafik($data);
                    echo $jan->num_rows();
                    ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value) + ' kali';
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#2B3CC0",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#1B255E',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
</script>