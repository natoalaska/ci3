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
                    $content = $row->content;
            ?>

                     <h2>
                        <a href="#"><?php echo $title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="#"><?php echo $author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date; ?></p>
                    <hr>
                    <?php if(!empty($image)) { ?>
                    <img class="img-responsive" src="<?php echo site_url("assets/images/" . $image); ?>" alt="">
                    <hr>
                    <?php } ?>
                    <p><?php echo $content; ?></p>
                    <hr>
                <?php }} ?>
            
                <!-- Blog Comments -->
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <?php 
                    if(!empty($this->session->flashdata('message'))) {
                        $message = $this->session->flashdata('message');
                        $messageType = $this->session->flashdata('messageType');
                        echo "<div class='alert alert-dismissable alert-$messageType' role=-alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> $message</div>";
                    }
                    ?>
                    <form role="form" action="<?php echo site_url('blog/addComment/'.$id); ?>" method="post">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="commentAuthor" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="content">Your Comment</label>
                            <textarea name="commentContent" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment"class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>
                
                <?php foreach($comments as $row) { ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $row->author; ?>
                            <small><?php echo $row->date; ?></small>
                        </h4>
                        <?php echo $row->content; ?>
                    </div>
                </div>
                <?php } ?>

        </div>
        
        
<?php
$role = $this->session->role;
if(isset($role) && $role == 'admin') { ?>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Post Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-2">Post Title</label>
                            <div class="col-md-10">
                                <input type="text" name="title" placeholder="Post Title" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Author</label>
                            <div class="col-md-10">
                                <input type="text" name="author" placeholder="Author" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Date</label>
                            <div class="col-md-10">
                                <div id="datetimepicker" class="input-group date">
                                    <input type="text" name="date" class="form-control"></input>
                                    <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Category</label>
                            <div class="col-md-10">
                                <select name="category_id" id="category_id" class="form-control">
                                        <?php
                                            echo "<option value=''>--Select Category--</option>";
                                            foreach($categories as $row) {
                                                echo "<option value='$row->id'>$row->title</option>";
                                            }
                                        ?>
                                        </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Status</label>
                            <div class="col-md-10">
                                <select name="status" class="form-control">
                                            <option value="">--Select Status--</option>
                                            <option value="draft">Draft</option>
                                            <option value="published">Published</option>
                                        </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Tags</label>
                            <div class="col-md-10">
                                <input type="text" name="tags" placeholder="Tags" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Blurb</label>
                            <div class="col-md-10">
                                <textarea name="blurb" id="blurb" cols="5" rows="10" class="form-control mceEditor"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Content</label>
                            <div class="col-md-10">
                                <textarea name="content" id="content" cols="5" rows="10" class="form-control mceEditor"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onClick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>
<?php } ?>