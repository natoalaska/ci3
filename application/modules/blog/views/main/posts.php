<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Blog
                <?php
                    if(isset($search)) echo "<small>Searched for: $search</small>";
                ?>
            </h1>

            <?php 
                if($posts == 0) echo "No Results";
                else {
                    foreach($posts as $row) {
                        $id = $row->id;
                        $title = $row->title;
                        $author = $row->author;
                        $date = $row->date;
                        $image = $row->image;
                        $content = $row->blurb;
                ?>

                     <h2>
                        <a href="<?php echo site_url('blog/post/'.$id); ?>"><?php echo $title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="#"><?php echo $author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date; ?></p>
                    <hr>
                <?php if(!empty($image)) { ?>
            <a href="<?php echo site_url('blog/post/'.$id); ?>"><img class="img-responsive" src="<?php echo site_url("assets/images/" . $image); ?>" alt=""></a>
                    <hr>
                <?php } ?>
                    
                    <p><?php echo $content; ?></p>
                    <a class="btn btn-primary" href="<?php echo site_url('blog/post/'.$id); ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
                <?php }} ?>

        </div>