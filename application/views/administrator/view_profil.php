<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Profil PMJ</h1>
    </div>

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <form action="<?= base_url(); ?>administrator/profil_pmj/update" enctype="multipart/form-data" method="POST">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">kontak</h6>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <?php foreach ($profil as $k) : ?>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label"><strong>Alamat :</strong></label>
                                        <textarea name="alamat" class="form-control" cols="30" rows="2" required><?= $k->alamat_pmj; ?></textarea>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label"><strong>Jam dinas :</strong></label>
                                        <textarea name="jam" class="form-control" cols="30" rows="2" required><?= $k->jam_pmj; ?></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label class="form-label"><strong>Email :</strong></label>
                                        <input type="email" name="email" class="form-control" value="<?= $k->email_pmj; ?>" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label"><strong>Whatshapp :</strong></label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">wa.me/</span>
                                            <input type="number" name="wa" class="form-control" value="<?= $k->wa_pmj; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <label class="form-label"><strong>Instagram :</strong></label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">https://www.instagram.com/</span>
                                            <input type="text" name="ig" class="form-control" value="<?= $k->ig_pmj; ?>" required>
                                        </div>

                                    </div>
                                    <div class="col-6 mt-3">
                                        <label class="form-label"><strong>Facebook :</strong></label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">https://www.facebook.com/</span>
                                            <input type="text" name="fb" class="form-control" value="<?= $k->fb_pmj; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <label class="form-label"><strong>Peta :</strong></label>
                                        <textarea class="form-control" name="peta" cols="30" rows="5" required><?= $k->map_pmj; ?></textarea>
                                    </div>
                                    <div class="embed-responsive embed-responsive-21by9 mt-4">
                                        <?= $k->map_pmj; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">update</button>
                        <button type="reset" class="btn btn-outline-secondary">reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>