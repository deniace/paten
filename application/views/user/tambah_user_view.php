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
                    <h1 class="h3 mb-4 text-gray-800">Tambah user</h1>

                    <!-- Card -->
                    <div class="container-fluid">

                        <!-- Card -->
                        <div class="card shadow mb-4">
                            <!-- card header -->
                            <div class="card-header py-3">
                                <div class="float-left font-weight-bold text-primary">Tambah user</div>
                            </div>
                            <div class="card-body">

                                <?php echo $this->session->flashdata('message'); ?>


                                <form method="post" action="<?php echo base_url('user/tambah'); ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nik">nik</label>
                                        <input type="text" class="form-control<?php echo form_error('nik') ? 'is-invalid' : '' ?>" id="nik" name="nik" value="<?php echo isset($nik) ? $nik : ""; ?>" placeholder="nik">
                                        <div class="invalid-feedback"><?php echo form_error('nik'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">nama</label>
                                        <input type="text" class="form-control<?php echo form_error('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?php echo isset($nama) ? $nama : ""; ?>" placeholder="Nama">
                                        <div class="invalid-feedback"><?php echo form_error('nama'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">email</label>
                                        <input type="email" class="form-control<?php echo form_error('email') ? 'is-invalid' : '' ?>" id=" email" name="email" placeholder="Email" value="<?php echo isset($email) ? $email : ""; ?>" autocomplete="false">
                                        <div class="invalid-feedback"><?php echo form_error('email'); ?></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="password">password</label>
                                            <input type="password" class="form-control<?php echo form_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Password" autocomplete="false">
                                            <div class="invalid-feedback"><?php echo form_error('password'); ?></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="passconf">password confirmation</label>
                                            <input type="password" class="form-control<?php echo form_error('passconf') ? 'is-invalid' : '' ?>" id="passconf" name="passconf" placeholder="Ulangi Password" autocomplete="false">
                                            <div class="invalid-feedback"><?php echo form_error('passconf'); ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="my-1 mr-2" for="role">role</label>
                                        <select class="custom-select my-1 mr-sm-2 <?php echo form_error('role') ? 'is-invalid' : '' ?>" id="role" name="role" required>
                                            <option selected value="">Pilih role</option>
                                            <option value="admin">Admin</option>
                                            <option value="sekcam">SEKCAM</option>
                                        </select>
                                        <div class="invalid-feedback"><?php echo form_error('role'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="telp">telp</label>
                                        <input type="text" class="form-control<?php echo form_error('telp') ? 'is-invalid' : '' ?>" id="telp" name="telp" value="<?php echo isset($telp) ? $telp : ""; ?>" placeholder="telp">
                                        <div class="invalid-feedback"><?php echo form_error('telp'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">alamat</label>
                                        <input type="text" class="form-control<?php echo form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat" name="alamat" value="<?php echo isset($alamat) ? $alamat : ""; ?>" placeholder="alamat">
                                        <div class="invalid-feedback"><?php echo form_error('alamat'); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="avatar">avatar</label>
                                        <input type="file" class="form-control-file" id="avatar" name="avatar">
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

</body>

</html>