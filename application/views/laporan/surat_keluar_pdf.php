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
        <h2 class="text-tengah"><b>LAPORAN SURAT KELUAR</b></h2>
    </div>

    <div class="table-border-colapse">
        <table style="width: 100%;border-collapse: collapse;">
            <tr style="background-color: lightgray;">
                <th>NO</th>
                <th>Tanggal Surat</th>
                <th>No Surat</th>
                <th>Perihal</th>
                <th>Tujuan Surat</th>
                <th>Tanggal Pengiriman</th>
                <th>Keterangan</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($data as $value) { ?>
                <tr>
                    <td class="text-tengah"><?php echo $no; ?></td>
                    <td class="text-tengah"><?php echo date('d-m-Y', strtotime($value->tgl_surat)); ?></td>
                    <td class="text-tengah"><?php echo $value->no_surat; ?></td>
                    <td class="text-tengah"><?php echo $value->perihal; ?></td>
                    <td class="text-tengah"><?php echo $value->tujuan_surat; ?></td>
                    <td class="text-tengah"><?php echo date('d-m-Y', strtotime($value->tgl_pengiriman)); ?></td>
                    <td class="text-tengah"><?php echo $value->keterangan; ?></td>
                </tr>
                <?php $no++; ?>
            <?php } ?>
        </table>
    </div>
</body>

</html>