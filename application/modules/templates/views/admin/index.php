<!-- Head -->
<?php echo Modules::run('templates/headerAdmin'); ?>

<!-- Navigation -->
<?php echo Modules::run('templates/navAdmin'); ?>

<!-- Page Content -->
<?php echo $this->load->view($view_file) ?>

<!-- Footer -->
<?php echo Modules::run('templates/footerAdmin'); ?>