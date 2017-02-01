<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo site_url('admin'); ?>">CMS Admin</a>
    </div>
            
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li><a href="<?php echo site_url(); ?>">Home</a></li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->firstName; ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?php echo site_url('admin/auth/profile/'. $this->session->user_id); ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li class="divider"></li>
                <li>
                        <a href="<?php echo site_url('admin/auth/logout');?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
            
            
            
     <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
<!--             <li <?php echo Modules::run('admin/navActive','admin/name*'); ?>>
                <a href="javascript:;" data-toggle="collapse" data-target="#names"><i class="fa fa-fw fa-file-text-o"></i> Setup <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="names" <?php echo Modules::run('admin/navExpand','admin/name*'); ?>>
                    <li>
                        <a href="<?php echo site_url('admin/names/fixes'); ?>"><i class="fa fa-fw fa-file-text-o"></i>(Pre/Suf)fixes</a>
                    </li>
                </ul>
            </li> -->
            <?php 
            foreach(Modules::run('admin/createNavigation') as $nav) {
                if($nav->hasChild == 1) { ?>
                    <li>
                        <a href="javascript:;" data-toggle='collapse' data-target='#parent_<?php echo $nav->id; ?>'>
                            <i class="fa fa-fw fa-<?php echo $nav->icon; ?>"></i> 
                            <?php echo $nav->title; ?> 
                            <i class="fa fa-fw fa-caret-down"></i> 
                        </a>
                        <ul id="parent_<?php echo $nav->id; ?>" class="collapse">
                        <?php
                            foreach(Modules::run('admin/createNavigation', $nav->id) as $child) { ?>
                                <li>
                                    <a href="<?php echo site_url($child->slug); ?>">
                                        <i class="fa fa-fw fa-<?php echo $child->icon; ?>"></i> 
                                        <?php echo $child->title; ?>
                                    </a>
                                </li>
                        <?php } ?>
                        </ul>
                    </li>
                <?php } else if ($nav->parent_id > 0) {
                    
                } else { ?>
                    <li>
                        <a href="<?php echo site_url($nav->slug); ?>">
                            <i class='fa fa-fw fa-<?php echo $nav->icon; ?>'></i> 
                            <?php echo $nav->title; ?>
                        </a>
                    </li>
                <?php } 
            }
            ?>
        </ul>
        
    </div><!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">
    <div class="container-fluid">