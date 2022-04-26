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
                    <h1 class="h3 mb-4 text-gray-800">Ubah Surat Masuk</h1>

                    <!-- Card -->
                    <div class="container-fluid">

                        <!-- Card -->
                        <div class="card shadow mb-4">
                            <!-- card header -->
                            <div class="card-header py-3">
                                <div class="float-left font-weight-bold text-primary">Ubah Surat Masuk</div>
                            </div>
                            <div class="card-body">

                                <?php echo $this->session->flashdata('message'); ?>


                                <form method="post" action="<?php echo base_url("surat_masuk/ubah/"); ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="no_surat">No Surat</label>
                                        <input type="text" class="form-control <?php echo form_error('no_surat') ? 'is-invalid' : '' ?>" value="<?php echo $surat_masuk->no_surat; ?>" disabled>
                                        <div class="invalid-feedback"><?php echo form_error('no_surat'); ?></div>
                                    </div>
                                    <input type="hidden" name="no_surat" id="no_surat" value="<?php echo $surat_masuk->no_surat; ?>">
                                    <div class="form-group">
                                        <label for="tgl_surat">Tanggal Surat</label>
                                        <input type="text" class="form-control <?php echo form_error('tgl_surat') ? 'is-invalid' : '' ?>" name="tgl_surat" id="tgl_surat" placeholder="Tanggal" value="<?php echo $surat_masuk->tgl_surat; ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('tgl_surat'); ?></div>
                                    </div>


                                    <div class="form-group">
                                        <label for="perihal">Perihal</label>
                                        <input type="text" class="form-control <?php echo form_error('perihal') ? 'is-invalid' : '' ?>" name="perihal" id="perihal" placeholder="perihal" value="<?php echo $surat_masuk->perihal; ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('perihal'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="asal_surat">Asal Surat</label>
                                        <input type="text" class="form-control <?php echo form_error('asal_surat') ? 'is-invalid' : '' ?>" name="asal_surat" id="asal_surat" placeholder="Asal Surat" value="<?php echo $surat_masuk->asal_surat; ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('asal_surat'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_terima">Tanggal Terima</label>
                                        <input type="text" class="form-control <?php echo form_error('tgl_terima') ? 'is-invalid' : '' ?>" name="tgl_terima" id="tgl_terima" placeholder="tgl terima" value="<?php echo $surat_masuk->tgl_terima; ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('tgl_terima'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : '' ?>" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $surat_masuk->keterangan; ?>">
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
            $("#tgl_terima").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        </script>

</body>

</html>