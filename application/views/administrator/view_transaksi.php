<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Setoran</h1>
    </div>

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills ">
                        <li class="nav-item">
                            <a class="nav-link text-primary disabled" href="#"><strong>Transaksi Setoran</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="riwayat_setoran"><strong>Riwayat Setoran</strong></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="dataTable">
                        <thead class="bg-primary text-white">
                            <th>Nama</th>
                            <th>username</th>
                            <th>NIK</th>
                            <th>Saldo</th>
                            <th>Poin</th>
                            <th>Setor</th>
                        </thead>
                        <tbody>
                            <?php foreach ($nasabah_ as $n) : ?>
                                <form action="<?= base_url() . 'transaksi/setor_aksi' ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                    <tr>
                                        <td><?= $n->nama_nasabah ?></td>
                                        <td><?= $n->username_nasabah; ?></td>
                                        <td><?= $n->nik_nasabah; ?></td>
                                        <td>Rp.<?= rupiah($n->sisa_saldo); ?></td>
                                        <td><?= $n->poin; ?></td>
                                        <td class="text-center" style="width: 100px;">
                                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $n->id_nasabah; ?>">
                                                <i class="fas fa-tint">+</i>
                                            </button>
                                        </td>
                                    </tr>
                                </form>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal setoran -->
<?php foreach ($nasabah_ as $n) : ?>
    <div class="modal fade" id="exampleModal<?php echo $n->id_nasabah; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form class="form-horizontal" action="<?php echo base_url() . 'administrator/transaksi/setor_aksi' ?>" method="Post" enctype="multipart/form-data">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel"><strong><?= $n->username_nasabah; ?></strong></h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Jumlah setoran:</label>
                                <div class="input-group mb-3">
                                    <input type="hidden" name="id_nasabah" value="<?= $n->id_nasabah ?>">
                                    <input type="number" class="form-control" name="setor" aria-describedby="basic-addon2">
                                    <span class="input-group-text" id="basic-addon2">ml</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">batal</button>
                        <button type="submit" class="btn btn-primary">setor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>