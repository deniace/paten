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
                    <h1 class="h3 mb-4 text-gray-800">Ubah Proposal</h1>

                    <!-- Card -->
                    <div class="container-fluid">

                        <!-- Card -->
                        <div class="card shadow mb-4">
                            <!-- card header -->
                            <div class="card-header py-3">
                                <div class="float-left font-weight-bold text-primary">Ubah Proposal</div>
                            </div>
                            <div class="card-body">

                                <?php echo $this->session->flashdata('message'); ?>


                                <form method="post" action="<?php echo base_url("proposal/ubah/" . $proposal->id_proposal); ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nama_lembaga">Nama Lembaga</label>
                                        <input type="text" class="form-control <?php echo form_error('nama_lembaga') ? 'is-invalid' : '' ?>" name="nama_lembaga" id="nama_lembaga" placeholder="Nama Lembaga" value="<?php echo $proposal->nama_lembaga; ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('nama_lembaga'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_surat">Tanggal Surat</label>
                                        <input type="text" class="form-control <?php echo form_error('tgl_surat') ? 'is-invalid' : '' ?>" name="tgl_surat" id="tgl_surat" placeholder="Tanggal" value="<?php echo $proposal->tgl_surat; ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('tgl_surat'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="perihal">Perihal</label>
                                        <input type="text" class="form-control <?php echo form_error('perihal') ? 'is-invalid' : '' ?>" name="perihal" id="perihal" placeholder="perihal" value="<?php echo $proposal->perihal; ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('perihal'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_penerimaan">Tanggal Penerimaan</label>
                                        <input type="text" class="form-control <?php echo form_error('tgl_penerimaan') ? 'is-invalid' : '' ?>" name="tgl_penerimaan" id="tgl_penerimaan" placeholder="tgl terima" value="<?php echo $proposal->tgl_penerimaan; ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('tgl_penerimaan'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" name="alamat" id="alamat" placeholder="alamat" value="<?php echo $proposal->alamat; ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('alamat'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_hp">NO HP</label>
                                        <input type="text" class="form-control <?php echo form_error('no_hp') ? 'is-invalid' : '' ?>" name="no_hp" id="no_hp" placeholder="No HP" value="<?php echo $proposal->no_hp; ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('no_hp'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : '' ?>" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $proposal->keterangan; ?>">
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
            $("#tgl_penerimaan").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        </script>

</body>

</html>