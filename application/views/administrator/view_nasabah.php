<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Nasabah</h1>
    </div>

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="row">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">List nasabah</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <div class="row">

                        <table class="table table-hover table-bordered " cellspacing="0" width="100%" id="list">
                            <thead class="bg-primary text-white">
                                <th style="width:35px;">Foto</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Tgl Lahir</th>
                                <th>JK</th>
                                <th>Alamat</th>
                                <th style="width:100px;">Aksi</th>
                            </thead>
                            <tbody>
                                <?php foreach ($nasabah_ as $n) :
                                    if ($n->blokir == 'ya') {
                                ?>
                                        <tr style="background-color:#FADFD8;">
                                        <?php } else { ?>
                                        <tr>
                                        <?php } ?>
                                        <td>
                                            <?php if ($n->ktp_nasabah) { ?>
                                                <img src="<?php echo base_url() . 'assets/upload/' . $n->ktp_nasabah ?>" style="width: 80px;">
                                            <?php } else { ?>
                                                <img src="<?php echo base_url() . 'assets/admin_foto/kosong.png' . $n->ktp_nasabah ?>" style="width: 80px;">
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a type="button" class="btn text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $n->id_nasabah; ?>">
                                                <?= $n->nama_nasabah; ?>
                                            </a>
                                        </td>
                                        <td><?= $n->username_nasabah; ?></td>
                                        <td><?= $n->tl_nasabah; ?></td>
                                        <td>
                                            <?php if ($n->jk_nasabah == 'Laki-laki') { ?>
                                                L
                                            <?php } else { ?>
                                                P
                                            <?php } ?>
                                        </td>
                                        <td><?= $n->alamat_nasabah; ?></td>
                                        <td class="justify-content-center">
                                            <!-- <div class="row"> -->
                                            <?php if ($n->blokir == 'tidak') { ?>
                                                <span class="float-left ">
                                                    <?php echo anchor('administrator/nasabah/blokir/' . $n->id_nasabah, '<div class="btn btn-outline-danger"><i class="fa fa-ban"></i></div>') ?>
                                                </span>
                                            <?php } else { ?>
                                                <div class="float-left">
                                                    <?php echo anchor('administrator/nasabah/openblokir/' . $n->id_nasabah, '<div class="btn btn-outline-success"><i class="fa fa-check-circle"></i></div>') ?>
                                                </div>
                                            <?php } ?>
                                            <span class="float-right">
                                                <?php echo anchor('administrator/nasabah/hapus/' . $n->id_nasabah . '/' . $n->ktp_nasabah, '<div class="btn btn-outline-primary"><i class="fa fa-trash"></i></div>') ?>
                                            </span>
                                            <!-- </div> -->
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
<?php foreach ($nasabah_ as $n) : ?>
    <div class="modal fade" id="exampleModal<?= $n->id_nasabah; ?>" tabindex="-1" aria-labelledby="..." aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content ">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><strong><?= $n->status_verifikasi; ?></strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="container-fluid">
                        <div class="row mt-3">
                            <div class="col-md-12 col-lg-5 ">
                                <div class="row justify-content-center">
                                    <div class="form-group mt-4">
                                        <?php if ($n->ktp_nasabah) { ?>
                                            <img src="<?php echo base_url() . 'assets/upload/' . $n->ktp_nasabah ?>" style="width: 400px">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() . 'assets/admin_foto/kosong.png' . $n->ktp_nasabah ?>" style="width: 300px;">
                                        <?php } ?>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">ID Nasabah :</label>
                                        <input readonly class="form-control" value="<?= $n->id_nasabah; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Blokir :</label>
                                        <?php if ($n->blokir == 'ya') { ?>
                                            <input readonly class="form-control bg-danger text-light" value="<?= $n->blokir; ?>">
                                        <?php } else { ?>
                                            <input readonly class="form-control bg-success text-light" value="<?= $n->blokir; ?>">
                                        <?php } ?>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Saldo :</label>
                                        <input readonly class="form-control" value="Rp.<?= $n->sisa_saldo; ?>">
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Poin :</label>
                                        <input readonly class="form-control" value="<?= $n->poin; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md col-lg-7">
                                <div class="row m-3">
                                    <div class="col-12">
                                        <label class="form-label">NIK :</label>
                                        <input type="hidden" class="form-control" value="<?= $n->id_nasabah; ?>">
                                        <input readonly class="form-control" value="<?= $n->nik_nasabah; ?>">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label class="form-label">Nama Lengkap :</label>
                                        <input type="text" class="form-control" value="<?= $n->nama_nasabah; ?> " readonly>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Tanggal Lahir :</label>
                                        <input type="date" class="form-control" value="<?= $n->tl_nasabah; ?>" readonly>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class=" control-label">Jenis Kelamin :</label>
                                        <input type="text" class="form-control" value="<?= $n->jk_nasabah; ?>" readonly>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label class="form-label">Alamat :</label>
                                        <textarea class="form-control" readonly><?= $n->alamat_nasabah; ?></textarea>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">No HP :</label>
                                        <input type="number" class="form-control" value="<?= $n->hp_nasabah; ?>" readonly>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Username :</label>
                                        <input readonly class="form-control" value="<?= $n->username_nasabah; ?>">
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Bank :</label>
                                        <input type="text" class="form-control" value="<?= $n->bank_nasabah; ?>" readonly>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Rekening :</label>
                                        <input type="number" class="form-control" value="<?= $n->rek_nasabah; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <form action="<?= base_url() . 'administrator/nasabah/batal_ver/' . $n->id_nasabah; ?>" method="POST" enctype="text/plain">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-outline-primary" data-bs-target="#modal2<?= $n->id_nasabah; ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Kirim pesan</button>
                        <?php if ($n->status_verifikasi == 'diverifikasi') { ?>
                            <button type="submit" class="btn btn-outline-warning">Batal Verifikasi</button>
                        <?php } else {
                        } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- kirim pesan -->
    <div class="modal fade" id="modal2<?= $n->id_nasabah; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url() . 'administrator/nasabah/pesan_aksi/' . $n->id_nasabah; ?>" method="POST" enctype="application/x-www-form-urlencoded">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Pesan </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Penerima :</label>
                            <input type="text" readonly class="form-control" value="<?= $n->nama_nasabah; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Isi pesan:</label>
                            <textarea class="form-control" name="pesan" rows="7" required></textarea>
                            <div class="form-text text-danger ml-2">*Maksimal 600 karakter</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#list').DataTable({
            scrollX: true,
            scrollCollapse: true,
            "searching": true,
            "paging": true,
            "order": [
                [0, "DESC"],
            ],

        });
    });
</script>