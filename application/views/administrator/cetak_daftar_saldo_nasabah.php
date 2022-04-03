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
    <p style="font-weight:bold;" align="center">Daftar Saldo Nasabah</p>
    <p>Tanggal : <?= date('d - m - Y'); ?></p>


    <table id="customers">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>No HP</th>
            <th>Poin</th>
            <th>Saldo</th>
        </tr>

        <?php
        $no = 1;
        $js = 0;
        foreach ($saldo_ as $a) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $a->nama_nasabah; ?></td>
                <td><?= $a->username_nasabah; ?></td>
                <td><?= $a->hp_nasabah; ?></td>
                <td><?= $a->poin; ?></td>
                <td>Rp.<?= rupiah($a->sisa_saldo); ?></td>
            </tr>
            <?php

            $js += $a->sisa_saldo ?>

        <?php endforeach; ?>
        <tr>
            <td colspan="5" style="font-weight: bold;">Jumlah saldo yang tersimpan :</td>
            <td style="font-weight: bold;">Rp.<?= rupiah($js); ?></td>
        </tr>
    </table>

</body>

</html>