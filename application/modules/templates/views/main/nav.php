<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="<?php echo site_url(); ?>">Home</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php          
                    foreach($categories as $row) {
                        $title = $row->title;
                        $id = $row->id;
                        echo "<li><a href='".site_url('?category='.$id)."'>{$title}</a></li>";
                    }
                ?>
            </ul>
            <ul class='nav navbar-nav pull-right'>
                <?php
                $role = $this->session->role;
                if(isset($role) && $role == 'admin') {
                    $uri = uri_string();
		            $match = fnmatch('blog/post/*', $uri);
                    if($match) {
                        echo '<li><a href="javascript:void(0)" title="Edit" onclick="create_modal('."'edit'".','."'".$post_id."'".')"><i class="fa fa-pencil"></i>Edit Post</a></li>';
                    }
					
                    echo "<li><a href='".site_url('admin')."'>Admin</a></li>";
                }
                ?>
            </ul>
        </div> <!-- /.navbar-collapse -->
    </div>  <!-- /.container -->
</nav><!-- /nav -->
