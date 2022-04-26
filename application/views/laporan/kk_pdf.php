<html>

<head>
    <title>Penduduk</title>
</head>

<body>
    <style type="text/css">
        @page {
            margin-top: 20px;
            margin-bottom: 0%;
        }

        .text-tengah {
            text-align: center;
        }

        .table-border-colapse table tr td,
        tr th {
            border: 1px solid #000000;
            border-collapse: collapse;
            padding: 1px;
            margin: 0;
        }
    </style>

    <div>
        <h2 class="text-tengah"><b>LAPORAN PENDUDUK KARTU KELUARGA</b></h2>
    </div>

    <div class="table-border-colapse">
        <table style="width: 100%;border-collapse: collapse;">
            <tr>
                <th>NO</th>
                <th>No KK </th>
                <th>Nama Kepala Keluarga</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis kelamin</th>
                <th>Alamat</th>
                <th>Tanggal</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($data as $value) { ?>
                <tr>
                    <td class="text-tengah"><?php echo $no; ?></td>
                    <td class="text-tengah"><?php echo $value->id_kk; ?></td>
                    <td class="text-tengah"><?php echo $value->nama; ?></td>
                    <td class="text-tengah"><?php echo $value->tempat_lahir; ?></td>
                    <td class="text-tengah"><?php echo $value->tgl_lahir; ?></td>
                    <td class="text-tengah"><?php echo $value->jenis_kelamin; ?></td>
                    <td class="text-tengah"><?php echo $value->alamat; ?></td>
                    <td class="text-tengah"><?php echo $value->tgl; ?></td>
                </tr>
                <?php $no++; ?>
            <?php } ?>
        </table>
    </div>
</body>

</html>