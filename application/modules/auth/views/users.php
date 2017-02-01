                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users
                            <small>Author</small>
                        </h1>
                        <?php 
                        if(!empty($this->session->flashdata('message'))) {
                            $message = $this->session->flashdata('message');
                            $messageType = $this->session->flashdata('messageType');
                            echo "<div class='alert alert-dismissable alert-$messageType' role=-alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> $message</div>";
                        }
                        ?>
                        <button class="btn btn-success" onclick="create_modal('add')"><i class="fa fa-plus"></i> Add User</button>
                        <button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i> Reload</button>
                        <br><br>
                        <table id="table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Role</th>
                                    <th style="width:125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Role</th>
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
                            <label class="control-label col-md-2">First Name</label>
                            <div class="col-md-10">
                                <input type="text" name="firstName" placeholder="First Name" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Last Name</label>
                            <div class="col-md-10">
                                <input type="text" name="lastName" placeholder="Last Name" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Username</label>
                            <div class="col-md-10">
                                <input type="text" name="username" placeholder="Username" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Email</label>
                            <div class="col-md-10">
                                <input type="email" name="email" placeholder="Email" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Role</label>
                            <div class="col-md-10">
                                <select name="role" class="form-control">
                                            <option value="">--Select Role--</option>
                                            <option value="admin">Admin</option>
                                            <option value="subscriber">Subscriber</option>
                                        </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Password</label>
                            <div class="col-md-10">
                                <input type="password" name="password" placeholder="Password" class="form-control">
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