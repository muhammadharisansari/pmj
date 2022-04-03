<div class="container mb-3">

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills ">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"><strong>transfer bank</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url(); ?>tarik"><strong>tarik tunai</strong></a>
                </li>
            </ul>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm col-lg-5">
                    <div class="card mt-2 shadow">
                        <div class="card-header">
                            <h5 class="text-danger"><strong>Pengajuan penarikan tranfer bank harus memenuhi syarat berikut :</strong></h5>
                        </div>
                        <div class="card-body">
                            <ul>
                                <?php foreach ($syarattf_ as $s) : ?>
                                    <li><?= $s->syarat ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php foreach ($nasabah_ as $n) : ?>
                    <div class="col-sm-12 col-lg-7 mt-2">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4 class="card-title mt-2 text-center"><strong>Rp.<?= rupiah($n->sisa_saldo); ?></strong></h4>
                            </div>
                            <div class="card-body">
                                <?php echo form_open('deposit/insert') ?>

                                <?php if ($n->status_verifikasi == 'diverifikasi') { ?>

                                    <?php if ($n->sisa_saldo == '0') { ?>

                                        <div class="mb-3">
                                            <label class="form-label mt-3"><strong>Jumlah penarikan :</strong></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="saldo anda kosong" disabled>
                                            </div>
                                            <label class="form-label mt-3"><strong>Rekening anda :</strong></label>
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Bank <?= $n->bank_nasabah ?></span>
                                                </div>
                                                <input class="form-control" id="basic-url" aria-describedby="basic-addon3" disabled value="<?= $n->rek_nasabah ?>">
                                            </div>
                                        </div>

                                    <?php } else { ?>

                                        <div class="mb-3">
                                            <label class="form-label mt-3"><strong>Jumlah penarikan :</strong></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="hidden" name="sisa_saldo" value="<?= $n->sisa_saldo ?>">
                                                <input type="hidden" name="id_nasabah" value="<?= $n->id_nasabah ?>">
                                                <?php foreach ($minmax_ as $m) :
                                                    if ($m->jenis == 'tf') {
                                                ?>
                                                        <input type="number" min="<?= $m->minimal; ?>" max="<?= $m->maksimal; ?>" name="penarikan" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                <?php }
                                                endforeach; ?>
                                            </div>
                                            <div class="form-text text-danger ml-2">*tidak perlu menggunakan titik atau koma</div>

                                            <label class="form-label mt-3"><strong>Rekening anda :</strong></label>
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                    <input type="hidden" name="rek_nasabah" value="<?= $n->rek_nasabah ?>">
                                                    <input type="hidden" name="bank_nasabah" value="<?= $n->bank_nasabah ?>">
                                                    <span class="input-group-text">Bank <?= $n->bank_nasabah ?></span>
                                                </div>
                                                <input class="form-control" id="basic-url" aria-describedby="basic-addon3" disabled value="<?= $n->rek_nasabah ?>">
                                            </div>
                                        </div>
                                        <div class=" col-md-2 col-lg-2">
                                            <button type="submit" class="btn btn-outline-success mt-4">Ajukan</button>
                                        </div>
                                    <?php }
                                } else { ?>
                                    <div class="mb-3">
                                        <label class="form-label mt-3"><strong>Jumlah penarikan :</strong></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="basic-url" aria-describedby="basic-addon3" disabled>
                                        </div>
                                        <div class="form-text text-danger ml-2">*silahkan tunggu verifikasi akun anda terlebih dahulu</div>

                                        <label class="form-label mt-3"><strong>Rekening anda :</strong></label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Bank <?= $n->bank_nasabah ?></span>
                                            </div>
                                            <input class="form-control" id="basic-url" aria-describedby="basic-addon3" disabled value="<?= $n->rek_nasabah ?>">
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php
                        endforeach;
                        form_close(); ?>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</div>