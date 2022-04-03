<html>

<head>
    <title></title>
    <style>
        #customers {
            font-family: Arial;
            border-collapse: collapse;
            /* width: 100%; */
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        /* #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        } */

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #E4E7E6;
            /* color: white; */
        }
    </style>
</head>

<body>

    <?php
    $path = '' . base_url() . 'assets/template/img/pmj_bg.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>

    <img src="<?php echo $base64 ?>" style="position: absolute; width: 60px; height:auto;">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight:bold;">
                    SISTEM INFORMASI PENGEPUL MINYAK JELANTAH<br>
                    PMJ CABANG KANDANGAN
                </span>
            </td>
        </tr>
    </table>

    <hr class="line-title">
    <br>
    <p style="font-weight:bold;" align="center">Transaksi Tukar Barang Periode <?= $bulan; ?> <?= $tahun; ?>
    </p>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Pemesan</th>
            <th>Barang</th>
            <th>Harga</th>
            <th>qty</th>
            <th>Total</th>
            <th>Modal</th>
        </tr>

        <?php
        $no = 1;
        $js = 0;
        $jm = 0;
        foreach ($results as $a) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $a->status; ?></td>
                <td><?= $a->tanggal; ?></td>
                <td><?= $a->nama_nasabah; ?></td>
                <td><?= $a->nama_barang; ?></td>
                <td>Rp.<?= rupiah($a->harga); ?></td>
                <td><?= $a->jumlah_pesan; ?></td>
                <td>Rp.<?= rupiah($a->total_harga); ?></td>
                <td>Rp.<?= rupiah($a->tot_modal); ?></td>
            </tr>
            <?php
            $lb = '';
            $js += $a->total_harga;
            $jm += $a->tot_modal;

            $lb = $js - $jm;

            ?>

        <?php endforeach; ?>
        <tr>
            <td colspan="7" style="font-weight: bold;">Grand total :</td>
            <td style="font-weight: bold;">Rp.<?= rupiah($js); ?></td>
            <td style="font-weight: bold;">Rp.<?= rupiah($jm); ?></td>
        </tr>
    </table>

    <p style="text-align: justify;">
        Berdasarkan data yang terdapat pada tabel di atas dapat disimpulkan bahwa total omset dari transaksi tukar barang periode <?= $bulan; ?> <?= $tahun; ?> adalah Rp.<?= rupiah($js); ?> dengan modal senilai Rp.<?= rupiah($jm); ?>. Sehingga dapat kita ketahui jumlah laba yang didapatkan pada periode ini mencapai <strong>Rp.<?= rupiah($lb); ?></strong>.
    </p>

</body>

</html>