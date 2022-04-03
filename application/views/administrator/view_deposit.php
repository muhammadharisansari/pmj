<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Request deposit</h1>
    </div>

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="row">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Request</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" id="dataTable">
                    <thead class="bg-primary text-white">
                        <th hidden>code</th>
                        <th>Nama</th>
                        <th>Waktu</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Detail</th>
                    </thead>
                    <tbody>
                        <?php foreach ($deposit as $d) : ?>
                            <tr>
                                <td hidden><?= $d->code_id; ?></td>
                                <td><?= $d->nama_nasabah; ?></td>
                                <td><?= $d->waktu; ?></td>
                                <td><?= $d->tanggal; ?></td>
                                <td><?= $d->jenis; ?></td>
                                <td>Rp.<?= rupiah($d->jumlah_penarikan); ?></td>
                                <td style="width: 100px;" class="text-center">
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $d->id_transaksi; ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">List deposit</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCardExample">
                <div class="card-body">

                    <table class="table table-hover table-striped table-bordered" id="list">
                        <thead class="bg-primary text-white">
                            <th>Nama</th>
                            <th>Waktu</th>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </thead>
                        <tbody>
                            <?php foreach ($list_deposit as $l) : ?>
                                <tr>
                                    <td><?= $l->nama_nasabah; ?></td>
                                    <td><?= $l->waktu; ?></td>
                                    <td><?= $l->tanggal; ?></td>
                                    <td><?= $l->jenis; ?></td>
                                    <td>Rp.<?= $l->jumlah_penarikan; ?></td>

                                    <?php if ($l->status == 'menunggu') { ?>
                                        <td class="text-warning"><?= $l->status; ?></td>
                                    <?php } else if ($l->status == 'berhasil') { ?>
                                        <td class="text-success"><?= $l->status; ?></td>
                                    <?php } else if ($l->status == 'ditolak') { ?>
                                        <td class="text-danger"><?= $l->status; ?></td>
                                    <?php } ?>


                                    <td style="width: 100px;" class="text-center">
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2<?= $l->id_transaksi; ?>">
                                            <i class="fas fa-eye"></i>
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

<!-- Modal -->
<?php foreach ($deposit as $d) : ?>
    <div class="modal fade" id="exampleModal<?= $d->id_transaksi; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url() . 'administrator/deposit/ver_deposit/' . $d->id_transaksi ?>" enctype="application/x-www-form-urlencoded" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $d->username_nasabah; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Nama :</label>
                                <input type="text" hidden name="id_nasabah" class="form-control" value="<?= $d->id_nasabah; ?>">
                                <input type="text" hidden name="jenis" class="form-control" value="<?= $d->jenis; ?>">
                                <input type="text" class="form-control" value="<?= $d->nama_nasabah; ?>" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Waktu :</label>
                                <input type="text" class="form-control" value="<?= $d->waktu; ?>" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Tanggal :</label>
                                <input type="text" class="form-control" value="<?= $d->tanggal; ?>" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Jumlah :</label>
                                <input type="text" class="form-control" name="jumlah" value="<?= $d->jumlah_penarikan; ?>" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Jenis :</label>
                                <input type="text" class="form-control" value="<?= $d->jenis; ?>" readonly>
                            </div>

                            <?php if ($d->jenis == 'transfer') { ?>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Bank :</label>
                                    <input type="text" class="form-control" value="<?= $d->bank_nasabah; ?>" readonly>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Rekening :</label>
                                    <input type="text" class="form-control" value="<?= $d->rek_nasabah; ?>" readonly>
                                </div>
                            <?php } else if ($d->jenis == 'tunai') { ?>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Code id :</label>
                                    <input type="text" class="form-control" value="<?= $d->code_id; ?>" readonly>
                                </div>
                            <?php } ?>

                            <div class="col-12 mb-3">
                                <label class="form-label">Status :</label>
                                <select class="form-select" name="status" aria-label="Default select example" required>
                                    <option disabled="disabled" selected="selected">--pilih--</option>
                                    <option value="berhasil">Berhasil</option>
                                    <option value="ditolak">Ditolak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Selesai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal -->
<?php foreach ($list_deposit as $l) : ?>
    <div class="modal fade" id="exampleModal2<?= $l->id_transaksi; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $l->username_nasabah; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Nama :</label>
                            <input type="text" hidden name="id_nasabah" class="form-control" value="<?= $l->id_nasabah; ?>">
                            <input type="text" hidden name="jenis" class="form-control" value="<?= $l->jenis; ?>">
                            <input type="text" class="form-control" value="<?= $l->nama_nasabah; ?>" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Waktu :</label>
                            <input type="text" class="form-control" value="<?= $l->waktu; ?>" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Tanggal :</label>
                            <input type="text" class="form-control" value="<?= $l->tanggal; ?>" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Jumlah :</label>
                            <input type="text" class="form-control" name="jumlah" value="<?= $l->jumlah_penarikan; ?>" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Jenis :</label>
                            <input type="text" class="form-control" value="<?= $l->jenis; ?>" readonly>
                        </div>

                        <?php if ($l->jenis == 'transfer') { ?>
                            <div class="col-6 mb-3">
                                <label class="form-label">Bank :</label>
                                <input type="text" class="form-control" value="<?= $l->bank_nasabah; ?>" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Rekening :</label>
                                <input type="text" class="form-control" value="<?= $l->rek_nasabah; ?>" readonly>
                            </div>
                        <?php } else if ($l->jenis == 'tunai') { ?>
                            <div class="col-12 mb-3">
                                <label class="form-label">Code id :</label>
                                <input type="text" class="form-control" value="<?= $l->code_id; ?>" readonly>
                            </div>
                        <?php } ?>

                        <div class="col-12 mb-3">
                            <label class="form-label">Status :</label>
                            <input type="text" class="form-control" value="<?= $l->status; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#list').DataTable({
            "searching": true,
            "paging": true,
            "order": [
                [0, "DESC"],
            ]
        });
    });
</script>