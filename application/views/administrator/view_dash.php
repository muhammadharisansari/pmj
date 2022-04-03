<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="col-12">
        <div class="row">
            <!-- Setoran Card -->

            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    <strong>Transaksi Setoran Bulan Ini</strong>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $setoran > 0 ? $setoran : 0 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url(); ?>administrator/transaksi">
                                    <button type="button" class="btn btn-outline-warning">
                                        <i class="fas fa-tint">+</i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Setoran Card -->

            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <strong>Nasabah</strong>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $nasabah > 0 ? $nasabah : 0 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a class="nav-link text-dark" href="#">

                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Nasabah Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    <strong>Hadiah Poin</strong>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $hadiah > 0 ? $hadiah : 0 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a class="nav-link text-dark" href="<?= base_url() . 'administrator/hadiah_poin' ?>">

                                    <i class="fa fa-gift fa-2x text-gray-300"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deposit Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    <strong>Admin</strong>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $admin > 0 ? $admin : 0 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a class="nav-link text-dark" href="<?= base_url() . 'administrator/admin' ?>">

                                    <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pesanan Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    <strong>Barang tukar</strong>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $barang > 0 ? $barang : 0 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a class="nav-link text-dark" href="<?= base_url() . 'administrator/barang_tukar' ?>">

                                    <i class="fa fa-cart-arrow-down fa-2x text-gray-300"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <!-- iklan carosel Card -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Iklan Carosel</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse " id="collapseCardExample">
                <div class="card-body">
                    <div class="col-12">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php foreach ($carosel as $c) : ?>
                                    <tr>
                                        <td><img src="<?php echo base_url('assets/img/' . $c->file_carosel) ?>" style="width: 300px"></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#detail<?= $c->id_carosel; ?>">
                                                <strong>ganti</strong>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<?php foreach ($carosel as $c) : ?>
    <div class="modal fade" id="detail<?= $c->id_carosel; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih file pengganti</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'administrator/dash/update_carosel/' . $c->id_carosel . '/' . $c->file_carosel; ?>" method="Post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="col-12">
                            <p><strong>Note :</strong><br> Mohon untuk ukuran gambar minimal 1000px x 4000px agar tidak pecah.</p>
                        </div>
                        <input class="form-control" name="file" type="file">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>