                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Posts
                            <small>Author</small>
                        </h1>
                        <?php 
                        if(!empty($this->session->flashdata('message'))) {
                            $message = $this->session->flashdata('message');
                            $messageType = $this->session->flashdata('messageType');
                            echo "<div class='alert alert-dismissable alert-$messageType' role=-alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> $message</div>";
                        }
                        ?>
                        <button class="btn btn-success" onclick="create_modal('add')"><i class="fa fa-plus"></i> Add Post</button>
                        <button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i> Reload</button>
                        <br><br>
                        <table id="table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th style="width:125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.row -->


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
                                <textarea name="blurb" cols="5" rows="10" class="form-control mceEditor"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Content</label>
                            <div class="col-md-10">
                                <textarea name="content" cols="5" rows="10" class="form-control mceEditor"></textarea>
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