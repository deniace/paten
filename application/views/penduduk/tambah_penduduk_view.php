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
                    <h1 class="h3 mb-4 text-gray-800">Tambah Penduduk</h1>

                    <!-- Card -->
                    <div class="container-fluid">

                        <!-- Card -->
                        <div class="card shadow mb-4">
                            <!-- card header -->
                            <div class="card-header py-3">
                                <div class="float-left font-weight-bold text-primary">Tambah Penduduk</div>
                            </div>
                            <div class="card-body">

                                <?php echo $this->session->flashdata('message'); ?>

                                <form method="post" action="<?php echo base_url('penduduk/tambah'); ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control <?php echo form_error('nik') ? 'is-invalid' : '' ?>" name="nik" id="nik" required>
                                        <div class="invalid-feedback"><?php echo form_error('nik'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" name="nama" id="nama" required>
                                        <div class="invalid-feedback"><?php echo form_error('nama'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tempat_lahir">tempat lahir</label>
                                        <input type="text" class="form-control <?php echo form_error('tempat_lahir') ? 'is-invalid' : '' ?>" name="tempat_lahir" id="tempat_lahir" required>
                                        <div class="invalid-feedback"><?php echo form_error('tempat_lahir'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_lahir">tgl lahir</label>
                                        <input type="text" class="form-control <?php echo form_error('tgl_lahir') ? 'is-invalid' : '' ?>" name="tgl_lahir" id="tgl_lahir" required>
                                        <div class="invalid-feedback"><?php echo form_error('tgl_lahir'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" name="alamat" id="alamat" required>
                                        <div class="invalid-feedback"><?php echo form_error('alamat'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">status</label>
                                        <input type="text" class="form-control <?php echo form_error('status') ? 'is-invalid' : '' ?>" name="status" id="status">
                                        <div class="invalid-feedback"><?php echo form_error('status'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label class="my-1 mr-2" for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="custom-select my-1 mr-sm-2 <?php echo form_error('jenis_kelamin') ? 'is-invalid' : '' ?>" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option selected value="">Pilih</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <div class="invalid-feedback"><?php echo form_error('jenis_kelamin'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl">tgl input</label>
                                        <input type="text" class="form-control <?php echo form_error('tgl') ? 'is-invalid' : '' ?>" name="tgl" id="tgl">
                                        <div class="invalid-feedback"><?php echo form_error('tgl'); ?></div>
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
            $("#tgl_lahir").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        </script>

</body>

</html>