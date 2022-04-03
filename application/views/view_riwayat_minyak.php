<div class="container">

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat setoran minyak</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered  mt-2 " id="riwayat">
                    <thead>
                        <tr>
                            <th scope="row">id setoran</th>
                            <th scope="row">waktu (WITA)</th>
                            <th scope="row">tanggal</th>
                            <th scope="row">jumlah setoran</th>
                            <th scope="row">senilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($riwayat_ as $r) : ?>

                            <tr>
                                <td><?= $r->id_setoran; ?></td>
                                <td><?= $r->waktu_setor; ?></td>
                                <td><?= $r->tanggal_setor; ?></td>
                                <td><?= $r->jumlah_setor; ?> ml</td>
                                <td>Rp.<?= rupiah($r->senilai); ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#riwayat').DataTable({
                "searching": true,
                "paging": true,
                "order": [
                    [0, "DESC"]
                ]
            });
        });
    </script>