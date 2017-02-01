                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            (Pre/Suf)fix
                            <small>Author</small>
                        </h1>
                        <?php 
                        if(!empty($this->session->flashdata('message'))) {
                            $message = $this->session->flashdata('message');
                            $messageType = $this->session->flashdata('messageType');
                            echo "<div class='alert alert-dismissable alert-$messageType' role=-alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> $message</div>";
                        }
                        ?>
                        <button class="btn btn-success" onclick="create_modal('add')"><i class="fa fa-plus"></i> Add (Pre/Suf)fix</button>
                        <button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i> Reload</button>
                        <br><br>
                        <table id="table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th style="width:125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>Type</th>
                                    <th>Code</th>
                                    <th>Description</th>
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
                <h3 class="modal-title">(Pre/Suf)fix Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-2">Type</label>
                            <div class="col-md-10">
                                <select name="type" id="type" class="form-control">
                                    <option value=''>--Select Type--</option>
                                    <option value='prefix'>Prefix</option>
                                    <option value='suffix'>Suffix</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Code</label>
                            <div class="col-md-10">
                                <input type="text" name="code" placeholder="Code" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Description</label>
                            <div class="col-md-10">
                                 <input type="text" name="description" placeholder="Description" class="form-control"></input>
                                <span class="help-block"></span>
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