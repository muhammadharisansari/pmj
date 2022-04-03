<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Profil Admin</h1>
    </div>

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profil anda</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($admin_ as $ad) : ?>
                        <form class="form-horizontal" action="<?php echo base_url() . 'administrator/profil/update_admin_aksi/' . $ad->foto_admin ?>" method="Post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-3">
                                    <img src="<?php echo base_url() . 'assets/admin_foto/' . $ad->foto_admin ?>" style="width: 200px;">
                                    <br><br>
                                    <input type="file" name="userfile">
                                </div>
                                <div class="col-9">
                                    <div class="row g-3">
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" name="username" class="form-control" id="floatingInputGrid" placeholder="username" value="<?= $ad->username_admin ?>" readonly>
                                                <label for="floatingInputGrid">Username</label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="number" name="hp" class="form-control" id="floatingInputGrid" placeholder="no hp" value="<?= $ad->hp_admin ?>" required>
                                                <label for="floatingInputGrid">No HP</label>
                                            </div>
                                        </div>

                                        <?php if ($ad->level_admin == 'admin 2') { ?>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <select name="level" class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                                        <option value="<?= $ad->level_admin ?>" hidden selected><?= $ad->level_admin ?></option>
                                                        <option value="admin">admin</option>
                                                        <option value="admin 2">admin 2</option>
                                                    </select>
                                                    <label for="floatingSelectGrid">Level</label>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" name="level" class="form-control" id="floatingInputGrid" placeholder="no hp" value="<?= $ad->level_admin ?>" readonly>
                                                    <label for="floatingInputGrid">Level</label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <p class="mt-3">Ubah password :</p>

                                    <div class="row g-2">
                                        <div class="form-floating">
                                            <input name="pwkosong" type="text" class="form-control" value="<?= $ad->password_admin ?>" hidden>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input name="pwlama" type="password" class="form-control" id="floatingInputGrid" placeholder="password lama">
                                                <label for="floatingInputGrid">Password lama</label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input name="pwbaru" type="password" class="form-control" id="floatingInputGrid" placeholder="password baru">
                                                <label for="floatingInputGrid">Password baru</label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Perbarui</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>