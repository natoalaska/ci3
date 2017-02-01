<!-- Head -->
<?php echo Modules::run('templates/headerMain'); ?>

<!-- Navigation -->
<?php echo Modules::run('templates/navMain'); ?>

<!-- Page Content -->
<?php echo $this->load->view($view_file) ?>

<!-- Footer -->
<?php echo Modules::run('templates/footerMain'); ?>