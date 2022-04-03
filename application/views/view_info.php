    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills ">
                    <li class="nav-item">
                        <a class="nav-link text-dark " href="#"><strong>Informasi</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url(); ?>notif"><strong>Notifikasi</strong></a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="list-group">
                    <?php foreach ($info_ as $f) : ?>
                        <div class="list-group-item list-group-item-action  mt-3" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1 text-success"><strong><?= $f->judul_info ?></strong></h5>
                                <small><strong><?= $f->tanggal_info; ?></strong></small>
                            </div>
                            <p class="mb-1 text-justify"><?= $f->konten_info; ?>
                            </p><br>
                            <div class="row text-center">
                                <?php if ($f->link != NULL) { ?>
                                    <div class="col-12 mb-3">
                                        <a href="<?= $f->link ?>" target="_blank" class="text-primary"><i class="bx bx-link-alt"></i> klik untuk membuka tautan</a>
                                    </div>
                                <?php }
                                if ($f->gambar != NULL) { ?>
                                    <div class="col-12">
                                        <img style="width: 400px;" src="<?= base_url(); ?>/assets/upload/publish/<?= $f->gambar ?>">
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>