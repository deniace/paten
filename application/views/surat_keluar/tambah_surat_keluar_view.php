<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/head'); ?>
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah Registrasi Surat keluar</h1>

                    <!-- Card -->
                    <div class="container-fluid">

                        <!-- Card -->
                        <div class="card shadow mb-4">
                            <!-- card header -->
                            <div class="card-header py-3">
                                <div class="float-left font-weight-bold text-primary">Tambah Registrasi surat keluar</div>
                            </div>
                            <div class="card-body">

                                <?php echo $this->session->flashdata('message'); ?>

                                <form method="post" action="<?php echo base_url('surat_keluar/tambah'); ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="tgl_surat">Tanggal Surat</label>
                                        <input type="text" class="form-control <?php echo form_error('tgl_surat') ? 'is-invalid' : '' ?>" name="tgl_surat" id="tgl_surat" placeholder="Tanggal" required>
                                        <div class="invalid-feedback"><?php echo form_error('tgl_surat'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_surat">No Surat</label>
                                        <input type="text" class="form-control <?php echo form_error('no_surat') ? 'is-invalid' : '' ?>" name="no_surat" id="no_surat" placeholder="no surat" required>
                                        <div class="invalid-feedback"><?php echo form_error('no_surat'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="perihal">Perihal</label>
                                        <input type="text" class="form-control <?php echo form_error('perihal') ? 'is-invalid' : '' ?>" name="perihal" id="perihal" placeholder="perihal" required>
                                        <div class="invalid-feedback"><?php echo form_error('perihal'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tujuan_surat">Tujuan Surat</label>
                                        <input type="text" class="form-control <?php echo form_error('tujuan_surat') ? 'is-invalid' : '' ?>" name="tujuan_surat" id="tujuan_surat" placeholder="tujuan Surat" required>
                                        <div class="invalid-feedback"><?php echo form_error('tujuan_surat'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_pengiriman">Tanggal Pengiriman</label>
                                        <input type="text" class="form-control <?php echo form_error('tgl_pengiriman') ? 'is-invalid' : '' ?>" name="tgl_pengiriman" id="tgl_pengiriman" placeholder="tgl pengiriman" required>
                                        <div class="invalid-feedback"><?php echo form_error('tgl_pengiriman'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : '' ?>" name="keterangan" id="keterangan" placeholder="Keterangan" required>
                                        <div class="invalid-feedback"><?php echo form_error('keterangan'); ?></div>
                                    </div>

                                    <button type="submit" value="submit" name="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                            <!-- end card body -->
                            <!-- card footer -->
                            <div class="card-footer text-muted">

                            </div>
                        </div>
                        <!-- end card -->

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php $this->load->view("template/footer.php"); ?>
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
        <!-- 422.5/07/ocs/2022 -->
        <script>
            $("#tgl_surat").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
            $("#tgl_pengiriman").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        </script>

</body>

</html>