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
    <p style="font-weight:bold;" align="center">Daftar Nasabah Klaim Hadiah Poin Periode <?= $bulan; ?> <?= $tahun; ?>
    </p>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Username</th>
            <th>Ket Hadiah</th>
            <th>Status</th>
        </tr>

        <?php
        $no = 1;
        foreach ($results as $a) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $a->tanggal; ?></td>
                <td><?= $a->username; ?></td>
                <td><?= $a->ket_hadiah; ?></td>
                <td><?= $a->status; ?></td>
            </tr>

        <?php endforeach; ?>
    </table>

</body>

</html>