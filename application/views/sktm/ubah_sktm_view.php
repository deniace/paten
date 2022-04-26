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
                    <h1 class="h3 mb-4 text-gray-800">Ubah SKTM</h1>

                    <!-- Card -->
                    <div class="container-fluid">

                        <!-- Card -->
                        <div class="card shadow mb-4">
                            <!-- card header -->
                            <div class="card-header py-3">
                                <div class="float-left font-weight-bold text-primary">Ubah Surat Keterangan Tidak Mampu</div>
                            </div>
                            <div class="card-body">

                                <?php echo $this->session->flashdata('message'); ?>


                                <form method="post" action="<?php echo base_url("sktm/ubah/" . $sktm->id_sktm); ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nomor_surat">Nomor Surat</label>
                                        <input type="text" class="form-control <?php echo form_error('nomor_surat') ? 'is-invalid' : '' ?>" name="nomor_surat" id="nomor_surat" placeholder="Nomor Surat" value="<?php echo $sktm->nomor_surat; ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('nomor_surat'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_surat">Tanggal</label>
                                        <input type="text" class="form-control <?php echo form_error('tgl_surat') ? 'is-invalid' : '' ?>" name="tgl_surat" id="tgl_surat" placeholder="Tanggal" value="<?php echo $sktm->tgl_surat; ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('tgl_surat'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nik">nik</label>
                                        <input type="text" class="form-control <?php echo form_error('nik') ? 'is-invalid' : '' ?>" name="nik" id="nik" placeholder="nik" value="<?php echo $sktm->nik; ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('nik'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : '' ?>" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $sktm->keterangan; ?>">
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

            </div>
            <!-- End of Content Wrapper -->

            <!-- Footer -->
            <?php $this->load->view("template/footer.php"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <?php $this->load->view("template/scrolltop.php"); ?>

        <!-- Modal-->
        <?php $this->load->view("template/modal.php"); ?>

        <!-- java script -->
        <?php $this->load->view("template/js.php"); ?>

        <script>
            $("#tgl_surat").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });

            $("#tgl_lahir").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                showDropdowns: true,
                minYear: 1900
            });
        </script>

</body>

</html>