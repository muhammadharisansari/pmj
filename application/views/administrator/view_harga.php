<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Harga minyak</h1>
    </div>

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <?php
    $data = $this->admin_model->get_profil($this->session->userdata['nama']);
    $data = array(
        'level_admin'  => $data->level_admin
    );

    $level = $data['level_admin'];
    if ($level == 'admin 2') {
    ?>
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Harga Pengepul</h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url(); ?>administrator/harga_minyak/update_pengepul" method="POST" enctype="application/x-www-form-urlencoded">
                    <div class="row">
                        <?php foreach ($pengepul_ as $p) : ?>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                <input type="text" name="harga" class="form-control" placeholder="tulis harga.." aria-label="tulis harga.." aria-describedby="basic-addon1" value="<?= $p->harga_pengepul; ?>" required>

                                <button class="btn btn-outline-primary" type="submit" id="button-addon2">Update</button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </form>
            </div>
        </div>
    <?php } else {
    } ?>

    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Harga</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url(); ?>administrator/harga_minyak/update" method="POST" enctype="multipart/form-data">
                <?php foreach ($harga_ as $h) : ?>
                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Ukuran</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <div class="input-group mb-3" style="width: 170px;">
                                                    <input type="number" name="ukuran" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $h->ukuran; ?>" required>
                                                    <span class="input-group-text" id="basic-addon2">ml</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-oil-can fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Harga</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <div class="input-group mb-3" style="width: 210px;">
                                                    <span class="input-group-text" id="basic-addon2">Rp.</span>
                                                    <input type="number" name="harga" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $h->harga; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah poin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <div class="input-group mb-3" style="width: 170px;">
                                                    <input type="number" name="poin" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $h->poin; ?>" required>
                                                    <span class="input-group-text" id="basic-addon2">poin</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-star fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="far fa-clipboard"></i> Keterangan</h6>
                                </div>
                                <div class="card-body">
                                    <textarea class="form-control" name="keterangan" cols="30" rows="5"><?= $h->keterangan; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
        </div>
        <div class="card-footer">

            <?php
            $data = $this->admin_model->get_profil($this->session->userdata['nama']);
            $data = array(
                'level_admin'  => $data->level_admin
            );

            $level = $data['level_admin'];
            if ($level == 'admin 2') {
            ?>
                <button type="submit" class="btn btn-primary">UPDATE</button>
                <button type="reset" class="btn btn-outline-secondary">RESET</button>
            <?php } else {
            } ?>
        </div>
        </form>
    </div>
</div>

</div>