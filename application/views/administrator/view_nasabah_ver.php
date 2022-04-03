<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Verifikasi nasabah</h1>
    </div>

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="row">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List verifikasi nasabah</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" id="dataTable">
                    <thead class="bg-primary text-white">
                        <th>Nama</th>
                        <th>username</th>
                        <th>NIK</th>
                        <th>Detail</th>
                    </thead>
                    <tbody>
                        <?php foreach ($ver as $v) : ?>
                            <tr>
                                <td><?= $v->nama_nasabah; ?></td>
                                <td><?= $v->username_nasabah; ?></td>
                                <td><?= $v->nik_nasabah; ?></td>
                                <td style="width: 100px;" class="text-center">
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $v->id_nasabah; ?>">
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


<!-- Modal -->
<?php foreach ($ver as $v) : ?>
    <div class="modal fade" id="exampleModal<?= $v->id_nasabah; ?>" tabindex="-1" aria-labelledby="..." aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content ">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="container-fluid">
                        <div class="row mt-3">
                            <div class="col-md-12 col-lg-5 text-center ">
                                <div class="row justify-content-center">
                                    <div class="form-group mt-4">
                                        <img src="<?php echo base_url() . 'assets/upload/' . $v->ktp_nasabah ?>" style="width: 400px">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md col-lg-7">
                                <div class="row m-3">
                                    <div class="col-12 mt-2">
                                        <label class="form-label">NIK :</label>
                                        <input type="hidden" class="form-control" value="<?= $v->id_nasabah; ?>">
                                        <input readonly class="form-control" value="<?= $v->nik_nasabah; ?>">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label class="form-label">Nama Lengkap :</label>
                                        <input type="text" class="form-control" value="<?= $v->nama_nasabah; ?> " readonly>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Tanggal Lahir :</label>
                                        <input type="date" class="form-control" value="<?= $v->tl_nasabah; ?>" readonly>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class=" control-label">Jenis Kelamin :</label>
                                        <input type="text" class="form-control" value="<?= $v->jk_nasabah; ?>" readonly>

                                    </div>
                                    <div class="col-12 mt-2">
                                        <label class="form-label">Alamat :</label>
                                        <textarea class="form-control" readonly><?= $v->alamat_nasabah; ?></textarea>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">No HP :</label>
                                        <input type="number" class="form-control" value="<?= $v->hp_nasabah; ?>" readonly>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Username :</label>
                                        <input readonly class="form-control" value="<?= $v->username_nasabah; ?>">
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Bank :</label>
                                        <input type="text" class="form-control" value="<?= $v->bank_nasabah; ?>" readonly>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Rekening :</label>
                                        <input type="number" class="form-control" value="<?= $v->rek_nasabah; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <form action="<?= base_url() . 'administrator/nasabah_ver/ver_aksi/' . $v->id_nasabah; ?>" method="POST" enctype="text/plain">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" data-bs-target="#modal2<?= $v->id_nasabah; ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Kirim pesan</button>
                        <button type="submit" class="btn btn-success">Verifikasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- kirim pesan -->
    <div class="modal fade" id="modal2<?= $v->id_nasabah; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url() . 'administrator/nasabah_ver/pesan_aksi/' . $v->id_nasabah; ?>" method="POST" enctype="application/x-www-form-urlencoded">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Pesan </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Penerima :</label>
                            <input type="text" readonly class="form-control" value="<?= $v->nama_nasabah; ?>">
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