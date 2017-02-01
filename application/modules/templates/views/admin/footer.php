           </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo site_url('assets/js/jquery.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo site_url('assets/js/jquery.js'); ?>"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="<?php echo site_url('assets/js/tinymce.js'); ?>"></script>
    <script src="<?php echo site_url('assets/dataTables/datatables.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/moment.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/bootstrap-datetimepicker.min.js'); ?>"></script>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="<?php echo site_url('assets/js/jquery.mjs.nestedSortable.js'); ?>"></script>
    
<?php
if(isset($modal)) {
    $this->load->view('datatables/javascript_admin');
}
?>

<?php $this->load->view('admin/navigationJS'); ?>

</body>

</html>