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
                    <h1 class="h3 mb-4 text-gray-800">Tambah Disposisi</h1>

                    <!-- Card -->
                    <div class="container-fluid">

                        <!-- Card -->
                        <div class="card shadow mb-4">
                            <!-- card header -->
                            <div class="card-header py-3">
                                <div class="float-left font-weight-bold text-primary">Tambah Disposisi</div>
                            </div>
                            <div class="card-body">

                                <?php echo $this->session->flashdata('message'); ?>

                                <form method="post" action="<?php echo base_url('disposisi/tambah/' . $surat_masuk->no_surat); ?>" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="tgl_penyelesaian">Tanggal Penyelesaian</label>
                                        <input type="text" class="form-control <?php echo form_error('tgl_penyelesaian') ? 'is-invalid' : '' ?>" name="tgl_penyelesaian" id="tgl_penyelesaian" placeholder="tgl_penyelesaian">
                                        <div class="invalid-feedback"><?php echo form_error('tgl_penyelesaian'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="perihal">Perihal</label>
                                        <input type="text" class="form-control <?php echo form_error('perihal') ? 'is-invalid' : '' ?>" name="perihal" id="perihal" placeholder="perihal" value="<?= $surat_masuk->perihal; ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('perihal'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="dari">Dari</label>
                                        <input type="text" class="form-control <?php echo form_error('dari') ? 'is-invalid' : '' ?>" name="dari" id="dari" placeholder="dari" value="<?= $surat_masuk->asal_surat; ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('dari'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_surat">Tanggal Surat</label>
                                        <input type="text" class="form-control <?php echo form_error('tgl_surat') ? 'is-invalid' : '' ?>" name="tgl_surat" id="tgl_surat" value="<?= $surat_masuk->tgl_surat; ?>" placeholder="Tanggal">
                                        <div class="invalid-feedback"><?php echo form_error('tgl_surat'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no">No Surat</label>
                                        <input type="text" class="form-control <?php echo form_error('no') ? 'is-invalid' : '' ?>" name="no" id="no" placeholder="no surat" value="<?= $surat_masuk->no_surat; ?>">
                                        <div class="invalid-feedback"><?php echo form_error('no'); ?></div>
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
            $("#tgl_penyelesaian").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        </script>

</body>

</html>