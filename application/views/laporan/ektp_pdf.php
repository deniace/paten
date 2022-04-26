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
        <h2 class="text-tengah"><b>LAPORAN EKTP</b></h2>
    </div>

    <div class="table-border-colapse">
        <table style="width: 100%;border-collapse: collapse;">
            <tr>
                <th>NO</th>
                <th>ID EKTP</th>
                <th>Tanggal</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Keterangan</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($data as $value) { ?>
                <tr>
                    <td class="text-tengah"><?php echo $no; ?></td>
                    <td class="text-tengah"><?php echo $value->id_ektp; ?></td>
                    <td class="text-tengah"><?php echo date('d-m-Y', strtotime($value->tgl)); ?></td>
                    <td class="text-tengah"><?php echo $value->nik; ?></td>
                    <td class="text-tengah"><?php echo $value->nama; ?></td>
                    <td class="text-tengah"><?php echo $value->alamat; ?></td>
                    <td class="text-tengah"><?php echo $value->keterangan; ?></td>
                </tr>
                <?php $no++; ?>
            <?php } ?>
        </table>
    </div>
</body>

</html>