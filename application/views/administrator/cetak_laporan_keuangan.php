<html>

<head>
    <title></title>
    <style>
        #customers {
            font-family: Arial;
            border-collapse: collapse;
            width: 100%;
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
    <p style="font-weight:bold;" align="center">Laporan Rekap Keuangan Periode <?= $bulan; ?> <?= $tahun; ?>
    </p>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Keterangan</th>
            <th>Modal</th>
            <th>Omset</th>
            <th>Laba</th>
        </tr>

        <?php
        $jm = 0;
        $mod = 0;
        $peng = 0;
        $js = 0;
        $jmod = 0;
        $estim = 0;
        foreach ($mutasi as $m) :
            $jm += $m->senilai;

            foreach ($pengepul as $p) :
                $peng = $p->harga_pengepul;
                $mod = ($m->jumlah_setor / 1000) * $p->harga_pengepul;
            endforeach;
            $estim += $mod;
        endforeach;

        foreach ($barang as $b) :
            $js += $b->total_harga;
            $jmod += $b->tot_modal;
        endforeach;

        ?>
        <tr>
            <td>1</td>
            <td>Transaksi setoran minyak</td>
            <td>Rp<?= rupiah($jm); ?></td>
            <td>Rp<?= rupiah($estim); ?></td>
            <td>Rp<?= rupiah($estim - $jm); ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Transaksi tukar barang</td>
            <td>Rp<?= rupiah($jmod); ?></td>
            <td>Rp<?= rupiah($js); ?></td>
            <td>Rp<?= rupiah($js - $jmod); ?></td>
        </tr>
        <tr>
            <?php
            $modal = $jm + $jmod;
            $omset = $estim + $js;
            $laba  = ($estim - $jm) + ($js - $jmod);
            ?>
            <td colspan="2"><strong>Jumlah</strong></td>
            <td><strong> Rp<?= rupiah($modal);  ?></td></strong>
            <td><strong> Rp<?= rupiah($omset); ?></td></strong>
            <td><strong> Rp<?= rupiah($laba); ?></td></strong>
        </tr>
    </table>

    <p style="text-align:justify;">
        Dari tabel di atas dapat diketahui bahwa total pengeluaran modal pada periode ini sebanyak Rp<?= rupiah($modal); ?> dengan total omset mencapai Rp<?= rupiah($omset); ?> sehingga dapat disimpulkan laba yang di dapat adalah <strong>Rp<?= rupiah($laba); ?></strong>.
    </p>

</body>

</html>