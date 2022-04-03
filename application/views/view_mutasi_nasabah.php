<div class="container">

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>
    <div class="row mt-3 ml-2">
        <p>
            Keterangan : <i class="text-success bx bx-check-circle">berhasil</i> ,
            <i class="text-warning bx bx-time">menunggu</i>,
            <i class="bx bx-x-circle text-danger">gagal</i>
        </p>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6>
                <a href="#" class="btn btn-info disabled">Status Penarikan</a>
                <a href="<?= base_url(); ?>pesanan_nasabah" class="btn btn-outline-info">Status Pesanan</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="mutasi" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="row">id transaksi</th>
                            <th scope="row">waktu (WITA)</th>
                            <th scope="row">tanggal</th>
                            <th scope="row">jenis</th>
                            <th scope="row">jumlah penarikan (Rp)</th>
                            <th scope="row">status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($mutasi_ as $m) :
                        ?>

                            <tr>
                                <td><?= $m->id_transaksi ?></td>
                                <td><?= $m->waktu ?></td>
                                <td><?= $m->tanggal ?></td>
                                <td><?= $m->jenis ?></td>
                                <td>Rp<?= rupiah($m->jumlah_penarikan) ?></td>

                                <?php if ($m->status == 'berhasil') { ?>
                                    <td class="text-success text-center">
                                        <h3><i class="bx bx-check-circle"></i></h3>
                                    <?php } elseif ($m->status == 'menunggu') { ?>
                                    <td class="text-warning text-center">
                                        <h3><i class="bx bx-time"></i></h3>
                                    <?php } elseif ($m->status == 'ditolak') { ?>
                                    <td class="text-danger text-center">
                                        <h3><i class="bx bx-x-circle"></i></h3>
                                    <?php } ?>

                                    <!-- <?= $m->status; ?> -->
                                    </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#mutasi').DataTable({
            "searching": true,
            "paging": true,
            "order": [
                [0, "DESC"]
            ]
        });
    });
</script>