<div class="container">

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="row mt-3 ml-2">
        <p>
            <strong>Note :</strong> Ambil pesanan dengan datang ke PMJ, sebutkan username dan id pesan kamu.
        </p>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6>
                <a href="<?= base_url(); ?>mutasi_nasabah" class="btn btn-outline-info">Status Penarikan</a>
                <a href="#" class="btn btn-info disabled">Status Pesanan</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="pesanan">
                    <thead>
                        <tr>
                            <th scope="row">id pesan</th>
                            <th scope="row">Tanggal</th>
                            <th scope="row">Barang</th>
                            <th scope="row">jumlah</th>
                            <th scope="row">total (Rp)</th>
                            <th scope="row">status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pesan_ as $p) :
                        ?>

                            <tr>
                                <td><?= $p->id_pesan ?></td>
                                <td><?= $p->tanggal ?></td>
                                <td><?= $p->nama_barang ?></td>
                                <td><?= $p->jumlah_pesan ?></td>
                                <td>Rp<?= rupiah($p->total_harga) ?></td>
                                <?php if ($p->status == 'dipesan') { ?>
                                    <td class="text-warning"><?= $p->status ?>
                                        <!-- <i class="bx bxs-x-circle text-danger"></i> -->
                                    </td>
                                <?php } else { ?>
                                    <td class="text-success"><?= $p->status ?></td>
                                <?php } ?>

                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#pesanan').DataTable({
                "searching": true,
                "paging": true,
                "order": [
                    [0, "DESC"]
                ]
            });
        });
    </script>