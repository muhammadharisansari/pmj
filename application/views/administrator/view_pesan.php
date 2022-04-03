<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola barang tukar</h1>
    </div>

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-clipboard-list"></i> Barang tukar</h6>
                </a>

                <div class="collapse" id="collapseCardExample">
                    <div class="card-body">

                        <!-- tambah data -->
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                Tambah data
                            </div>
                            <form action="<?= base_url() . 'administrator/barang_tukar/simpan' ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label">Nama Barang :</label>
                                                    <input type="text" class="form-control" name="nama_barang" required>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <label class="form-label">Keterangan :</label>
                                                    <textarea name="ket" cols="30" rows="5" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="form-label">Satuan :</label>
                                                    <select class="form-select" name="satuan" required>
                                                        <option disabled selected>-pilih-</option>
                                                        <option value="kg">kg</option>
                                                        <option value="liter">liter</option>
                                                        <option value="satuan">satuan</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 ">
                                                    <label class="form-label">Stok :</label>
                                                    <input type="number" class="form-control" name="stok" required>
                                                </div>
                                                <div class="col-6 mt-2">
                                                    <label class="form-label">Harga Jual :</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                        <input type="number" class="form-control" name="harga" aria-describedby="basic-addon1" required>
                                                    </div>
                                                </div>
                                                <div class="col-6 mt-2">
                                                    <label class="form-label">Harga Modal :</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                        <input type="number" class="form-control" name="modal" aria-describedby="basic-addon1" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <label class="form-label">Gambar (jpg/png) :</label>
                                                    <input type="file" class="form-control" name="gambar" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <button class="btn btn-outline-secondary" type="reset">Reset</button>
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <hr class="hr">

                        <!-- tabel -->
                        <table class="table table-hover table-bordered " id="dataTable">
                            <thead class="bg-primary text-white">
                                <th>Barang</th>
                                <th style="width: 330px;">Keterangan </th>
                                <th>Satuan</th>
                                <th>Modal</th>
                                <th>Jual</th>
                                <th style="width: 8px;">Stok</th>
                                <th style="width: 100px;"><i class="fas fa-cogs"></i></th>
                            </thead>
                            <tbody>
                                <?php foreach ($tukar as $t) : ?>
                                    <tr>
                                        <td><?= $t->nama_barang; ?></td>
                                        <td><?= $t->ket_barang; ?></td>
                                        <td><?= $t->satuan; ?></td>
                                        <td>Rp.<?= rupiah($t->modal); ?></td>
                                        <td>Rp.<?= rupiah($t->harga); ?></td>
                                        <td><?= $t->sedia; ?></td>
                                        <td class="text-center">
                                            <div class="row ">
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $t->id_barang; ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                                <div class="col-6">
                                                    <?php echo anchor('administrator/barang_tukar/hapus/' . $t->id_barang . '/' . $t->gambar_barang, '<div class="btn btn-outline-primary"><i class="fa fa-trash"></i></div>') ?>
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
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-check-square"></i> Request Pesanan</h6>
                </a>

                <div class="collapse " id="collapseCardExample2">
                    <div class="card-body">
                        <table class="table table-hover table-bordered " id="list">
                            <thead class="bg-primary text-white">
                                <th style="width: 80px;">ID</th>
                                <th style="width: 100px;">Tanggal</th>
                                <th>Nama barang</th>
                                <th>Username </th>
                                <th>Jumlah</th>
                                <th>Total </th>
                                <th style="width: 100px;"><i class="fas fa-cogs"></i></th>
                            </thead>
                            <tbody>
                                <?php foreach ($pesan as $p) : ?>
                                    <tr>
                                        <td><?= $p->id_pesan; ?></td>
                                        <td><?= $p->tanggal; ?></td>
                                        <td><?= $p->nama_barang; ?></td>
                                        <td><?= $p->username_nasabah; ?></td>
                                        <td><?= $p->jumlah_pesan; ?></td>
                                        <td>Rp.<?= rupiah($p->total_harga); ?></td>
                                        <td>
                                            <?php echo anchor('administrator/barang_tukar/selesai/' . $p->id_pesan, '<div class="btn btn-outline-success">Selesai</div>') ?>
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
<?php foreach ($tukar as $t) : ?>
    <div class="modal fade" id="exampleModal<?php echo $t->id_barang; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url() . 'administrator/barang_tukar/edit/' . $t->id_barang . '/' . $t->gambar_barang ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-7">
                                <div class="col-12">
                                    <label class="form-label">Nama barang :</label>
                                    <input class="form-control" type="text" name="nama_barang" value="<?= $t->nama_barang; ?>" required>
                                </div>
                                <div class="col-12 mt-2">
                                    <label class="form-label">Keterangan :</label>
                                    <textarea class="form-control" name="ket" cols="30" rows="5"><?= $t->ket_barang; ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Satuan :</label>
                                        <select class="form-select" name="satuan">
                                            <option hidden selected><?= $t->satuan ?></option>
                                            <option value="kg">kg</option>
                                            <option value="liter">liter</option>
                                            <option value="satuan">satuan</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Stok :</label>
                                        <input type="number" name="stok" class="form-control" value="<?= $t->sedia; ?>">
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Harga :</label>
                                        <input type="number" name="harga" class="form-control" value="<?= $t->harga; ?>">
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Modal :</label>
                                        <input type="number" name="modal" class="form-control" value="<?= $t->modal; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 ">
                                <label class="form-label">Gambar (jpg/png) :</label>
                                <div class="col-12">
                                    <div class=" input-group mb-3 justify-content-center">
                                        <img src="<?= base_url() . 'assets/img/' . $t->gambar_barang; ?>" style="width: 400px;">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="file" name="gambar">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
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
</script>