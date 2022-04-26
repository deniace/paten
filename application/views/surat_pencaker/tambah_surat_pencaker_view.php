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
                    <h1 class="h3 mb-4 text-gray-800">Tambah Registrasi Surat keterangan Pencari Kerja</h1>

                    <!-- Card -->
                    <div class="container-fluid">

                        <!-- Card -->
                        <div class="card shadow mb-4">
                            <!-- card header -->
                            <div class="card-header py-3">
                                <div class="float-left font-weight-bold text-primary">Tambah Registrasi surat keterangan Pencari Kerja</div>
                            </div>
                            <div class="card-body">

                                <?php echo $this->session->flashdata('message'); ?>

                                <form method="post" action="<?php echo base_url('surat_pencaker/tambah'); ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nik">nik</label>
                                        <input type="text" class="form-control <?php echo form_error('nik') ? 'is-invalid' : '' ?>" name="nik" id="nik" placeholder="nik" required>
                                        <div class="invalid-feedback"><?php echo form_error('nik'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label class="my-1 mr-2" for="pendidikan">Pendidikan</label>
                                        <select class="custom-select my-1 mr-sm-2 <?php echo form_error('pendidikan') ? 'is-invalid' : '' ?>" id="pendidikan" name="pendidikan" required>
                                            <option selected value="">Pilih</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA/SMK">SMA/SMK</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                        <div class="invalid-feedback"><?php echo form_error('pendidikan'); ?></div>
                                    </div>


                                    <div class="form-group">
                                        <label for="tahun_lulus">Tahun lulus</label>
                                        <input type="text" class="form-control <?php echo form_error('tahun_lulus') ? 'is-invalid' : '' ?>" name="tahun_lulus" id="tahun_lulus" placeholder="tahun_lulus" required>
                                        <div class="invalid-feedback"><?php echo form_error('tahun_lulus'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_pembuatan">Tanggal Pembuatan</label>
                                        <input type="text" class="form-control <?php echo form_error('tgl_pembuatan') ? 'is-invalid' : '' ?>" name="tgl_pembuatan" id="tgl_pembuatan" placeholder="tgl_pembuatan" required>
                                        <div class="invalid-feedback"><?php echo form_error('tgl_pembuatan'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : '' ?>" name="keterangan" id="keterangan" placeholder="keterangan">
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
            $("#tgl_pembuatan").datepicker({
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