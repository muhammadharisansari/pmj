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
    <p style="font-weight:bold;" align="center">Daftar Admin</p>
    <p>Tanggal : <?= date('d - m - Y'); ?></p>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Username</th>
            <th>Level</th>
            <th>HP</th>
            <th>Blokir</th>
        </tr>

        <?php
        $no = 1;
        foreach ($admin_ as $a) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td align="center">
                    <?php
                    $path = '' . base_url() . 'assets/admin_foto/' . $a->foto_admin . '';
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    ?>
                    <img src="<?php echo $base64 ?>" style="width: 80px; height:80px;">
                </td>
                <td><?= $a->username_admin; ?></td>
                <td><?= $a->level_admin; ?></td>
                <td><?= $a->hp_admin; ?></td>
                <td><?= $a->blokir; ?></td>
            </tr>

        <?php endforeach; ?>
    </table>

</body>

</html>