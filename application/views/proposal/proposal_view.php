<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("template/head") ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("template/sidebar") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("template/navbar") ?>
                <!-- End of Topbar -->

                <!-- Card -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Proposal</h1>
                    <p class="mb-4">Registrasi Proposal</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- card header -->
                        <div class="card-header py-3">
                            <div class="float-left font-weight-bold text-primary">Registrasi Proposal</div>

                            <div class="float-right ">
                                <a class="btn btn-primary" href="<?= base_url("proposal/tambah") ?>">Tambah Registrasi Proposal</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo $this->session->flashdata('message'); ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tanggal Surat</th>
                                            <th>Nama Lembaga</th>
                                            <th>Perihal</th>
                                            <th>Tanggal Penerimaan</th>
                                            <th>Alamat</th>
                                            <th>No HP</th>
                                            <th>Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $respon) : ?>
                                            <tr>
                                                <td><?php echo $respon->id_proposal; ?></td>
                                                <td><?php echo $respon->nama_lembaga; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($respon->tgl_surat)); ?></td>
                                                <td><?php echo $respon->perihal; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($respon->tgl_penerimaan)); ?></td>
                                                <td><?php echo $respon->alamat; ?></td>
                                                <td><?php echo $respon->no_hp; ?></td>
                                                <td><?php echo $respon->keterangan; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('proposal/ubah/' . $respon->id_proposal); ?>" class="btn btn-small"><i class="fas fa-edit"></i>
                                                        edit
                                                    </a>
                                                    <a onclick="deleteConfirm('<?php echo base_url('proposal/hapus/' . $respon->id_proposal); ?>')" href="#" class="btn btn-small text-danger"><i class="fas fa-trash"></i>
                                                        hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end card body -->
                        <!-- card footer  -->
                        <div class="card-footer">

                        </div>
                        <!-- end card footer  -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view("template/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php $this->load->view("template/scrolltop.php"); ?>

    <!-- Modal-->
    <?php $this->load->view("template/modal.php"); ?>

    <!-- java script -->
    <?php $this->load->view("template/js.php"); ?>
    <!-- Page level plugins -->
    <script src="<?php echo base_url("assets/datatables/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/datatables/dataTables.bootstrap4.min.js"); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url("js/demo/datatables-demo.js"); ?>"></script>

    <script>
        $("#tgl_input").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true
        });
    </script>
</body>

</html>