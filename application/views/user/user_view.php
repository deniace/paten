<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("template/head") ?>
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

                <!-- Card -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Management user</h1>
                    <p class="mb-4">Management user untuk memanage data tentang user yang ada</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- card header -->
                        <div class="card-header py-3">
                            <div class="float-left font-weight-bold text-primary">Data user</div>
                            <a class="btn btn-primary float-right" href="<?php echo base_url('user/tambah') ?>" role="button">Tambah user</a>
                        </div>
                        <div class="card-body">
                            <?php echo $this->session->flashdata('message'); ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID user</th>
                                            <th>NIP</th>
                                            <th>Avatar</th>
                                            <th>Email user</th>
                                            <th>Nama user</th>
                                            <th>Role</th>
                                            <th>No telpon</th>
                                            <th>Nama jalan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tbody>
                                            <?php foreach ($data as $respon) : ?>
                                                <tr>
                                                    <td><?php echo $respon->id_user ?></td>
                                                    <td><?php echo $respon->nip; ?></td>
                                                    <td>
                                                        <?php $image = $respon->avatar ? $respon->avatar : "default.jpg" ?>
                                                        <img src="<?php echo base_url("uploads/image/avatar/") . $image; ?> " class="img-fluid rounded" alt="Avatar">
                                                    </td>
                                                    <td><?php echo $respon->email ?></td>
                                                    <td>
                                                        <?php echo $respon->nama_user; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $respon->role; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $respon->telp; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $respon->alamat; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url('user/ubah/' . $respon->id_user); ?>" class="btn btn-small"><i class="fas fa-edit"></i>
                                                            edit
                                                        </a>
                                                        <a onclick="deleteConfirm('<?php echo base_url('user/hapus/' . $respon->id_user); ?>')" href="#" class="btn btn-small text-danger"><i class="fas fa-trash"></i>
                                                            hapus
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end card body -->
                        <!-- card footer  -->
                        <div class="card-footer">
                            <div class="float-left font-weight-bold text-primary"><?php echo "Total $total_data data dan $max_page halaman"; ?></div>
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-end">
                                    <?php $page_prev = $page - 1;
                                    $page_nex = $page + 1; ?>
                                    <li class="page-item <?php echo $page > 1 ? "" : "disabled" ?>"><a class="page-link" href="<?php echo base_url("user/page/" . $page_prev); ?>">Sebelumnya</a></li>
                                    <li class="page-item active"><a class="page-link" href="<?php echo base_url("user/page/" . $page); ?>"><?= $page; ?></a></li>
                                    <li class="page-item <?php echo $page == $max_page ? "disabled" : "" ?>"><a class="page-link" href="<?php echo base_url("user/page/" . $page_nex); ?>">Berikutnya</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- end card footer  -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view("template/footer.php") ?>
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