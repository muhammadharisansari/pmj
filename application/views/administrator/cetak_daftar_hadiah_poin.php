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
    <p style="font-weight:bold;" align="center">Daftar Hadiah Poin</p>
    <p>Tanggal : <?= date('d - m - Y'); ?></p>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Hadiah</th>
            <th>Ket Hadiah</th>
            <th>Poin</th>
        </tr>

        <?php
        $no = 1;
        foreach ($hadiah_ as $a) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td align="center">
                    <?php
                    $path = '' . base_url() . 'assets/img/'  . $a->gambar_hadiah . '';
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    ?>
                    <img src="<?php echo $base64 ?>" style="width: 100px; height:60px;">
                </td>
                <td><?= $a->ket_hadiah; ?></td>
                <td><?= $a->jumlah_poin; ?></td>
            </tr>

        <?php endforeach; ?>
    </table>

</body>

</html>