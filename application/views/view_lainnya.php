<div class="container">
    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="container">
        <div class="row mt-4 mb-3 shadow justify-content-center rounded" style="background-color: #3DE60AE0;">
            <div class="col-12">

                <div class="alert alert-info mt-3 text-center">
                    <?php foreach ($nasabah_ as $n) : ?>
                        <h4><i class="bx bxs-bookmark-star"><strong><?= $n->poin ?></strong></i> poin</h4>
                    <?php endforeach; ?>
                </div>

                <h6 class="mt-3 text-center text-white"><strong>Tambah Terus Poin Kamu Dengan Menabung Minyak Sebanyak-banyaknya dan Dapatkan Hadiahnya Tanpa Diundi </strong></h6>

                <div class="row justify-content-center mb-3 ">
                    <?php foreach ($hadiah_ as $h) : ?>
                        <div class="card m-2 ">
                            <div class="card-header text-light text-center bg-success">
                                <h5><i class="bx bxs-bookmark-star"></i><strong><?= $h->jumlah_poin ?> poin</strong></h5>
                            </div>
                            <div class="card-body text-center">
                                <strong><?= $h->ket_hadiah; ?></strong><br>
                                <img src="<?= base_url() . 'assets/img/' . $h->gambar_hadiah ?>" style="width: 100px;">
                            </div>
                            <div class="card-footer text-center">

                                <button type="button" class="btn btn-white text-success" data-bs-toggle="modal" data-bs-target="#detail2<?php echo $h->id_hadiah; ?>">
                                    <strong>klaim</strong>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h5><strong>Dari minyak menjadi berbagai kebutuhan</strong></h5>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($tukar_ as $t) : ?>
            <div class="col mt-3">
                <div class="card h-100 shadow">
                    <img src="<?= base_url() . 'assets/img/' . $t->gambar_barang ?>" style="max-width : 540px;" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><strong><?= $t->nama_barang; ?></strong></h5>
                        <p class="card-text"><?= $t->ket_barang; ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <button type="button" class="btn btn-white text-primary" data-bs-toggle="modal" data-bs-target="#detail<?php echo $t->id_barang; ?>">
                            <strong>tukarkan</strong>
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal -->
<?php foreach ($tukar_ as $t) : ?>
    <div class="modal fade" id="detail<?php echo $t->id_barang; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form class="form-horizontal" action="<?php echo base_url() . 'menu_lainnya/tukar_aksi' ?>" method="Post" enctype="multipart/form-data">
                    <div class="modal-header" style="background-color: #10CF49E0;">
                        <?php foreach ($nasabah_ as $n) : ?>
                            <h5 class="modal-title text-white" id="staticBackdropLabel"><strong>Saldo kamu : Rp<?= rupiah($n->sisa_saldo); ?></strong></h5>
                        <?php endforeach; ?>
                    </div>

                    <?php if ($n->status_verifikasi == 'menunggu') { ?>
                        <div class="modal-body">
                            <h4 class=" text-center">UPPS..! Sepertinya akun kamu belum verifikasi</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">batal</button>
                        </div>
                    <?php } else if ($n->status_verifikasi == 'diverifikasi') { ?>
                        <div class="modal-body">
                            <?php foreach ($nasabah_ as $n) : ?>
                                <input type="hidden" class="form-control" name="sisa_saldo" value="<?= $n->sisa_saldo ?>">
                            <?php endforeach; ?>
                            <div class="row">
                                <div class="col-6">
                                    <input type="hidden" name="id_barang" value="<?= $t->id_barang; ?>">
                                    <input type="hidden" name="nama_barang" value="<?= $t->nama_barang; ?>">
                                    <input type="hidden" name="modal" value="<?= $t->modal; ?>">
                                    <label for="">Barang :</label>
                                    <input type="text" class="form-control mb-2" disabled value="<?= $t->nama_barang; ?>">
                                </div>
                                <div class="col-6">
                                    <label for="">Harga per <?= $t->satuan ?> :</label>
                                    <input type="text" class="form-control mb-2" disabled value="Rp<?= rupiah($t->harga); ?>">
                                </div>
                                <div class="col-6">
                                    <label for="">Stok :</label>
                                    <input type="hidden" name="sedia" value="<?= $t->sedia; ?>">
                                    <input type="text" class="form-control mb-2" disabled value="<?= $t->sedia; ?>">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">jumlah yang dipesan :</label>
                                    <div class="input-group">
                                        <input type="hidden" class="form-control" name="harga" value="<?= $t->harga ?>">
                                        <?php if ($t->sedia == 0) { ?>
                                            <input type="number" class="form-control" disabled placeholder="stok kosong">
                                            <span class="input-group-text"><?= $t->satuan; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">batal</button>
                            </div>
                        <?php } else { ?>
                            <input type="number" class="form-control" name="jumlah" required>
                            <span class="input-group-text"><?= $t->satuan; ?></span>
                        </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">batal</button>
            <button type="submit" class="btn btn-success ">Pesan</button>
        </div>
    <?php } ?>
    </div>
    </div>
<?php } ?>
</form>
</div>
</div>
</div>
<?php endforeach; ?>

<!-- Modal 2-->
<?php foreach ($hadiah_ as $h) : ?>
    <div class="modal fade" id="detail2<?php echo $h->id_hadiah; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form class="form-horizontal" action="<?php echo base_url() . 'menu_lainnya/klaim_aksi' ?>" method="Post" enctype="multipart/form-data">
                    <!-- <div class="modal-header text-white" style="background-color: #238DD4E0;">
                        <?php foreach ($nasabah_ as $n) : ?>
                            <h5 class="modal-title" id="staticBackdropLabel"><strong>Poin kamu : <?= $n->poin; ?></strong></h5>
                        <?php endforeach; ?>
                    </div> -->

                    <?php if ($n->status_verifikasi == 'menunggu') { ?>
                        <div class="modal-header text-white justify-content-center" style="background-color: #FC2739E0;">
                            <h3><strong>UPPS..!!</strong></h3>
                        </div>
                        <div class="modal-body">
                            <h4 class="text-center">Sepertinya akun kamu belum verifikasi nih, kita tunggu verifikasi dulu ya.</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Oke</button>
                        </div>

                    <?php } else if ($n->poin < $h->jumlah_poin) { ?>
                        <div class="modal-header text-white justify-content-center" style="background-color: #FC2739E0;">
                            <h3><strong>UPPS..!!</strong></h3>
                        </div>
                        <div class="modal-body">
                            <h4 class="text-center">Sepertinya poin kamu belum cukup untuk klaim hadiah ini. Yuk semangat nabung lebih banyak !!</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Siap</button>
                        </div>

                    <?php } else if ($n->status_verifikasi == 'diverifikasi') { ?>
                        <div class="modal-header text-white justify-content-center" style="background-color: #238DD4E0;">
                            <h3><strong>SELAMAT !!</strong></h3>
                        </div>
                        <div class="modal-body">
                            <?php foreach ($nasabah_ as $n) : ?>
                                <input type="hidden" class="form-control" name="poin" value="<?= $n->poin ?>">
                                <input type="hidden" class="form-control" name="nik" value="<?= $n->nik_nasabah ?>">
                            <?php endforeach; ?>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h4><strong>Kamu Berhak Klaim Hadiah <?= $h->ket_hadiah; ?>.</strong></h4>
                                    <input type="hidden" name="id_hadiah" value="<?= $h->id_hadiah; ?>">
                                    <input type="hidden" class="form-control" name="ket_hadiah" value="<?= $h->ket_hadiah ?>">
                                </div>

                                <div class="col-12">
                                    <input type="hidden" class="form-control" name="jumlah_poin" value="<?= $h->jumlah_poin ?>">
                                    <p class="text-justify"><strong>Note :</strong> Poin kamu akan dikurangi sebanyak <?= $h->jumlah_poin ?> poin yang diperlukan untuk klaim hadiah yang kamu pilih.</p>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">batal</button>
                            <button type="submit" class="btn btn-info ">Klaim</button>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>