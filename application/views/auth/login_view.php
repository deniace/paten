<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("template/head.php") ?>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card-body p-0 ">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="<?php echo base_url("img/logo.png"); ?> " class="img-fluid rounded" alt="Logo" style="width: 30%;">
                                    </div>

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>

                                    <?php echo $this->session->flashdata('message'); ?>

                                    <form class="user" method="post" action="<?php base_url('login') ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nip" name="nip" placeholder="Masukan NIP anda...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <!-- <a class="small" href="#">Lupa Password?</a> -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <?php $this->load->view("template/js.php") ?>

</body>

</html>