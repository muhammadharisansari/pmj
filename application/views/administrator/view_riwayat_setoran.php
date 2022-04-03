<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Setoran</h1>
    </div>

    <div class="shadow" data-aos="zoom-in">
        <?php echo $this->session->flashdata('pesan') ?>
    </div>

    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills ">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="transaksi"><strong>Transaksi Setoran</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary disabled " href="#"><strong>Riwayat Setoran</strong></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered " id="riwayat">
                        <thead class="bg-primary text-white">
                            <th>Id Setoran</th>
                            <th>Nama</th>
                            <th>Waktu</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Senilai</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php foreach ($riwayat_ as $r) : ?>

                                <tr>
                                    <td style="width: 100px;"><?= $r->id_setoran; ?></td>
                                    <td><?= $r->nama_nasabah; ?></td>
                                    <td style="width: 100px;"><?= $r->waktu_setor; ?></td>
                                    <td style="width: 100px;"><?= $r->tanggal_setor; ?></td>
                                    <td><?= $r->jumlah_setor; ?> ml</td>
                                    <td>Rp.<?= rupiah($r->senilai); ?></td>
                                    <td class="text-center"><?php echo anchor('administrator/riwayat_setoran/hapus/' . $r->id_setoran, '<div class="btn btn-outline-danger"><i class="fa fa-trash"></i></div>') ?></td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#riwayat').DataTable({
            "searching": true,
            "paging": true,
            "order": [
                [0, "DESC"],
            ]
        });
    });
</script>