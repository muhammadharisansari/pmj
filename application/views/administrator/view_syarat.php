<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Syarat deposit</h1>
    </div>

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="row">
        <!-- minmax penarikan st -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <form action="<?php echo base_url() ?>administrator/syarat/edit_harga" enctype="multipart/form-data" method="POST">
                        <div class="row no-gutters align-items-center justify-content-between">
                            <div class="col-5 ml-3">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Minimal penarikan tarik tunai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <div class="input-group mb-3">
                                        <?php foreach ($minmax_ as $m) : ?>
                                            <?php if ($m->jenis == 'tt') { ?>
                                                <input hidden type="number" name="id_minmax" value="<?= $m->id_minmax; ?>">
                                                <span class="input-group-text" id="basic-addon2">Rp.</span>
                                                <input type="number" name="minimal" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $m->minimal; ?>" required>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 mr-3">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Maksimal penarikan tarik tunai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <div class="input-group mb-3">
                                        <?php foreach ($minmax_ as $m) : ?>
                                            <?php if ($m->jenis == 'tt') { ?>
                                                <span class="input-group-text" id="basic-addon2">Rp.</span>
                                                <input type="number" name="maksimal" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $m->maksimal; ?>" required>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 ml-3">
                                <button type="submit" class="btn btn-primary">edit</button>
                                <button type="reset" class="btn btn-outline-secondary">reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12">
            <!-- tarik tunai Card -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Syarat Tarik Tunai</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse " id="collapseCardExample3">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <form action="<?= base_url(); ?>administrator/syarat/simpanst" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                        <label class="label-control"><strong>Syarat baru :</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="syaratst" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon3">
                                            <button class="btn btn-outline-primary" type="submit" id="button-addon3">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12 mt-3">
                                    <table class="table table-bordered table-hover" id="list">
                                        <thead>
                                            <th style="width: 250px;">Syarat</th>
                                            <th>aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($syarat_st as $t) : ?>
                                                <tr>
                                                    <td><?= $t->syarat; ?></td>
                                                    <td>
                                                        <div class="row ">
                                                            <div class="col-6">
                                                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $t->id_syarat; ?>">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-6">
                                                                <?php echo anchor('administrator/syarat/hapus/' . $t->id_syarat, '<div class="btn btn-outline-primary"><i class="fa fa-trash"></i></div>') ?>
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
            </div>
        </div>

        <!-- minmax penarikan tf -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <form action="<?php echo base_url() ?>administrator/syarat/edit_harga" enctype="multipart/form-data" method="POST">
                        <div class="row no-gutters align-items-center justify-content-between">
                            <div class="col-5 ml-3">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Minimal penarikan tranfer bank</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <div class="input-group mb-3">
                                        <?php foreach ($minmax_ as $m) : ?>
                                            <?php if ($m->jenis == 'tf') { ?>
                                                <input hidden type="number" name="id_minmax" value="<?= $m->id_minmax; ?>">
                                                <span class="input-group-text" id="basic-addon2">Rp.</span>
                                                <input type="number" name="minimal" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $m->minimal; ?>" required>
                                        <?php }
                                        endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 mr-3">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Maksimal penarikan tranfer bank</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <div class="input-group mb-3">
                                        <?php foreach ($minmax_ as $m) : ?>
                                            <?php if ($m->jenis == 'tf') { ?>
                                                <span class="input-group-text" id="basic-addon2">Rp.</span>
                                                <input type="number" name="maksimal" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $m->maksimal; ?>" required>
                                        <?php }
                                        endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 ml-3">
                                <button type="submit" class="btn btn-success">edit</button>
                                <button type="reset" class="btn btn-outline-secondary">reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12">
            <!-- transfer bank Card -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-success">Syarat Transfer Bank</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse " id="collapseCardExample2">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <form action="<?= base_url(); ?>administrator/syarat/simpantf" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                        <label class="label-control"><strong>Syarat baru :</strong></label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="syarattf" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-primary" type="submit" id="button-addon2">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12 mt-3">
                                    <table class="table table-bordered table-hover" id="list2">
                                        <thead>
                                            <th style="width: 250px;">Syarat</th>
                                            <th>aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($syarat_tf as $b) : ?>
                                                <tr>
                                                    <td><?= $b->syarat; ?></td>
                                                    <td>
                                                        <div class="row ">
                                                            <div class="col-6">
                                                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2<?php echo $b->id_syarat; ?>">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-6">
                                                                <?php echo anchor('administrator/syarat/hapus/' . $b->id_syarat, '<div class="btn btn-outline-primary"><i class="fa fa-trash"></i></div>') ?>
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
            </div>

        </div>
    </div>
</div>

<!-- Modal edit st -->
<?php foreach ($syarat_st as $t) : ?>
    <div class="modal fade" id="exampleModal<?php echo $t->id_syarat; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" action="<?php echo base_url() . 'administrator/syarat/edit/' . $t->id_syarat; ?>" method="Post" enctype="multipart/form-data">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel"><strong>edit</strong></h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <textarea class="form-control" name="syarat" cols="30" rows="3"><?= $t->syarat; ?></textarea>
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

<!-- Modal edit tf -->
<?php foreach ($syarat_tf as $b) : ?>
    <div class="modal fade" id="exampleModal2<?php echo $b->id_syarat; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" action="<?php echo base_url() . 'administrator/syarat/edit/' . $b->id_syarat; ?>" method="Post" enctype="multipart/form-data">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel"><strong>edit</strong></h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <textarea class="form-control" name="syarat" cols="30" rows="3"><?= $b->syarat; ?></textarea>
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