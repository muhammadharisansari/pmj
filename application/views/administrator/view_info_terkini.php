<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Info terkini</h1>
    </div>

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">

                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-bullhorn"></i> Notif broadcast</h6>
                </a>

                <div class="collapse " id="collapseCardExample">
                    <form action="<?= base_url(); ?>administrator/info_terkini/broadcast" enctype="application/x-www-form-urlencoded" method="post" accept-charset="utf-8">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <label class="form-label" for=""><strong>Pesan notif :</strong></label>
                                        <textarea class="form-control" name="pesan_notif" cols="10" rows="3" placeholder="*hanya sampai 600 karakter.." required></textarea>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <label class="form-label" for=""><strong>Penerima :</strong></label>
                                        <input type="checkbox" onchange="checkAll(this)"> Pilih semua

                                        <table class="table table-hover table-bordered " cellspacing="0" width="100%" id="list">
                                            <thead>
                                                <th hidden> All</th>
                                                <th hidden>Nama</th>
                                                <th hidden>Username</th>
                                                <th hidden>Status</th>
                                                <th hidden>Blokir</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($nasabah_ as $n) : ?>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="pilih[]" value="<?php echo $n->id_nasabah; ?>">
                                                        </td>
                                                        <td><?= $n->nama_nasabah; ?></td>
                                                        <td hidden><?= $n->username_nasabah; ?></td>
                                                        <td><?= $n->status_verifikasi; ?></td>
                                                        <td hidden><?= $n->blokir; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"> Kirim notif</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card shadow mb-4">

                <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus-circle"></i> Informasi terkini</h6>
                </a>

                <div class="collapse " id="collapseCardExample2">
                    <div class="card-body">
                        <div class="container">
                            <form action="<?= base_url(); ?>administrator/info_terkini/info" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <label class="form-label" for=""><strong>Judul :</strong></label>
                                        <input class="form-control" type="text" name="judul" required>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label class="form-label" for=""><strong>Pesan :</strong></label>
                                        <textarea class="form-control" name="pesan" cols="30" rows="5" required></textarea>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for=""><strong>File gambar :</strong></label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" type="file" name="gambar">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for=""><strong>Link :</strong></label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" type="text" name="link">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Publish</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <!-- list Card  -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="text-primary"><i class="fas fa-list-ul"></i><strong> List info</strong></h6>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered " id="list2">
                        <thead class="bg-primary text-white">
                            <th style="width: 130px;">Tanggal</th>
                            <th style="width: 200px;">Judul</th>
                            <th>Konten</th>
                            <th style="width: 130px;"><i class="fas fa-cogs"></i></th>
                        </thead>
                        <tbody>
                            <?php foreach ($info_ as $i) : ?>
                                <tr>
                                    <td><?= $i->tanggal_info ?></td>
                                    <td><?= word_limiter($i->judul_info, 5); ?></td>
                                    <td><?= word_limiter($i->konten_info, 10); ?></td>
                                    <td>
                                        <div class="row ">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $i->id_info; ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <?php echo anchor('administrator/info_terkini/hapus/' . $i->id_info . '/' . $i->gambar, '<div class="btn btn-outline-primary"><i class="fa fa-trash"></i></div>') ?>
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

<!-- Modal edit -->
<?php foreach ($info_ as $i) : ?>
    <div class="modal fade" id="exampleModal<?php echo $i->id_info; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" action="<?php echo base_url() . 'administrator/info_terkini/edit/' . $i->id_info . '/' . $i->gambar ?>" method="Post" enctype="multipart/form-data">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel"><strong>edit</strong></h5>
                        <h6 class="text-white mt-2"><?= $i->tanggal_info; ?></h6>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Judul : </label>
                                <input class="form-control" type="text" name="judul" value="<?= $i->judul_info; ?>" required>
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label">Pesan : </label>
                                <textarea class="form-control" name="pesan" cols="30" rows="5" required><?= $i->konten_info; ?></textarea>
                            </div>

                            <label class="form-label mt-3" for="">File gambar :</label> <br>
                            <?php if ($i->gambar != NULL) { ?>
                                <div class="col-12">
                                    <div class=" input-group mb-3 justify-content-center">
                                        <img src="<?= base_url() . 'assets/upload/publish/' . $i->gambar; ?>" style="width: 400px;">
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <input class="form-control" type="file" name="gambar">
                                </div>
                            </div>
                            <label class="form-label" for="">Link :</label><br>
                            <?php if ($i->link != NULL) { ?>
                                <div class="col-12">
                                    <a href="<?= $i->link ?>" target="_blank">buka tautan</a>
                                </div>
                            <?php }  ?>
                            <div class="col-12">
                                <div class="input-group ">
                                    <input class="form-control" type="text" name="link" value="<?= $i->link ?>">
                                </div>
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
        var table = $('#list').DataTable({
            "scrollY": "180px",
            "scrollCollapse": true,
            "paging": false,
            "searching": true,

        });
    });

    $(document).ready(function() {
        $('#list2').DataTable({
            "searching": true,
            "paging": true,
            "order": [
                [0, "DESC"],
            ],

        });
    });

    function checkAll(box) {
        let checkboxes = document.getElementsByTagName('input');

        if (box.checked) { // jika checkbox teratar dipilih maka semua tag input juga dipilih
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        } else { // jika checkbox teratas tidak dipilih maka semua tag input juga tidak dipilih
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }
</script>