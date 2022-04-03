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
    <p style="font-weight:bold;" align="center">Daftar Transaksi Setoran Periode <?= $bulan; ?> <?= $tahun; ?>
    </p>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Setoran</th>
            <th>Senilai</th>
        </tr>

        <?php
        $no = 1;
        $jn = 0;
        $js = 0;
        $ts = 0;
        $estim = 0;
        $tot_mod = 0;
        foreach ($results as $a) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $a->nama_nasabah; ?></td>
                <td><?= $a->tanggal_setor; ?></td>
                <td><?= $a->waktu_setor; ?></td>
                <td><?= $a->jumlah_setor; ?> ml</td>
                <td>Rp<?= rupiah($a->senilai); ?></td>
                <?php foreach ($pengepul as $p) :
                    $peng = $p->harga_pengepul;
                    $mod = ($a->jumlah_setor / 1000) * $p->harga_pengepul;
                ?>

                    <?php rupiah($mod); ?>
                <?php endforeach; ?>
            </tr>
            <?php
            $jn += $a->senilai;
            $js += $a->jumlah_setor;
            $estim += $mod;
            $ts = $js / 1000;
            $lab = $estim - $js;
            ?>
        <?php endforeach; ?>
        <tr>
            <td colspan="4" style="font-weight: bold;">Jumlah :</td>
            <td style="font-weight: bold;"><?= $jn; ?> ml</td>
            <td style="font-weight: bold;">Rp<?= rupiah($js); ?></td>
            <!-- <td style="font-weight: bold;">Rp<?= rupiah($estim); ?></td> -->
        </tr>
    </table>
    <p style="text-align: justify;">Dari tabel di atas dapat diketahui bahwa total setoran periode ini sebanyak <?= rupiah($jn); ?> ml atau setara dengan <?= $ts; ?> liter. Investasi untuk pembelian setoran minyak bulan ini mencapai Rp<?= rupiah($js); ?>. Dengan estimasi harga beli Rp<?= rupiah($peng); ?> per liter dari mitra, diperkirakan omset bulan ini sekitar Rp<?= rupiah($estim); ?>. Sehingga dapat disimpulkan bahwa laba yang diperoleh mencapai <strong>Rp<?= rupiah($lab); ?></strong>.
    </p>


</body>

</html>