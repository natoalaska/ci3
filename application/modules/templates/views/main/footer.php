       <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo site_url('assets/js/jquery.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo site_url('assets/js/bootstrap.min.js'); ?>"></script>
    

    <?php
    $role = $this->session->role;
    if(isset($role) && $role == 'admin') {
        echo '<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>';
        echo '<script src="'.site_url('assets/js/tinymce.js').'"></script>';
        echo '<script src="'.site_url('assets/js/moment.min.js').'"></script>';
        echo '<script src="'.site_url('assets/js/bootstrap-datetimepicker.min.js').'"></script>';
        $this->load->view('datatables/javascript_main');
    }
    ?>
</body>

</html>