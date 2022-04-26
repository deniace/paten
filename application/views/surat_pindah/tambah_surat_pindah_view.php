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
                    <h1 class="h3 mb-4 text-gray-800">Tambah Registrasi Surat keterangan pindah</h1>

                    <!-- Card -->
                    <div class="container-fluid">

                        <!-- Card -->
                        <div class="card shadow mb-4">
                            <!-- card header -->
                            <div class="card-header py-3">
                                <div class="float-left font-weight-bold text-primary">Tambah Registrasi surat keterangan pindah</div>
                            </div>
                            <div class="card-body">

                                <?php echo $this->session->flashdata('message'); ?>

                                <form method="post" action="<?php echo base_url('surat_pindah/tambah'); ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="no_surat">No Surat</label>
                                        <input type="text" class="form-control <?php echo form_error('no_surat') ? 'is-invalid' : '' ?>" name="no_surat" id="no_surat" placeholder="no surat" required>
                                        <div class="invalid-feedback"><?php echo form_error('no_surat'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_masuk">Tanggal masuk</label>
                                        <input type="text" class="form-control <?php echo form_error('tgl_masuk') ? 'is-invalid' : '' ?>" name="tgl_masuk" id="tgl_masuk" placeholder="Tanggal" required>
                                        <div class="invalid-feedback"><?php echo form_error('tgl_masuk'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nik">nik</label>
                                        <input type="text" class="form-control <?php echo form_error('nik') ? 'is-invalid' : '' ?>" name="nik" id="nik" placeholder="nik" required>
                                        <div class="invalid-feedback"><?php echo form_error('nik'); ?></div>
                                    </div>


                                    <div class="form-group">
                                        <label for="tujuan_pindah">Tujuan Pindah</label>
                                        <input type="text" class="form-control <?php echo form_error('tujuan_pindah') ? 'is-invalid' : '' ?>" name="tujuan_pindah" id="tujuan_pindah" placeholder="tujuan_pindah" required>
                                        <div class="invalid-feedback"><?php echo form_error('tujuan_pindah'); ?></div>
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
            $("#tgl_masuk").datepicker({
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