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
                    <h1 class="h3 mb-2 text-gray-800">Laporan</h1>
                    <p class="mb-4">Laporan</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- card header -->
                        <div class="card-header py-3">
                            <div class="float-left font-weight-bold text-primary">Laporan</div>
                        </div>
                        <div class="card-body">
                            <?php echo $this->session->flashdata('message'); ?>
                            <form method="get" action="<?php echo base_url('laporan/pdf'); ?>">
                                <div class="form-group">
                                    <label for="dari">Tanggal dari</label>
                                    <input type="text" autocomplete="off" class="form-control <?php echo form_error('dari') ? 'is-invalid' : '' ?>" name="dari" id="dari" placeholder="Tanggal" required>
                                    <div class="invalid-feedback"><?php echo form_error('dari'); ?></div>
                                </div>

                                <div class="form-group">
                                    <label for="sampai">Tanggal sampai</label>
                                    <input type="text" autocomplete="off" class="form-control <?php echo form_error('sampai') ? 'is-invalid' : '' ?>" name="sampai" id="sampai" placeholder="Tanggal" required>
                                    <div class="invalid-feedback"><?php echo form_error('sampai'); ?></div>
                                </div>

                                <div class="form-group">
                                    <label class="my-1 mr-2" for="id_tipe">Tipe</label>
                                    <select class="custom-select my-1 mr-sm-2 <?php echo form_error('tipe') ? 'is-invalid' : '' ?>" id="tipe" name="tipe">
                                        <option selected value="">Pilih</option>
                                        <option value="ektp"> EKTP</option>
                                        <option value="kk"> KK</option>
                                        <option value="disposisi"> disposisi</option>
                                        <option value="proposal"> Proposal</option>
                                        <option value="sktm"> SKTM</option>
                                        <option value="surat_keluar"> Surat Keluar</option>
                                        <option value="surat_masuk"> Surat Masuk</option>
                                        <option value="pencaker"> Surat Pencaker</option>
                                        <option value="pindah"> Surat Pindah</option>
                                        <option value="penduduk"> Penduduk</option>
                                    </select>
                                    <div class="invalid-feedback"><?php echo form_error('tipe'); ?></div>
                                </div>

                                <button type="submit" class="btn btn-primary">Cetak</button>
                            </form>
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
        $("#dari").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true
        });
        $("#sampai").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true
        });
    </script>
</body>

</html>