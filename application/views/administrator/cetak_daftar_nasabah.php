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
    <p style="font-weight:bold;" align="center">Daftar Nasabah</p>
    <?php
    if ($dari && $sampai) { ?>
        <p>Periode : <?= $dari . ' s/d ' . $sampai ?></p>
    <?php } else { ?>
        <p>Tanggal : <?= date('d - m - Y'); ?></p>
    <?php } ?>

    <table id="customers">
        <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>Tgl lahir</th>
            <th>JK</th>
            <th>Alamat</th>
            <th>Bank</th>
            <th>Rek Bank</th>
            <th>No HP</th>
        </tr>

        <?php
        foreach ($nasabah_ as $a) : ?>
            <tr>
                <td><?= $a->nama_nasabah; ?></td>
                <td><?= $a->username_nasabah; ?></td>
                <td><?= $a->tl_nasabah; ?></td>
                <td>
                    <?php if ($a->jk_nasabah == 'Perempuan') { ?>
                        P
                    <?php } else { ?>
                        L
                    <?php } ?>
                </td>
                <td><?= $a->alamat_nasabah; ?></td>
                <td><?= $a->bank_nasabah; ?></td>
                <td><?= $a->rek_nasabah; ?></td>
                <td><?= $a->hp_nasabah; ?></td>
            </tr>

        <?php endforeach; ?>
    </table>

</body>

</html>