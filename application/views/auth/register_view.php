<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("template/head"); ?>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                                    </div>

                                    <?php echo $this->session->flashdata('message'); ?>

                                    <form class="user" method="post" action="<?php base_url('auth/register') ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user <?php echo form_error('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?php echo isset($nama) ? $nama : ""; ?>" placeholder="Nama">
                                            <div class="invalid-feedback"><?php echo form_error('nama'); ?></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user <?php echo form_error('email') ? 'is-invalid' : '' ?>" id=" email" name="email" placeholder="Email" value="<?php echo isset($email) ? $email : ""; ?>">
                                            <div class="invalid-feedback"><?php echo form_error('email'); ?></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user <?php echo form_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Password" autocomplete="false">
                                                <div class="invalid-feedback"><?php echo form_error('password'); ?></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user <?php echo form_error('passconf') ? 'is-invalid' : '' ?>" id="passconf" name="passconf" placeholder="Ulangi Password" autocomplete="false">
                                                <div class="invalid-feedback"><?php echo form_error('passconf'); ?></div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register
                                        </button>
                                        <hr>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url("auth/login"); ?>">Sudah punya akun? Login.</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <?php $this->load->view("template/js"); ?>

</body>

</html>