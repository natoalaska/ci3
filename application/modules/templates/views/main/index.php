<!-- Head -->
<?php echo Modules::run('templates/headerMain'); ?>

<!-- Navigation -->
<?php echo Modules::run('templates/navMain'); ?>

<!-- Page Content -->
<?php echo $this->load->view($view_file) ?>

<!-- Sidebar -->
<?php echo Modules::run('templates/sidebarMain'); ?>

<!-- Footer -->
<?php echo Modules::run('templates/footerMain'); ?>