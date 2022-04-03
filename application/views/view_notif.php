<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills ">
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url(); ?>info"><strong>Informasi</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"><strong>Notifikasi</strong></a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="list-group">
                <?php foreach ($notif_ as $n) : ?>

                    <?php if ($n->status == "belum") { ?>
                        <div class="list-group-item list-group-item-action mt-3 shadow" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <small><strong><?= $n->tanggal_notif; ?></strong></small>
                            </div>
                            <div class="row">
                                <div class="col-10">
                                    <p class="mb-1 text-justify"><?= $n->isi_notif; ?></p>
                                </div>
                                <div class="col-2 text-right">
                                    <?php echo anchor('notif/baca/' . $n->id_notif, '<div class="btn btn-sm"><i class="bx bxs-show text-primary"></i></div>') ?>

                                    <?php echo anchor('notif/hapus/' . $n->id_notif, '<div class="btn btn-sm"><i class="bx bx-trash text-primary"></i></div>') ?>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="list-group-item list-group-item-action mt-3 bg-light" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                    <small><strong><?= $n->tanggal_notif; ?></strong></small>

                                </div>
                                <div class="row">
                                    <div class="col-10">
                                        <p class="mb-1 text-justify"><?= $n->isi_notif; ?></p>
                                    </div>
                                    <div class="col-2 text-right">
                                        <?php echo anchor('notif/hapus/' . $n->id_notif, '<div class="btn btn-sm"><i class="bx bx-trash text-primary"></i></div>') ?>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        <?php endforeach; ?>
                        </div>
            </div>

        </div>