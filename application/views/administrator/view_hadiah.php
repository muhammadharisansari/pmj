<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Hadiah</h1>
    </div>

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-clipboard-list"></i> Hadiah</h6>
                </a>
                <!-- Collapsable Card Example -->
                <div class="collapse" id="collapseCardExample">
                    <div class="card-body">

                        <!-- tambah data -->
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                Tambah hadiah
                            </div>
                            <form action="<?= base_url() . 'administrator/hadiah_poin/simpan_hadiah' ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">Jumlah poin :</label>
                                            <input type="number" class="form-control" name="poin" required>
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">Gambar (jpg/png) :</label>
                                            <input type="file" class="form-control" name="gambar" required>
                                        </div>

                                        <div class="col-12 mt-2">
                                            <label class="form-label">Keterangan :</label>
                                            <textarea name="ket" cols="30" rows="2" class="form-control" required></textarea>
                                        </div>

                                        <div class="col-12 mt-4">
                                            <button class="btn btn-outline-secondary" type="reset">Reset</button>
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="hr">

                        <!-- tabel -->
                        <table class="table table-striped table-bordered " id="dataTable">
                            <thead class="bg-primary text-white">
                                <th>ID</th>
                                <th>Poin </th>
                                <th>Keterangan</th>
                                <th style="width: 30px;"><i class="fas fa-cogs"></i></th>
                            </thead>
                            <tbody>
                                <?php foreach ($hadiah as $h) : ?>
                                    <tr>
                                        <td><?= $h->id_hadiah; ?></td>
                                        <td><?= $h->jumlah_poin; ?></td>
                                        <td><?= $h->ket_hadiah; ?></td>
                                        <td class="text-center">
                                            <div class="row ">
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $h->id_hadiah; ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                                <div class="col-6">
                                                    <?php echo anchor('administrator/hadiah_poin/hapus_hadiah/' . $h->id_hadiah . '/' . $h->gambar_hadiah, '<div class="btn btn-outline-primary"><i class="fa fa-trash"></i></div>') ?>
                                                </div>
                                            </div>
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

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-check-square"></i> Klaim hadiah</h6>
                </a>

                <div class="collapse" id="collapseCardExample2">
                    <div class="card-body">
                        <table class="table table-striped table-bordered " id="list">
                            <thead class="bg-primary text-white">
                                <th>ID</th>
                                <th>NIK</th>
                                <th>Username</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>Code</th>
                                <th><i class="fas fa-cogs"></i></th>
                            </thead>
                            <tbody>
                                <?php foreach ($klaim as $k) : ?>
                                    <tr>
                                        <td><?= $k->id_klaim; ?></td>
                                        <td><?= $k->nik; ?></td>
                                        <td><?= $k->username; ?></td>
                                        <td><?= $k->ket_hadiah; ?></td>
                                        <td><?= $k->tanggal; ?></td>
                                        <td><?= $k->code; ?></td>
                                        <td>
                                            <div class="row text-center">
                                                <?php echo anchor('administrator/hadiah_poin/klaim/' . $k->id_klaim, '<div class="btn btn-outline-success"><i class="fas fa-check"></i></div>') ?>
                                            </div>
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

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-history"></i> Riwayat Klaim hadiah</h6>
                </a>

                <div class="collapse" id="collapseCardExample3">
                    <div class="card-body">
                        <table class="table table-striped table-bordered " id="list2">
                            <thead class="bg-primary text-white">
                                <th>ID</th>
                                <th>NIK</th>
                                <th>Username</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>Code</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <?php foreach ($riwayat as $r) : ?>
                                    <tr>
                                        <td><?= $r->id_klaim; ?></td>
                                        <td><?= $r->nik; ?></td>
                                        <td><?= $r->username; ?></td>
                                        <td><?= $r->ket_hadiah; ?></td>
                                        <td><?= $r->tanggal; ?></td>
                                        <td><?= $r->code; ?></td>

                                        <?php if ($r->status == 'menunggu') { ?>
                                            <td class="text-warning"><strong><?= $r->status; ?></strong></td>
                                        <?php } else if ($r->status == 'selesai') { ?>
                                            <td class="text-success"><strong><?= $r->status; ?></strong></td>
                                        <?php } ?>
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

<!-- Modal edit -->
<?php foreach ($hadiah as $h) : ?>
    <div class="modal fade" id="exampleModal<?php echo $h->id_hadiah; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <form class="form-horizontal" action="<?php echo base_url() . 'administrator/hadiah_poin/edit/' . $h->id_hadiah . '/' . $h->gambar_hadiah ?>" method="Post" enctype="multipart/form-data">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel"><strong>edit</strong></h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Poin : </label>
                                <input class="form-control" type="text" name="poin" value="<?= $h->jumlah_poin; ?>" required>
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label">Keterangan : </label>
                                <textarea class="form-control" name="ket" cols="30" rows="2" required><?= $h->ket_hadiah; ?></textarea>
                            </div>

                            <label class="form-label mt-3" for="">File gambar :</label> <br>
                            <div class="col-12">
                                <div class=" input-group mb-3 justify-content-center">
                                    <img src="<?= base_url() . 'assets/img/' . $h->gambar_hadiah; ?>" style="width: 200px;">
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="file" class="form-control" name="gambar">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">batal</button>
                        <button type="submit" class="btn btn-primary ">edit</button>
                    </div>
                </form>
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

    $(document).ready(function() {
        $('#list2').DataTable({
            "searching": true,
            "paging": true,
            "order": [
                [0, "DESC"],
            ]
        });
    });
</script>