    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url("assets/jquery/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url("assets/jquery-easing/jquery.easing.min.js"); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url("js/sb-admin-2.min.js"); ?>"></script>

    <link href="<?php echo base_url("assets/jquery-ui/jquery-ui.min.css"); ?>" rel="stylesheet">

    <script src="<?php echo base_url("assets/jquery-ui/jquery-ui.min.js"); ?>"></script>

    <!-- Show modal delete -->
    <script>
        // jQuery.noConflict(); 
        function deleteConfirm(url) {
            jQuery('#btn-delete').attr('href', url);
            jQuery('#deleteModal').modal('show');
        }
    </script>