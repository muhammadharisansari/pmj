<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Admin</h1>
    </div>

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="row">

        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Tambah admin</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCardExample">
                <div class="card-body">
                    <div class="row">
                        <form class="form-horizontal" action="<?php echo base_url() . 'administrator/admin/tambah_admin' ?>" method="Post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-3">
                                    <img src="<?php echo base_url() . 'assets/admin_foto/kosong.png' ?>" style="width: 200px;">
                                    <br><br>
                                    <input type="file" name="userfile">
                                </div>
                                <div class="col-9">
                                    <div class="row g-3">
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" name="username" class="form-control" id="floatingInputGrid" placeholder="username" required>
                                                <label for="floatingInputGrid">Username</label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="number" name="hp" class="form-control" id="floatingInputGrid" placeholder="no hp" required>
                                                <label for="floatingInputGrid">No HP</label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <select name="level" class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                                    <option value="admin" selected hidden disabled></option>
                                                    <option value="admin">admin</option>
                                                    <option value="admin 2">admin 2</option>
                                                </select>
                                                <label for="floatingSelectGrid">Level</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row g-2">
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input name="password" type="password" class="form-control" id="floatingInputGrid" placeholder="password" required>
                                                <label for="floatingInputGrid">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input name="konpassword" type="password" class="form-control" id="floatingInputGrid" placeholder="konpassword" required>
                                                <label for="floatingInputGrid">konfirm password</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Daftar admin</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">

                    <table class="table table-hover table-bordered " cellspacing="0" width="100%" id="list">
                        <thead class="bg-primary text-white">
                            <th style="width:35px;">Foto</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>HP</th>
                            <th style="width:35px;">Status</th>
                            <th>Blokir</th>

                            <?php
                            $data = $this->admin_model->get_profil($this->session->userdata['nama']);
                            $data = array(
                                'level_admin'    => $data->level_admin
                            );
                            $jika = $data['level_admin'];
                            if ($jika == 'admin 2') { ?>
                                <th style="width:10px;">Aksi</th>
                            <?php } ?>
                        </thead>
                        <tbody>
                            <?php foreach ($admin_ as $a) :
                                if ($a->blokir == 'ya') {
                            ?>
                                    <tr style="background-color:#FADFD8;">
                                    <?php
                                } else {
                                    ?>
                                    <tr>
                                    <?php } ?>
                                    <td>
                                        <?php if ($a->foto_admin) { ?>
                                            <img src="<?php echo base_url() . 'assets/admin_foto/' . $a->foto_admin ?>" style="width: 80px;">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() . 'assets/admin_foto/kosong.png' ?>" style="width: 80px;">
                                        <?php } ?>
                                    </td>
                                    <?php
                                    $data = $this->admin_model->get_profil($this->session->userdata['nama']);
                                    $data = array(
                                        'level_admin'    => $data->level_admin
                                    );
                                    $jika = $data['level_admin'];
                                    if ($jika == 'admin 2') {
                                    ?>
                                        <td>
                                            <a type="button" class="btn text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $a->username_admin; ?>">
                                                <?= $a->username_admin; ?>
                                            </a>
                                        </td>
                                    <?php } else { ?>
                                        <td><?= $a->username_admin; ?></a>
                                        </td>
                                    <?php } ?>
                                    <td><?= $a->level_admin; ?></td>
                                    <td><?= $a->hp_admin; ?></td>
                                    </button>
                                    <?php if ($a->status == 'online') { ?>
                                        <td class="text-success"><?= $a->status; ?></td>
                                    <?php } else { ?>
                                        <td class="text-danger"><?= $a->status; ?></td>
                                    <?php } ?>
                                    <td><?= $a->blokir; ?></td>

                                    <?php
                                    if ($jika == 'admin 2') { ?>
                                        <td class="text-center">
                                            <div class="col-6">
                                                <?php echo anchor('administrator/admin/hapus/' . $a->username_admin . '/' . $a->foto_admin, '<div class="btn btn-outline-primary"><i class="fa fa-trash"></i></div>') ?>
                                            </div>
                                        </td>
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

<!-- Modal -->
<?php foreach ($admin_ as $a) : ?>
    <div class="modal fade" id="exampleModal<?= $a->username_admin; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url() . 'administrator/admin/blokornot/' . $a->username_admin ?>" enctype="application/x-www-form-urlencoded" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <?php if ($a->blokir == 'ya') { ?>
                                <h5 class="text-danger"> Diblokir</h5>
                            <?php } else { ?>
                                <?php if ($a->status == 'online') { ?>
                                    <h5 class="text-success"> <?= $a->status; ?></h5>
                                <?php } else { ?>
                                    <h5 class="text-danger"> <?= $a->status; ?></h5>
                            <?php }
                            } ?>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row justify-content-between">
                            <div class="col-3">
                                <?php if ($a->foto_admin) { ?>
                                    <img src="<?php echo base_url() . 'assets/admin_foto/' . $a->foto_admin ?>" style="width: 180px;">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() . 'assets/admin_foto/kosong.png' ?>" style="width: 180px;">
                                <?php } ?>
                            </div>
                            <div class="col-7 mb-3">
                                <label class="form-label">username :</label>
                                <input type="text" name="blokiran" hidden class="form-control" value="<?= $a->blokir; ?>">
                                <input type="text" class="form-control" value="<?= $a->username_admin; ?>" readonly>
                                <br>
                                <label class="form-label">level :</label>
                                <input type="text" class="form-control" value="<?= $a->level_admin; ?>" readonly>
                                <br>
                                <label class="form-label">HP :</label>
                                <input type="text" class="form-control" value="<?= $a->hp_admin; ?>" readonly>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php if ($a->blokir == 'ya') { ?>
                            <button type="submit" class="btn btn-outline-success">Buka Blokir</button>
                        <?php } else { ?>
                            <button type="submit" class="btn btn-outline-danger">Blokir</button>
                        <?php } ?>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#list').DataTable({
            scrollX: true,
            scrollCollapse: true,
            "searching": true,
            "paging": true,
            "order": [
                [0, "DESC"],
            ]
        });
    });
</script>